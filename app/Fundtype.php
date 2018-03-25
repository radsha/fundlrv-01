<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fundtype extends Model
{

    protected $table = 'fundtype';
    protected $primaryKey = 'fundid';

    public static function getnamefund($fundid){
				$data=fundtype::where('fundid',$fundid)->first();
				return $data ? $data->fundname."(".$data->fundname2.")" :'no' ;
			}

      public static function getnamefund2($fundid){
  				$data=fundtype::where('fundid',$fundid)->first();
  				return $data ? $data->fundname2 :'no' ;
  			}

    public static function gettypefund($id){
          $data=fundtype::where('fundid',$id)->first();
          return $data ? $data->fundtype:'no';
    }

    public static function getfundidlink($id){
          $data=fundtype::where('fundid',$id)->first();
          return $data ? $data->fundidlink:'no';
    }

}
