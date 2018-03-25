<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fundstatus extends Model
{
   	  protected $table = 'fundstatus';
      protected $primaryKey = 'statusid';


      public static function getfundstatus($id){
  				$data=fundstatus::where('statusid',$id)->first();
  				//print_r($data);
  				return $data ? '<i class="fa '.$data->icon.' text-success" style="font-size:15px;color:'.$data->color.'"></i>':'fa-smile-o' ;
  			}

}
