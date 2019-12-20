<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.homepage');
    }
    public function register()
    {
        return view('frontend.account.register');
    }
    public function login()
    {
        return view('frontend.account.login');
    }
}
