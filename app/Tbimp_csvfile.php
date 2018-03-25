<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tbimp_csvfile extends Model
{

  protected $table = 'tbimp_csvfile';
  protected $primaryKey = 'idfile';

  public static function getfundgaint($id){
      $data=fundgaint::where('samano',$id)->get();
      //print_r($data);
      return $data ? $data:'0' ;
    }

}
