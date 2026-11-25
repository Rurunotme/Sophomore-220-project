<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Department;
use App\Models\Employee;
use App\Models\EmployeeTimePunch;
use App\Models\LeaveRequest;
use Carbon\Carbon;                 // Laravel's date/time tool
use Illuminate\Pagination\LengthAwarePaginator; // splits the table into pages


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

        return view('admin.employees', compact('user'));
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
