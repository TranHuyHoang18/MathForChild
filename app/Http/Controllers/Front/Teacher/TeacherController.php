<?php

namespace App\Http\Controllers\Front\Teacher;

use App\Http\Controllers\Controller;
use App\Models\ChusoModel;
use App\Models\ClassModel;
use App\Models\DaiLuongModel;
use App\models\DienDauModel;
use App\models\HinhHocModel;
use App\models\NotificationModel;
use App\models\RankModel;
use App\Models\StudentModel;
use App\models\TimSoModel;
use App\Models\TimX;
use App\Models\TinhNhanhModel;
use App\Models\TinhtoanModel;
use App\Models\ToanDoModel;
use App\models\WeekModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:teacher');
    }
    public function index()
    {
        return view('frontend.teacher.homepage');
    }
    public function home()
    {
        $data['classes'] = DB::table("classes")->where('id_teacher',1)->paginate(6);

        return view('frontend.teacher.class.home_',$data);
    }
    public function detail($id)
    {
        $data['class'] = ClassModel::find($id);
        $data['documents'] = DB::table('documents')
            ->join('classes','classes.id','=','documents.id_class')
            ->where('documents.id_class','=',$id)
            ->select('documents.*','classes.name as class_name')
            ->paginate(6);
        $data['notifications'] = DB::table('notifications')
            ->where('id_class','=',$id)
            ->orderBy('level','desc')
            ->paginate(6);
        $data['students'] = DB::table('students')
            ->join('parents','parents.id_child','=','students.id')
            ->where('id_class','=',$id)
            ->select('students.*','parents.name as name_parent')
            ->paginate(12);

        $weeks = DB::table('weeks')
            ->where('id_class','=',$id)
            ->orderBy('name','ASC')
            ->paginate(30);
        $tmp = array();
        foreach ($weeks as $week)
            {
                $tmp[$week->name]=array();
                $dang = json_decode($week->id_dang);
                if ($dang->{'1'}==0)
                {
                    $tmp[$week->name][1] = null;
                }
                else $tmp[$week->name][1] = TinhtoanModel::find($dang->{'1'});
                if ($dang->{'2'}==0)
                {
                    $tmp[$week->name][2] = null;
                }
                else $tmp[$week->name][2] = ChusoModel::find($dang->{'2'});
                if ($dang->{'3'}==0)
                {
                    $tmp[$week->name][3] = null;
                }
                else $tmp[$week->name][3] =  TimSoModel::find($dang->{'3'});
                if ($dang->{'4'}==0)
                {
                    $tmp[$week->name][4] = null;
                }
                else $tmp[$week->name][4] =  DienDauModel::find($dang->{'4'});
                if ($dang->{'5'}==0)
                {
                    $tmp[$week->name][5] = null;
                }
                else $tmp[$week->name][5] =  TinhNhanhModel::find($dang->{'5'});
                if ($dang->{'6'}==0)
                {
                    $tmp[$week->name][6] = null;
                }
                else $tmp[$week->name][6] =  TimX::find($dang->{'6'});
                if ($dang->{'7'}==0)
                {
                    $tmp[$week->name][7] = null;
                }
                else $tmp[$week->name][7] =  ToanDoModel::find($dang->{'7'});
                if ($dang->{'8'}==0)
                {
                    $tmp[$week->name][8] = null;
                }
                else $tmp[$week->name][8] =  DaiLuongModel::find($dang->{'8'});
                if ($dang->{'9'}==0)
                {
                    $tmp[$week->name][9] = null;
                }
                else $tmp[$week->name][9] = HinhHocModel::find($dang->{'9'});

              /*  echo "<pre>";
                print_r($tmp);
                echo"</pre>";*/

            }
        $data['weeks']= $weeks;
        $data['tmp'] = $tmp;
        $rank = DB::table('ranks')
            ->where('id_class','=',$id)
            ->get();
        $rank =$rank[0];
        $data['rank'] = $this->rank($rank->id);
        return view('frontend.teacher.class.class_detail',$data);
    }
    public function create_notification()
    {
        return view('frontend.teacher.class.notification');
    }
    public function list_notification()
    {
        return view('frontend.teacher.class.notification_home');
    }
    public function list_document()
    {
        $id = Auth::id();

        $data['documents'] = DB::table('documents')
            ->join('classes','classes.id','=','documents.id_class')
            ->where('documents.id_teacher','=',$id)
            ->select('documents.*','classes.name as class_name')
            ->paginate(6);

        return view('frontend.teacher.class.document.document',$data);
    }
    public function editWeek($id_class,$id_week)
    {
        $data['class'] = ClassModel::find($id_class);
        $data['week'] = WeekModel::find($id_week);
        $data['dang'] = array();
        $tmp = json_decode($data['week']->id_dang);
        if($tmp->{'1'}>0)
        {
            $data['dang'][1] = TinhtoanModel::find($tmp->{'1'});
        }
        else $data['dang'][1] = null;
        if($tmp->{'2'}>0)
        {
            $data['dang'][2] = ChusoModel::find($tmp->{'2'});
        }
        else $data['dang'][2] = null;
        if($tmp->{'3'}>0)
        {
            $data['dang'][3] = TimSoModel::find($tmp->{'3'});
        }
        else $data['dang'][3] = null;
        if($tmp->{'4'}>0)
        {
            $data['dang'][4] = DienDauModel::find($tmp->{'4'});
        }
        else $data['dang'][4] = null;
        if($tmp->{'5'}>0)
        {
            $data['dang'][5] = TinhNhanhModel::find($tmp->{'5'});
        }
        else $data['dang'][5] = null;
        if($tmp->{'6'}>0)
        {
            $data['dang'][6] = TimX::find($tmp->{'6'});
        }
        else $data['dang'][6] = null;
        if($tmp->{'7'}>0)
        {
            $data['dang'][7] = ToanDoModel::find($tmp->{'7'});
        }
        else $data['dang'][7] = null;
        if($tmp->{'8'}>0)
        {
            $data['dang'][8] = DaiLuongModel::find($tmp->{'8'});
        }
        else $data['dang'][8] = null;
        if($tmp->{'9'}>0)
        {
            $data['dang'][9] = HinhHocModel::find($tmp->{'9'});
        }
        else $data['dang'][9] = null;
        return view('frontend.teacher.class.editweek',$data);
    }
    public function addWeek($id_class)
    {
        $week = DB::table('weeks')
            ->where('id_class','=',$id_class)
            ->get();
        $data['week'] =count($week)+1;
        $data['class'] = ClassModel::find($id_class);
        return view('frontend.teacher.class.addweek',$data);
    }
    public function storeWeek($id_class,$stt_week,Request $request)
    {
        $input = $request->all();
        /*echo"<pre>";
        print_r($input);
        echo"</pre>";
        exit();*/
        $week = new WeekModel();
        $week->id_class = $id_class;
        $week->name = $stt_week;
        $week->id_dang ='';
        $dang = array();
        if ($input['Cclick1']==1)
        {
            $tinhtoan = new TinhtoanModel();
            $tinhtoan->name = 'Các dạng tính toán';
            $tinhtoan->num_min = $input['min_1'];
            $tinhtoan->num_max = $input['max_1'];
            $tinhtoan->dau = $input['type_1'];
            $tinhtoan->save();
            $dang[1] = $tinhtoan->id;
        }
        else $dang[1]=0;
        if ($input['Cclick2']==1)
        {
            $chuso = new ChusoModel();
            $chuso->name = 'Các dạng về chữ số ';
            $chuso->num_max = $input['max_2'];
            $chuso->save();
            $dang[2] = $chuso->id;
        }
        else $dang[2]=0;
        if ($input['Cclick3']==1)
        {
            $timso = new TimSoModel();
            $timso->name = 'Các dạng về Tim số ';
            $timso->num_max = $input['max_3'];
            $timso->save();
            $dang[3] = $timso->id;
        }
        else $dang[3]=0;
        if ($input['Cclick4']==1)
        {
            $diendau = new DienDauModel();
            $diendau->name = 'Các dạng về Điền dấu > , < , = ';
            $diendau->num_max = $input['max_4'];
            $diendau->num_min = $input['min_4'];
            $diendau->type = $input['type_4'];
            $diendau->save();
            $dang[4] = $diendau->id;
        }
        else $dang[4]=0;
        if ($input['Cclick5']==1)
        {
            $tinhnhanh = new TinhNhanhModel();
            $tinhnhanh->name = 'Các dạng về Tính nhanh ';
            $tinhnhanh->so_num = $input['so_num'];
            $tinhnhanh->num_max = $input['max_5'];
            $tinhnhanh->type = $input['type_5'];
            $tinhnhanh->save();
            $dang[5] = $tinhnhanh->id;
        }
        else $dang[5]=0;
        if ($input['Cclick6']==1)
        {
            $timx = new TimX();
            $timx->name = 'Các dạng về Tìm X ';
            $timx->num_max = $input['max_6'];
            $timx->type = $input['type_D6'];
            $timx->save();
            $dang[6] = $timx->id;
        }
        else $dang[6]=0;
        if ($input['Cclick7']==1)
        {
            $toando = new ToanDoModel();
            $toando->name = 'Các dạng về Toán đố ';
            $toando->num_max = $input['max_7'];
            $toando->type = $input['type_D7'];
            $toando->save();
            $dang[7] = $toando->id;
        }
        else $dang[7]=0;
        if ($input['Cclick8']==1)
        {
            $dailuong = new DaiLuongModel();
            $dailuong->name = 'Các dạng về chuyển đổi đại lượng';
            $dailuong->num_max = $input['max_8'];
            $dailuong->type = $input['type_D8'];
            $dailuong->save();
            $dang[8] = $dailuong->id;
        }
        else $dang[8]=0;
        if ($input['Cclick9']==1)
        {
            $hinhhoc = new HinhHocModel();
            $hinhhoc->name = 'Các dạng về Hình học';
            $hinhhoc->num_max = $input['max_9'];
            $hinhhoc->type =$input['type_D9'];
            $hinhhoc->save();
            $dang[9] = $hinhhoc->id;
        }
        else $dang[9]=0;
        $week->id_dang = json_encode($dang);
        $week->name = $stt_week;
        $week->save();
        return redirect()->route('teacher.class.detail',$id_class);
    }
    public function rank($id_rank)
    {
        $rank = RankModel::find($id_rank);
        $id_student = json_decode($rank->id_student);
        $sum_score= array();
        $id_score= array();
        $name_student = array();
        for ($i=1;$i<=$id_student->{'0'};$i++)
        {
            $sum_score[$i]=DB::table('homeworks')
                ->where('id_class','=',$rank->id_class)
                ->where('id_student','=',$id_student->{$i})
                ->sum('score');
            $id_score[$i]=$id_student->{$i};
            $name_student[$i]=StudentModel::find($id_student->{$i});
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
                    $tmp = $name_student[$i];
                    $name_student[$i]=$name_student[$j];
                    $name_student[$j]=$tmp;
                }
            }
        }
        $data['sum_score']=$sum_score;
        $data['id_score']=$id_score;
        $data['num_student']=$n;
        $data['name_student']=$name_student;
        return $data;
    }
    public function studentDetail($id_student)
    {
        $data['homeworks'] = DB::table('homeworks')
            ->where('id_student','=',$id_student)
            ->where('score','!=',-1)
            ->get();
        $data['luyentaps'] = DB::table('luyentaps')
            ->where('id_student','=',$id_student)
            ->where('score','!=',-1)
            ->orderBy('version','ASC')
            ->paginate(5);

        return view('frontend.teacher.class.detail_student',$data);
    }
}
