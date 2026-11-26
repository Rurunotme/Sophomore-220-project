<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\LeaveRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
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

        $currentDateNow = now()->toDateString();
        $onLeaveSubquery = LeaveRequest::query()
            ->selectRaw('1')
            ->whereColumn('leave_requests.employeeID', 'employees.employeeID')
            ->where('leave_requests.status', 'Approved')
            ->whereDate('leave_requests.leaveDate', '<=', $currentDateNow)
            ->whereDate('leave_requests.returnDate', '>=', $currentDateNow)
            ->limit(1);

        $employees = Employee::query()
            ->leftJoin('departments', 'employees.departmentID', '=', 'departments.departmentID')
            ->leftJoin('roles', 'employees.roleID', '=', 'roles.roleID')
            ->select('employees.*', 'departments.departmentName', 'roles.title as designation')
            ->selectSub($onLeaveSubquery, 'onLeave')
            ->orderBy('employees.name')
            ->paginate(7);

        $departments = Department::query()->orderBy('departmentName')->get();
        return view('admin.employees', compact('user', 'employees', 'departments'));
    }

    public function attendance(){
        if (!$user = $this->getAdminUser()) {
            return redirect('/login');
        }

        return view('admin.attendance', compact('user'));
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
