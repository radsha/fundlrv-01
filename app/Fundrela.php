<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fundrela extends Model
{
    protected $table='fundrela';
    protected $primaryKey='fundrelaid';

      public static function getnamerela($id){
        $data=fundrela::where('fundrelaid', $id)->first();
        return $data ? $data->fundrelaname:'ไม่พบข้อมูล';

      }
}
