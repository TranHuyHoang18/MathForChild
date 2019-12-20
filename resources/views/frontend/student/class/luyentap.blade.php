@extends('frontend.layouts.Student')
@section('style')
    <link rel="stylesheet" href=" https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style type="text/css">
        #name_class
        {
            text-align: center;
            color: red;
            font-weight: bold;
            margin-top: 20px;
        }
        .blackboard {
            background: url("{{asset('frontend/images/blackboard.png')}}") no-repeat center center;

          /*  width: 600px;*/
            height: 500px;
            background-size: cover;
           /* border: 1px solid red;*/
        }
        .body-board
        {
            width: 100%;
            padding-top: 20%;

        }
        .debai
        {
            color: white;
            font-size: 25px;
            font-weight: lighter;
            text-align: center;
            margin: 0px auto;
        }
        input
        {
            height: 50px;
            width: 80%;
            margin: 0px auto;
            background: none;
            border-radius: 30px;
            border: 2px solid white;
            color: white;

        }

    </style>
@endsection
@section('content')
    <h2 id="name_class"> Lớp : {{$class->name}}</h2>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="row blackboard">
                    <div class="row body-board" style="color: black;">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-8">

                                <?php
                                for ($i=1;$i<=$n;$i++)
                                    {?>
                                    <div id="{{$i}}" style="display:none">
                                        <div class="row" style="height: 100px">
                                            <p class="debai">Câu hỏi số {{$i}} : <?php echo $questions->{$i}; ?></p>
                                        </div>
                                        <div class="row" style="margin-top:5%">
                                            <p class="debai"> Nhập Đáp án </p>
                                        </div>
                                        <div class="row" style="margin-top:1%">
                                            <input id="{{'answer__'.$i}}" type="text" name="answer" value=" " placeholder="Nhập đáp án">
                                        </div>
                                        <div class="row" style="margin-top: 1%;">
                                            <a onclick="swap({{$i}})" href="#" style="margin: 0px auto"><button class="btn btn-warning">Tiếp</button></a>
                                        </div>
                                    </div>
                                  <?php } ?>

                            </div>
                            <div class="col-md-2">

                            </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2" style="text-align: center;font-size: 25px">
                <p style="color: black">Thời Gian<br></p>
                <p id="time" >0s</p>
            </div>
        </div>
        <div class="row" >
            <form id="myForm" action="{{url('student/class/check_luyentap/'.$id_luyentap)}}" method="post" style="display: none">
               @csrf
                <?php $i=0;?>
                @foreach($questions as $question)
                    <?php
                        $i++;
                        $id_time = "time_".$i;
                        $id_answer ="answer_".$i;
                    ?>
                    <input id="{{$id_time}}" type="text" name="{{$id_time}}" value="120" style="color:black" readonly>
                    <input id="{{$id_answer}}" type="text" name="{{$id_answer}}" value="-1" style="color:black" readonly >
                    @endforeach
                {{--<input type="submit" value="gửi">--}}
            </form>
        </div>
    </div>
<script type="text/javascript">
    let count=0;
    let kkk;
    function dotnetstock()
    {
        clear_time()
        kkk = setInterval(starttimer, 1000);
    }
    function clear_time()
    {
        clearInterval(kkk);
        count=0;
    }
    function starttimer()
    {
        count = count + 1;
        document.getElementById("time").innerHTML = count;
        if(count >=1200)
        {
            clear_time();
        }
    }
</script>
<script type="text/javascript">
    document.getElementById("1").style.display="block";
    dotnetstock(1);
    let n = <?php echo $n; ?>;
    function swap(t)
    {
        if(t<n)
        {
            document.getElementById('time_'+t).value=document.getElementById('time').innerHTML;
            document.getElementById('answer_'+t).value=document.getElementById('answer__'+t).value;
            dotnetstock();
            document.getElementById(t).style.display='none';
            document.getElementById(t+1).style.display='block';

        }
        else
        {
            document.getElementById('time_'+t).value=document.getElementById('time').innerHTML;
            document.getElementById('answer_'+t).value=document.getElementById('answer__'+t).value;
            document.getElementById("myForm").submit();
        }

    }
</script>
@endsection
