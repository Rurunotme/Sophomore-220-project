<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Department;
use App\Models\Employee;
use App\Models\EmployeeTimePunch;
use App\Models\LeaveRequest;
use Carbon\Carbon;// Laravel's date/time tool
use Illuminate\Pagination\LengthAwarePaginator; // splits the table into pages


class AdminController extends Controller
{
    private const LATE_AFTER = '09:05'; // clock in after this time = "Late"
    private const PER_PAGE = 15;        // how many rows show per page

    private function getAdminUser(){
        $user = Auth::user();

        if (!$user || $user->roleID != 1) {
            return null;
        }

        return $user;
    }

    public function overview(){
        if (!$user = $this->getAdminUser()) {
            return redirect('/login');
        }

        return view('admin.overview', compact('user'));
    }
    
    public function employees(){
        if (!$user = $this->getAdminUser()) {
            return redirect('/login');
        }

        return view('admin.employees', compact('user'));
    }
    public function attendance(Request $request){
    // only admins are allowed here
    if (!$user = $this->getAdminUser()) {
            return redirect('/login');
        }
    // Read the filter from url
    //The day to show default to today, and never go past today
    $day = $this->parseDate($request->query('date')) ?? today();
    if ($day->gt(today())) {
        $day = today();
    }

    // The search box and department dropdown
    $search = trim((string) $request->query('q', '')); 
    $departmentID = $request->query('department');

    // List of departments for the dropdown: [id => name]
    $departments = Department::orderBY('departmentName')->pluck('departmentName', 'departmentID');

    // build the attendance rows for that day
    $records = $this->buildRecords($day, $day, $search, $departmentID, $departments);

    // Calculate the 4 cards at the top
    $stats = $this->buildStats($records);

    // Send everything to the page 
    return view('admin.attendance', [
        'user' => $user,
        'records' => $records,
        'stats' => $stats,
        'departments' => $departments,
        'day' => $day,
        'search' => $search,
        'departmentID' => $departmentID,
    ]);
    }
    // Turns "2026-11-16" from the URL into a date.
    // Returns null if it is empty or not a real date.
    private function parseDate($value): ?Carbon
    {
        if (!$value) {
            return null;
        }

        try {
            return Carbon::createFromFormat('Y-m-d', $value)->startOfDay();
        } catch (\Throwable $e) {
            return null;
        }
    }

    // Creates the list of rows shown in the table.
    // Each row = one employee on one day.
    private function buildRecords(Carbon $from, Carbon $to, string $search, $departmentID, $departments)
    {
        // Get current employees, applying the search box and department filter
        $employees = Employee::query()
            ->where('isCurrentEmployee', true)
            ->when($search !== '', function ($q) use ($search) {
                $q->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%");
                });
            })
            ->when($departmentID, fn ($q) => $q->where('departmentID', $departmentID))
            ->orderBy('name')
            ->get(['employeeID', 'name', 'departmentID']);

        $ids = $employees->pluck('employeeID');

        // Get all clock-in/clock-out records in the date range,
        // grouped by employee, then by day, so we can look them up fast
        $punches = EmployeeTimePunch::whereIn('employeeID', $ids)
            ->whereBetween('punchIn', [$from->copy()->startOfDay(), $to->copy()->endOfDay()])
            ->orderBy('punchIn')
            ->get()
            ->groupBy('employeeID')
            ->map(fn ($rows) => $rows->groupBy(fn ($p) => Carbon::parse($p->punchIn)->toDateString()));

        // Get approved leave requests that overlap the date range
        $leaves = LeaveRequest::whereIn('employeeID', $ids)
            ->where('status', 'Approved')
            ->whereDate('leaveDate', '<=', $to)
            ->whereDate('returnDate', '>=', $from)
            ->get()
            ->groupBy('employeeID');

        $records = collect();

        // Go through each day (newest first), then each employee
        for ($day = $to->copy(); $day->gte($from); $day->subDay()) {
            $dayKey  = $day->toDateString();
            $isToday = $day->isToday();

            foreach ($employees as $emp) {
                // This employee's punches for this day (empty if none)
                $dayPunches = $punches[$emp->employeeID][$dayKey] ?? collect();

                $clockIn = $clockOut = null;
                $seconds = null;
                $hours   = '—';

                if ($dayPunches->isNotEmpty()) {
                    // They clocked in at least once
                    $clockIn = Carbon::parse($dayPunches->first()->punchIn);

                    // Did they forget to clock out (or are they still working)?
                    $hasOpen = $dayPunches->contains(fn ($p) => $p->punchout === null);

                    if ($hasOpen) {
                        $hours = $isToday ? 'In progress' : 'Missing clock-out';
                    } else {
                        // Everything is closed: add up the hours worked
                        $clockOut = Carbon::parse($dayPunches->last()->punchout);
                        $seconds  = $dayPunches->sum(fn ($p) =>
                            Carbon::parse($p->punchIn)->diffInSeconds(Carbon::parse($p->punchout), true));
                        $hours    = $this->formatDuration($seconds);
                    }

                    // Late if the first clock-in was after LATE_AFTER
                    $status = $clockIn->format('H:i') > self::LATE_AFTER ? 'Late' : 'Present';

                } elseif ($this->onLeave($leaves[$emp->employeeID] ?? collect(), $day)) {
                    // No punch, but they have approved leave
                    $status = 'On leave';

                } else {
                    // No punch and no leave
                    $status = 'Absent';
                }

                // Add this row to the list
                $records->push([
                    'name'       => $emp->name,
                    'department' => $departments[$emp->departmentID] ?? '—',
                    'date'       => $day->copy(),
                    'clockIn'    => $clockIn,
                    'clockOut'   => $clockOut,
                    'seconds'    => $seconds,
                    'hours'      => $hours,
                    'status'     => $status,
                ]);
            }
        }

        return $records;
    }

    // Checks if an employee had approved leave on a given day.
    // Leave starts on leaveDate and ends the day BEFORE returnDate.
    private function onLeave($employeeLeaves, Carbon $day): bool
    {
        return $employeeLeaves->contains(function ($leave) use ($day) {
            $start = Carbon::parse($leave->leaveDate)->startOfDay();
            $end   = Carbon::parse($leave->returnDate)->startOfDay();

            return $day->gte($start) && ($day->lt($end) || $start->equalTo($end));
        });
    }

    // Calculates the numbers for the 4 cards at the top of the page
    private function buildStats($records): array
    {
        $total   = $records->count();
        $present = $records->whereIn('status', ['Present', 'Late'])->count(); // late still counts as present
        $absent  = $records->where('status', 'Absent')->count();
        $onLeave = $records->where('status', 'On leave')->count();

        // Average hours, only counting days where they clocked out
        $worked  = $records->whereNotNull('seconds');
        $avgSecs = $worked->isNotEmpty() ? (int) round($worked->avg('seconds')) : null;

        return [
            'present'     => $present,
            'presentRate' => $total ? round($present / $total * 100, 1) : 0,
            'absent'      => $absent,
            'onLeave'     => $onLeave,
            'average'     => $avgSecs !== null ? $this->formatDuration($avgSecs) : '—',
            'averageDays' => $worked->count(),
        ];
    }

    // Turns seconds into text like "8h 24m"
    private function formatDuration(int $seconds): string
    {
        $minutes = intdiv($seconds, 60);

        return intdiv($minutes, 60) . 'h ' . ($minutes % 60) . 'm';
    }

    public function leaveRequests(){
        if (!$user = $this->getAdminUser()) {
            return redirect('/login');
        }

        return view('admin.leave-requests', compact('user'));
    }

    public function payroll(){
        if (!$user = $this->getAdminUser()) {
            return redirect('/login');
        }

        return view('admin.payroll', compact('user'));
    }
}
