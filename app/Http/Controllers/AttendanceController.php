<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;


class AttendanceController extends Controller
{
     // Get all attendance records
    public function index()
    {
        $attendance = Attendance::all();

        return response()->json($attendance);
    }

    // Get one attendance record
    public function show($id)
    {
        $attendance = Attendance::find($id);

        if (!$attendance) {
            return response()->json([
                'message' => 'Attendance record not found'
            ], 404);
        }

        return response()->json($attendance);
    }

    // Clock an employee in
    public function clockIn(Request $request)
    {
        $validated = $request->validate([
            'employeeID' => 'required|exists:employees,employeeID'
        ]);

        // Check if the employee is already clocked in
        $activePunch = Attendance::where('employeeID', $validated['employeeID'])
            ->whereNull('punchout')
            ->first();

        if ($activePunch) {
            return response()->json([
                'message' => 'Employee is already clocked in'
            ], 409);
        }

        $attendance = Attendance::create([
            'employeeID' => $validated['employeeID']
        ]);

        return response()->json([
            'message' => 'Employee clocked in successfully',
            'attendance' => $attendance
        ], 201);
    }

    // Clock an employee out
    public function clockOut($id)
    {
        $attendance = Attendance::find($id);

        if (!$attendance) {
            return response()->json([
                'message' => 'Attendance record not found'
            ], 404);
        }

        if ($attendance->punchout !== null) {
            return response()->json([
                'message' => 'Employee has already clocked out'
            ], 409);
        }

        $attendance->update([
            'punchout' => now()
        ]);

        return response()->json([
            'message' => 'Employee clocked out successfully',
            'attendance' => $attendance
        ]);
    }
}
