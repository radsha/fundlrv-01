<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fundincome extends Model
{
    //
		protected $table = 'fundincome';
    protected $primaryKey = 'inid';

		public static function getapply55($fundid,$mbmember){
				$data=fund::where('fundid',$fundid)->where('mbmember', $mbmember)->first();
				//print_r($data);
				return $data ? $data->mbstatus:'0' ;
			}

}
