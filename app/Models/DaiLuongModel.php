<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DaiLuongModel extends Model
{
    public $table='dailuong';
    private $max;
    private $n =0;
    private $result =array();
    private $answer =array();
    private function sinh1($k)
    {

        $name = array();
        $name[1]='kg';
        $name[2]='g';
        for ($tt = 1; $tt <=$k;$tt++)
        {
            $s1 = mt_rand(0, $this->max);
            $this->n = $this->n + 1 ;
            if (mt_rand()%2==1)
            {
                $s2= $s1 *1000;
                $content = $s2." g  = ...kg ";
                $this->result[$this->n] = $content;
                $this->answer[$this->n] =$s1;
            }
            else
            {
                $content = $s1." kg  = ...g ";
                $this->result[$this->n] = $content;
                $this->answer[$this->n] =$s1*1000;
            }
        }
    }
    private function sinh2($k)
    {

        $name = array();
        $name[1]='m';
        $name[2]='dm';
        $name[2]='cm';
        for ($tt = 1; $tt <=$k;$tt++)
        {
            $s1 = mt_rand(0, $this->max);
            $s2 = $s1*10;
            $s3 = $s1*100;
            $this->n = $this->n + 1 ;
            $tmk = mt_rand()%3;
            if($tmk==0)
            {
                if (mt_rand()%2==1)
                {
                    $s2= $s1 *100;
                    $content = $s2." cm  = ...m ";
                    $this->result[$this->n] = $content;
                    $this->answer[$this->n] =$s1;
                }
                else
                {
                    $content = $s1." m  = ...cm ";
                    $this->result[$this->n] = $content;
                    $this->answer[$this->n] =$s1*100;
                }
            }
            else
            {
                if($tmk==1)
                {
                    if (mt_rand()%2==1)
                    {
                        $s2= $s1 *10;
                        $content = $s2." dm  = ...m ";
                        $this->result[$this->n] = $content;
                        $this->answer[$this->n] =$s1;
                    }
                    else
                    {
                        $content = $s1." m  = ...dm ";
                        $this->result[$this->n] = $content;
                        $this->answer[$this->n] =$s1*10;
                    }
                }
                else
                {
                    if (mt_rand()%2==1)
                    {
                        $s2= $s1 *10;
                        $content = $s1." dm  = ...cm ";
                        $this->result[$this->n] = $content;
                        $this->answer[$this->n] =$s1*10;
                    }
                    else
                    {
                        $s2=$s1*10;
                        $content = $s2." cm  = ...dm ";
                        $this->result[$this->n] = $content;
                        $this->answer[$this->n] =$s1;
                    }
                }
            }

        }
    }
    private function sinh3($k)
    {

        $name = array();
        $name[1]='m^2';
        $name[2]='dm^2';
        $name[2]='cm^2';
        for ($tt = 1; $tt <=$k;$tt++)
        {
            $s1 = mt_rand(0, $this->max);
            $s2 = $s1*10;
            $s3 = $s1*100;
            $this->n = $this->n + 1 ;
            $tmk = mt_rand()%3;
            if($tmk==0)
            {
                if (mt_rand()%2==1)
                {
                    $s2= $s1 *10000;
                    $content = $s2." cm^2  = ...m^2 ";
                    $this->result[$this->n] = $content;
                    $this->answer[$this->n] =$s1;
                }
                else
                {
                    $content = $s1." m^2  = ...cm^2 ";
                    $this->result[$this->n] = $content;
                    $this->answer[$this->n] =$s1*10000;
                }
            }
            else
            {
                if($tmk==1)
                {
                    if (mt_rand()%2==1)
                    {
                        $s2= $s1 *100;
                        $content = $s2." dm^2  = ...m^2 ";
                        $this->result[$this->n] = $content;
                        $this->answer[$this->n] =$s1;
                    }
                    else
                    {
                        $content = $s1." m^2  = ...dm^2 ";
                        $this->result[$this->n] = $content;
                        $this->answer[$this->n] =$s1*100;
                    }
                }
                else
                {
                    if (mt_rand()%2==1)
                    {
                        $s2= $s1 *10;
                        $content = $s1." dm^2  = ...cm^2 ";
                        $this->result[$this->n] = $content;
                        $this->answer[$this->n] =$s1*100;
                    }
                    else
                    {
                        $s2=$s1*100;
                        $content = $s2." cm^2  = ...dm^2 ";
                        $this->result[$this->n] = $content;
                        $this->answer[$this->n] =$s1;
                    }
                }
            }

        }
    }
    private function sinh4($k)
    {

        $name = array();
        $name[1]='m^2';
        $name[2]='dm^2';
        $name[2]='cm^2';
        for ($tt = 1; $tt <=$k;$tt++)
        {
            $s1 = mt_rand(0, $this->max);
            $s2 = $s1*10;
            $s3 = $s1*100;
            $this->n = $this->n + 1 ;
            $tmk = mt_rand()%3;
            if($tmk==0)
            {
                if (mt_rand()%2==1)
                {
                    $s2= $s1 *10000;
                    $content = $s2." cm^2  = ...m^2 ";
                    $this->result[$this->n] = $content;
                    $this->answer[$this->n] =$s1;
                }
                else
                {
                    $content = $s1." m^2  = ...cm^2 ";
                    $this->result[$this->n] = $content;
                    $this->answer[$this->n] =$s1*10000;
                }
            }
            else
            {
                if($tmk==1)
                {
                    if (mt_rand()%2==1)
                    {
                        $s2= $s1 *100;
                        $content = $s2." dm^2  = ...m^2 ";
                        $this->result[$this->n] = $content;
                        $this->answer[$this->n] =$s1;
                    }
                    else
                    {
                        $content = $s1." m^2  = ...dm^2 ";
                        $this->result[$this->n] = $content;
                        $this->answer[$this->n] =$s1*100;
                    }
                }
                else
                {
                    if (mt_rand()%2==1)
                    {
                        $s2= $s1 *10;
                        $content = $s1." dm^2  = ...cm^2 ";
                        $this->result[$this->n] = $content;
                        $this->answer[$this->n] =$s1*100;
                    }
                    else
                    {
                        $s2=$s1*100;
                        $content = $s2." cm^2  = ...dm^2 ";
                        $this->result[$this->n] = $content;
                        $this->answer[$this->n] =$s1;
                    }
                }
            }

        }
    }
    public function sinhBai($id)
    {
        $this->result = array();
        $this->n = 0;
        $item = DB::table('dailuong')
            ->where('id','=',$id)
            ->get();
        $item = $item[0];
        $this->max = $item->num_max;

        switch ($item->type)
        {
            case 1: $this->Sinh1(8);
                    break;
            case 2: $this->Sinh2(8);
                    break;
            case 3: $this->Sinh3(8);
                    break;
            default: $this->Sinh4(8);
                    break;
        }
        $this->result[0]= $this->n;
        $this->answer[0]= $this->n;
        $data['question'] = json_encode($this->result);
        $data['answer'] = json_encode($this->answer);
        return ($data);
    }
}
