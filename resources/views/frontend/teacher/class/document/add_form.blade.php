@extends('frontend.layouts.Teacher')
@section('style')
    <style type="text/css">
        .document-form
        {
            margin-top: 50px;
            margin-bottom: 50px;

            border: 1px solid black;
        }
        .row
        {
            margin-top: 10px;
        }
        label
        {
            float: right;
        }
        h2
        {
            margin: 0px auto;
        }
    </style>
@endsection
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 document-form" >
                <div class="row">
                    <h2>Tải tài liệu lên </h2>
                </div>
                <form   action="{{url('teacher/class/document/add/1')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <label>Tên tài liệu</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="name" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Tải tài liệu lên</label>
                        </div>
                        <div class="col-md-6">
                            <input type="file" name="file" >
                        </div>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-success" style="margin: 0px auto">Tải lên</button>
                    </div>
                </form>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
@endsection
