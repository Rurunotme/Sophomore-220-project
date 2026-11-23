<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;

Route::get('/', [WebController::class, 'home']);

Route::get('/login', [WebController::class, 'viewlogin']);

Route::post('/login', [Webcontroller::class, 'login']);

Route::post('/logout', [Webcontroller::class, 'logout']);

Route::get('/admin', [WebController::class, 'admin']);

Route::get('/employeeportal', [WebController::class, 'employeeportal']);

