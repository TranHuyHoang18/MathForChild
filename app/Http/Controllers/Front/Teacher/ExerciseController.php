<?php

namespace App\Http\Controllers\Front\Teacher;

use App\Http\Controllers\Controller;
use App\Models\ChusoModel;
use App\Models\DaiLuongModel;
use App\models\DienDauModel;
use App\models\HinhHocModel;
use App\models\TimSoModel;
use App\Models\TimX;
use App\Models\TinhNhanhModel;
use App\Models\TinhtoanModel;
use App\Models\ToanDoModel;
use App\models\WeekModel;
use Hamcrest\Core\IsNull;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExerciseController extends Controller
{
    public function create($id_class,$id_week,Request $request)
    {

        $input = $request->all();
       /* echo "<pre>";
        print_r($input);
        echo "</pre>";
        exit();*/
        $week = WeekModel::find($id_week);

        $dang= json_decode($week->id_dang);

        if ($dang->{'1'}>0)
        {
            $tinhtoan = TinhtoanModel::find($dang->{'1'});
            $tinhtoan->num_min = $input['min_1'];
            $tinhtoan->num_max = $input['max_1'];
            $tinhtoan->dau = $input['type_1'];
            $tinhtoan->save();
        }

        if($dang->{'2'}>0)
        {
            $chuso = ChusoModel::find($dang->{'2'});
            $chuso->num_max = $input['max_2'];
            $chuso->save();
        }

        if($dang->{'3'}>0)
        {
            $timso = TimSoModel::find($dang->{'3'});
            $timso->num_max = $input['max_3'];
            $timso->save();
        }

        if($dang->{'4'}>0)
        {
            $diendau = DienDauModel::find($dang->{'4'});
            $diendau->num_max = $input['max_4'];
            $diendau->num_min = $input['min_4'];
            $diendau->type = $input['type_4'];
            $diendau->save();
        }

        if($dang->{'5'}>0)
        {
            $tinhnhanh = TinhNhanhModel::find($dang->{'5'});
            $tinhnhanh->so_num = 4;
            $tinhnhanh->num_max = $input['max_5'];
            $tinhnhanh->type = $input['type_5'];
            $tinhnhanh->save();
        }

        if($dang->{'6'}>0)
        {
            $timx = TimX::find($dang->{'6'});
            $timx->num_max = $input['max_6'];
            $timx->type = $input['type_D6'];
            $timx->save();
        }

        if($dang->{'7'}>0)
        {
            $toando = ToanDoModel::find($dang->{'7'});
            $toando->num_max = $input['max_7'];
            $toando->type = $input['type_D7'];
            $toando->save();
        }

        if($dang->{'8'}>0)
        {
            $dailuong = DaiLuongModel::find($dang->{'8'});
            $dailuong->num_max = $input['max_8'];
            $dailuong->type = $input['type_D8'];
            $dailuong->save();
        }

        if($dang->{'9'}>0)
        {
            $hinhhoc = HinhHocModel::find($dang->{'9'});
            $hinhhoc->num_max = $input['max_9'];
            $hinhhoc->type =$input['type_D9'];
            $hinhhoc->save();
        }

        return redirect()->route('teacher.class.detail',$id_class);
    }

}
