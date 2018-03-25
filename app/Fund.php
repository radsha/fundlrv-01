<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class fund extends Model
{
    //
		protected $table = 'fund';
    protected $primaryKey = 'mbid';

//สถานะการสมัคร
		public static function getapply($fundid,$mbmember){
			$data=fund::where('fundid',$fundid)->where('mbmember', $mbmember)->first();
				//print_r($data);
			return $data ? $data->mbstatus:'0' ;
		}

			//ตรวจสอบ สามัญ
		public static function getapplylink($fundid,$mbmember){
			$data=fund::where('fundid',$fundid)->where('mbmember', $mbmember)->first();
				//print_r($data);
			return $data ? $data->mbstatus:'0' ;
		}
			//ตรวจสอบ mbid
		public static function getmbid($fundid,$mbmember){
			$data=fund::where('fundid',$fundid)->where('mbmember', $mbmember)->first();
						//print_r($data);
			return $data ? $data->mbid:'0' ;
		}
	//ตรวจสอบ samano
		public static function getsamono($fundid,$mbmember){
			$data=fund::where('fundid',$fundid)->where('mbmember', $mbmember)->first();
						//print_r($data);
			return $data ? $data->samano:'0' ;
		}

		//ตรวจสอบ samano
			public static function getfund($fundid,$mbstatus){
				$data=fund::where('fundid',$fundid)->where('mbstatus', $mbstatus)->where('idoffice', Auth::guard('admin')->user()->idoffice)->count();
							//print_r($data);
				return $data ? $data:'0' ;
			}


}
