<?php

namespace App\Http\Controllers\Front\Teacher\Auth;

use App\Http\Controllers\Controller;
use App\Models\TeacherModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:teacher')->only('index');
    }
    public function index()
    {
        return view('frontend.teacher.homepage');
    }
    public function create()
    {
        return view('frontend.teacher.authForm.register');
    }
    public function store(Request $request)
    {


        $this->validate($request,array(
            'name'=>'required',
            'email'=>'required',
        ));
        $TeacherModel = new TeacherModel();
        $TeacherModel->name = $request->name;
        $TeacherModel->school = $request->school;
        $TeacherModel->class ="";
        $TeacherModel->address = $request->address;
        $TeacherModel->phone = $request->phone;
        $TeacherModel->avatar = "";
        $TeacherModel->email = $request->email;
        $TeacherModel->password = bcrypt($request->password);
        $TeacherModel->save();

        $file = $request->avatar;
        $path ='upload/avatar/'.$TeacherModel->id.'/';
        $file->move($path, $TeacherModel->id.'.jpg');
        $TeacherModel->avatar = $path.$TeacherModel->id.'.jpg';
        $TeacherModel->save();

        return redirect()->route('account.login');
    }
}
