<?php

namespace App\Http\Controllers\Front\Teacher;

use App\Http\Controllers\Controller;
use App\Models\ClassModel;
use App\models\RankModel;
use App\Models\StudentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:teacher');
    }

    public function create()
    {

        return view('frontend.teacher.class.create_form');
    }
    public function store(Request $request)
    {

        $input = $request->all();

        $item = new ClassModel();
        $item->name =$input['name'];
        $item->id_teacher =Auth::id();
        $item->number_stu =$input['quantity'];

        $item->save();
        $item1 = new RankModel();
        $item1->id_class = $item->id;
        $id_student = array('0'=>0);
        $item1->id_student='{"0":0}';
        $item1->rank='{"0":0}';
        $item1->thongke='';
        $item1->save();
        return redirect()->route('teacher.class.home');
    }
    public function delete($id)
    {
        $item = ClassModel::find($id);
        $item->delete();
        return redirect()->route('teacher.class.home');
    }
    public function search($id_class,Request $request)
    {
        $input = $request->all();
        $student = StudentModel::find($input['id_student']);
        if (is_null($student))
        {

        }
        else
        {
            $student->id_class = $id_class;
            $student->save();
        }
        return redirect()->route('teacher.class.detail',$id_class);
    }
}
