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
        <div class="row"  style="display: none">
            <form id = "formmy" action="{{url('teacher/class/exercise/'.$class->id)}}" method="post" enctype="multipart/form-data">
                @csrf

                    <!-- Dạng 1 -->
                    <div >
                        <h1>Dang 1</h1>
                        <input id="Turn_1" type="text" name="Cclick1" value="1">
                        <input id="max_1" type="text" name="max_1" value="10">
                        <input id="min_1" type="text" name="min_1" value="0">
                        <input id="type_1" type="text" name="type_1" value="1">
                    </div>
                    <!-- Dang 2-->
                    <div >
                        <h1>Dang 2</h1>
                        <input id="Turn_2" type="text" name="Cclick2" value="1">
                        <input id="max_2" type="text" name="max_2" value="10">
                    </div>
                    <!-- Dang 3-->
                    <div >
                        <h1>Dang 3</h1>
                        <input id="Turn_3" type="text" name="Cclick3" value="1">
                        <input id="max_3" type="text" name="max_3" value="10">
                    </div>
                    <!-- Dang 4-->
                    <div >
                        <h1>Dang 4</h1>
                        <input id="Turn_4" type="text" name="Cclick4" value="1">
                        <input id="max_4" type="text" name="max_4" value="10">
                    </div>
                    <!-- Dang 5-->
                    <div >
                        <h1>Dang 5</h1>
                        <input id="Turn_5" type="text" name="Cclick5" value="1">
                        <input id="max_5" type="text" name="max_5" value="10">
                    </div>
                    <!-- Dạng 6 -->
                    <div >
                        <h1>Dang 6</h1>
                        <input id="Turn_6" type="text" name="Cclick6" value="1">
                        <input id="max_6" type="text" name="max_6" value="10">
                        <input id="type_6" type="text" name="type_D6" value="1">
                    </div>
                    <!-- Dạng 7 -->
                    <div >
                        <h1>Dang 7</h1>
                        <input id="Turn_7" type="text" name="Cclick7" value="1">
                        <input id="max_7" type="text" name="max_7" value="10">
                        <input id="type_7" type="text" name="type_D7" value="1">
                    </div>
                    <!-- Dạng 8 -->
                    <div >
                        <h1>Dang 8</h1>
                        <input id="Turn_8" type="text" name="Cclick8" value="1">
                        <input id="max_8" type="text" name="max_8" value="10">
                        <input id="type_8" type="text" name="type_D8" value="1">
                    </div>
                    <!-- Dang 9-->
                    <div >
                        <h1>Dang 9</h1>
                        <input id="Turn_9" type="text" name="Cclick9" value="1">
                        <input id="max_9" type="text" name="max_9" value="10">
                    </div>
                <input id="weekid" type="text" name="id_week" value="0">
                <input id='submit_btn' type="submit" value="Ghi nhan">
            </form>
        </div>
        <a id="exercise_1" onclick="Cclick('exercise')"><h3>Bài tập tuần </h3></a>
        <div class="container" id="exercise" {{--style="display: none"--}}>
            <div class="row">

                <h1>Bài tập tuần </h1>
            </div>
            @foreach($weeks as $week)
                <div id="week_1">
                    <div class="row">
                        <div class="col-md-2">
                            <h1>Tuần {{$week->name}} </h1>
                        </div>
                        <div class="col-md-8">
                            <a onclick="Formsubmit('formmy')"><button class="btn btn-success"> Lưu </button></a>
                            <button class="btn btn-warning"> Hủy </button>
                            <a onclick="EditWeek('weekIDa',{{$week->name}})"><button class="btn btn-danger">Chỉnh sửa</button></a>
                        </div>


                    </div>
                    <!-- Dang 1-->
                    @if($tmp[$week->name][1]!=null)
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-2">
                                <h4>Dạng 1: </h4>
                            </div>
                            <div class="col-md-4">
                               {{$tmp[$week->name][1]->name}}
                            </div>
                            <div class="col-md-2">

                                <a onclick="Turn('1','1')"><button class="btn btn-success">On</button></a>
                                <a onclick="Turn('1','0')"><button class="btn btn-danger">Off</button></a>
                            </div>
                            <div class="col-md-3">
                                <a onclick="TurnOn(4,'minvalue_D1','maxvalue_D1','type_D1','btn_D1')"><button class="btn btn-warning">Cấu hình</button></a>
                                <a href="#"><button class="btn btn-success">Thống kê</button></a>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-md-4"></div>
                            <div class="col-md-2" id="minvalue_D1" style="display: none">
                                Min: <input id="minvalue_D1_1" type="text" name="minvalue_D1" value="{{$tmp[$week->name][1]->num_min}}" style="width: 100%" placeholder="Số nhỏ nhất" >
                            </div>
                            <div class="col-md-2" id="maxvalue_D1" style="display: none">
                                Max: <input id="maxvalue_D1_1" type="text" name="maxvalue_D1" value="{{$tmp[$week->name][1]->num_max}}" style="width: 100%" placeholder="Số lớn nhất">
                            </div>
                            <div class="col-md-2" id="type_D1" style="display: none">
                                Loại: <br><select id="type_D1_1" name="type_D1">
                                    <option value="1"> + </option>
                                    <option value="2"> + - </option>
                                    <option value="3"> + - x </option>
                                    <option value="4"> + - x : </option>

                                </select>
                            </div>
                            <div class="col-md-2" id="btn_D1" style="display: none">
                                <a id="btn_D1_1" onclick="GhiNhan(8,'minvalue_D1_1','min_1','maxvalue_D1_1','max_1','type_D1_1','type_1','btn_D1')"><button class="btn btn-warning" style="margin-top: 10px; float: left">Ghi nhận</button></a>

                            </div>
                            <div class="col-md-2">

                            </div>
                        </div>
                    @endif
                    <!-- Dang 2-->
                    @if($tmp[$week->name][2]!=null)
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-2">
                                <h4>Dạng 2: </h4>
                            </div>
                            <div class="col-md-4">
                                {{$tmp[$week->name][2]->name}}
                            </div>
                            <div class="col-md-2">

                                <a onclick="Turn('2','1')"><button class="btn btn-success">On</button></a>
                                <a onclick="Turn('2','0')"><button class="btn btn-danger">Off</button></a>
                            </div>
                            <div class="col-md-3">
                                <a onclick="TurnOn(2,'maxvalue_D2','btn_D2')"><button class="btn btn-warning">Cấu hình</button></a>
                                <a href="#"><button class="btn btn-success">Thống kê</button></a>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-md-4"></div>
                            <div class="col-md-2"></div>
                            <div class="col-md-2" id="maxvalue_D2" style="display: none">
                                Max: <input id="maxvalue_D2_1" type="text" name="maxvalue_D2" value=" {{$tmp[$week->name][2]->num_max}}" style="width: 100%" placeholder="Số lớn nhất">
                            </div>
                            <div class="col-md-2" ></div>
                            <div class="col-md-2" id="btn_D2" style="display: none">
                                <a id="btn_D2_1" onclick="GhiNhan(4,'maxvalue_D2_1','max_2','btn_D2')"><button class="btn btn-warning" style="margin-top: 10px; float: left">Ghi nhận</button></a>

                            </div>
                            <div class="col-md-2">

                            </div>
                        </div>
                    @endif
                    <!-- Dang 3-->
                    @if($tmp[$week->name][3]!=null)
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-2">
                                <h4>Dạng 3: </h4>
                            </div>
                            <div class="col-md-4">
                                {{$tmp[$week->name][3]->name}}
                            </div>
                            <div class="col-md-2">

                                <a onclick="Turn('3','1')"><button class="btn btn-success">On</button></a>
                                <a onclick="Turn('3','0')"><button class="btn btn-danger">Off</button></a>
                            </div>
                            <div class="col-md-3">
                                <a onclick="TurnOn(2,'maxvalue_D3','btn_D3')"><button class="btn btn-warning">Cấu hình</button></a>
                                <a href="#"><button class="btn btn-success">Thống kê</button></a>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-md-4"></div>
                            <div class="col-md-2"></div>
                            <div class="col-md-2" id="maxvalue_D3" style="display: none">
                                Max: <input id="maxvalue_D3_1" type="text" name="maxvalue_D3" value="{{$tmp[$week->name][3]->num_max}}" style="width: 100%" placeholder="Số lớn nhất">
                            </div>
                            <div class="col-md-2" ></div>
                            <div class="col-md-2" id="btn_D3" style="display: none">
                                <a id="btn_D3_1" onclick="GhiNhan(4,'maxvalue_D3_1','max_3','btn_D3')"><button class="btn btn-warning" style="margin-top: 10px; float: left">Ghi nhận</button></a>
                            </div>
                            <div class="col-md-2">

                            </div>
                        </div>
                    @endif
                    <!-- Dang 4-->
                    @if($tmp[$week->name][4]!=null)
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-2">
                                <h4>Dạng 4: </h4>
                            </div>
                            <div class="col-md-4">
                                {{$tmp[$week->name][4]->name}}
                            </div>
                            <div class="col-md-2">

                                <a onclick="Turn('4','1')"><button class="btn btn-success">On</button></a>
                                <a onclick="Turn('4','0')"><button class="btn btn-danger">Off</button></a>
                            </div>
                            <div class="col-md-3">
                                <a onclick="TurnOn(2,'maxvalue_D4','btn_D4')"><button class="btn btn-warning">Cấu hình</button></a>
                                <a href="#"><button class="btn btn-success">Thống kê</button></a>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-md-4"></div>
                            <div class="col-md-2"></div>
                            <div class="col-md-2" id="maxvalue_D4" style="display: none">
                                Max: <input id="maxvalue_D4_1" type="text" name="maxvalue_D4" value="{{$tmp[$week->name][4]->num_max}}" style="width: 100%" placeholder="Số lớn nhất">
                            </div>
                            <div class="col-md-2" ></div>
                            <div class="col-md-2" id="btn_D4" style="display: none">
                                <a id="btn_D4_1" onclick="GhiNhan(4,'maxvalue_D4_1','max_4','btn_D4')"><button class="btn btn-warning" style="margin-top: 10px; float: left">Ghi nhận</button></a>
                            </div>
                            <div class="col-md-2">

                            </div>
                        </div>
                    @endif
                    <!-- Dang 5-->
                    @if($tmp[$week->name][5]!=null)
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-2">
                                <h4>Dạng 5: </h4>
                            </div>
                            <div class="col-md-4">
                                {{$tmp[$week->name][5]->name}}
                            </div>
                            <div class="col-md-2">

                                <a onclick="Turn('5','1')"><button class="btn btn-success">On</button></a>
                                <a onclick="Turn('5','0')"><button class="btn btn-danger">Off</button></a>
                            </div>
                            <div class="col-md-3">
                                <a onclick="TurnOn(2,'maxvalue_D5','btn_D5')"><button class="btn btn-warning">Cấu hình</button></a>
                                <a href="#"><button class="btn btn-success">Thống kê</button></a>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-md-4"></div>
                            <div class="col-md-2"></div>
                            <div class="col-md-2" id="maxvalue_D5" style="display: none">
                                Max: <input id="maxvalue_D5_1" type="text" name="maxvalue_D5" value="{{$tmp[$week->name][5]->num_max}}" style="width: 100%" placeholder="Số lớn nhất">
                            </div>
                            <div class="col-md-2" ></div>
                            <div class="col-md-2" id="btn_D5" style="display: none">
                                <a id="btn_D5_1" onclick="GhiNhan(4,'maxvalue_D5_1','max_5','btn_D5')"><button class="btn btn-warning" style="margin-top: 10px; float: left">Ghi nhận</button></a>
                            </div>
                            <div class="col-md-2">

                            </div>
                        </div>
                    @endif
                    <!-- Dang 6-->
                    @if($tmp[$week->name][6]!=null)
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-2">
                                <h4>Dạng 6: </h4>
                            </div>
                            <div class="col-md-4">
                                {{$tmp[$week->name][6]->name}}
                            </div>
                            <div class="col-md-2">

                                <a onclick="Turn('6','1')"><button class="btn btn-success">On</button></a>
                                <a onclick="Turn('6','0')"><button class="btn btn-danger">Off</button></a>
                            </div>
                            <div class="col-md-3">
                                <a onclick="TurnOn(3,'maxvalue_D6','type_D6','btn_D6')"><button class="btn btn-warning">Cấu hình</button></a>
                                <a href="#"><button class="btn btn-success">Thống kê</button></a>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-md-4"></div>
                            <div class="col-md-2"></div>
                            <div class="col-md-2" id="maxvalue_D6" style="display: none">
                                Max: <input id="maxvalue_D6_1" type="text" name="maxvalue_D6" value="{{$tmp[$week->name][6]->num_max}}" style="width: 100%" placeholder="Số lớn nhất">
                            </div>
                            <div class="col-md-2" id="type_D6" style="display: none" >
                                Loại: <br><select id="type_D6_1" name="type_D6">
                                    <option value="1"> + </option>
                                    <option value="2"> + - </option>
                                    <option value="3"> + - x </option>
                                    <option value="4"> + - x : </option>
                                </select>
                            </div>
                            <div class="col-md-2" id="btn_D6" style="display: none">
                                <a id="btn_D6_1" onclick="GhiNhan(6,'maxvalue_D6_1','max_6','type_D6_1','type_6','btn_D6')"><button class="btn btn-warning" style="margin-top: 10px; float: left">Ghi nhận</button></a>
                            </div>
                            <div class="col-md-2">

                            </div>
                        </div>
                    @endif
                    <!-- Dang 7-->
                    @if($tmp[$week->name][7]!=null)
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-2">
                                <h4>Dạng 7: </h4>
                            </div>
                            <div class="col-md-4">
                                {{$tmp[$week->name][7]->name}}
                            </div>
                            <div class="col-md-2">

                                <a onclick="Turn('7','1')"><button class="btn btn-success">On</button></a>
                                <a onclick="Turn('7','0')"><button class="btn btn-danger">Off</button></a>
                            </div>
                            <div class="col-md-3">
                                <a onclick="TurnOn(3,'maxvalue_D7','type_D7','btn_D7')"><button class="btn btn-warning">Cấu hình</button></a>
                                <a href="#"><button class="btn btn-success">Thống kê</button></a>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-md-4"></div>
                            <div class="col-md-2"></div>
                            <div class="col-md-2" id="maxvalue_D7" style="display: none">
                                Max: <input id="maxvalue_D7_1" type="text" name="maxvalue_D7" value="{{$tmp[$week->name][7]->num_max}}" style="width: 100%" placeholder="Số lớn nhất">
                            </div>
                            <div class="col-md-2" id="type_D7" style="display: none" >
                                Loại: <br><select id="type_D7_1" name="type_D7">
                                    <option value="1"> + </option>
                                    <option value="2"> + - </option>
                                    <option value="3"> + - x </option>
                                    <option value="4"> + - x : </option>
                                </select>
                            </div>
                            <div class="col-md-2" id="btn_D7" style="display: none">
                                <a id="btn_D7_1" onclick="GhiNhan(6,'maxvalue_D7_1','max_7','type_D7_1','type_7','btn_D7')"><button class="btn btn-warning" style="margin-top: 10px; float: left">Ghi nhận</button></a>
                            </div>
                            <div class="col-md-2">

                            </div>
                        </div>
                    @endif
                    <!-- Dang 8-->
                    @if($tmp[$week->name][8]!=null)
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-2">
                                <h4>Dạng 8: </h4>
                            </div>
                            <div class="col-md-4">
                                {{$tmp[$week->name][8]->name}}
                            </div>
                            <div class="col-md-2">

                                <a onclick="Turn('8','1')"><button class="btn btn-success">On</button></a>
                                <a onclick="Turn('8','0')"><button class="btn btn-danger">Off</button></a>
                            </div>
                            <div class="col-md-3">
                                <a onclick="TurnOn(3,'maxvalue_D8','type_D8','btn_D8')"><button class="btn btn-warning">Cấu hình</button></a>
                                <a href="#"><button class="btn btn-success">Thống kê</button></a>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-md-4"></div>
                            <div class="col-md-2"></div>
                            <div class="col-md-2" id="maxvalue_D8" style="display: none">
                                Max: <input id="maxvalue_D8_1" type="text" name="maxvalue_D8" value="{{$tmp[$week->name][8]->num_max}}" style="width: 100%" placeholder="Số lớn nhất">
                            </div>
                            <div class="col-md-2" id="type_D8" style="display: none" >
                                Loại: <br><select id="type_D8_1" name="type_D7">
                                    <option value="1"> Khối lượng </option>
                                    <option value="2"> Độ dài </option>
                                    <option value="3"> Diện tích </option>
                                    <option value="4"> Thể tích </option>
                                </select>
                            </div>
                            <div class="col-md-2" id="btn_D8" style="display: none">
                                <a id="btn_D8_1" onclick="GhiNhan(6,'maxvalue_D8_1','max_8','type_D8_1','type_8','btn_D8')"><button class="btn btn-warning" style="margin-top: 10px; float: left">Ghi nhận</button></a>
                            </div>
                            <div class="col-md-2">

                            </div>
                        </div>
                    @endif
                    <!-- Dang 9-->
                    @if($tmp[$week->name][9]!=null)
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-2">
                                <h4>Dạng 9: </h4>
                            </div>
                            <div class="col-md-4">
                                {{$tmp[$week->name][9]->name}}
                            </div>
                            <div class="col-md-2">

                                <a onclick="Turn('9','1')"><button class="btn btn-success">On</button></a>
                                <a onclick="Turn('9','0')"><button class="btn btn-danger">Off</button></a>
                            </div>
                            <div class="col-md-3">
                                <a onclick="TurnOn(2,'maxvalue_D9','btn_D9')"><button class="btn btn-warning">Cấu hình</button></a>
                                <a href="#"><button class="btn btn-success">Thống kê</button></a>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-md-4"></div>
                            <div class="col-md-2"></div>
                            <div class="col-md-2" id="maxvalue_D9" style="display: none">
                                Max: <input id="maxvalue_D9_1" type="text" name="maxvalue_D9" value="{{$tmp[$week->name][9]->num_max}}" style="width: 100%" placeholder="Số lớn nhất">
                            </div>
                            <div class="col-md-2" ></div>
                            <div class="col-md-2" id="btn_D9" style="display: none">
                                <a id="btn_D9_1" onclick="GhiNhan(4,'maxvalue_D9_1','max_9','btn_D9')"><button class="btn btn-warning" style="margin-top: 10px; float: left">Ghi nhận</button></a>
                            </div>
                            <div class="col-md-2">

                            </div>
                        </div>
                    @endif
                </div>

            @endforeach
            <div id="week_1">
                <div class="row">
                    <div class="col-md-2">
                        <h1>Tuần 1 </h1>
                    </div>
                    <div class="col-md-8">
                        <a onclick="Formsubmit('formmy')"><button class="btn btn-success"> Lưu </button></a>
                        <button class="btn btn-warning"> Hủy </button>
                        <a onclick="EditWeek('weekIDa','1')"><button class="btn btn-danger">Chỉnh sửa</button></a>
                    </div>


                </div>
                <!-- Dang 1-->
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-2">
                        <h4>Dạng 1: </h4>
                    </div>
                    <div class="col-md-4">
                        Các bài toán về phép cộng
                    </div>
                    <div class="col-md-2">

                        <a onclick="Turn('1','1')"><button class="btn btn-success">On</button></a>
                        <a onclick="Turn('1','0')"><button class="btn btn-danger">Off</button></a>
                    </div>
                    <div class="col-md-3">
                        <a onclick="TurnOn(4,'minvalue_D1','maxvalue_D1','type_D1','btn_D1')"><button class="btn btn-warning">Cấu hình</button></a>
                        <a href="#"><button class="btn btn-success">Thống kê</button></a>
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-4"></div>
                    <div class="col-md-2" id="minvalue_D1" style="display: none">
                        Min: <input id="minvalue_D1_1" type="text" name="minvalue_D1" value="0" style="width: 100%" placeholder="Số nhỏ nhất" >
                    </div>
                    <div class="col-md-2" id="maxvalue_D1" style="display: none">
                        Max: <input id="maxvalue_D1_1" type="text" name="maxvalue_D1" value="10" style="width: 100%" placeholder="Số lớn nhất">
                    </div>
                    <div class="col-md-2" id="type_D1" style="display: none">
                        Loại: <br><select id="type_D1_1" name="type_D1">
                            <option value="1"> + </option>
                            <option value="2"> + - </option>
                            <option value="3"> + - x </option>
                            <option value="4"> + - x : </option>

                        </select>
                    </div>
                    <div class="col-md-2" id="btn_D1" style="display: none">
                        <a id="btn_D1_1" onclick="GhiNhan(8,'minvalue_D1_1','min_1','maxvalue_D1_1','max_1','type_D1_1','type_1','btn_D1')"><button class="btn btn-warning" style="margin-top: 10px; float: left">Ghi nhận</button></a>

                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                 <!-- Dang 2-->
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-2">
                        <h4>Dạng 2: </h4>
                    </div>
                    <div class="col-md-4">
                        Các bài toán về chữ số
                    </div>
                    <div class="col-md-2">

                        <a onclick="Turn('2','1')"><button class="btn btn-success">On</button></a>
                        <a onclick="Turn('2','0')"><button class="btn btn-danger">Off</button></a>
                    </div>
                    <div class="col-md-3">
                        <a onclick="TurnOn(2,'maxvalue_D2','btn_D2')"><button class="btn btn-warning">Cấu hình</button></a>
                        <a href="#"><button class="btn btn-success">Thống kê</button></a>
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-4"></div>
                    <div class="col-md-2"></div>
                    <div class="col-md-2" id="maxvalue_D2" style="display: none">
                        Max: <input id="maxvalue_D2_1" type="text" name="maxvalue_D2" value="10" style="width: 100%" placeholder="Số lớn nhất">
                    </div>
                    <div class="col-md-2" ></div>
                    <div class="col-md-2" id="btn_D2" style="display: none">
                        <a id="btn_D2_1" onclick="GhiNhan(4,'maxvalue_D2_1','max_2','btn_D2')"><button class="btn btn-warning" style="margin-top: 10px; float: left">Ghi nhận</button></a>

                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <!-- Dang 3-->
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-2">
                        <h4>Dạng 3: </h4>
                    </div>
                    <div class="col-md-4">
                        Các bài toán về Tìm số
                    </div>
                    <div class="col-md-2">

                        <a onclick="Turn('3','1')"><button class="btn btn-success">On</button></a>
                        <a onclick="Turn('3','0')"><button class="btn btn-danger">Off</button></a>
                    </div>
                    <div class="col-md-3">
                        <a onclick="TurnOn(2,'maxvalue_D3','btn_D3')"><button class="btn btn-warning">Cấu hình</button></a>
                        <a href="#"><button class="btn btn-success">Thống kê</button></a>
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-4"></div>
                    <div class="col-md-2"></div>
                    <div class="col-md-2" id="maxvalue_D3" style="display: none">
                        Max: <input id="maxvalue_D3_1" type="text" name="maxvalue_D3" value="10" style="width: 100%" placeholder="Số lớn nhất">
                    </div>
                    <div class="col-md-2" ></div>
                    <div class="col-md-2" id="btn_D3" style="display: none">
                        <a id="btn_D3_1" onclick="GhiNhan(4,'maxvalue_D3_1','max_3','btn_D3')"><button class="btn btn-warning" style="margin-top: 10px; float: left">Ghi nhận</button></a>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <!-- Dang 4-->
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-2">
                        <h4>Dạng 4: </h4>
                    </div>
                    <div class="col-md-4">
                        Các bài toán về Điền Dấu
                    </div>
                    <div class="col-md-2">

                        <a onclick="Turn('4','1')"><button class="btn btn-success">On</button></a>
                        <a onclick="Turn('4','0')"><button class="btn btn-danger">Off</button></a>
                    </div>
                    <div class="col-md-3">
                        <a onclick="TurnOn(2,'maxvalue_D4','btn_D4')"><button class="btn btn-warning">Cấu hình</button></a>
                        <a href="#"><button class="btn btn-success">Thống kê</button></a>
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-4"></div>
                    <div class="col-md-2"></div>
                    <div class="col-md-2" id="maxvalue_D4" style="display: none">
                        Max: <input id="maxvalue_D4_1" type="text" name="maxvalue_D4" value="10" style="width: 100%" placeholder="Số lớn nhất">
                    </div>
                    <div class="col-md-2" ></div>
                    <div class="col-md-2" id="btn_D4" style="display: none">
                        <a id="btn_D4_1" onclick="GhiNhan(4,'maxvalue_D4_1','max_4','btn_D4')"><button class="btn btn-warning" style="margin-top: 10px; float: left">Ghi nhận</button></a>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <!-- Dang 5-->
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-2">
                        <h4>Dạng 5: </h4>
                    </div>
                    <div class="col-md-4">
                        Các bài toán về Tính nhanh
                    </div>
                    <div class="col-md-2">

                        <a onclick="Turn('5','1')"><button class="btn btn-success">On</button></a>
                        <a onclick="Turn('5','0')"><button class="btn btn-danger">Off</button></a>
                    </div>
                    <div class="col-md-3">
                        <a onclick="TurnOn(2,'maxvalue_D5','btn_D5')"><button class="btn btn-warning">Cấu hình</button></a>
                        <a href="#"><button class="btn btn-success">Thống kê</button></a>
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-4"></div>
                    <div class="col-md-2"></div>
                    <div class="col-md-2" id="maxvalue_D5" style="display: none">
                        Max: <input id="maxvalue_D5_1" type="text" name="maxvalue_D5" value="10" style="width: 100%" placeholder="Số lớn nhất">
                    </div>
                    <div class="col-md-2" ></div>
                    <div class="col-md-2" id="btn_D5" style="display: none">
                        <a id="btn_D5_1" onclick="GhiNhan(4,'maxvalue_D5_1','max_5','btn_D5')"><button class="btn btn-warning" style="margin-top: 10px; float: left">Ghi nhận</button></a>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <!-- Dang 6-->
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-2">
                        <h4>Dạng 6: </h4>
                    </div>
                    <div class="col-md-4">
                        Các bài toán về Tìm x
                    </div>
                    <div class="col-md-2">

                        <a onclick="Turn('6','1')"><button class="btn btn-success">On</button></a>
                        <a onclick="Turn('6','0')"><button class="btn btn-danger">Off</button></a>
                    </div>
                    <div class="col-md-3">
                        <a onclick="TurnOn(3,'maxvalue_D6','type_D6','btn_D6')"><button class="btn btn-warning">Cấu hình</button></a>
                        <a href="#"><button class="btn btn-success">Thống kê</button></a>
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-4"></div>
                    <div class="col-md-2"></div>
                    <div class="col-md-2" id="maxvalue_D6" style="display: none">
                        Max: <input id="maxvalue_D6_1" type="text" name="maxvalue_D6" value="10" style="width: 100%" placeholder="Số lớn nhất">
                    </div>
                    <div class="col-md-2" id="type_D6" style="display: none" >
                        Loại: <br><select id="type_D6_1" name="type_D6">
                            <option value="1"> + </option>
                            <option value="2"> + - </option>
                            <option value="3"> + - x </option>
                            <option value="4"> + - x : </option>
                        </select>
                    </div>
                    <div class="col-md-2" id="btn_D6" style="display: none">
                        <a id="btn_D6_1" onclick="GhiNhan(6,'maxvalue_D6_1','max_6','type_D6_1','type_6','btn_D6')"><button class="btn btn-warning" style="margin-top: 10px; float: left">Ghi nhận</button></a>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <!-- Dang 7-->
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-2">
                        <h4>Dạng 7: </h4>
                    </div>
                    <div class="col-md-4">
                        Các bài toán về Toán đố
                    </div>
                    <div class="col-md-2">

                        <a onclick="Turn('7','1')"><button class="btn btn-success">On</button></a>
                        <a onclick="Turn('7','0')"><button class="btn btn-danger">Off</button></a>
                    </div>
                    <div class="col-md-3">
                        <a onclick="TurnOn(3,'maxvalue_D7','type_D7','btn_D7')"><button class="btn btn-warning">Cấu hình</button></a>
                        <a href="#"><button class="btn btn-success">Thống kê</button></a>
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-4"></div>
                    <div class="col-md-2"></div>
                    <div class="col-md-2" id="maxvalue_D7" style="display: none">
                        Max: <input id="maxvalue_D7_1" type="text" name="maxvalue_D7" value="10" style="width: 100%" placeholder="Số lớn nhất">
                    </div>
                    <div class="col-md-2" id="type_D7" style="display: none" >
                        Loại: <br><select id="type_D7_1" name="type_D7">
                            <option value="1"> + </option>
                            <option value="2"> + - </option>
                            <option value="3"> + - x </option>
                            <option value="4"> + - x : </option>
                        </select>
                    </div>
                    <div class="col-md-2" id="btn_D7" style="display: none">
                        <a id="btn_D7_1" onclick="GhiNhan(6,'maxvalue_D7_1','max_7','type_D7_1','type_7','btn_D7')"><button class="btn btn-warning" style="margin-top: 10px; float: left">Ghi nhận</button></a>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <!-- Dang 8-->
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-2">
                        <h4>Dạng 8: </h4>
                    </div>
                    <div class="col-md-4">
                        Các bài toán về Chuyển đổi đại lượng
                    </div>
                    <div class="col-md-2">

                        <a onclick="Turn('8','1')"><button class="btn btn-success">On</button></a>
                        <a onclick="Turn('8','0')"><button class="btn btn-danger">Off</button></a>
                    </div>
                    <div class="col-md-3">
                        <a onclick="TurnOn(3,'maxvalue_D8','type_D8','btn_D8')"><button class="btn btn-warning">Cấu hình</button></a>
                        <a href="#"><button class="btn btn-success">Thống kê</button></a>
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-4"></div>
                    <div class="col-md-2"></div>
                    <div class="col-md-2" id="maxvalue_D8" style="display: none">
                        Max: <input id="maxvalue_D8_1" type="text" name="maxvalue_D8" value="10" style="width: 100%" placeholder="Số lớn nhất">
                    </div>
                    <div class="col-md-2" id="type_D8" style="display: none" >
                        Loại: <br><select id="type_D8_1" name="type_D7">
                            <option value="1"> Khối lượng </option>
                            <option value="2"> Độ dài </option>
                            <option value="3"> Diện tích </option>
                            <option value="4"> Thể tích </option>
                        </select>
                    </div>
                    <div class="col-md-2" id="btn_D8" style="display: none">
                        <a id="btn_D8_1" onclick="GhiNhan(6,'maxvalue_D8_1','max_8','type_D8_1','type_8','btn_D8')"><button class="btn btn-warning" style="margin-top: 10px; float: left">Ghi nhận</button></a>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <!-- Dang 9-->
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-2">
                        <h4>Dạng 9: </h4>
                    </div>
                    <div class="col-md-4">
                        Các bài toán về Hình học
                    </div>
                    <div class="col-md-2">

                        <a onclick="Turn('9','1')"><button class="btn btn-success">On</button></a>
                        <a onclick="Turn('9','0')"><button class="btn btn-danger">Off</button></a>
                    </div>
                    <div class="col-md-3">
                        <a onclick="TurnOn(2,'maxvalue_D9','btn_D9')"><button class="btn btn-warning">Cấu hình</button></a>
                        <a href="#"><button class="btn btn-success">Thống kê</button></a>
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-4"></div>
                    <div class="col-md-2"></div>
                    <div class="col-md-2" id="maxvalue_D9" style="display: none">
                        Max: <input id="maxvalue_D9_1" type="text" name="maxvalue_D9" value="10" style="width: 100%" placeholder="Số lớn nhất">
                    </div>
                    <div class="col-md-2" ></div>
                    <div class="col-md-2" id="btn_D9" style="display: none">
                        <a id="btn_D9_1" onclick="GhiNhan(4,'maxvalue_D9_1','max_9','btn_D9')"><button class="btn btn-warning" style="margin-top: 10px; float: left">Ghi nhận</button></a>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
            </div>
            <div>
                <div class="row">
                    <a onclick="addWeek()"><button class="btn btn-success">Thêm Tuần mới</button>
                    </a>
                </div>
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
                        <td>Phụ huynh</td>
                        <td>Số điểm</td>
                        <td>Hành động</td>
                        <td>Đánh giá</td>
                    </tr>
                    @foreach($students as $student)
                        <tr>
                            <td>{{$student->id}}</td>
                            <td>{{$student->name}}</td>
                            <td>{{$student->name_parent}}
                                <a href="#" ><i class="fa fa-paper-plane-o" aria-hidden="true" style="font-size: 30px;color: #ff8321"></i></a>
                            </td>
                            <td>2780</td>
                            <td><a href="#" ><button class="btn btn-success">Chi tiết</button></a></td>
                            <td>
                                <form class="row" style="margin-top: 0px">
                                    <div class="col-md-8">
                                        <textarea style="width: 100%">em này học rấy tốt đề nghị phát huye</textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <button class="btn btn-warning" type="submit">Ghi nhận</button>
                                    </div>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </table>
                {{$students->links()}}
            </div>
        </div>

    </div>

    <script type="text/javascript">
        function Formsubmit(s1)
        {
            let myForm = document.forms[s1];
            myForm.submit();
        }
        function Cclick(s1)
        {

            document.getElementById(s1).style.display="block";
            document.getElementById(s1+'_1').style.display="none";
        }

        function Turn(sk1,s2)
        {
            document.getElementById('Turn_'+sk1).value=s2;
        }
        function Cauhinh(s1)
        {
            document.getElementById(s1).style.display='table';
        }

        function TurnOn(...agrs)
        {
            console.log(agrs);
            for (let i = 1; i<=agrs[0]-1;i++)
            {

                document.getElementById(agrs[i]).style.display='inline';
                document.getElementById(agrs[i]+'_1').removeAttribute('readonly');
            }
            document.getElementById(agrs[agrs[0]]).style.display='block';

        }
        function GhiNhan(...agrs)
        {
            console.log(agrs);
            for (let i = 1; i<=agrs[0]-2;i++)
            if (i%2===1)
            {

                document.getElementById(agrs[i+1]).value=document.getElementById(agrs[i]).value;
                document.getElementById(agrs[i]).setAttribute('readonly','true');
            }
            document.getElementById(agrs[agrs[0]-1]).style.display='none';
        }
        function EditWeek(s1,id)
        {
            console.log(s1);
            document.getElementById("weekid").value=id;

        }
        function addWeek($k)
        {

        }
    </script>
@endsection
