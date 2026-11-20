<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;

Route::get('/', [WebController::class, 'home']);

Route::get('/login', [WebController::class, 'login']);

Route::get('/admin', [WebController::class, 'admin']);

Route::get('/employeeportal', [WebController::class, 'employeeportal']);

