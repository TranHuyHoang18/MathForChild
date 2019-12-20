<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TinhNhanhModel extends Model
{
    public $table='tinhnhanh';
    private $num ;
    private $max;
    private $answer=array();
    public $result = array();
    public $n = 0;
    private $a =[0,10,100,1000,10000,100000,1000000,10000000,100000000];
    private $tmk=0;
    public function sinh1($k)
    {
        for ($tt = 1; $tt <=$k;$tt++)
        {
            $arr = array();
            for($t = 1;$t <=(int)($this->num/2);$t++)
            {
                $tk = mt_rand(1,$this->tmk);
                $s1 = mt_rand(1,$this->a[$tk]-1);
                $s2 = $this->a[$tk] - $s1;
                $arr[$t] = $s1;
                $arr[$this->num-$t + 1] = $s2;
            }
            if ($this->num%2==1)
            {
                $arr[(int)($this->num/2)+1] = mt_rand(0,$this->max);
            }
            $content = "Tinh nhanh tổng sau : ";
            $this->n = $this->n + 1 ;
            $this->result[$this->n] = '';
            $this->answer[$this->n] =0;
            for ($t = 1;$t<=$this->num-1;$t++)
            {
                $content = $content." ".$arr[$t]." + ";
                $this->answer[$this->n] =$this->answer[$this->n] +$arr[$t];
            }
            $content = $content." ".$arr[$this->num]." = ..... ";
            $this->answer[$this->n] =$this->answer[$this->n] +$arr[$this->num];
            $this->result[$this->n] = $content;
        }
    }
    public function sinhBai($id)
    {
        $this->result = array();
        $this->n = 0;
        $item = DB::table('tinhnhanh')
            ->where('id','=',$id)
            ->get();
        $item = $item[0];
        $this->max = $item->num_max;
        $this->num = $item->so_num;
        for ($i= 0;$i<=8;$i++)
        {
            if($this->max < $this->a[$i])
            {
                $this->tmk = $i;
                break;
            }
        }
        $this->tmk--;
        echo $this->tmk;
        echo $this->max;
        $this->sinh1(5);
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
