<?php

namespace App\Http\Controllers\Front\Student\Classroom;

use App\Http\Controllers\Controller;
use App\Models\ChusoModel;
use App\Models\ClassModel;
use App\Models\DaiLuongModel;
use App\models\DienDauModel;
use App\models\HinhHocModel;
use App\Models\HomeWorkModel;
use App\Models\LuyenTapModel;
use App\models\RankModel;
use App\models\StudentHomWorkModel;
use App\Models\StudentModel;
use App\models\TimSoModel;
use App\Models\TimX;
use App\Models\TinhNhanhModel;
use App\Models\TinhtoanModel;
use App\Models\ToanDoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClassController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:student');
    }
    public function xinjoinclass(Request $request)
    {
        $input = $request->all();
        $student = StudentModel::find(Auth::user()->id);
        $class = DB::table('classes')
            ->where('id','=',$input['id_class'])
            ->get();
        if (count($class)==0)
        {
            return redirect()->back();
        }
        $student->id_class = $input['id_class'];
        $student->save();
        $rank = DB::table('ranks')
            ->where('id_class','=',$input['id_class'])
            ->get();
        $rank=$rank[0];
        $rank = RankModel::find($rank->id);
        $id_student= array();
        $id_student =json_decode($rank->id_student);

        $tk = $id_student->{'0'}+1;

        $id_student->{$tk}=Auth::user()->id;
        $id_student->{'0'}=$tk;
        $rank->id_student=json_encode($id_student);
        $rank->save();
        return redirect()->route('student.class.detail',$input['id_class']);
    }
    public function joinClass()
    {

        $id = Auth::user()->id_class;
        if ($id >0)
        {
            return $this->index($id);
        }
        else
            return view('frontend.student.joinclass');
    }

    public function index($id_class)
    {
       $weeks = DB::table('weeks')
           ->where('id_class','=',$id_class)
           ->orderBy('name','ASC')
           ->paginate(5);

       $weekdetail=array();
       $data['weeks'] = $weeks;
       $data['num_week'] = count($weeks);
       $data['class'] = ClassModel::find($id_class);
       $data['score'] = array();
       $tmp = array();
       foreach ($weeks as $week)
        {
            $data['score'][$week->name] = array();
            $tmp[$week->name]=array();
            $dang = json_decode($week->id_dang);
            if ($dang->{'1'}==0)
            {
                $tmp[$week->name][1] = null;
            }
            else
            {
                $tmp[$week->name][1] = TinhtoanModel::find($dang->{'1'});
                 $dem = DB::table('homeworks')
                    ->where('id_class','=',$id_class)
                    ->where('id_student','=',Auth::user()->id)
                    ->where('id_week','=',$week->name)
                    ->where('dang','=',1)
                    ->get();
                if(count($dem)>0)
                {
                    $ttt = $dem[0];
                    $data['score'][$week->name][1] = $ttt->score;
                }
                else
                    $data['score'][$week->name][1]=-1;
            }
            if ($dang->{'2'}==0)
            {
                $tmp[$week->name][2] = null;
            }
            else
            {
                $tmp[$week->name][2] = ChusoModel::find($dang->{'2'});
                $dem = DB::table('homeworks')
                    ->where('id_class','=',$id_class)
                    ->where('id_student','=',Auth::user()->id)
                    ->where('id_week','=',$week->name)
                    ->where('dang','=',2)
                    ->get();

                if(count($dem) >0)
                {

                    $ttt = $dem[0];
                    $data['score'][$week->name][2] = $ttt->score;
                }
                else
                    $data['score'][$week->name][2]=-1;
            }
            if ($dang->{'3'}==0)
            {
                $tmp[$week->name][3] = null;
            }
            else
            {
                $tmp[$week->name][3] =  TimSoModel::find($dang->{'3'});
                $dem = DB::table('homeworks')
                    ->where('id_class','=',$id_class)
                    ->where('id_student','=',Auth::user()->id)
                    ->where('id_week','=',$week->name)
                    ->where('dang','=',3)
                    ->get();
                if(count($dem) >0)
                {
                    $ttt = $dem[0];
                    $data['score'][$week->name][3] = $ttt->score;
                }
                else
                    $data['score'][$week->name][3]=-1;
            }

            if ($dang->{'4'}==0)
            {
                $tmp[$week->name][4] = null;
            }
            else
            {
                $tmp[$week->name][4] =  DienDauModel::find($dang->{'4'});
                $dem = DB::table('homeworks')
                    ->where('id_class','=',$id_class)
                    ->where('id_student','=',Auth::user()->id)
                    ->where('id_week','=',$week->name)
                    ->where('dang','=',4)
                    ->get();
                if(count($dem) >0)
                {
                    $ttt = $dem[0];
                    $data['score'][$week->name][4] = $ttt->score;
                }
                else
                    $data['score'][$week->name][4]=-1;
            }

            if ($dang->{'5'}==0)
            {
                $tmp[$week->name][5] = null;
            }
            else
            {
                $tmp[$week->name][5] =  TinhNhanhModel::find($dang->{'5'});
                $dem = DB::table('homeworks')
                    ->where('id_class','=',$id_class)
                    ->where('id_student','=',Auth::user()->id)
                    ->where('id_week','=',$week->name)
                    ->where('dang','=',5)
                    ->get();
                if(count($dem) >0)
                {

                    $ttt = $dem[0];
                    $data['score'][$week->name][5] = $ttt->score;
                }
                else
                    $data['score'][$week->name][5]=-1;
            }
            if ($dang->{'6'}==0)
            {
                $tmp[$week->name][6] = null;
            }
            else
            {
                $tmp[$week->name][6] =  TimX::find($dang->{'6'});
                $dem = DB::table('homeworks')
                    ->where('id_class','=',$id_class)
                    ->where('id_student','=',Auth::user()->id)
                    ->where('id_week','=',$week->name)
                    ->where('dang','=',6)
                    ->get();
                if(count($dem) >0)
                {

                    $ttt = $dem[0];
                    $data['score'][$week->name][6] = $ttt->score;
                }
                else
                    $data['score'][$week->name][6]=-1;
            }
            if ($dang->{'7'}==0)
            {
                $tmp[$week->name][7] = null;
            }
            else
            {
                $tmp[$week->name][7] =  ToanDoModel::find($dang->{'7'});
                $dem = DB::table('homeworks')
                ->where('id_class','=',$id_class)
                ->where('id_student','=',Auth::user()->id)
                ->where('id_week','=',$week->name)
                ->where('dang','=',7)
                ->get();
                if(count($dem) >0)
                {

                    $ttt = $dem[0];
                    $data['score'][$week->name][7] = $ttt->score;
                }
                else
                    $data['score'][$week->name][7]=-1;
            }
            if ($dang->{'8'}==0)
            {
                $tmp[$week->name][8] = null;
            }
            else

            {
                $tmp[$week->name][8] =  DaiLuongModel::find($dang->{'8'});
                $dem = DB::table('homeworks')
                    ->where('id_class','=',$id_class)
                    ->where('id_student','=',Auth::user()->id)
                    ->where('id_week','=',$week->name)
                    ->where('dang','=',8)
                    ->get();
                if(count($dem) >0)
                {

                    $ttt = $dem[0];
                    $data['score'][$week->name][8] = $ttt->score;
                }
                else
                    $data['score'][$week->name][8]=-1;
            }
            if ($dang->{'9'}==0)
            {
                $tmp[$week->name][9] = null;
            }
            else


            {
                $tmp[$week->name][9] = HinhHocModel::find($dang->{'9'});
                $dem = DB::table('homeworks')
                    ->where('id_class','=',$id_class)
                    ->where('id_student','=',Auth::user()->id)
                    ->where('id_week','=',$week->name)
                    ->where('dang','=',9)
                    ->get();
                if(count($dem) >0)
                {

                    $ttt = $dem[0];
                    $data['score'][$week->name][9] = $ttt->score;
                }
                else
                    $data['score'][$week->name][9]=-1;
            }
        }
       $data['tmp'] = $tmp;
       $data['documents'] = DB::table('documents')
            ->join('classes','classes.id','=','documents.id_class')
            ->where('documents.id_class','=',$id_class)
            ->select('documents.*','classes.name as class_name')
            ->paginate(6);
        $data['notifications'] = DB::table('notifications')
            ->where('id_class','=',$id_class)
            ->orderBy('level','desc')
            ->paginate(6);
        $rank = DB::table('ranks')
            ->where('id_class','=',$id_class)
            ->get();
        $rank =$rank[0];
        $data['rank'] = $this->rank($rank->id);

       return view('frontend.student.class.detail',$data);
    }

    public function btvn($id_class,$stt_tuan,$stt,$id_dang)
    {
        $bt ='';
        $homework = DB::table('homeworks')
            ->where('id_class','=',$id_class)
            ->where('dang','=',$stt)
            ->where('id_week',$stt_tuan)
            ->where('id_student','=',Auth::user()->id)

            ->count();
        if ($homework==0)
        {

            switch ($stt)
            {
                case 1:
                {
                    $model = TinhtoanModel::find($id_dang);
                    $bt = $model->sinhBai($id_dang);
                    break;
                }
                case 2:
                {
                    $model  =ChusoModel::find($id_dang);
                    $bt = $model->sinhBai($id_dang);
                    break;
                }
                case 3:
                {
                    $model  =TimSoModel::find($id_dang);
                    $bt = $model->sinhBai($id_dang);
                    break;
                }
                case 4:
                {
                    $model  =DienDauModel::find($id_dang);
                    $bt = $model->sinhBai($id_dang);
                    break;
                }
                case 5:
                {
                    $model  =TinhNhanhModel::find($id_dang);
                    $bt = $model->sinhBai($id_dang);
                    break;
                }
                case 6:
                {
                    $model  =TimX::find($id_dang);
                    $bt = $model->sinhBai($id_dang);
                    break;
                }
                case 7:
                {
                    $model  =ToanDoModel::find($id_dang);
                    $bt = $model->sinhBai($id_dang);
                    break;
                }
                case 8:
                {
                    $model  =DaiLuongModel::find($id_dang);
                    $bt = $model->sinhBai($id_dang);
                    break;
                }
                default :
                {
                    $model  =HinhHocModel::find($id_dang);
                    $bt = $model->sinhBai($id_dang);
                    break;
                }
            }

            // lưu vào DB;
            $homework = new HomeWorkModel();
            $homework->id_class = $id_class;
            $homework->id_student = Auth::id();
            $homework->id_week = $stt_tuan;
            $homework->dang = $stt;
            $homework->content = $bt['question'];

            $homework->result = $bt['answer'];

            $homework->score = '-1';
            $homework->save();
            $bt = $homework->content;

        }
        else
        {

            $homework = DB::table('homeworks')
                ->where('id_class','=',$id_class)
                ->where('dang','=',$stt)
                ->where('id_week',$stt_tuan)
                ->get();
            $homework = $homework[0];
            $bt = $homework->content;
        }

        $questions = json_decode($bt);


        $data['n']= $questions->{'0'};
        $data['questions']=$questions;
        $data['class'] = ClassModel::find($id_class);
        $data['id_btvn'] = $homework->id;

        return view('frontend.student.class.homework',$data);
    }
    public function checkBtvn($id_btvn,Request $request)
    {
       $input = $request->all();
        $result = array();
        $homework = HomeWorkModel::find($id_btvn);
        $questions = json_decode($homework->content);
        $answer = json_decode($homework->result);
        $true_quest=0;
        for ($i= 1; $i<=$questions->{'0'};$i++)
        {
            $arr_ans = array();
            $arr = json_decode($questions->{$i});
            $arr_ans['time'] =$input['time_'.$i];
            $arr_ans['ans'] =$input['answer_'.$i];
            if ($input['answer_'.$i]== $answer->{$i})
            {
                $arr_ans['result'] = '1';
            }else  $arr_ans['result'] = '0';
            $arr_ans['true'] = $answer->{$i};
            if($arr_ans['result'] == 1)
            {
                $true_quest++;
            }
            $result[$i] = json_encode($arr_ans);
        }
        $result['0'] = $questions->{'0'};
        $homework->result = json_encode($result);
        $homework->score = $true_quest*10 /$questions->{'0'};
        $homework->save();
        return redirect()->route('student.class');

    }
    public function luyentap($id_class,$stt_tuan,$stt,$id_dang)
    {
        $bt ='';
        $luyentap = DB::table('luyentaps')
            ->where('id_class','=',$id_class)
            ->where('dang','=',$stt)
            ->where('id_week',$stt_tuan)
            ->where('id_student','=',Auth::user()->id)
            ->get();
        $n_version = count($luyentap);
        switch ($stt)
        {
            case 1:
            {
                $model = TinhtoanModel::find($id_dang);
                $bt = $model->sinhBai($id_dang);
                break;
            }
            case 2:
            {
                $model  =ChusoModel::find($id_dang);
                $bt = $model->sinhBai($id_dang);
                break;
            }
            case 3:
            {
                $model  =TimSoModel::find($id_dang);
                $bt = $model->sinhBai($id_dang);
                break;
            }
            case 4:
            {
                $model  =DienDauModel::find($id_dang);
                $bt = $model->sinhBai($id_dang);
                break;
            }
            case 5:
            {
                $model  =TinhNhanhModel::find($id_dang);
                $bt = $model->sinhBai($id_dang);
                break;
            }
            case 6:
            {
                $model  =TimX::find($id_dang);
                $bt = $model->sinhBai($id_dang);
                break;
            }
            case 7:
            {
                $model  =ToanDoModel::find($id_dang);
                $bt = $model->sinhBai($id_dang);
                break;
            }
            case 8:
            {
                $model  =DaiLuongModel::find($id_dang);
                $bt = $model->sinhBai($id_dang);
                break;
            }
            default :
            {
                $model  =HinhHocModel::find($id_dang);
                $bt = $model->sinhBai($id_dang);
                break;
            }
        }

        // lưu vào DB;
        $luyentap = new LuyenTapModel();
        $luyentap->id_class = $id_class;
        $luyentap->id_student = Auth::id();
        $luyentap->id_week = $stt_tuan;
        $luyentap->dang = $stt;
        $luyentap->content = $bt['question'];
        $luyentap->version = $n_version+1;
        $luyentap->result = $bt['answer'];

        $luyentap->score = '-1';
        $luyentap->save();
        $bt = $luyentap->content;

        $questions = json_decode($bt);
        $data['n']= $questions->{'0'};
        $data['questions']=$questions;
        $data['class'] = ClassModel::find($id_class);
        $data['id_luyentap'] = $luyentap->id;

        return view('frontend.student.class.luyentap',$data);
    }
    public function checkLuyenTap($id_luyentap,Request $request)
    {
        $input = $request->all();
        $result = array();
        $luyentap = LuyenTapModel::find($id_luyentap);
        $questions = json_decode($luyentap->content);
        $answer = json_decode($luyentap->result);
        $true_quest=0;
        for ($i= 1; $i<=$questions->{'0'};$i++)
        {
            $arr_ans = array();
            $arr = json_decode($questions->{$i});
            $arr_ans['time'] =$input['time_'.$i];
            $arr_ans['ans'] =$input['answer_'.$i];
            if ($input['answer_'.$i]== $answer->{$i})
            {
                $arr_ans['result'] = '1';

            }else  $arr_ans['result'] = '0';
            $arr_ans['true'] =$answer->{$i};
            if($arr_ans['result'] == 1)
            {
                $true_quest++;
            }
            $result[$i] = json_encode($arr_ans);
        }
        $result['0'] = $questions->{'0'};
        $luyentap->result = json_encode($result);
        $luyentap->score = $true_quest*10 /$questions->{'0'};
        $luyentap->save();
        return redirect()->route('student.class');

    }
    public function chitiet($id_class,$stt_tuan,$stt,$id_dang)
    {
        $data['homeworks'] = DB::table('homeworks')
            ->where('id_class','=',$id_class)
            ->where('dang','=',$stt)
            ->where('id_week',$stt_tuan)
            ->where('id_student','=',Auth::user()->id)
            ->get();
        $data['luyentaps'] = DB::table('luyentaps')
            ->where('id_class','=',$id_class)
            ->where('dang','=',$stt)
            ->where('id_week',$stt_tuan)
            ->where('id_student','=',Auth::user()->id)
            ->orderBy('version','ASC')
            ->paginate(5);
        return view('frontend.student.class.detail_student',$data);
    }
    public function rank($id_rank)
    {
        $rank = RankModel::find($id_rank);
        $id_student = json_decode($rank->id_student);
        $sum_score= array();
        $id_score= array();
        for ($i=1;$i<=$id_student->{'0'};$i++)
        {
            $sum_score[$i]=DB::table('homeworks')
                ->where('id_class','=',$rank->id_class)
                ->where('id_student','=',$id_student->{$i})
                ->sum('score');
            $id_score[$i]=StudentModel::find($id_student->{$i});
        }
        $n = $id_student->{'0'};
        for($i=1;$i<=$n;$i++)
        {
            for ($j=$i+1;$j<=$n;$j++)
            {
                if ($sum_score[$i]<$sum_score[$j])
                {
                    $tmp = $sum_score[$i];
                    $sum_score[$i] = $sum_score[$j];
                    $sum_score[$j]=$tmp;
                    $tmp = $id_score[$i];
                    $id_score[$i] = $id_score[$j];
                    $id_score[$j] = $tmp;
                }
            }
        }
        $data['sum_score']=$sum_score;
        $data['id_score']=$id_score;
        $data['num_student']=$n;
        return $data;
    }
    public function document()
    {
        $student = StudentModel::find(Auth::user()->id);
        $data['class']=ClassModel::find($student->id_class);
        $data['documents'] = DB::table('documents')
            ->where('id_class','=',$student->id_class)
            ->paginate(5);
        return view('frontend.student.class.document',$data);
    }
}
