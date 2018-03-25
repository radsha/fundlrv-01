<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fundstatus extends Model
{
    //
	protected $table = 'fundstatus';
    protected $primaryKey = 'statusid';
/*
		public static function getfundidd($fundid,$idoffice){
				$data=fundtype_de::where('fundid',$fundid)->where('idoffice', $idoffice)->first();
				//print_r($data);
				return $data ? $data->fundidd:'0' ;
			}
*/
}
