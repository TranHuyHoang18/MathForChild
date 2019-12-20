@extends('frontend.layouts.Teacher')
@section('style')
    <style type="text/css">
         td
         {
             border: 1px solid black;
             margin-left: 10px;
         }

    </style>
    @endsection
@section('content')

    <div class="container">
        {{--<div class="row" style="margin-top: 100px">
            <a href="{{url('teacher/class/document/add')}}" style="margin-left: 20%"> <button class="btn btn-success">Thêm tài liệu</button></a>
        </div>--}}
        <div class="row" >
            <div class="col-md-2"></div>
            <div class="col-md-8" >
                <h2>Danh sách các tài liệu đã tải lên</h2>
                <table class="table table-bordered">
                    <tr>
                        <td>ID</td>
                        <td>Tên tài liệu</td>
                        <td>Lớp</td>
                        <td>Ngày tải lên</td>
                        <td>Hành động</td>
                    </tr>


                    @foreach($documents as $document)
                        <tr>
                            <td>{{$document->id}}</td>
                            <td>{{$document->name}}</td>
                            <td>{{$document->class_name}}</td>
                            <td>{{$document->created_at}}</td>
                            <td>
                                <a href="{{url('teacher/class/document/delete/'.$document->id)}}" ><button class="btn btn-danger">Xóa</button></a>
                                <a href="{{asset($document->link)}}" ><button class="btn btn-warning">Mở</button></a>
                                <a href="{{asset($document->link)}}" ><button class="btn btn-success">Tải về</button></a>

                            </td>
                        </tr>
                    @endforeach

                </table>
                {{$documents->links()}}
            </div>
            <div class="col-md-2"></div>

        </div>
    </div>
@endsection
