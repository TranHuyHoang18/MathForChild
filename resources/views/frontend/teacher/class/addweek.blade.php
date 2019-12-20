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
            <form id = "formmy" action="{{url('teacher/class/week/add/'.$class->id.'/'.$week)}}" method="post" enctype="multipart/form-data">
                @csrf

                    <!-- Dạng 1 -->

                        <div >
                            <h1>Dang 1</h1>
                            <input id="Turn_1" type="text" name="Cclick1" value="1">
                            <input id="max_1" type="text" name="max_1" value="100">
                            <input id="min_1" type="text" name="min_1" value="1">
                            <input id="type_1" type="text" name="type_1" value="1">
                        </div>


                    <!-- Dang 2-->

                        <div >
                            <h1>Dang 2</h1>
                            <input id="Turn_2" type="text" name="Cclick2" value="1">
                            <input id="max_2" type="text" name="max_2" value="100">
                        </div>


                    <!-- Dang 3-->

                        <div >
                            <h1>Dang 3</h1>
                            <input id="Turn_3" type="text" name="Cclick3" value="1">
                            <input id="max_3" type="text" name="max_3" value="100">
                        </div>


                    <!-- Dang 4-->

                        <div >
                            <h1>Dang 4</h1>
                            <input id="Turn_4" type="text" name="Cclick4" value="1">
                            <input id="max_4" type="text" name="max_4" value="100">
                            <input id="min_4" type="text" name="min_4" value="1">
                            <input id="type_4" type="text" name="type_4" value="1">
                        </div>


                    <!-- Dang 5-->

                        <div >
                            <h1>Dang 5</h1>
                            <input id="Turn_5" type="text" name="Cclick5" value="1">
                            <input id="so_num5" type="text" name="so_num" value="4">
                            <input id="max_5" type="text" name="max_5" value="1000">
                            <input id="type_5" type="text" name="type_5" value="1">
                        </div>


                    <!-- Dạng 6 -->

                        <div >
                            <h1>Dang 6</h1>
                            <input id="Turn_6" type="text" name="Cclick6" value="1">
                            <input id="max_6" type="text" name="max_6" value="100">
                            <input id="type_6" type="text" name="type_D6" value="1">
                        </div>


                    <!-- Dạng 7 -->

                        <div >
                            <h1>Dang 7</h1>
                            <input id="Turn_7" type="text" name="Cclick7" value="1">
                            <input id="max_7" type="text" name="max_7" value="100">
                            <input id="type_7" type="text" name="type_D7" value="1">
                        </div>


                    <!-- Dạng 8 -->

                        <div >
                            <h1>Dang 8</h1>
                            <input id="Turn_8" type="text" name="Cclick8" value="1">
                            <input id="max_8" type="text" name="max_8" value="100">
                            <input id="type_8" type="text" name="type_D8" value="1">
                        </div>


                    <!-- Dang 9-->

                        <div >
                            <h1>Dang 9</h1>
                            <input id="Turn_9" type="text" name="Cclick9" value="1">
                            <input id="max_9" type="text" name="max_9" value="100">
                            <input id="type_9" type="text" name="type_D9" value="1">

                        </div>

                    <input id='submit_btn' type="submit" value="Ghi nhan">
            </form>
        </div>

        <div class="container" id="exercise" {{--style="display: none"--}}>
            <div class="row">
                <div class="col-md-6">
                    <h1>Cấu hình,tạo mới tuần {{$week}}</h1>
                </div>
                <div class="col-md-6">
                    <a onclick="Formsubmit('formmy')">
                        <button class="btn btn-success"> Lưu </button></a>
                </div>
            </div>
                <div id="week_1">
                    <!-- Dang 1-->

                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-2">
                                <h4>Dạng 1: </h4>
                            </div>
                            <div class="col-md-4">
                                {{'Các dạng tính toán'}}
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
                                Min: <input id="minvalue_D1_1" type="text" name="minvalue_D1" value="1" style="width: 100%" placeholder="Số nhỏ nhất" >
                            </div>
                            <div class="col-md-2" id="maxvalue_D1" style="display: none">
                                Max: <input id="maxvalue_D1_1" type="text" name="maxvalue_D1" value="100" style="width: 100%" placeholder="Số lớn nhất">
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
                                {{'Các dạng về chữ số'}}
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
                                Max: <input id="maxvalue_D2_1" type="text" name="maxvalue_D2" value="100" style="width: 100%" placeholder="Số lớn nhất">
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
                                {{'Các dạng về tìm số'}}
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
                                Max: <input id="maxvalue_D3_1" type="text" name="maxvalue_D3" value="100" style="width: 100%" placeholder="Số lớn nhất">
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
                                {{'Các dạng về điền dấu >, <, ='}}
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
                                Min: <input id="minvalue_D4_1" type="text" name="minvalue_D4" value="1" style="width: 100%" placeholder="Số nhỏ nhất">
                            </div>
                            <div class="col-md-2" id="maxvalue_D4" style="display: none">
                                Max: <input id="maxvalue_D4_1" type="text" name="maxvalue_D4" value="100" style="width: 100%" placeholder="Số lớn nhất">
                            </div>
                            <div class="col-md-2" id="type_D4" style="display: none">
                                Loại: <br><select id="type_D4_1" name="type_D4">
                                        <option value="1"> + </option>
                                        <option value="2"> + - </option>
                                        <option value="3"> + - x </option>
                                        <option value="4"> + - x : </option>
                                </select>
                            </div>
                            <div class="col-md-2" id="btn_D4" style="display: none">
                                <a id="btn_D4_1" onclick="GhiNhan(8,'maxvalue_D4_1','max_4','minvalue_D4_1','min_4','type_D4_1','type_4','btn_D4')"><button class="btn btn-warning" style="margin-top: 10px; float: left">Ghi nhận</button></a>
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
                                {{'Tính nhanh'}}
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
                                Max: <input id="maxvalue_D5_1" type="text" name="maxvalue_D5" value="1000" style="width: 100%" placeholder="Số lớn nhất">
                            </div>
                            <div class="col-md-2" id="type_D5" style="display: none">
                                Loại: <br><select id="type_D5_1" name="type_D5">
                                        <option value="1"> + </option>
                                        <option value="2"> + - </option>
                                        <option value="3"> + - x </option>
                                        <option value="4"> + - x : </option>
                                </select>
                            </div>
                            <div class="col-md-2" id="btn_D5" style="display: none">
                                <a id="btn_D5_1" onclick="GhiNhan(6,'maxvalue_D5_1','max_5','type_D5_1','type_5','btn_D5')"><button class="btn btn-warning" style="margin-top: 10px; float: left">Ghi nhận</button></a>
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
                                {{'Tìm X'}}
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
                                Max: <input id="maxvalue_D6_1" type="text" name="maxvalue_D6" value="100" style="width: 100%" placeholder="Số lớn nhất">
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
                                {{'Các dạng toán đố'}}
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
                                Max: <input id="maxvalue_D7_1" type="text" name="maxvalue_D7" value="100" style="width: 100%" placeholder="Số lớn nhất">
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
                                {{'Các dạng chuyển đổi đại lượng'}}
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
                                Max: <input id="maxvalue_D8_1" type="text" name="maxvalue_D8" value="100" style="width: 100%" placeholder="Số lớn nhất">
                            </div>
                            <div class="col-md-2" id="type_D8" style="display: none" >
                                Loại: <br><select id="type_D8_1" name="type_D8">
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
                                {{'Các dạng hình học'}}
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
                                Max: <input id="maxvalue_D9_1" type="text" name="maxvalue_D9" value="10" style="width: 100%" placeholder="Số lớn nhất">
                            </div>
                            <div class="col-md-2" id="type_D9" style="display: none" >
                                Loại: <br><select id="type_D9_1" name="type_D9">
                                        <option value="1"> Hình chữ nhật </option>
                                        <option value="2"> Hình tam giác </option>
                                        <option value="3"> Hình vuông </option>
                                        <option value="4"> Hình tròn </option>
                                </select>
                            </div>
                            <div class="col-md-2" id="btn_D9" style="display: none">
                                <a id="btn_D9_1" onclick="GhiNhan(6,'maxvalue_D9_1','max_9','type_D9_1','type_9','btn_D9')"><button class="btn btn-warning" style="margin-top: 10px; float: left">Ghi nhận</button></a>
                            </div>
                            <div class="col-md-2">

                            </div>
                        </div>

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
