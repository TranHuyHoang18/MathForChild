<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ChusoModel extends Model
{
    public $table = 'chuso';
    private $max;
    private $n =0;
    private $result =array();
    private $answer =array();
    private function sinh($k)
    {

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
            $s =(string)$s1;

            $tk = mt_rand(1,strlen($s));
            $content = "Chữ số ở vị trí hàng ".$name[$tk] ." của số ".$s1." là : ";
            $this->n = $this->n + 1 ;
            $this->result[$this->n] = $content;
            $this->answer[$this->n] = $s[strlen($s)-$tk];



        }
    }
    public function sinhBai($id)
    {
        $this->result = array();
        $this->n = 0;
        $item1 = DB::table('chuso')
            ->where('id','=',$id)
            ->get();
        $item = $item1[0];
        $this->max = $item->num_max;

        $this->sinh(10);
        $this->result[0]= $this->n;
        $this->answer[0]= $this->n;
        $data['question'] = json_encode($this->result);
        $data['answer'] = json_encode($this->answer);
        return ($data);
    }
}
