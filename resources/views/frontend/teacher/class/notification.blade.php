@extends('frontend.layouts.Teacher')
@section('style')
    <style type="text/css">

    </style>
    @endsection
@section('content')

    <div class="container" style="margin-top: 100px">
        <div class="row">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <h1>Thông báo </h1>
                    <form action="#" enctype="multipart/form-data" method="post" class="row">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <label for="focusedinput" class="">Nội dung thông báo</label>
                            </div>

                            <div class="col-md-9">
                                <textarea name="content"></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="focusedinput" class="">Mức độ</label>
                            </div>
                            <div class="col-md-9">
                                <select name="level">
                                    <option value="0" class="btn btn-warning">Bình thường</option>
                                    <option value="0" class="btn btn-danger">Khẩn</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-offset-2">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>

                <div class="col-md-2"></div>

            </div>
        </div>
    </div>
@endsection
