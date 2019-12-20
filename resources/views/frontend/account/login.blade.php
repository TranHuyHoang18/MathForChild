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
                    <h1 style="margin: 0px auto">Đăng nhập với tư cách </h1>
                </div>
                <div class="row" style="margin-top: 10px;margin-bottom:10px;text-align: center">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <a onclick="TurnOn('student')"><button  id = "student_1"  class="btn btn-success">Học sinh</button> </a>
                        <a onclick="TurnOn('teacher')"><button id = "teacher_1"class="btn btn-warning">Giáo Viên</button> </a>
                        <a onclick="TurnOn('parent')"><button id = "parent_1" class="btn btn-danger">Phụ Huynh</button> </a>
                    </div>
                    <div class="col-md-2"></div>

                </div>
                <div class="row" id ="student" style="margin-top:20px;margin-bottom:10px;display: none">
                    <form method="POST" action="{{ route('student.auth.loginStudent') }}" style="width: 100%">
                            @csrf
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Địa chỉ Email') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mật Khẩu') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Ghi nhớ đăng nhập') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Đăng nhập') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Quên mật khẩu') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                </div>
                <div class="row" id ="parent" style="margin-top:20px;margin-bottom:10px;display: none">
                    <form method="POST" action="{{ route('parent.auth.loginParent') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Địa chỉ Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mật khẩu') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Ghi nhớ đăng nhập') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Đăng nhập') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Quên mật khẩu') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
                <div class="row" id ="teacher" style="margin-top:20px;margin-bottom:10px;display: none">
                    <form method="POST" action="{{ route('teacher.auth.loginTeacher') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Địa chỉ E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mật khẩu') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Nhớ mật khẩu') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Đăng nhập') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Quên mật khẩu') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>

                </div>

            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
<script  type="text/javascript">
    function TurnOn(s)
    {
        document.getElementById('teacher_1').style.border='none';
        document.getElementById('parent_1').style.border='none';
        document.getElementById('student_1').style.border='none';
        document.getElementById('student').style.display='none';
        document.getElementById('teacher').style.display='none';
        document.getElementById('parent').style.display='none';
        document.getElementById(s).style.display='block';
        document.getElementById(s+'_1').style="border: 5px solid blue";

    }
</script>
@endsection
