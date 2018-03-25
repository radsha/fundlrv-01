<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class AuthController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		if(!Auth::guest()){return redirect('index');
      //Auth::guard('admin')->logout();
      return redirect('index');
		}else{
			//echo 'GUEST!!';
		}
  //  echo '<pre>', print_r(Auth::guard('admin')->user() ), '</pre>';
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //  echo'<pre>',print_r($request->all()),'</pre>';
		$user = $request->input('email');
		$password = $request->input('password');
		$username 	= ['username' => $user, 'password' => $password];
		if( Auth::guard('admin')->attempt($username)){
      $level = Auth::guard('admin')->user()->levelg;
      if( $level == 'P'){
        $redirect = 'indexadmin';
      }else{
        $redirect = 'indexadmin';
      }
      //echo 'Login true';
    //  echo '<pre>', print_r( Auth::guard('admin')->user() ), '</pre>';
		return redirect( $redirect );
		}else{
			return redirect()->back()->withErrors(['error' => 'Username หรือ password ไม่ถูกต้อง โปรดลองใหม่อีกครั้ง']);
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
