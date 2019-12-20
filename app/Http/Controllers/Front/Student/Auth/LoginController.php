<?php

namespace App\Http\Controllers\Front\Student\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    public function __construct()
    {
        $this->middleware('guest:student')->except('logout');
    }
    public function login()
    {
        return view('frontend.student.authForm.login');
    }
    public function loginStudent(Request $request)
    {
        if(Auth::guard('student')->attempt(
            ['email'=>$request->email,'password'=>$request->password],$request->remember
        ))
        {
            return redirect()->intended(route('student.dashboard'));
        }
        return redirect()->back()->withInput($request->only('email','remember'));
    }
    public function logout()
    {
        Auth::guard('student')->logout();
        return redirect()->route('home');
    }
}
