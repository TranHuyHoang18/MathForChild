<?php

namespace App\Http\Controllers\Front\Teacher;

use App\Http\Controllers\Controller;
use App\models\NotificationModel;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:teacher');
    }
    public function addNotification($id_class,Request $request)
    {

        $notification = new NotificationModel();
        $input = $request->all();
        $notification->content = $input['content'];
        $notification->id_class = $id_class;
        $notification->date = $input['date'];
        $notification->level = $input['level'];
        $notification->save();

        return redirect()->route('teacher.class.detail',$id_class);
    }
    public function delete($id_class,$id_notifi)
    {
        $notification = NotificationModel::find($id_notifi);
        $notification->delete();
        return redirect()->route('teacher.class.detail',$id_class);
    }
    public function edit($id_class,$id_notifi,Request $request)
    {
        $input = $request->all();
        $notification = NotificationModel::find($id_notifi);
        $notification->content = $input['content'];
        $notification->date = $input['date'];
        $notification->level = $input['level'];
        $notification->save();
        return redirect()->route('teacher.class.detail',$id_class);


    }
}
