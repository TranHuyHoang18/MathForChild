@extends('frontend.layouts.Register')
@section('style')

@endsection
@section('content')
    <div class="container">
        <div class="row"></div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8" style="border: 2px solid darkred">
                <div class="row" style="margin-top: 10px">
                    <h1 style="margin: 0px auto">Đăng kí tài khoản với tư cách </h1>
                </div>
                <div class="row" style="margin-top: 10px;margin-bottom:10px;text-align: center">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <a href="{{url('student/register')}}" ><button  id = "student_1"  class="btn btn-success">Học sinh</button> </a>
                        <a href="{{url('teacher/register')}}" ><button id = "teacher_1"class="btn btn-warning">Giáo Viên</button> </a>
                        <a href="{{url('parent/register')}}" ><button id = "parent_1" class="btn btn-danger">Phụ Huynh</button> </a>
                    </div>
                    <div class="col-md-2"></div>

                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
@endsection

