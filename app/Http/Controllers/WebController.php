<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebController extends Controller
{
    public function home(){
        return view('home');
    }

    public function viewlogin(){
        return view('login');
    }

    public function login(Request $request){

        $validated = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::attempt($validated, $request->boolean('remember'))) {
            $request->session()->regenerate();
            $user = Auth::user();

            if (($user->roleID!=1&&$request->role==='admin')||($user->roleID===1&&$request->role==='employee')){
                return view('login');
            }
            if($user->roleID===1){
                return redirect('/admin');
            }
            else{
                return redirect('/employeeportal');
            }
        }
        return view('login');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function admin(){
        $user = Auth::user();
        if (!$user||$user->roleID!=1){
            return redirect('/login');
        }
        return view('admin',compact('user'));
    }

    public function employeeportal(){
        $user = Auth::user();
        if(!$user|| $user->roleID===1){
            return redirect('/login');
        }
        return view('employeeportal',compact('user'));
    }
}
