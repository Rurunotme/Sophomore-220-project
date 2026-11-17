<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LeaveRequest;

class LeaveRequestController extends Controller
{
     // Get all leave requests
    public function index()
    {
        $requests = LeaveRequest::all();

        return response()->json($requests);
    }

    // Get one leave request
    public function show($id)
    {
        $request = LeaveRequest::find($id);

        if (!$request) {
            return response()->json([
                'message' => 'Leave request not found'
            ], 404);
        }

        return response()->json($request);
    }

    // Submit a new leave request
    public function store(Request $request)
    {
        $validated = $request->validate([
            'employeeID' => 'required|exists:employees,employeeID',
            'reason' => 'required|string|max:255',
            'leaveDate' => 'required|date',
            'returnDate' => 'required|date|after_or_equal:leaveDate',
        ]);

        $leaveRequest = LeaveRequest::create([
            'employeeID' => $validated['employeeID'],
            'reason' => $validated['reason'],
            'status' => 'Pending',
            'leaveDate' => $validated['leaveDate'],
            'returnDate' => $validated['returnDate'],
        ]);

        return response()->json([
            'message' => 'Leave request submitted successfully',
            'leaveRequest' => $leaveRequest
        ], 201);
    }

    // Approve a leave request
    public function approve($id)
    {
        $leaveRequest = LeaveRequest::find($id);

        if (!$leaveRequest) {
            return response()->json([
                'message' => 'Leave request not found'
            ], 404);
        }

        if ($leaveRequest->status !== 'Pending') {
            return response()->json([
                'message' => 'This leave request has already been reviewed'
            ], 409);
        }

        $leaveRequest->update([
            'status' => 'Approved'
        ]);

        return response()->json([
            'message' => 'Leave request approved successfully',
            'leaveRequest' => $leaveRequest
        ]);
    }

    // Deny a leave request
    public function deny($id)
    {
        $leaveRequest = LeaveRequest::find($id);

        if (!$leaveRequest) {
            return response()->json([
                'message' => 'Leave request not found'
            ], 404);
        }

        if ($leaveRequest->status !== 'Pending') {
            return response()->json([
                'message' => 'This leave request has already been reviewed'
            ], 409);
        }

        $leaveRequest->update([
            'status' => 'Denied'
        ]);

        return response()->json([
            'message' => 'Leave request denied successfully',
            'leaveRequest' => $leaveRequest
        ]);
    }
}
