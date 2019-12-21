<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HinhHocModel extends Model
{
    public $table='hinhhoc';
    private $max;
    private $answer=array();
    public $result = array();
    public $n = 0;
    public function Sinh1($k)
    {
        $tamgiac=array();
        $ans_tg=array();
        $tamgiac[1]='có 4 que diêm xếp được hình tối đa bao nhiêu hình tam giác? ';
        $ans_tg[1]=3;
        $tamgiac[2]='có 3 que diêm xếp được hình tối đa bao nhiêu hình tam giác? ';
        $ans_tg[2]=1;
        $tamgiac[3]='có 2 que diêm xếp được hình tối đa bao nhiêu hình tam giác? ';
        $ans_tg[3]=0;
        $tamgiac[4]='có 5 que diêm xếp được hình tối đa bao nhiêu hình tam giác? ';
        $ans_tg[4]=5;
        for ($tt = 1; $tt <=$k;$tt++)
        {
            $s1 = mt_rand(1,4);
            $content = $tamgiac[$s1];
            $this->n = $this->n + 1 ;
            $this->result[$this->n] = $content;
            $this->answer[$this->n] =$ans_tg[$s1];
        }
    }
    public function Sinh2($k)
    {
        $hinhchunhat=array();
        $ans_cn=array();
        $hinhchunhat[1]='có 4 que diêm xếp được hình tối đa bao nhiêu hình chữ nhật? ';
        $ans_cn[1]=1;
        $hinhchunhat[2]='có 5 que diêm xếp được hình tối đa bao nhiêu hình chữ nhật? ';
        $ans_cn[2]=3;
        $hinhchunhat[3]='có 3 que diêm xếp được hình tối đa bao nhiêu hình chữ nhật? ';
        $ans_cn[3]=0;
        $hinhchunhat[4]='có 6 que diêm xếp được hình tối đa bao nhiêu hình chữ nhật? ';
        $ans_cn[4]=9;
        for ($tt = 1; $tt <=$k;$tt++)
        {
            $s1 = mt_rand(1,4);
            $content = $hinhchunhat[$s1];
            $this->n = $this->n + 1 ;
            $this->result[$this->n] = $content;
            $this->answer[$this->n] =$ans_cn[$s1];
        }
    }
    public function sinhBai($id)
    {
        $this->result = array();
        $this->n = 0;
        $item = DB::table('hinhhoc')
            ->where('id','=',$id)
            ->get();
        $item = $item[0];
        $this->max = $item->num_max;

        switch ($item->type)
        {
            case 1:$this->sinh1(1);
                break;
            default:$this->sinh2(1);
            break;
        }
        $this->result[0]= $this->n;
        $this->answer[0]= $this->n;
        $data['question'] = json_encode($this->result);
        $data['answer'] = json_encode($this->answer);
        /*echo"<pre>";
        print_r($data);
        echo"</pre>";
        exit();*/
        return ($data);
    }
}
