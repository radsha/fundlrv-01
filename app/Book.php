<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Book extends Model
{
   	    protected $table = 'book';
        protected $primaryKey = 'bookid';

        public static function getnumbook1($id){
    			$data=book::where('fundidlink',$id)->where('booksta',1)->where('bookoffice',Auth::guard('admin')->user()->idoffice)->first();
    			return $data ? $data->bookname:'0' ;
    		}

        public static function getfundidlink($id){
    			$data=book::where('fundidlink',$id)->where('booksta',1)->where('bookoffice',Auth::guard('admin')->user()->idoffice)->first();
    			return $data ? $data->bookname:'0' ;
    		}

        public static function getnumbook2($id){
    			$data=book::where('fundidlink',$id)->where('booksta',1)->where('bookoffice',Auth::guard('admin')->user()->idoffice)->first();
    			return $data ? $data->booklast:'0' ;
    		}


}
