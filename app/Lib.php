<?php namespace App;

use Illuminate\Http\Request;
use Request as Req;
use Closure;
use File;
use App;

class Lib {

	public static function datetime($strDate = '0000-00-00 00:00:00'){
		if($strDate == '0000-00-00 00:00:00') return false;

		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strHor= date("H",strtotime($strDate));
		$strMinute= date("i",strtotime($strDate));
		$strSeconds= date("s",strtotime($strDate));
		$strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พศจิกายน","ธันวาคม");
		$strMonthThai=$strMonthCut[$strMonth];

		return "$strDay $strMonthThai $strYear   $strHor:$strMinute";
	}
	public static function shortdate($strDate = '0000-00-00 00:00:00'){
		if($strDate == '0000-00-00 00:00:00') return false;

		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strHor= date("H",strtotime($strDate));
		$strMinute= date("i",strtotime($strDate));
		$strSeconds= date("s",strtotime($strDate));
		$strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พศจิกายน","ธันวาคม");
		$strMonthThai=$strMonthCut[$strMonth];

		return  sprintf('%02d',$strDay) ."-". sprintf('%02d',$strMonth) ."-$strYear";
	}

	public static function xTimeAgo ($oldTime) {
        $timeCalc = time() - strtotime($oldTime);

        if ($timeCalc >= (60*60*24*2)) {
            $timeType = "full";
        }else if ($timeCalc >= (60*60*24)) {
            $timeType = "d";
        }else if ($timeCalc >= (60*60)) {
            $timeType = "h";
        }else{//$timeCalc <= 60) {
            $timeType = "m";
        }


        if ($timeType == "s") {
            $timeCalc .= " seconds ago";
        }
        if ($timeType == "m") {
            $timeCalc = round($timeCalc/60) . " นาที ที่แล้ว";
        }
        if ($timeType == "h") {
            $timeCalc = round($timeCalc/60/60) . " ชั่วโมง ที่แล้ว";
        }
        if ($timeType == "d") {
            $timeCalc = round($timeCalc/60/60/24) . " วัน ที่แล้ว";
        }
		if($timeType == 'full'){
			$timeCalc = date('d/m/Y H:i',strtotime($oldTime));
		}
        return $timeCalc;
    }

	public static function datemonth($date = ''){
		if($date == '') return '-';
		$dx = explode('-',$date);
		$dm = $dx[1];
		$dy = $dx[0];
		$month = ['','01' => 'ม.ค.','02' => 'ก.พ.','03' => 'มี.ค.','04' => 'เม.ย.','05' => 'พ.ค.','06' => 'มิ.ย.','07' => 'ก.ค.','08' => 'ส.ค.','09' => 'ก.ย.','10' => 'ต.ค','11' => 'พ.ย.','12' => 'ธ.ค.'];
		return $month[$dm].' '. substr(($dy + 543),2,2);
	}

	public static function datetimeThai($strDate = ''){
		if($strDate == '0000-00-00') return false;

		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strHor= date("H",strtotime($strDate));
		$strMinute= date("i",strtotime($strDate));
		$strSeconds= date("s",strtotime($strDate));
		$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		$strMonthThai=$strMonthCut[$strMonth];

		return "$strDay $strMonthThai $strYear   $strHor:$strMinute";
	}

	public static function dateThai($strDate = ''){
		if($strDate == '0000-00-00') return false;

		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strHor= date("H",strtotime($strDate));
		$strMinute= date("i",strtotime($strDate));
		$strSeconds= date("s",strtotime($strDate));
		$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		$strMonthThai=$strMonthCut[$strMonth];

		return "$strDay $strMonthThai $strYear  ";
	}

	public static function today(){
		$strDate = date('Y-m-d H:i:s');

		$days 	= ['อาทิตย์','จันทร์','อังคาร','พุธ','พฤหัสษบดี','ศุกร์','เสาร์'];
		$day 	= date('w',strtotime($strDate));
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strHor= date("H",strtotime($strDate));
		$strMinute= date("i",strtotime($strDate));
		$strSeconds= date("s",strtotime($strDate));
		$strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พศจิกายน","ธันวาคม");
		$strMonthThai=$strMonthCut[$strMonth];

		return "วัน $days[$day] วันที่ $strDay $strMonthThai พ.ศ. $strYear";
	}

	public static function nb($a,$dec = 0){
		$a = floatval($a);
		if(empty($a)){
			return 0;
		}else{
			return $dec != 0 ? number_format($a,$dec,'.',','): number_format($a,$dec,'',',');
		}
	}
	public static function encodelink($value=''){
		$link = strtolower($value);
		$link = str_replace(' ', '-', $link);
		$link = str_replace('/', '-', $link);
		$link = str_replace('%', '-', $link);
		$link = str_replace('*', '-', $link);
		$link = str_replace('&', '-', $link);
		$link = str_replace('+', '-', $link);
		$link = str_replace('?', '-', $link);
		$link = str_replace('=', '-', $link);
		$link = str_replace('+', '-', $link);
		$link = str_replace('#', '-', $link);
		$link = str_replace(',', '-', $link);
		$link = str_replace(';', '-', $link);
		$link = str_replace('@', '', $link);
		$link = str_replace('!', '', $link);
		$link = str_replace('?', '', $link);
		$link = str_replace('<', '', $link);
		$link = str_replace('>', '', $link);
		$link = str_replace('\"', '', $link);
		return $link;
	}

	public static function decodelink($value=''){
		$link = str_replace('-', ' ', $value);
		$link = str_replace('+', '/', $link);
		return $link;
	}

	public static function monthname($m = 1){
		$strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พศจิกายน","ธันวาคม");
		return $strMonthCut[ (int)$m ];
	}

	public static function percent($number = 0, $full = 0){
		return ($number /  $full ) * 100 ;
	}

	public static function createFolder($image){
		$ex = explode('/',$image);
		$f 	= count($ex)-2;
		$path = [];
		for($i=0; $i <= $f; $i++){
			$path[] = $ex[$i];
		}
		$folder = implode('/',$path);
		//echo $folder;
		if(!file_exists($folder)){
			File::makeDirectory($folder,0777,true);
		}
	}

	public static function makeFolder($folder){
		//echo $folder;
		if(!file_exists($folder)){
			File::makeDirectory($folder,0777,true);
		}
	}

	public static function active($status = 'N'){
		return ( $status == 'Y' || $status == 1 ) ? '<i class="fa fa-check-circle color-green"></i>' : '<i class="fa fa-exclamation-circle color-red"></i>';
	}

	public static function status($status = 'N'){
		return ( $status == 'Y' || $status == 1 ) ? '<i class="fa fa-check-circle color-green"></i>' : '';
	}

	public static function linkBook($book = ''){
		if($book == '') return false;
		$ex = explode('/',$book);
		if(count($ex) > 1){
			return $book;
		}else{
			return url('public/banteedin/images/book/'. $book);
		}
	}

	public static function lang($lang = 'en'){

		$url = Req::fullUrl();
		$crlang = App::getLocale();
		$var = explode('/',$url);
		$key 	= array_search($crlang,$var);
		$var[$key] = $lang;
		$return = implode('/', $var);
		return $return;
		//echo $next($request);

	}







	public static function webname($web = null){
		return str_replace('http://','', url('/') );
	}



		public static function dayen1($add){
				if ($add!='') {
				$strd = date("d",strtotime($add));
				$strm = date("m",strtotime($add));
				$stryT = date("Y",strtotime($add));
				$stry = $stryT ;
				$str = $stry."-".$strm."-".$strd;
				} else {
				$str = '';
				}
				
				return $str;
		}

		public static function dayen2($add){
				if ($add !='') {
				$strd = date("d",strtotime($add));
				$strm = date("m",strtotime($add));
				$stryT = date("Y",strtotime($add));
				$stry = $stryT ;
				$str = $strd."-".$strm."-".$stry;
				} else {
				$str = false;
				}
				if($str=='01-01-1970'){$str='';}

				return $str;
			}

	public static function dayen($add){
			if ($add !='') {
			$strd = substr($add,0,2);
			$strm = substr($add,3,2);
			$stryT = substr($add,0,4);
			$stry = $stryT - 543;
			$str = $stry."-".$strm."-".$strd;
			} else {
			$str = '';
			}
			return $str;
	}

	public static function dayth($add){
			if ($add !='') {
			$strd = substr($add,8,2);
			$strm = substr($add,5,2);
			$stryT = substr($add,0,4);
			$stry = $stryT + 543;
			$str = $strd."-".$strm."-".$stry;
			} else {
			$str = '';
			}
			return $str;
		}



		 public static function agey($startDate )
        {
					$endDate=date('Y-m-d');
         	$startDate = strtotime($startDate);
        	$endDate = strtotime($endDate);


            $years = date('Y', $endDate) - date('Y', $startDate);

            $endMonth = date('m', $endDate);
            $startMonth = date('m', $startDate);

            // Calculate months
            $months = $endMonth - $startMonth;
            if ($months <= 0)  {
                $months += 12;
                $years--;
            }
            if ($years < 0)
                return false;

            // Calculate the days
                        $offsets = array();
                        if ($years > 0)
                            $offsets[] = $years . (($years == 1) ? ' year' : ' years');
                        if ($months > 0)
                            $offsets[] = $months . (($months == 1) ? ' month' : ' months');
                        $offsets = count($offsets) > 0 ? '+' . implode(' ', $offsets) : 'now';

                        $days = $endDate - strtotime($offsets, $startDate);
                        $days = date('z', $days);

            return $years;
        }












}
