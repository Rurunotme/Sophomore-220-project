<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    private function getEmployeeUser(){
        $user = Auth::user();

        if (!$user || $user->roleID === 1) {
            return null;
        }

        return $user;
    }

    public function workspace(){
        if (!$user = $this->getEmployeeUser()) {
            return redirect('/login');
        }

        return view('employee.workspace', compact('user'));
    }

    public function attendance(){
        if (!$user = $this->getEmployeeUser()) {
            return redirect('/login');
        }

        return view('employee.attendance', compact('user'));
    }

    public function payslips(){
        if (!$user = $this->getEmployeeUser()) {
            return redirect('/login');
        }

        return view('employee.payslips', compact('user'));
    }

    public function leave(){
        if (!$user = $this->getEmployeeUser()) {
            return redirect('/login');
        }

        return view('employee.leave', compact('user'));
    }

    public function salaryChanges(){
        if (!$user = $this->getEmployeeUser()) {
            return redirect('/login');
        }

        return view('employee.salary-changes', compact('user'));
    }
}