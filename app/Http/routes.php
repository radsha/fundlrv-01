<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

	Route::get('/','starController@index');

	Route::resource('login','Admin\AuthController');

	Route::group(['middleware'=>'admin'],function(){


				Route::get('fundtype-delete/{id?}','fundtypeController@delete');
				Route::get('fundview-delete/{id?}','fundviewController@delete');
				Route::get('fundgaint-delete/{id?}','fundgaintController@delete');
				Route::get('fundfile-delete/{id?}','fundfileController@delete');
				Route::get('fundpic-delete/{id?}','fundpicController@delete');
				Route::get('member-delete/{id?}','tbmembmasterController@delete');
				Route::get('fund-delete/{id?}','fundController@delete');
				//เอกสาร
				Route::resource('newslist', 'NewsController');
				Route::resource('newstype', 'News_typeController');
				Route::resource('newsbook', 'News_bookController');

				//ผู้รับผล
				Route::resource('fundgaint','fundgaintController');
				//ไฟล์
				Route::resource('fundfile','fundfileController');
				//รูป
				Route::resource('fundpic','fundpicController');
				//การชำระเงิน
				Route::resource('fundview','fundviewController');
				//ประเภทของกองทุน
				Route::resource('fundtype','fundtypeController');
				Route::resource('fundtype_de','fundtype_deController');
				//หน้า
				Route::resource('fundstatus','fundstatusController');
				Route::resource('indexadmin','indexadminController');
				//หน้าแรก
				Route::resource('index','indexController');

			 	Route::resource('fund','fundController');
	 	 		Route::resource('import','importfileController');

				//User
				Route::resource('menulist','MenuListController');//กำหนดเมนู
				Route::resource('userlist','UserlistController');//กำหนดเมนู
				Route::get('logout','AdminController@logout');
				//สมัครสมาชิก
				Route::resource('member','tbmembmasterController');
				Route::resource('book','bookController');
				//Route::resource('Logout','bookController');
				//	AdminController
    	//	Route::controller('uploadfile','uploadfileController');
	});


?>
