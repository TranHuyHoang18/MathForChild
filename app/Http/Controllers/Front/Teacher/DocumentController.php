<?php

namespace App\Http\Controllers\Front\Teacher;

use App\Http\Controllers\Controller;
use App\Models\DocumentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:teacher');
    }

    public function add()
    {

        return view('frontend.teacher.class.document.add_form');
    }
    public function store($id_class,Request $request)
    {

        $file = $request->file;
        $id =Auth::id();
        $path ='upload/document/'.$id.'/'.$id_class.'/';
        $file->move($path, $file->getClientOriginalName());

        $input = $request->all();
        $document = new DocumentModel();
        $document->name = $input['name'];
        $document->id_class = $id_class;
        $document->id_teacher = $id;
        $document->link = $path.$file->getClientOriginalName();
        $document->id_report = 0;
        $document->save();

        return redirect()->route('teacher.class.document');

    }
}
