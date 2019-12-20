@extends('frontend.layouts.Register')
@section('style')
    <style type="text/css">
        .container
        {
            background: #faa7ec;
        }
        .form1
        {
            background: white;
            margin: 0px auto;
            text-align: center;
        }
        .row
        {
            width: 100%;
            margin-bottom: 15px;
        }
        p
        {
            color: black;
            font-weight: bolder;
            font-size: 30px;
            margin: 0px auto;
        }
        .input_form
        {
            margin: 0px auto;
            width: 80%;
            border:none;
            height: 40px;
            border-bottom: solid 1px black;
            /*border: solid 1px sandybrown ;*/
        }
        button
        {
            font-size: 16px;
        }
    </style>

@endsection
@section('content')
{{--<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>--}}
<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form method="post" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf
                <div class="row form1">
                    <div class="row" >
                        <p style="width: 100%">
                            Tạo tài khoản<br>
                        </p>
                        <h5 style="color: red;margin: 0px auto">Học sinh</h5>
                    </div>
                    <div class="row">
                        <input class="input_form" type="text" name="name" placeholder="Nhập tên">
                    </div>
                    <div class="row">
                        <input class="input_form" type="text" name="class" placeholder="Nhập lớp">
                    </div>
                    <div class="row">
                        <input class="input_form" type="text" name="school" placeholder="Nhập trường">
                    </div>
                    <div class="row">
                        <input class="input_form" type="text" name="address" placeholder="Nhập địa chỉ">
                    </div>
                    <div class="row">
                        <input class="input_form" type="email" name="email" placeholder="Nhập email" required autocomplete="new-email">
                    </div>

                    <div class="row">
                        <input id ="password" class="input_form" type="password" name="password" placeholder="Nhập mật khẩu" required autocomplete="new-password">
                    </div>

                    <div class="row">
                        <input id ="repassword" class="input_form" type="password" name="repassword" placeholder="Nhập lại mật khẩu" required autocomplete="new-password">
                    </div>

                    <div class="row">
                        <label class="col-md-5" style="font-size: 16px;margin-left: 3%">Ảnh đại diện : </label>
                        <input class="col-md-4" type="file" name="avatar" >
                    </div>
                    <div class="row">
                        <button class="input_form btn btn-success" type="submit">Tạo tài khoản</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>

</div>
    <script type="text/javascript">
        function K_click(id)
        {
            document.getElementById(id).style.display="block";
        }
    </script>
@endsection
