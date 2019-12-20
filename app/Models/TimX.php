<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TimX extends Model
{
    public $table='timx';
    private $max;
    private $answer=array();

    public $result = array();
    public $n = 0;
    public function Sinh1($k)
    {


        for ($tt = 1; $tt <=$k;$tt++)
        {
            $s1 = mt_rand(0, $this->max);
            $s2 = mt_rand(0, $this->max);
            $s3 = $s1 + $s2;
            $this->n = $this->n + 1 ;
            if (mt_rand()%2===1)
            {
                $content = " X + ".$s2." = ".$s3;
                $this->answer[$this->n] =$s1;
            }
            else
            {
                $content = $s1." + X = ".$s3;
                $this->answer[$this->n] =$s2;
            }
            $this->result[$this->n] = $content;
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
            $s3 = $s1-$s2;
            $this->n = $this->n + 1 ;
            if (mt_rand()%2===1)
            {
                $content = " X - ".$s2." = ".$s3;
                $this->answer[$this->n] =$s1;
            }
            else
            {
                $content = $s1." - X = ".$s3;
                $this->answer[$this->n] =$s2;
            }
            $this->result[$this->n] = $content;
        }
    }
    public function Sinh3($k)
    {
        for ($tt = 1; $tt <=$k;$tt++)
        {
            $s1 = mt_rand(1, $this->max);
            $s2 = mt_rand(1, $this->max);
            $s3 = $s1*$s2;
            $this->n = $this->n + 1 ;
            if (mt_rand()%2===1)
            {
                $content = " X x ".$s2." = ".$s3;
                $this->answer[$this->n] =$s1;
            }
            else
            {
                $content = $s1." x X = ".$s3;
                $this->answer[$this->n] =$s2;
            }
            $this->result[$this->n] = $content;
        }
    }
    public function Sinh4($k)
    {
        for ($tt = 1; $tt <=$k;$tt++)
        {
            $s1 = mt_rand(1, $this->max);
            $s2 = mt_rand(1, $this->max);
            $s3 = $s1 * $s2;
            $this->n = $this->n + 1 ;
            $ttk=mt_rand()%3;
            if ($ttk==1)
            {
                $content = " X : ".$s2." = ".$s1;
                $this->answer[$this->n] =$s3;
            }
            else if($ttk==0)
            {
                $content = $s3." : X = ".$s2;
                $this->answer[$this->n] =$s1;
            }
            else
            {
                $content = $s3." : X = ".$s1;
                $this->answer[$this->n] =$s2;
            }
            $this->result[$this->n] = $content;
        }
    }
    public function sinhBai($id)
    {
        $this->result = array();
        $this->n = 0;
        /* echo "hi";*/
        $item = DB::table('timx')
            ->where('id','=',$id)
            ->get();
        $item = $item[0];
        $this->max = $item->num_max;


        switch ($item->type)
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
        }
        $this->result[0]= $this->n;
        $this->answer[0]= $this->n;
        $data['question'] = json_encode($this->result);
        $data['answer'] = json_encode($this->answer);

        return ($data);
    }
}
