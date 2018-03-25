<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    //
	protected $table = 'book';
    protected $primaryKey = 'bookid';

		public static function getapply($fundid,$mbmember){
			$data=fund::where('fundid',$fundid)->where('mbmember', $mbmember)->first();
				//print_r($data);
			return $data ? $data->mbstatus:'0' ;
		}


}
