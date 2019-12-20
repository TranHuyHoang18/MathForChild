@extends('frontend.layouts.Teacher')
@section('style')
    <style type="text/css">
         td
         {
             border: 1px solid black;
             margin-left: 10px;
         }
        .
    </style>
    @endsection
@section('content')

    <div class="container">
        <div class="row" style="margin-top: 100px">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <a href="{{url('teacher/class/create')}}" ><button class="btn btn-success">Tạo Lớp mới</button></a>
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row" style="margin-top: 30px">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h2>Danh sách các lớp học </h2>
                <table class="table table-bordered">
                    <tr>
                        <td>ID</td>
                        <td>Tên lớp</td>
                        <td>SL học sinh</td>
                        <td>Hành động</td>
                    </tr>
                    @foreach($classes as $class)
                        <tr>
                            <td>{{$class->id}}</td>
                            <td>{{$class->name}}</td>
                            <td>{{$class->number_stu}}</td>
                            <td>
                                <a href="{{url('teacher/class/delete/'.$class->id)}}" ><button class="btn btn-danger">Xóa</button></a>
                                <a href="{{url('teacher/class/edit/'.$class->id)}}" ><button class="btn btn-warning">Sửa</button></a>
                                <a href="{{url('teacher/class/detail/'.$class->id)}}" ><button class="btn btn-success">Vào lớp</button></a>
                            </td>
                        </tr>
                    @endforeach
                    {{$classes->links()}}
                </table>
            </div>
            <div class="col-md-2"></div>

        </div>
    </div>
@endsection
