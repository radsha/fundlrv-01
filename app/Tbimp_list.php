<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tbimp_list extends Model
{

  protected $table = 'tbimp_list';
  protected $primaryKey = 'idimp';

  public static function getfundgaint($id){
      $data=fundgaint::where('samano',$id)->get();
      //print_r($data);
      return $data ? $data:'0' ;
    }

}
