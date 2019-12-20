<div id="menuhocsinh">
    <nav class="navbar navbar-expand-sm  Mymenu">
        <div class="container">
            <a href="" class="nav-brand">
                <img src="{{asset('frontend/images/logo.svg')}}" alt="Logo" style="height: 60px">
            </a>
            <ul class="navbar-nav ml-auto list_item">
                <li class="nav-item">
                    <a href="{{url('/student/dashboard')}}" class="nav-link">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a href="{{url('student/class')}}" class="nav-link">Lớp Học</a>
                </li>
                <li class="nav-item">
                    <a href="{{url('student/class/document')}}" class="nav-link">Tài liệu</a>
                </li>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{--{{ route('teacher.auth.logout') }}--}}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('student.auth.logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>


            </ul>
        </div>
    </nav>
</div>

