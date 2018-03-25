<?php

	namespace App\Http\Controllers;

	use Illuminate\Http\Request;

	use App\Http\Requests;

	class PageController extends Controller
	{

		public function getIndex(){
			return "This is PageController@Index";
		}

		public function getShow($id) {
			return "This is PageController@Show ".$id;
		}

		public function getAbout() {
			$first ='Alice';
			$last  ='Abernathy';
			$skill =['Html5','Jquery','Bootstap','Laravel'];
			return  view ('page.about',$skill)	;

		}

		public function getContact() {
			return  view ('page.contact');
		}

	}
