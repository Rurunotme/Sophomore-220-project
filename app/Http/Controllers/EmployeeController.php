<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Employee;

class EmployeeController extends Controller
{
    // get all employees
    public function index()
    {
        $employees = Employee::all();
        return response()->json($employees);
    }

    // get one single employee
    public function show($id)
    {
        $employee = Employee::find($id);
        if (!$employee) {
            return response()->json([
                'message' => 'Employee not found'
            ], 404);
        }
        return response()->json($employee);
    }

    // add a new employee
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|string',
            'email' => 'required|email|unique:employees,email',
            'phone' => 'required|string|max:20',
            'departmentID' => 'nullable|exists:departments,departmentID',
            'roleID' => 'required|exists:roles,roleID',
        ]);

        $validated['password'] = bcrypt($validated['password']);
        $employee = Employee::create($validated);
        return response()->json([
            'message'=> 'Employee created successfully',
            'employee' => $employee
        ], 201);
    }   

    // update an employee
    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);
        if (!$employee) {
            return response()->json([
                'message' => 'Employee not found'
            ], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:employees,email,' . $id . ',employeeID',
            'phone' => 'sometimes|required|string|max:20',
            'departmentID' => 'nullable|exists:departments,departmentID',
            'roleID' => 'sometimes|required|exists:roles,roleID',
        ]);

        $employee->update($validated);
        return response()->json([
            'message' => 'Employee updated successfully',
            'employee' => $employee
        ]);
    }
    // deactivate an employee
    public function destroy($id)
    {
        $employee = Employee::find($id);
        if (!$employee) {
            return response()->json([
                'message' => 'Employee not found'
            ], 404);
        }
         $employee->update([
            'isCurrentEmployee' => false
        ]);

        return response()->json([
            'message' => 'Employee deactivated successfully'
        ]);
    }

}
