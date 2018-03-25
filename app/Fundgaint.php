<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fundgaint extends Model
{

  protected $table = 'fundgaint';
  protected $primaryKey = 'glid';

  public static function getfundgaint($id){
      $data=fundgaint::where('samano',$id)->get();
      //print_r($data);
      return $data ? $data:'0' ;
    }

}
