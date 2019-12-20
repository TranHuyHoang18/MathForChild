@extends('frontend.layouts.Teacher')
@section('style')
       <style type="text/css">
           .table td
           {
               text-align: center;
           }
           .table
           {
               width: 90%;
           }

       </style>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <h1 style="width: 90%;margin: 0px auto">Kết quả chi tiết</h1>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-5">
            <div class="row">
                <h3 style="margin: 0px auto">BTVN</h3>
            </div>
            <div class="row">
                <table class="table table-bordered">
                    <tr>
                        <td>Điểm</td>
                        <td>Thời gian</td>
                    </tr>

                        @foreach($homeworks as $homework)
                            <?php
                                $sum_time = 0;
                                $result = json_decode($homework->result);

                                for ($i=1;$i<=$result->{'0'};$i++)
                                    {

                                        $det = json_decode($result->{$i});
                                        $sum_time +=$det->time;
                                    }
                                $gio = (int)($sum_time/3600);
                                $sum_time -=$gio *3600;
                                $phut = (int)($sum_time/60);
                                $sum_time-=$phut*60;
                                $giay = $sum_time;
                                $time ="";
                                if($gio>0) $time = $gio." giờ ";
                                if($phut>0) $time =$time.$phut." phút ";
                                $time = $time.$giay." giây";
                            ?>
                            <tr>
                                <td>{{$homework->score}}/10 điểm</td>
                                <td><?php echo $time;  ?></td>
                            </tr>
                        @endforeach

                </table>
            </div>
        </div>
        <div class="col-md-5">
            <div class="row">
                <h3 style="margin: 0px auto">Tự luyện tập</h3>
            </div>
            <div class="row">
                <table class="table table-bordered">
                    <tr>
                        <td>Lần</td>
                        <td>Điểm</td>
                        <td>Thời gian</td>
                    </tr>
                    @foreach($luyentaps as $luyentap)
                        <?php
                        $sum_time = 0;
                        $result = json_decode($luyentap->result);

                        for ($i=1;$i<=$result->{'0'};$i++)
                        {
                            $det = json_decode($result->{$i});
                            $sum_time +=$det->time;
                        }
                        $gio = (int)($sum_time/3600);
                        $sum_time -=$gio *3600;
                        $phut = (int)($sum_time/60);
                        $sum_time-=$phut*60;
                        $giay = $sum_time;
                        $time ="";
                        if($gio>0) $time = $gio." giờ ";
                        if($phut>0) $time =$time.$phut." phút ";
                        $time = $time.$giay." giây";
                        ?>
                        <tr>
                            <td><?php echo $luyentap->version?></td>
                            <td>{{$luyentap->score}}/10 điểm</td>
                            <td><?php echo $time;  ?></td>
                        </tr>
                    @endforeach

                </table>
            </div>

        </div>
        </div>
        <div class="col-md-1"></div>
    </div>
    <div class="row">
        <div class="col-md-1">
        </div>
        <div class="col-md-11">
            <div class="row">
                <h3>BTVN</h3>
            </div>
            <div class="row" style="width: 100%">
                <table class="table table-bordered">
                    <tr>
                        <td>Câu hỏi</td>
                        <td>Đáp án</td>
                        <td>Câu trả lời</td>
                        <td>Thời gian<br>(giây)</td>
                    </tr>

                    @foreach($homeworks as $homework)
                        <?php
                        $question = json_decode($homework->content);
                        $detail_ans = json_decode($homework->result);
                        for ($i=1;$i<=$question->{'0'};$i++)
                        {
                        $det = json_decode($detail_ans->{$i});

                        ?>
                        <tr>
                            <td><?php echo $question->{$i};?></td>

                            <td><?php echo $det->{"true"};?></td>

                            @if($det->{"result"}=='1')
                                <td style="background: #fffc46"><?php echo $det->{"ans"}?></td>
                            @else
                                <td style="background: #ff3f59"><?php echo $det->{"ans"}?></td>
                            @endif
                            <td><?php echo $det->{"time"}?></td>
                        </tr>
                        <?php } ?>
                    @endforeach

                </table>
            </div>
            <div class="row">
                <h3>Tu luyen</h3>
            </div>
            <div class="row" style="width: 100%">
                <table class="table table-bordered">
                    <tr>
                        <td>Lần</td>
                        <td>Câu hỏi</td>
                        <td>Đáp án</td>
                        <td>Câu trả lời</td>
                        <td>Thời gian</td>
                    </tr>
                    @foreach($luyentaps as $luyentap)
                        <tr>
                            <td style="background: #545b62"><?php echo $luyentap->version?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <?php
                        $question = json_decode($luyentap->content);
                        $detail_ans = json_decode($luyentap->result);
                        for ($i=1;$i<=$question->{'0'};$i++)
                        {
                        $det = json_decode($detail_ans->{$i});
                        ?>
                        <tr>
                            <td></td>
                            <td><?php echo $question->{$i};?></td>
                            <td><?php echo $det->{'true'};?></td>
                            @if($det->result==1)
                                <td style="background: #fffc46"><?php echo $det->{'ans'}?></td>
                            @else
                                <td style="background: #ff3f59"><?php echo $det->{'ans'}?></td>
                            @endif
                            <td><?php echo $det->{'time'}?></td>
                        </tr>
                        <?php } ?>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
