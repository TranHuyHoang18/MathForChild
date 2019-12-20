<?php

namespace App\Http\Controllers\Front\Student\Auth;

use App\Http\Controllers\Controller;
use App\Models\StudentModel;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:student')->only('index');
    }
    public function index()
    {
        return view('frontend.student.homepage');
    }
    public function create()
    {
        return view('frontend.student.authForm.register');
    }
    public function store(Request $request)
    {

        $this->validate($request,array(
            'name'=>'required',
            'email'=>'required',

        ));
        $studentModel = new StudentModel();
        $studentModel->name = $request->name;
        $studentModel->school = $request->school;
        $studentModel->class = $request->class;
        $studentModel->id_class = 0;
        $studentModel->id_parent = 0;
        $studentModel->his_doc_id = 0;
        $studentModel->address = $request->address;
        $studentModel->avatar = "";
        $studentModel->email = $request->email;
        $studentModel->password = bcrypt($request->password);
        $studentModel->save();


        return redirect()->route('account.login');
    }
}
