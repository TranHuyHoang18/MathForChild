<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DienDauModel extends Model
{
    public $table='diendau';
    private $min;
    private $max;
    private $answer=array();

    public $result = array();
    public $n = 0;
    public function Sinh1($k)
    {

        for ($tt = 1; $tt <=$k;$tt++)
        {


            $s1 = mt_rand($this->min, $this->max);
            $s2 = mt_rand($this->min, $this->max);

            $content = "Điền dấu >,<,= vào chỗ chấm : ". $s1." ...... ".$s2;
            $this->n = $this->n + 1 ;
            $this->result[$this->n] = $content;
            if ($s1 > $s2)
            {
                $this->answer[$this->n] ='>';
            }
            else if($s1<$s2)
            {
                $this->answer[$this->n] ='<';
            }
            else
                $this->answer[$this->n] ='=';
        }



    }
    public function Sinh2($k)
    {
        for ($tt = 1; $tt <=$k;$tt++)
        {
            $s1 = mt_rand(0, $this->max);
            $s2 = mt_rand(0, $this->max);
            if ($s1 < $s2) {
                $tmp = $s1;
                $s1 = $s2;
                $s2 = $tmp;
            }
            $content = $s1." - ".$s2." = ... ";

            $this->n = $this->n + 1 ;
            $this->result[$this->n] = $content;
            $this->answer[$this->n] = $s1 -$s2;
        }
    }
    public function Sinh3($k)
    {
        for ($tt = 1; $tt <=$k;$tt++)
        {
            $s1 = mt_rand(1, $this->min);
            $s2 = mt_rand(1, $this->max);
            if (mt_rand()%2===1)
            {
                $tmp = $s1;
                $s1 = $s2;
                $s2 = $tmp;
            }
            $content = $s1." x ".$s2." = ... ";

            $this->n = $this->n + 1 ;
            $this->result[$this->n] = $content;
            $this->answer[$this->n] = $s1 * $s2;
        }

    }
    public function Sinh4($k)
    {
        for ($tt = 1; $tt <=$k;$tt++)
        {
            $s1 = mt_rand(1, $this->max);
            $s2 = mt_rand(1, $this->max);
            if (mt_rand()%2===1)
            {
                $tmp = $s1;
                $s1 = $s2;
                $s2 = $tmp;
            }
            $content = $s1." : ".$s2." = ... ";
            $this->n = $this->n + 1 ;
            $this->result[$this->n] = $content;
            $this->answer[$this->n] = $s1/$s2;
        }
    }
    public function sinhBai($id)
    {
        $this->result = array();
        $this->n = 0;
        $item = DB::table('diendau')
            ->where('id','=',$id)
            ->get();
        $item = $item[0];
        $this->min = $item->num_min;
        $this->max = $item->num_max;
        $this->Sinh1(8);
        /*switch ($item->type)
        {
            case 1:
                $this->Sinh1(8);
                break;
            case 2:
                $this->Sinh1(4);
                $this->Sinh2(8);
                break;
            case 3:
                $this->Sinh1(4);
                $this->Sinh2(4);
                $this->Sinh3(8);
                break;
            default:
                $this->Sinh1(4);
                $this->Sinh2(4);
                $this->Sinh3(4);
                $this->Sinh4(8);
                break;
        }*/
        $this->result[0]= $this->n;
        $this->answer[0]= $this->n;
        $data['question'] = json_encode($this->result);
        $data['answer'] = json_encode($this->answer);

        return ($data);
    }
}
