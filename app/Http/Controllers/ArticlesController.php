<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ArticlesController extends Controller
{

  public function Index(){
    return "This is PageController@getIndex";
  }

  public function Show() {
    return "This is PageController@getShow ";
  }


}
