<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AdminController;
use App\Models\ProfilePicture;

Route::get('/', [WebController::class, 'home']);

Route::get('/login', [WebController::class, 'viewlogin'])->name('login');;

Route::post('/login', [Webcontroller::class, 'login']);

Route::post('/logout', [Webcontroller::class, 'logout']);

Route::get('/admin', [WebController::class, 'admin']);

Route::get('/employeeportal', [WebController::class, 'employeeportal']);


Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/overview', [AdminController::class, 'overview'])->name('overview');
    Route::get('/employees', [AdminController::class, 'employees'])->name('employees');
    Route::get('/attendance', [AdminController::class, 'attendance'])->name('attendance');
    Route::get('/leave-requests', [AdminController::class, 'leaveRequests'])->name('leave-requests');
    Route::get('/payroll', [AdminController::class, 'payroll'])->name('payroll');
});

Route::prefix('employee')->name('employee.')->middleware(['auth'])->group(function () {
    Route::get('/workspace', [EmployeeController::class, 'workspace'])->name('workspace');
    Route::get('/attendance', [EmployeeController::class, 'attendance'])->name('attendance');
    Route::get('/payslips', [EmployeeController::class, 'payslips'])->name('payslips');
    Route::get('/leave', [EmployeeController::class, 'leave'])->name('leave');
    Route::get('/salary-changes', [EmployeeController::class, 'salaryChanges'])->name('salary-changes');
});

Route::get('/employees/{employeeID}/picture', function ($employeeID) {
    $pic = ProfilePicture::findOrFail($employeeID);

    return response($pic->pictureBlob, 200)->header('Content-Type', $pic->imageType);
})->name('employee.picture');