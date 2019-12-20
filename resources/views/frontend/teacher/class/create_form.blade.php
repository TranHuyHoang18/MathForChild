@extends('frontend.layouts.Teacher')
@section('style')
    <style type="text/css">

    .body_1
    {
        padding-top:80px;
        margin-top: 50px;
        margin-bottom: 50px;
        padding-bottom:80px;
        background-image: url("{{asset('frontend/images/background_form.jpg')}}");
        width: 100%;

    }
    .list_input
    {
        margin-top: 10px;
    }
    .list_input input
    {
        width: 80%;
        background-color: white;
    }
    .list_input p
    {
        text-align: center;
        font-size: 20px;
        color: white;
        font-weight: bolder;
        float: left;
    }
    .list_input i
    {
        font-size: 30px;
        color: #e8e800;
    }
    .head_form p
    {
        text-align: center;
        font-size: 30px;
        color: white;
        font-weight: bolder;
        margin: 0px auto;
    }
        .form
        {
            background: #545b62;

        }
        img
        {
            width: 100%;
            height: 100%;
        }
    </style>
    @endsection
@section('content')

   <div class="container">
       <div class="row body_1">
           <div class="col-md-2">

           </div>
           <div class="col-md-8">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{asset('frontend/images/back_ground_form_1.jpg')}}">
                    </div>
                    <div class="col-md-8 form">
                        <form action="{{url('teacher/class/create')}}" method="post">
                            @csrf
                            <div class="row head_form">
                                <p>Tạo lớp mới </p>
                            </div>

                            <div class="row list_input">
                                <div class="col-md-1">
                                    <i class="far fa-address-book"></i>
                                </div>
                                <div class="col-md-5">
                                    <p>Tên lớp học : </p>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="name" placeholder="....">
                                </div>
                            </div>
                            <div class="row list_input">
                                <div class="col-md-1">
                                    <i class="fas fa-balance-scale"></i>
                                </div>
                                <div class="col-md-5">
                                    <p>Số lượng Học sinh : </p>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="quantity" placeholder="....">
                                </div>
                            </div>
                            <div class="row list_input">
                                <div class="col-md-1">
                                    <i class="fas fa-map-marked-alt"></i>
                                </div>
                                <div class="col-md-5">
                                    <p>Địa chỉ lớp: </p>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="address" placeholder="....">
                                </div>
                            </div>
                            <div class="row list_input" style="margin-bottom: 20px">
                                <button class="btn btn-success" type="submit" style="margin: 0px auto">Tạo</button>
                            </div>

                        </form>

                    </div>
                </div>
           </div>
           <div class="col-md-2">

           </div>
       </div>
   </div>
@endsection
