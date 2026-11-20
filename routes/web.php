<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/login',function(){
    return view('login');
});

Route::get('/admindash',function(){
    return view('admindash');
});

Route::get('/employeeportal',function(){
    return view('employeeportal');
});