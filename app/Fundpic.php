<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fundpic extends Model
{

  protected $table = 'fundpic';
  protected $primaryKey = 'idpic';

  public static function getfundgaint($id){
      $data=fundgaint::where('samano',$id)->get();
      //print_r($data);
      return $data ? $data:'0' ;
    }

}
