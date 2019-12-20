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


        <div class="row"  style="display: none">
            <form id = "formmy" action="{{url('teacher/class/exercise/'.$class->id.'/'.$week->id)}}" method="post" enctype="multipart/form-data">
                @csrf

                    <!-- Dạng 1 -->
                    @if($dang[1]!=null)
                        <div >
                            <h1>Dang 1</h1>
                            <input id="Turn_1" type="text" name="Cclick1" value="1">
                            <input id="max_1" type="text" name="max_1" value="{{$dang[1]->num_max}}">
                            <input id="min_1" type="text" name="min_1" value="{{$dang[1]->num_min}}">
                            <input id="type_1" type="text" name="type_1" value="{{$dang[1]->dau}}">
                        </div>
                     @endif

                    <!-- Dang 2-->
                    @if($dang[2]!=null)
                        <div >
                            <h1>Dang 2</h1>
                            <input id="Turn_2" type="text" name="Cclick2" value="1">
                            <input id="max_2" type="text" name="max_2" value="{{$dang[2]->num_max}}">
                        </div>
                    @endif

                    <!-- Dang 3-->
                    @if($dang[3]!=null)
                        <div >
                            <h1>Dang 3</h1>
                            <input id="Turn_3" type="text" name="Cclick3" value="1">
                            <input id="max_3" type="text" name="max_3" value="{{$dang[3]->num_max}}">
                        </div>
                    @endif

                    <!-- Dang 4-->
                    @if($dang[4]!=null)
                        <div >
                            <h1>Dang 4</h1>
                            <input id="Turn_4" type="text" name="Cclick4" value="1">
                            <input id="max_4" type="text" name="max_4" value="{{$dang[4]->num_max}}">
                            <input id="min_4" type="text" name="min_4" value="{{$dang[4]->num_min}}">
                            <input id="type_4" type="text" name="type_4" value="{{$dang[4]->type}}">
                        </div>
                    @endif

                    <!-- Dang 5-->
                    @if($dang[5]!=null)
                        <div >
                            <h1>Dang 5</h1>
                            <input id="Turn_5" type="text" name="Cclick5" value="1">
                            <input id="so_num5" type="text" name="so_num" value="{{$dang[5]->so_num}}">
                            <input id="max_5" type="text" name="max_5" value="{{$dang[5]->num_max}}">
                            <input id="type_5" type="text" name="type_5" value="{{$dang[5]->type}}">
                        </div>
                    @endif

                    <!-- Dạng 6 -->
                    @if($dang[6]!=null)
                        <div >
                            <h1>Dang 6</h1>
                            <input id="Turn_6" type="text" name="Cclick6" value="1">
                            <input id="max_6" type="text" name="max_6" value="{{$dang[6]->num_max}}">
                            <input id="type_6" type="text" name="type_D6" value="{{$dang[6]->type}}">
                        </div>
                    @endif

                    <!-- Dạng 7 -->
                    @if($dang[7]!=null)
                        <div >
                            <h1>Dang 7</h1>
                            <input id="Turn_7" type="text" name="Cclick7" value="1">
                            <input id="max_7" type="text" name="max_7" value="{{$dang[7]->num_max}}">
                            <input id="type_7" type="text" name="type_D7" value="{{$dang[7]->type}}">
                        </div>
                    @endif

                    <!-- Dạng 8 -->
                    @if($dang[8]!=null)
                        <div >
                            <h1>Dang 8</h1>
                            <input id="Turn_8" type="text" name="Cclick8" value="1">
                            <input id="max_8" type="text" name="max_8" value="{{$dang[8]->num_max}}">
                            <input id="type_8" type="text" name="type_D8" value="{{$dang[8]->type}}">
                        </div>
                    @endif

                    <!-- Dang 9-->
                    @if($dang[9]!=null)
                        <div >
                            <h1>Dang 9</h1>
                            <input id="Turn_9" type="text" name="Cclick9" value="1">
                            <input id="max_9" type="text" name="max_9" value="{{$dang[9]->num_max}}">
                            <input id="type_9" type="text" name="type_D9" value="{{$dang[9]->type}}">

                        </div>
                    @endif
                    <input id='submit_btn' type="submit" value="Ghi nhan">
            </form>
        </div>

        <div class="container" id="exercise" {{--style="display: none"--}}>
            <div class="row">
                <div class="col-md-6">
                    <h1>Cấu hình tuần {{$week->name}}</h1>
                </div>
                <div class="col-md-6">
                    <a onclick="Formsubmit('formmy')">
                        <button class="btn btn-success"> Lưu </button></a>
                </div>
            </div>
                <div id="week_1">
                    <!-- Dang 1-->
                    @if($dang[1]!=null)
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-2">
                                <h4>Dạng 1: </h4>
                            </div>
                            <div class="col-md-4">
                               {{$dang[1]->name}}
                            </div>
                            <div class="col-md-2">

                                <a onclick="Turn('1','1')"><button class="btn btn-success">Hiện</button></a>
                                <a onclick="Turn('1','0')"><button class="btn btn-danger">Ẩn</button></a>
                            </div>
                            <div class="col-md-3">
                                <a onclick="TurnOn(4,'minvalue_D1','maxvalue_D1','type_D1','btn_D1')"><button class="btn btn-warning">Cấu hình</button></a>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-md-4"></div>
                            <div class="col-md-2" id="minvalue_D1" style="display: none">
                                Min: <input id="minvalue_D1_1" type="text" name="minvalue_D1" value="{{$dang[1]->num_min}}" style="width: 100%" placeholder="Số nhỏ nhất" >
                            </div>
                            <div class="col-md-2" id="maxvalue_D1" style="display: none">
                                Max: <input id="maxvalue_D1_1" type="text" name="maxvalue_D1" value="{{$dang[1]->num_max}}" style="width: 100%" placeholder="Số lớn nhất">
                            </div>
                            <div class="col-md-2" id="type_D1" style="display: none">
                                Loại: <br><select id="type_D1_1" name="type_D1">
                                    @if($dang[1]->dau==1)
                                        <option value="1" selected> + </option>
                                    @else
                                        <option value="1"> + </option>
                                    @endif
                                    @if($dang[1]->dau==2)
                                        <option value="2" selected> + - </option>
                                    @else
                                        <option value="2"> + - </option>
                                    @endif
                                    @if($dang[1]->dau==3)
                                            <option value="3" selected> + - x </option>
                                    @else
                                            <option value="3"> + - x </option>
                                    @endif
                                    @if($dang[1]->dau==4)
                                            <option value="4" selected> + - x : </option>
                                    @else
                                            <option value="4"> + - x : </option>
                                    @endif
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
                    @if($dang[2]!=null)
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-2">
                                <h4>Dạng 2: </h4>
                            </div>
                            <div class="col-md-4">
                                {{$dang[2]->name}}
                            </div>
                            <div class="col-md-2">

                                <a onclick="Turn('2','1')"><button class="btn btn-success">Hiện</button></a>
                                <a onclick="Turn('2','0')"><button class="btn btn-danger">Ẩn</button></a>
                            </div>
                            <div class="col-md-3">
                                <a onclick="TurnOn(2,'maxvalue_D2','btn_D2')"><button class="btn btn-warning">Cấu hình</button></a>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-md-4"></div>
                            <div class="col-md-2"></div>
                            <div class="col-md-2" id="maxvalue_D2" style="display: none">
                                Max: <input id="maxvalue_D2_1" type="text" name="maxvalue_D2" value=" {{$dang[2]->num_max}}" style="width: 100%" placeholder="Số lớn nhất">
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
                    @if($dang[3]!=null)
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-2">
                                <h4>Dạng 3: </h4>
                            </div>
                            <div class="col-md-4">
                                {{$dang[3]->name}}
                            </div>
                            <div class="col-md-2">

                                <a onclick="Turn('3','1')"><button class="btn btn-success">Hiện</button></a>
                                <a onclick="Turn('3','0')"><button class="btn btn-danger">Ẩn</button></a>
                            </div>
                            <div class="col-md-3">
                                <a onclick="TurnOn(2,'maxvalue_D3','btn_D3')"><button class="btn btn-warning">Cấu hình</button></a>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-md-4"></div>
                            <div class="col-md-2"></div>
                            <div class="col-md-2" id="maxvalue_D3" style="display: none">
                                Max: <input id="maxvalue_D3_1" type="text" name="maxvalue_D3" value="{{$dang[3]->num_max}}" style="width: 100%" placeholder="Số lớn nhất">
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
                    @if($dang[4]!=null)
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-2">
                                <h4>Dạng 4: </h4>
                            </div>
                            <div class="col-md-4">
                                {{$dang[4]->name}}
                            </div>
                            <div class="col-md-2">

                                <a onclick="Turn('4','1')"><button class="btn btn-success">Hiện</button></a>
                                <a onclick="Turn('4','0')"><button class="btn btn-danger">Ẩn</button></a>
                            </div>
                            <div class="col-md-3">
                                <a onclick="TurnOn(4,'minvalue_D4','maxvalue_D4','type_D4','btn_D4')"><button class="btn btn-warning">Cấu hình</button></a>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-md-4"></div>
                            <div class="col-md-2" id="minvalue_D4" style="display: none">
                                Min: <input id="minvalue_D4_1" type="text" name="minvalue_D4" value="{{$dang[4]->num_min}}" style="width: 100%" placeholder="Số nhỏ nhất">
                            </div>
                            <div class="col-md-2" id="maxvalue_D4" style="display: none">
                                Max: <input id="maxvalue_D4_1" type="text" name="maxvalue_D4" value="{{$dang[4]->num_max}}" style="width: 100%" placeholder="Số lớn nhất">
                            </div>
                            <div class="col-md-2" id="type_D4" style="display: none">
                                Loại: <br><select id="type_D4_1" name="type_D4">
                                    @if($dang[4]->type==1)
                                        <option value="1" selected> + </option>
                                    @else
                                        <option value="1"> + </option>
                                    @endif
                                    @if($dang[4]->type==2)
                                        <option value="2" selected> + - </option>
                                    @else
                                        <option value="2"> + - </option>
                                    @endif
                                    @if($dang[4]->type==3)
                                        <option value="3" selected> + - x </option>
                                    @else
                                        <option value="3"> + - x </option>
                                    @endif
                                    @if($dang[4]->type==4)
                                        <option value="4" selected> + - x : </option>
                                    @else
                                        <option value="4"> + - x : </option>
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-2" id="btn_D4" style="display: none">
                                <a id="btn_D4_1" onclick="GhiNhan(8,'maxvalue_D4_1','max_4','minvalue_D4_1','min_4','type_D4_1','type_4','btn_D4')"><button class="btn btn-warning" style="margin-top: 10px; float: left">Ghi nhận</button></a>
                            </div>
                            <div class="col-md-2">

                            </div>
                        </div>
                    @endif
                    <!-- Dang 5-->
                    @if($dang[5]!=null)
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-2">
                                <h4>Dạng 5: </h4>
                            </div>
                            <div class="col-md-4">
                                {{$dang[5]->name}}
                            </div>
                            <div class="col-md-2">

                                <a onclick="Turn('5','1')"><button class="btn btn-success">Hiện</button></a>
                                <a onclick="Turn('5','0')"><button class="btn btn-danger">Ẩn</button></a>
                            </div>
                            <div class="col-md-3">
                                <a onclick="TurnOn(3,'maxvalue_D5','type_D5','btn_D5')"><button class="btn btn-warning">Cấu hình</button></a>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-md-4"></div>
                            <div class="col-md-2"></div>
                            <div class="col-md-2" id="maxvalue_D5" style="display: none">
                                Max: <input id="maxvalue_D5_1" type="text" name="maxvalue_D5" value="{{$dang[5]->num_max}}" style="width: 100%" placeholder="Số lớn nhất">
                            </div>
                            <div class="col-md-2" id="type_D5" style="display: none">
                                Loại: <br><select id="type_D5_1" name="type_D5">
                                    @if($dang[5]->type==1)
                                        <option value="1" selected> + </option>
                                    @else
                                        <option value="1"> + </option>
                                    @endif
                                    @if($dang[5]->type==2)
                                        <option value="2" selected> + - </option>
                                    @else
                                        <option value="2"> + - </option>
                                    @endif
                                    @if($dang[5]->type==3)
                                        <option value="3" selected> + - x </option>
                                    @else
                                        <option value="3"> + - x </option>
                                    @endif
                                    @if($dang[5]->type==4)
                                        <option value="4" selected> + - x : </option>
                                    @else
                                        <option value="4"> + - x : </option>
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-2" id="btn_D5" style="display: none">
                                <a id="btn_D5_1" onclick="GhiNhan(6,'maxvalue_D5_1','max_5','type_D5_1','type_5','btn_D5')"><button class="btn btn-warning" style="margin-top: 10px; float: left">Ghi nhận</button></a>
                            </div>
                            <div class="col-md-2">

                            </div>
                        </div>
                    @endif
                    <!-- Dang 6-->
                    @if($dang[6]!=null)
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-2">
                                <h4>Dạng 6: </h4>
                            </div>
                            <div class="col-md-4">
                                {{$dang[6]->name}}
                            </div>
                            <div class="col-md-2">

                                <a onclick="Turn('6','1')"><button class="btn btn-success">Hiện</button></a>
                                <a onclick="Turn('6','0')"><button class="btn btn-danger">Ẩn</button></a>
                            </div>
                            <div class="col-md-3">
                                <a onclick="TurnOn(3,'maxvalue_D6','type_D6','btn_D6')"><button class="btn btn-warning">Cấu hình</button></a>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-md-4"></div>
                            <div class="col-md-2"></div>
                            <div class="col-md-2" id="maxvalue_D6" style="display: none">
                                Max: <input id="maxvalue_D6_1" type="text" name="maxvalue_D6" value="{{$dang[6]->num_max}}" style="width: 100%" placeholder="Số lớn nhất">
                            </div>
                            <div class="col-md-2" id="type_D6" style="display: none" >
                                Loại: <br><select id="type_D6_1" name="type_D6">
                                    @if ($dang[6]->type==1)
                                        <option value="1" selected> + </option>
                                    @else
                                        <option value="1"> + </option>
                                    @endif


                                    @if ($dang[6]->type==2)
                                        <option value="2" selected> + - </option>
                                    @else
                                        <option value="2"> + - </option>
                                    @endif

                                    @if ($dang[6]->type==3)
                                        <option value="3" selected> + - x </option>
                                    @else
                                        <option value="3"> + - x </option>
                                    @endif

                                    @if ($dang[6]->type==4)
                                        <option value="4" selected> + - x : </option>
                                    @else
                                        <option value="4"> + - x : </option>
                                    @endif

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
                    @if($dang[7]!=null)
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-2">
                                <h4>Dạng 7: </h4>
                            </div>
                            <div class="col-md-4">
                                {{$dang[7]->name}}
                            </div>
                            <div class="col-md-2">

                                <a onclick="Turn('7','1')"><button class="btn btn-success">Hiện</button></a>
                                <a onclick="Turn('7','0')"><button class="btn btn-danger">Ẩn</button></a>
                            </div>
                            <div class="col-md-3">
                                <a onclick="TurnOn(3,'maxvalue_D7','type_D7','btn_D7')"><button class="btn btn-warning">Cấu hình</button></a>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-md-4"></div>
                            <div class="col-md-2"></div>
                            <div class="col-md-2" id="maxvalue_D7" style="display: none">
                                Max: <input id="maxvalue_D7_1" type="text" name="maxvalue_D7" value="{{$dang[7]->num_max}}" style="width: 100%" placeholder="Số lớn nhất">
                            </div>
                            <div class="col-md-2" id="type_D7" style="display: none" >
                                Loại: <br><select id="type_D7_1" name="type_D7">
                                    @if ($dang[7]->type==1)
                                        <option value="1" selected> + </option>
                                    @else
                                        <option value="1"> + </option>
                                    @endif
                                    @if ($dang[7]->type==2)
                                        <option value="2" selected> + - </option>
                                    @else
                                        <option value="2"> + - </option>
                                    @endif
                                    @if ($dang[7]->type==3)
                                        <option value="3" selected> + - x </option>
                                    @else
                                        <option value="3"> + - x </option>
                                    @endif
                                    @if ($dang[7]->type==4)
                                        <option value="4" selected> + - x : </option>
                                    @else
                                        <option value="4"> + - x : </option>
                                    @endif

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
                    @if($dang[8]!=null)
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-2">
                                <h4>Dạng 8: </h4>
                            </div>
                            <div class="col-md-4">
                                {{$dang[8]->name}}
                            </div>
                            <div class="col-md-2">

                                <a onclick="Turn('8','1')"><button class="btn btn-success">Hiện</button></a>
                                <a onclick="Turn('8','0')"><button class="btn btn-danger">Ẩn</button></a>
                            </div>
                            <div class="col-md-3">
                                <a onclick="TurnOn(3,'maxvalue_D8','type_D8','btn_D8')"><button class="btn btn-warning">Cấu hình</button></a>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-md-4"></div>
                            <div class="col-md-2"></div>
                            <div class="col-md-2" id="maxvalue_D8" style="display: none">
                                Max: <input id="maxvalue_D8_1" type="text" name="maxvalue_D8" value="{{$dang[8]->num_max}}" style="width: 100%" placeholder="Số lớn nhất">
                            </div>
                            <div class="col-md-2" id="type_D8" style="display: none" >
                                Loại: <br><select id="type_D8_1" name="type_D8">
                                    @if($dang[8]->type ==1)
                                        <option value="1" selected> Khối lượng </option>
                                    @else
                                        <option value="1"> Khối lượng </option>
                                    @endif
                                    @if($dang[8]->type ==2)
                                        <option value="2" selected> Độ dài </option>
                                    @else
                                        <option value="2"> Độ dài </option>
                                    @endif

                                    @if($dang[8]->type ==3)
                                        <option value="3" selected> Diện tích </option>
                                    @else
                                        <option value="3"> Diện tích </option>
                                    @endif

                                    @if($dang[8]->type ==4)
                                        <option value="4" selected> Thể tích </option>
                                    @else
                                        <option value="4"> Thể tích </option>
                                    @endif

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
                    @if($dang[9]!=null)
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-2">
                                <h4>Dạng 9: </h4>
                            </div>
                            <div class="col-md-4">
                                {{$dang[9]->name}}
                            </div>
                            <div class="col-md-2">

                                <a onclick="Turn('9','1')"><button class="btn btn-success">Hiện</button></a>
                                <a onclick="Turn('9','0')"><button class="btn btn-danger">Ẩn</button></a>
                            </div>
                            <div class="col-md-3">
                                <a onclick="TurnOn(3,'maxvalue_D9','type_D9','btn_D9')"><button class="btn btn-warning">Cấu hình</button></a>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-md-4"></div>
                            <div class="col-md-2"></div>
                            <div class="col-md-2" id="maxvalue_D9" style="display: none">
                                Max: <input id="maxvalue_D9_1" type="text" name="maxvalue_D9" value="{{$dang[9]->num_max}}" style="width: 100%" placeholder="Số lớn nhất">
                            </div>
                            <div class="col-md-2" id="type_D9" style="display: none" >
                                Loại: <br><select id="type_D9_1" name="type_D9">
                                    @if($dang[9]->type ==1)
                                        <option value="1" selected> Hình chữ nhật </option>
                                    @else
                                        <option value="1"> Hình chữ nhật </option>
                                    @endif
                                    @if($dang[9]->type ==2)
                                        <option value="2" selected>Hình tam giác </option>
                                    @else
                                        <option value="2"> Hình tam giác </option>
                                    @endif

                                    @if($dang[9]->type ==3)
                                        <option value="3" selected> Hình vuông </option>
                                    @else
                                        <option value="3"> Hình vuông </option>
                                    @endif

                                    @if($dang[9]->type ==4)
                                        <option value="4" selected> Hình tròn </option>
                                    @else
                                        <option value="4"> Hình tròn </option>
                                    @endif

                                </select>
                            </div>
                            <div class="col-md-2" id="btn_D9" style="display: none">
                                <a id="btn_D9_1" onclick="GhiNhan(6,'maxvalue_D9_1','max_9','type_D9_1','type_9','btn_D9')"><button class="btn btn-warning" style="margin-top: 10px; float: left">Ghi nhận</button></a>
                            </div>
                            <div class="col-md-2">

                            </div>
                        </div>
                    @endif
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


    </script>
@endsection
