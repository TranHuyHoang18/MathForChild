<?php

namespace App\Http\Controllers\Front\Student\Classroom;

use App\Http\Controllers\Controller;
use App\Models\ClassModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:student');
    }
    public function document()
    {

        $id = Auth::user()->class;

        $data['class'] = ClassModel::find($id);
        $data['documents'] = DB::table('documents')
            ->where('id_class','=',$id)
            ->paginate(6);
        return view('frontend.student.class.document',$data);
    }
}
