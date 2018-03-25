<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbmembmaster extends Model
{

    protected $table = 'tbmembmaster';
    protected $primaryKey = 'idpc';

    public static function  getnamemember($id){
				$data=tbmembmaster::where('member_no',$id)->first();
				return $data ? $data->memb_name :'ไม่พบข้อมูล' ;
			}


      public static function  getpinid($id){
				$data=tbmembmaster::where('member_no',$id)->first();
				return $data ? $data->card_person :'ไม่พบข้อมูล' ;
			}

      		 
    // public static function fund($fundtype){
   //       $data=fundtype::where('fundtype',$fundtype)->first();
   //       return $data ;
  //  }
}
