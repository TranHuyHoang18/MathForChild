<?php

namespace App\Http\Controllers\Front\Parent\Auth;

use App\Http\Controllers\Controller;
use App\Models\ParentModel;
use Illuminate\Http\Request;

class ParentController extends Controller
{
    /*public function __construct()
    {
        $this->middleware('auth:parent')->only('index');
    }*/
    public function index()
    {
        return view('frontend.parent.homepage');
    }
    public function create()
    {
        return view('frontend.parent.authForm.register');
    }
    public function store(Request $request)
    {

        $this->validate($request,array(
            'name'=>'required',
            'email'=>'required',

        ));
        $parentModel = new ParentModel();
        $parentModel->name = $request->name;

        $parentModel->address = $request->address;
        $parentModel->phone = $request->phone;
        $parentModel->avatar = "";
        $parentModel->id_child = $request->id_child;
        $parentModel->email = $request->email;
        $parentModel->password = bcrypt($request->password);
        $parentModel->save();

        return redirect()->route('account.login');
    }
}
