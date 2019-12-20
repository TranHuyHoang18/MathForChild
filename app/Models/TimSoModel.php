<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TimSoModel extends Model
{
    public $table='timso';
    private $max;
    private $n =0;
    private $result =array();
    private $answer =array();
    private function sinh($k)
    {
        /*echo"ss";
        echo $k;*/
        /*echo $this->max."<br>";*/
        $name = array();
        $name[1]='đơn vị';
        $name[2]='chục';
        $name[3]='trăm';
        $name[4]='nghìn';
        $name[5]='chục nghìn';
        $name[6]='trăm nghìn';
        for ($tt = 1; $tt <=$k;$tt++)
        {

            $s1 = mt_rand(0, $this->max);
            $s1=1212;
            $s =(string)$s1;
            /* echo $s."---";
             echo strlen($s)."---";*/
            $tk = mt_rand(1,strlen($s));
            $s2 = "Chữ số ở vị trí hàng ".$name[$tk] ." của số ".$s1." là : ";
            $arr = array('1' => '', '2' => $s2, '3' => '');
            $this->n = $this->n + 1 ;
            $this->result[$this->n] = json_encode($arr);
            $this->answer[$this->n] = $s[strlen($s)-$tk];


            /*  echo (json_encode($arr)."<br>");*/
        }
    }
    public function sinhBai($id)
    {
        $this->result = array();
        $this->n = 0;
        /* echo "hi";*/
        $item = DB::table('timso')
            ->where('id','=',$id)
            ->get();
        $item = $item[0];
        $this->max = $item->num_max;

        $this->sinh(10);
        $this->result[0]= $this->n;
        $this->answer[0]= $this->n;
        $data['question'] = json_encode($this->result);
        $data['answer'] = json_encode($this->answer);
        exit();
        return ($data);
    }

}
