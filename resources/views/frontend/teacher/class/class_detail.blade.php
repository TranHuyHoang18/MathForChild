@extends('frontend.layouts.Teacher')
@section('style')
    <link rel="stylesheet" href=" https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style type="text/css">
        .row
        {
            margin-top: 20px;
        }
        #name_class
        {
            text-align: center;
            color: red;
            font-weight: bold;
            margin-top: 20px;
        }
    </style>
    @endsection
@section('content')

    <h2 id="name_class"> Lớp : {{$class->name}}</h2>
    <div class="container" style="margin-top: 100px">
        <!--Thông báo  -->

        <a id="notification_1" onclick="Cclick('notification')"><h3>Thông báo</h3></a>
        <div class="container" id="notification" style="display: none">
            <div class="row">
                <a onclick="Cclick('add_notification')"><button class="btn btn-success">Thêm thông báo</button></a>
            </div>
            <div class="row" id="add_notification" style="display: none">

                <form method="post" action="{{url('teacher/class/notification/create/'.$class->id)}}" STYLE="width: 100%">
                    @csrf
                    <div class="row" style="width: 100%">
                        <div class="col-md-3">
                            <label style="float: right">Nội dung thông báo</label>
                        </div>

                        <div class="col-md-9" >
                            <textarea name="content" style="width: 80%"></textarea>
                        </div>
                    </div>
                    <div class="row" style="width: 100%">
                        <div class="col-md-3">
                            <label class="" style="float: right">Thời hạn</label>
                        </div>

                        <div class="col-md-9" >
                            <input type="date" name="date" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label  class="" style="float: right">Mức độ</label>
                        </div>
                        <div class="col-md-9">
                            <select name="level">
                                <option value="0" class="btn btn-warning">Bình thường</option>
                                <option value="1" class="btn btn-danger">Khẩn</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-success" style="text-align: center;margin: 0px auto">Đăng</button>
                    </div>
                </form>

            </div>
            <?php $k=0;?>
            @foreach($notifications as $notification)
                <?php $k++; ?>
                <div class="row" id="{{$k}}" style="display: none">

                    <form method="post" action="{{url('teacher/class/notification/edit/'.$class->id.'/'.$notification->id)}}" STYLE="width: 100%">
                        @csrf
                        <div class="row" style="width: 100%">
                            <div class="col-md-3">
                                <label style="float: right">Nội dung thông báo</label>
                            </div>

                            <div class="col-md-9" >
                                <textarea name="content" style="width: 80%">{{$notification->content}}</textarea>
                            </div>
                        </div>
                        <div class="row" style="width: 100%">
                            <div class="col-md-3">
                                <label class="" style="float: right">Thời hạn</label>
                            </div>

                            <div class="col-md-9" >
                                <input type="date" name="date" value="{{$notification->date}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label  class="" style="float: right">Mức độ</label>
                            </div>
                            <div class="col-md-9">
                                <select name="level">
                                    <option value="0" class="btn btn-warning">Bình thường</option>
                                    <option value="1" class="btn btn-danger">Khẩn</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <button type="submit" class="btn btn-success" style="text-align: center;margin: 0px auto">Đăng</button>
                        </div>
                    </form>

                </div>
            @endforeach

            <div class="row">
                <h2>Danh sách các thông báo hiện có</h2>
                <table class="table table-bordered">
                    <tr>
                        <td>ID</td>
                        <td>Nội dung thông báo</td>
                        <td>Thời hạn</td>
                        <td>Hành động</td>
                    </tr>

                    <?php $i = 0;?>
                    @foreach($notifications as $notification)
                        <?php $i++?>
                        <tr id="{{$i."_1"}}" >
                            <td>{{$notification->id}}</td>
                            <td>{{$notification->content}}</td>
                            <td>{{$notification->date}}</td>
                            <td>
                                <a href="{{url('teacher/class/notification/delete/'.$class->id.'/'.$notification->id)}}" ><button class="btn btn-danger">Xóa</button></a>
                                <a onclick="Cclick({{$i}})" ><button class="btn btn-warning">Sửa</button></a>
                            </td>
                        </tr>
                    @endforeach


                </table>
            </div>
        </div>
        <!--Bài tập tuần -->
        <a id="exercise_1" onclick="Cclick('exercise')"><h3>Bài tập tuần </h3></a>
        @foreach($weeks as $week)
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-6">
                    <h3>Tuần {{$week->name}}</h3>
                </div>
                <div class="col-md-4">

                    <a href="{{url('teacher/class/week/edit/'.$class->id.'/'.$week->id)}}" ><button class="btn btn-warning">Cấu hình</button></a>
                </div>
            </div>
            @if($tmp[$week->name][1]!=null)
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-2">
                        <h3>Dạng 1: </h3>
                    </div>
                    <div class="col-md-4">
                        <h5>{{$tmp[$week->name][1]->name}}</h5>
                    </div>
                </div>
            @endif
            @if($tmp[$week->name][2]!=null)
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-2">
                        <h3>Dạng 2: </h3>
                    </div>
                    <div class="col-md-4">
                        <h5>{{$tmp[$week->name][2]->name}}</h5>
                    </div>
                </div>
            @endif
            @if($tmp[$week->name][3]!=null)
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-2">
                        <h3>Dạng 3: </h3>
                    </div>
                    <div class="col-md-4">
                        <h5>{{$tmp[$week->name][3]->name}}</h5>
                    </div>
                </div>
            @endif
            @if($tmp[$week->name][4]!=null)
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-2">
                        <h3>Dạng 4: </h3>
                    </div>
                    <div class="col-md-4">
                        <h5>{{$tmp[$week->name][4]->name}}</h5>
                    </div>
                </div>
            @endif
            @if($tmp[$week->name][5]!=null)
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-2">
                        <h3>Dạng 5: </h3>
                    </div>
                    <div class="col-md-4">
                        <h5>{{$tmp[$week->name][5]->name}}</h5>
                    </div>
                </div>
            @endif
            @if($tmp[$week->name][6]!=null)
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-2">
                        <h3>Dạng 6: </h3>
                    </div>
                    <div class="col-md-4">
                        <h5>{{$tmp[$week->name][6]->name}}</h5>
                    </div>
                </div>
            @endif
            @if($tmp[$week->name][7]!=null)
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-2">
                        <h3>Dạng 7: </h3>
                    </div>
                    <div class="col-md-4">
                        <h5>{{$tmp[$week->name][7]->name}}</h5>
                    </div>
                </div>
            @endif
            @if($tmp[$week->name][8]!=null)
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-2">
                        <h3>Dạng 8: </h3>
                    </div>
                    <div class="col-md-4">
                        <h5>{{$tmp[$week->name][8]->name}}</h5>
                    </div>
                </div>
            @endif
            @if($tmp[$week->name][9]!=null)
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-2">
                        <h3>Dạng 9: </h3>
                    </div>
                    <div class="col-md-4">
                        <h5>{{$tmp[$week->name][9]->name}}</h5>
                    </div>
                </div>
            @endif

        @endforeach
        {{$weeks->links()}}
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-10">
                <a href="{{url('teacher/class/week/add/'.$class->id)}}"><button class="btn btn-success">Thêm tuần mới</button></a>
            </div>
        </div>
        <!--Danh sach tai lieu -->
        <a id="documents_1" onclick="Cclick('documents')"><h3>Danh sách các tài liệu </h3></a>
        <div class="container" id="documents" style="display: none">
            <div class="row" >
                <div class="col-md-10" >
                    <h2>Danh sách các tài liệu đã tải lên</h2>
                    <table class="table table-bordered">
                        <tr>
                            <td>ID</td>
                            <td>Tên tài liệu</td>
                            <td>Ngày tải lên</td>
                            <td>Hành động</td>
                        </tr>


                        @foreach($documents as $document)
                            <tr>
                                <td>{{$document->id}}</td>
                                <td>{{$document->name}}</td>
                                <td>{{$document->created_at}}</td>
                                <td>
                                    <a href="{{url('teacher/class/document/delete/'.$document->id)}}" ><button class="btn btn-danger">Xóa</button></a>
                                    <a href="{{asset($document->link)}}" ><button class="btn btn-warning">Mở</button></a>
                                    <a href="{{asset($document->link)}}" ><button class="btn btn-success">Tải về</button></a>

                                </td>
                            </tr>
                        @endforeach

                    </table>
                    {{$documents->links()}}
                </div>

            </div>
        </div>
        <!--Báo cáo lớp học -->
        <a id="statistical_class_1" onclick="Cclick('statistical_class')"><h3>Thống kê lớp học </h3></a>
        <div class="container" id="statistical_class" style="display: none">

            <div class="row">
                <h1>Báo cáo thống kê điểm số </h1>

            </div>
            <div class="row">

                <div class="col-md-3">
                    <h5>Thêm học sinh vào lớp</h5>
                </div>
                <div class="col-md-4">
                    <form action="{{url('teacher/class/search/student/'.$class->id)}}" method="post">
                        @csrf
                        <input type="text" name="id_student"  placeholder="id =  ?" style="float: left;width: 50%">
                        <button type="submit" class="btn btn-success" style="margin-left: 10px;">Tìm kiếm</button>
                    </form>
                </div>
                <div class="col-md-2"></div>
            </div>
            <div class="row">
                <table class="table table-bordered">
                    <tr>
                        <td>ID</td>
                        <td>Tên học sinh</td>
                        <td>Số điểm</td>
                        <td>Thao tác</td>
                    </tr>

                    <?php for($kt=1;$kt<=$rank['num_student'];$kt++)
                    {
                        echo"<tr>
                            <td>".$kt."</td>
                            <td>".$rank['name_student'][$kt]['name']."</td>
                            <td>".$rank['sum_score'][$kt]."</td>
                        ";
                        ?>
                    <td><a href="{{url('teacher/student_detail/'.$rank['id_score'][$kt])}}" ><button class="btn btn-warning">Chi tiết</button></a></td>
                </tr>
<?php

                    };?>
                </table>

            </div>
        </div>

    </div>

    <script type="text/javascript">

        function Cclick(s1)
        {

            document.getElementById(s1).style.display="block";
            document.getElementById(s1+'_1').style.display="none";
        }
    </script>
@endsection
