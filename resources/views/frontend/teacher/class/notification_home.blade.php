@extends('frontend.layouts.Teacher')
@section('style')
    <link rel="stylesheet" href=" https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style type="text/css">
        .row
        {
            margin-top: 20px;
        }
        .container
        {
            margin-bottom: 30px;
        }
    </style>
    @endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-1">

            </div>
            <div class="col-md-9">
                <div class="row">
                    <h1> Tin nhắn </h1>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <ul>
                            <li>
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="#" style="height:50px; width: 100%">
                                    </div>
                                    <div class="col-md-8">
                                        <p style="font-size: 16px">trần huy hoàng</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-9" >
                        <div class="row">
                            <h4>Trần Huy Hoàng</h4>
                        </div>
                        <div style="overflow: auto;max-height:200px" >
                            <div class="row">
                                <div class="col-md-1">
                                    <img src="#" style="width: 30px;height: 30px">
                                </div>
                                <div class="col-md-10">
                                    <p style="background-color:  lightskyblue; float: left">THích ăn gì thế em? làm sao nào ?</p>
                                </div>
                                <div class="col-md-1">

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1">

                                </div>
                                <div class="col-md-10">
                                    <p style="background-color:  darkgrey; float: right">THích ăn gì thế em? làm sao nào ?</p>
                                </div>
                                <div class="col-md-1">

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1">

                                </div>
                                <div class="col-md-10">
                                    <p style="background-color:  darkgrey; float: right">THích ăn gì thế em? làm sao nào ?</p>
                                </div>
                                <div class="col-md-1">

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1">
                                    <img src="#" style="width: 30px;height: 30px">
                                </div>
                                <div class="col-md-10">
                                    <p style="background-color:  lightskyblue; float: left">THích ăn gì thế em? làm sao nào ?</p>
                                </div>
                                <div class="col-md-1">

                                </div>
                            </div>
                        </div>

                            <form action="#" method="post">
                                <div class="row">
                                    <div class="col-md-10">
                                        <input  type="text" placeholder=". . . . . ." style="width: 100%;">
                                    </div>
                                    <div class="col-md-1">
                                        <button class=" btn btn-success" style="float: left">Gửi</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-2">

            </div>
        </div>
    </div>

@endsection
