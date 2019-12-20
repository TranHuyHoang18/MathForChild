<?php

namespace App\Http\Controllers\Front\Teacher\Auth;

use App\Http\Controllers\Controller;
use App\Models\TeacherModel;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    public function __construct()
    {
        $this->middleware('guest:teacher')->except('logout');
    }
    public function login()
    {
        return view('frontend.teacher.authForm.login');
    }
    public function loginTeacher(Request $request)
    {
        if(Auth::guard('teacher')->attempt(
            ['email'=>$request->email,'password'=>$request->password],$request->remember
        ))
        {
            return redirect()->intended(route('teacher.dashboard'));
        }
        return redirect()->back()->withInput($request->only('email','remember'));
    }
    public function logout()
    {

        Auth::guard('teacher')->logout();
        return redirect()->route('teacher.auth.login');
    }

}
