<div id="menuhocsinh">
    <nav class="navbar navbar-expand-sm  Mymenu">
        <div class="container">
            <a href="" class="nav-brand">
                <img src="{{asset('frontend/images/logo.svg')}}" alt="Logo" style="height: 60px">
            </a>
            <ul class="navbar-nav ml-auto list_item">
                <li class="nav-item">
                    <a href="#" class="nav-link">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a href="{{url('teacher/class/document')}}" class="nav-link">Tài liệu</a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/account/register/')}}" class="nav-link">Đăng Kí</a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/account/login/')}}" class="nav-link">Đăng nhập</a>
                </li>
                {{--<li class="nav-item">
                    <a href="{{url('/account/register/')}}" class=""></a>
                    <a href="{{url('/account/login/')}}" style="margin-left: 10px">Đăng nhập</a>
                </li>--}}
            </ul>
        </div>
    </nav>
</div>

