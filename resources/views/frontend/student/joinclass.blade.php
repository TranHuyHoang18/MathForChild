@extends('frontend.layouts.Student')

@section('content')
<div class="container">
    <div class="row"style="margin-top: 50px;">
        <h3 style="margin: 0px auto">Bạn chưa tham gia lớp nào! Hãy điền ID lớp của bạn mà giáo viên đã cung cấp</h3>
    </div>

    <div class="row" style=" margin-top: 30px;margin-bottom: 50px">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form action="{{url('/student/joinclass/')}}" method="post">
                @csrf
                    <input type="text" name="id_class" placeholder="nhập id lớp của bạn" style="width:60%;height: 50px">
                <button type="submit" class="btn btn-success">Xin vào</button>
            </form>



        </div>
        <div class="col-md-4"></div>
    </div>
</div>

<!-- hết thông báo -->
@endsection
