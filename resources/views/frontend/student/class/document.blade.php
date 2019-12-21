@extends('frontend.layouts.Student')
@section('style')
    <link rel="stylesheet" href=" https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style type="text/css">
        .row
        {
            margin-top: 20px;
        }
        td
        {
            border: 1px solid black;
            margin-left: 10px;
        }
        #name_class
        {
            text-align: center;
            color: red;
            font-weight: bold;
            margin-top: 20px;
        }
    </style>
@endsection
@section('content')
    <h2 id="name_class"> Lớp : {{$class->name}}</h2>
    <div class="container">
        <div class="row" >
            <div class="col-md-2"></div>
            <div class="col-md-8" >
                <h2>Danh sách các tài liệu đã tải lên</h2>
                <table class="table table-bordered">
                    <tr>
                        <td>ID</td>
                        <td>Tên tài liệu</td>
                        <td>Ngày tải lên</td>
                        <td>Hành động</td>
                    </tr>
                    @foreach($documents as $document)
                        <tr>
                            <td>{{$document->id}}</td>
                            <td>{{$document->name}}</td>
                            <td>{{$document->created_at}}</td>
                            <td>
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
