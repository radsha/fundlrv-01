<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fundfiletype extends Model
{

  protected $table = 'fundfiletype';
  protected $primaryKey = 'idfiletype';

  public static function  getnamemember($id){
      $data=tbmembmaster::where('member_no',$id)->first();
      return $data ? $data->memb_name :'ไม่พบข้อมูล' ;
    }

    public static function option($selected=''){
      $opt=1;
    /*
  		$rows = fundfiletype::all();
  		$opt = '';
  		if($rows){
  			foreach($rows as $row){
  				$opt .= '<option value="'. $row->id .'" '. ( $row->id == $selected ? 'selected' : '' ) .'>'. $row->namefile .'</option>'."\n\t";
  			}
  		}
      */
  		return $opt;
  	}

}
