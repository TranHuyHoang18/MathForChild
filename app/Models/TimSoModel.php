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
        $name = array();
       $data=array();
       $an = array();
       $data[1]= 'Số lớn nhất có 2 chữ số là :';$an[1]=99;
       $data[2]= 'Số lớn nhất có 2 chữ số khác là :';$an[2]=98;
       $data[3]= 'Số nhỏ nhất có 2 chữ số là :';$an[3]=10;
       $data[4]= 'Số nhỏ nhất có 2 chữ số giống nhau là :';$an[4]=11;
       $data[5]= 'Số nhỏ nhất có 2 chữ số khác nhau là :';$an[5]=10;
       $data[6]= 'Số lớn nhất có 1 chữ số là :';$an[6]=9;
       $data[7]= 'Số nhỏ nhất có 1 chữ số là :';$an[7]=0;
       $data[8]= 'Số lớn nhất có 3 chữ số là :';$an[8]=999;
       $data[9]= 'Số lớn nhất có 3 chữ số khác nhau là :';$an[9]=987;
       $data[10]= 'Số nhỏ nhất có 3 chữ số khác nhau là :';$an[10]=102;
       $data[11]= 'Số nhỏ nhất có 3 chữ số giống nhau là :';$an[11]=111;
        for ($tt = 1; $tt <=$k;$tt++)
        {

            $ck = mt_rand(1,11);
            $this->n = $this->n + 1 ;
            $content = $data[$ck];
            $this->result[$this->n] = $content;
            $this->answer[$this->n] =$an[$ck];
        }
    }
    public function sinhBai($id)
    {
        $this->result = array();
        $this->n = 0;
        $item = DB::table('timso')
            ->where('id','=',$id)
            ->get();
        $item = $item[0];
        $this->max = $item->num_max;

        $this->sinh(4);
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
