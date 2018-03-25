<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fundfile extends Model
{

  protected $table = 'fundfile';
  protected $primaryKey = 'idfile';

  public static function getfundgaint($id){
      $data=fundgaint::where('samano',$id)->get();
      //print_r($data);
      return $data ? $data:'0' ;
    }

}
