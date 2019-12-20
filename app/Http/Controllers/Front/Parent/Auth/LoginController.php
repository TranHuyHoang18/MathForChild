<?php

namespace App\Http\Controllers\Front\Parent\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    public function __construct()
    {
        $this->middleware('guest:parent')->except('logout');
    }
    public function login()
    {
        return view('frontend.parent.authForm.login');
    }
    public function loginParent(Request $request)
    {
        if(Auth::guard('parent')->attempt(
            ['email'=>$request->email,'password'=>$request->password],$request->remember
        ))
        {
            return redirect()->intended(route('parent.dashboard'));
        }
        return redirect()->back()->withInput($request->only('email','remember'));
    }

    public function logout()
    {
        Auth::guard('parent')->logout();
        return redirect()->route('parent.auth.login');
    }
}
