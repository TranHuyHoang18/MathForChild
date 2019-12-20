@extends('frontend.layouts.Student')
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
        <a id="notification_1" onclick="Cclick('notification')"><h3>Thông báo</h3></a>
        <div class="container" id="notification" style="display: none">

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
                        <td>Thời gian</td>
                    </tr>

                    <?php $i = 0;?>
                    @foreach($notifications as $notification)
                        <?php $i++?>
                        <tr id="{{$i."_1"}}" >
                            <td>{{$notification->id}}</td>
                            <td>{{$notification->content}}</td>
                            <td>{{$notification->date}}</td>
                        </tr>
                    @endforeach


                </table>
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
        <div class="container" id="exercise" style="margin-bottom: 30px">
            <div class="row">
                <h1>Bài tập tuần </h1>
            </div>
            @foreach($weeks as $week)
                <div class="row">
                    <h1>Tuần {{$week->name}} </h1>
                </div>
                @if($tmp[$week->name][1]!=null)
                    <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-2">
                        <h4>Dạng : 1 </h4>
                    </div>
                    <div class="col-md-4">
                        {{$tmp[$week->name][1]->name}}
                    </div>
                    <div class="col-md-2">
                      @if($score[$week->name][1]==-1)
                            <a href="{{url('/student/class/btvn/'.$class->id.'/'.$week->name.'/1/'.$tmp[$week->name][1]->id)}}"><button class="btn btn-success">Làm BTVN</button></a>
                        @else
                            <a href="{{url('/student/class/chitiet/'.$class->id.'/'.$week->name.'/1/'.$tmp[$week->name][1]->id)}}"><button class="btn btn-warning">Chi tiết </button></a>
                        @endif
                    </div>
                    <div class="col-md-1" style="text-align: center;">
                        @if($score[$week->name][1]>-1)
                            <p style="color: black;text-align: center;border: 1px solid sandybrown;margin: 0px auto">{{$score[$week->name][1]}} điểm</p>
                        @else
                            <p style="color: black;text-align: center;border: 1px solid sandybrown;margin: 0px auto">Chưa làm</p>
                        @endif
                    </div>
                    <div class="col-md-2">

                        <a href="{{url('/student/class/luyen_tap/'.$class->id.'/'.$week->name.'/1/'.$tmp[$week->name][1]->id)}}"><button class="btn btn-success">Luyện tập</button></a>

                    </div>
                </div>
                @endif
                @if($tmp[$week->name][2]!=null)
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-2">
                            <h4>Dạng : 2 </h4>
                        </div>
                        <div class="col-md-4">
                            {{$tmp[$week->name][2]->name}}
                        </div>
                        <div class="col-md-2">
                            @if($score[$week->name][2]==-1)
                                <a href="{{url('/student/class/btvn/'.$class->id.'/'.$week->name.'/2/'.$tmp[$week->name][2]->id)}}"><button class="btn btn-success">Làm BTVN</button></a>
                            @else
                                <a href="{{url('/student/class/chitiet/'.$class->id.'/'.$week->name.'/2/'.$tmp[$week->name][2]->id)}}"><button class="btn btn-warning">Chi tiết </button></a>
                            @endif
                        </div>
                        <div class="col-md-1" style="text-align: center;">
                            @if($score[$week->name][2]>-1)
                                <p style="color: black;text-align: center;border: 1px solid sandybrown;margin: 0px auto">{{$score[$week->name][2]}} điểm</p>
                            @else
                                <p style="color: black;text-align: center;border: 1px solid sandybrown;margin: 0px auto">Chưa làm</p>
                            @endif
                        </div>
                        <div class="col-md-2">

                            <a href="{{url('/student/class/luyen_tap/'.$class->id.'/'.$week->name.'/2/'.$tmp[$week->name][2]->id)}}"><button class="btn btn-success">Luyện tập</button></a>

                        </div>
                    </div>
                @endif

                @if($tmp[$week->name][3]!=null)
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-2">
                            <h4>Dạng : 3 </h4>
                        </div>
                        <div class="col-md-4">
                            {{$tmp[$week->name][3]->name}}
                        </div>
                        <div class="col-md-2">
                            @if($score[$week->name][3]==-1)
                                <a href="{{url('/student/class/btvn/'.$class->id.'/'.$week->name.'/3/'.$tmp[$week->name][3]->id)}}"><button class="btn btn-success">Làm BTVN</button></a>
                            @else
                                <a href="{{url('/student/class/chitiet/'.$class->id.'/'.$week->name.'/3/'.$tmp[$week->name][3]->id)}}"><button class="btn btn-warning">Chi tiết </button></a>
                            @endif
                        </div>
                        <div class="col-md-1" style="text-align: center;">
                            @if($score[$week->name][3]>-1)
                                <p style="color: black;text-align: center;border: 1px solid sandybrown;margin: 0px auto">{{$score[$week->name][3]}} điểm</p>
                            @else
                                <p style="color: black;text-align: center;border: 1px solid sandybrown;margin: 0px auto">Chưa làm</p>
                            @endif
                        </div>
                        <div class="col-md-2">

                            <a href="{{url('/student/class/luyen_tap/'.$class->id.'/'.$week->name.'/3/'.$tmp[$week->name][3]->id)}}"><button class="btn btn-success">Luyện tập</button></a>

                        </div>
                    </div>
                @endif

                @if($tmp[$week->name][4]!=null)
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-2">
                            <h4>Dạng : 4 </h4>
                        </div>
                        <div class="col-md-4">
                            {{$tmp[$week->name][4]->name}}
                        </div>
                        <div class="col-md-2">
                            @if($score[$week->name][4]==-1)
                                <a href="{{url('/student/class/btvn/'.$class->id.'/'.$week->name.'/4/'.$tmp[$week->name][4]->id)}}"><button class="btn btn-success">Làm BTVN</button></a>
                            @else
                                <a href="{{url('/student/class/chitiet/'.$class->id.'/'.$week->name.'/4/'.$tmp[$week->name][4]->id)}}"><button class="btn btn-warning">Chi tiết </button></a>
                            @endif
                        </div>
                        <div class="col-md-1" style="text-align: center;">
                            @if($score[$week->name][4]>-1)
                                <p style="color: black;text-align: center;border: 1px solid sandybrown;margin: 0px auto">{{$score[$week->name][4]}} điểm</p>
                            @else
                                <p style="color: black;text-align: center;border: 1px solid sandybrown;margin: 0px auto">Chưa làm</p>
                            @endif
                        </div>
                        <div class="col-md-2">

                            <a href="{{url('/student/class/luyen_tap/'.$class->id.'/'.$week->name.'/4/'.$tmp[$week->name][4]->id)}}"><button class="btn btn-success">Luyện tập</button></a>

                        </div>
                    </div>
                @endif

                @if($tmp[$week->name][5]!=null)
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-2">
                            <h4>Dạng : 5 </h4>
                        </div>
                        <div class="col-md-4">
                            {{$tmp[$week->name][5]->name}}
                        </div>
                        <div class="col-md-2">
                            @if($score[$week->name][5]==-1)
                                <a href="{{url('/student/class/btvn/'.$class->id.'/'.$week->name.'/5/'.$tmp[$week->name][5]->id)}}"><button class="btn btn-success">Làm BTVN</button></a>
                            @else
                                <a href="{{url('/student/class/chitiet/'.$class->id.'/'.$week->name.'/5/'.$tmp[$week->name][5]->id)}}"><button class="btn btn-warning">Chi tiết </button></a>
                            @endif
                        </div>
                        <div class="col-md-1" style="text-align: center;">
                            @if($score[$week->name][5]>-1)
                                <p style="color: black;text-align: center;border: 1px solid sandybrown;margin: 0px auto">{{$score[$week->name][5]}} điểm</p>
                            @else
                                <p style="color: black;text-align: center;border: 1px solid sandybrown;margin: 0px auto">Chưa làm</p>
                            @endif
                        </div>
                        <div class="col-md-2">

                            <a href="{{url('/student/class/luyen_tap/'.$class->id.'/'.$week->name.'/5/'.$tmp[$week->name][5]->id)}}"><button class="btn btn-success">Luyện tập</button></a>

                        </div>
                    </div>
                @endif

                @if($tmp[$week->name][6]!=null)
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-2">
                            <h4>Dạng : 6 </h4>
                        </div>
                        <div class="col-md-4">
                            {{$tmp[$week->name][6]->name}}
                        </div>
                        <div class="col-md-2">
                            @if($score[$week->name][6]==-1)
                                <a href="{{url('/student/class/btvn/'.$class->id.'/'.$week->name.'/6/'.$tmp[$week->name][6]->id)}}"><button class="btn btn-success">Làm BTVN</button></a>
                            @else
                                <a href="{{url('/student/class/chitiet/'.$class->id.'/'.$week->name.'/6/'.$tmp[$week->name][6]->id)}}"><button class="btn btn-warning">Chi tiết </button></a>
                            @endif
                        </div>
                        <div class="col-md-1" style="text-align: center;">
                            @if($score[$week->name][6]>-1)
                                <p style="color: black;text-align: center;border: 1px solid sandybrown;margin: 0px auto">{{$score[$week->name][6]}} điểm</p>
                            @else
                                <p style="color: black;text-align: center;border: 1px solid sandybrown;margin: 0px auto">Chưa làm</p>
                            @endif
                        </div>
                        <div class="col-md-2">

                            <a href="{{url('/student/class/luyen_tap/'.$class->id.'/'.$week->name.'/6/'.$tmp[$week->name][6]->id)}}"><button class="btn btn-success">Luyện tập</button></a>

                        </div>
                    </div>
                @endif

                @if($tmp[$week->name][7]!=null)
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-2">
                            <h4>Dạng : 7 </h4>
                        </div>
                        <div class="col-md-4">
                            {{$tmp[$week->name][7]->name}}
                        </div>
                        <div class="col-md-2">
                            @if($score[$week->name][7]==-1)
                                <a href="{{url('/student/class/btvn/'.$class->id.'/'.$week->name.'/7/'.$tmp[$week->name][7]->id)}}"><button class="btn btn-success">Làm BTVN</button></a>
                            @else
                                <a href="{{url('/student/class/chitiet/'.$class->id.'/'.$week->name.'/7/'.$tmp[$week->name][7]->id)}}"><button class="btn btn-warning">Chi tiết </button></a>
                            @endif
                        </div>
                        <div class="col-md-1" style="text-align: center;">
                            @if($score[$week->name][7]>-1)
                                <p style="color: black;text-align: center;border: 1px solid sandybrown;margin: 0px auto">{{$score[$week->name][7]}} điểm</p>
                            @else
                                <p style="color: black;text-align: center;border: 1px solid sandybrown;margin: 0px auto">Chưa làm</p>
                            @endif
                        </div>
                        <div class="col-md-2">

                            <a href="{{url('/student/class/luyen_tap/'.$class->id.'/'.$week->name.'/7/'.$tmp[$week->name][7]->id)}}"><button class="btn btn-success">Luyện tập</button></a>

                        </div>
                    </div>
                @endif

                @if($tmp[$week->name][8]!=null)
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-2">
                            <h4>Dạng : 8 </h4>
                        </div>
                        <div class="col-md-4">
                            {{$tmp[$week->name][8]->name}}
                        </div>
                        <div class="col-md-2">
                            @if($score[$week->name][8]==-1)
                                <a href="{{url('/student/class/btvn/'.$class->id.'/'.$week->name.'/8/'.$tmp[$week->name][8]->id)}}"><button class="btn btn-success">Làm BTVN</button></a>
                            @else
                                <a href="{{url('/student/class/chitiet/'.$class->id.'/'.$week->name.'/8/'.$tmp[$week->name][8]->id)}}"><button class="btn btn-warning">Chi tiết </button></a>
                            @endif
                        </div>
                        <div class="col-md-1" style="text-align: center;">
                            @if($score[$week->name][8]>-1)
                                <p style="color: black;text-align: center;border: 1px solid sandybrown;margin: 0px auto">{{$score[$week->name][8]}} điểm</p>
                            @else
                                <p style="color: black;text-align: center;border: 1px solid sandybrown;margin: 0px auto">Chưa làm</p>
                            @endif
                        </div>
                        <div class="col-md-2">

                            <a href="{{url('/student/class/luyen_tap/'.$class->id.'/'.$week->name.'/8/'.$tmp[$week->name][8]->id)}}"><button class="btn btn-success">Luyện tập</button></a>

                        </div>
                    </div>
                @endif

                @if($tmp[$week->name][9]!=null)
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-2">
                            <h4>Dạng : 9 </h4>
                        </div>
                        <div class="col-md-4">
                            {{$tmp[$week->name][9]->name}}
                        </div>
                        <div class="col-md-2">
                            @if($score[$week->name][9]==-1)
                                <a href="{{url('/student/class/btvn/'.$class->id.'/'.$week->name.'/9/'.$tmp[$week->name][9]->id)}}"><button class="btn btn-success">Làm BTVN</button></a>
                            @else
                                <a href="{{url('/student/class/chitiet/'.$class->id.'/'.$week->name.'/9/'.$tmp[$week->name][9]->id)}}"><button class="btn btn-warning">Chi tiết </button></a>
                            @endif
                        </div>
                        <div class="col-md-1" style="text-align: center;">
                            @if($score[$week->name][9]>-1)
                                <p style="color: black;text-align: center;border: 1px solid sandybrown;margin: 0px auto">{{$score[$week->name][9]}} điểm</p>
                            @else
                                <p style="color: black;text-align: center;border: 1px solid sandybrown;margin: 0px auto">Chưa làm</p>
                            @endif
                        </div>
                        <div class="col-md-2">

                            <a href="{{url('/student/class/luyen_tap/'.$class->id.'/'.$week->name.'/9/'.$tmp[$week->name][9]->id)}}"><button class="btn btn-success">Luyện tập</button></a>

                        </div>
                    </div>
                @endif

            @endforeach

        </div>
        <!--Báo cáo lớp học -->
        <a id="statistical_class_1" onclick="Cclick('statistical_class')"><h3>Thống kê lớp học </h3></a>
        <div class="container" id="statistical_class" style="display: none">

            <div class="row">
                <h1>Báo cáo thống kê điểm số trong lớp </h1>
            </div>
            <div class="row">
                <table class="table table-bordered">
                    <tr>
                        <td>ID</td>
                        <td>Tên học sinh</td>
                        <td>Số điểm</td>
                    </tr>

                    <?php for($kt=1;$kt<=$rank['num_student'];$kt++)
                        {
                        echo"<tr>
                            <td>".$kt."</td>
                            <td>".$rank['id_score'][$kt]['name']."</td>
                            <td>".$rank['sum_score'][$kt]."</td>
                        </tr>";

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
        function Turn(sk1,s2)
        {
            document.getElementById('Turn_'+sk1).value=s2;
        }
        function Cauhinh(s1)
        {
            document.getElementById(s1).style.display='table';
        }
        /*function TurnOn(s1,s2,s3,s4)
        {
            document.getElementById(s1).style.display='block';
            document.getElementById(s2).style.display='block';
            document.getElementById(s3).style.display='block';
            document.getElementById(s4).style.display='block';
        }*/
        function TurnOn(...agrs)
        {
            console.log(agrs);
            for (let i = 1; i<=agrs[0]-1;i++)
            {

                document.getElementById(agrs[i]).style.display='block';
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
            let myForm = document.forms["formmy"];
            myForm.submit();

        }
    </script>
@endsection
