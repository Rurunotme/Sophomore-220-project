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
