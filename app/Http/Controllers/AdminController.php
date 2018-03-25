<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\adminRequest;

use App\Http\Requests;
use Request as Req;
use App\Http\Controllers\Controller;
use App\User;
use Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$users = User::where('id','!=','');
		if( Req::has('keywords') ){
			$keywords = Req::input('keywords');
			$users = $users->where(function($query) use ( $keywords ){
				$keys = explode(' ', $keywords );
				foreach( $keys as $k => $key ){
					$query = $query->where('fname', 'like','%'. $key .'%')
									->orWhere('username', 'like','%'. $key .'%');
				}
			});
		}
		$users = $users->orderBy('fname')->get();
		$data = [
			'users' => $users,
			'i' 	=> 0,
			'id'	=> 0
				];
		return view('admin.users.admin',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

		$data = ['user' => false ,'id' => 0];
		return view('admin.users.form',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(adminRequest $request)
    {
		$id 		= $request->input('id');
		$user 		= new User;
		$user->fname 		= $request->input('fname');
		$user->position 	= $request->input('position');
		$user->id_office 	= $request->input('id_office');
		$user->levelg 		= $request->input('levelg');
		$user->typeu 		= $request->has('typeu') ? 1 : 0;

		if($request->input('password') != ''){
			$user->password = bcrypt($request->input('password'));
		}

		$uc = User::where('username',$request->input('username'))->first();
		if(!$uc){
			$user->username = $request->input('username');
		}else{
			return redirect()->back()->withErrors(['msg' => 'Error! Username is already in use Plest try again']);
		}

			$user->save();
			return redirect('admin/user');
    }

	public function postDelete($request){
		if($request->input('id')){
			foreach($request->input('id') as $k => $id){
				echo 'delete is '. $id;
				$this->del($id);
			}
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
		$this->del($id);
		return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$user = User::where('id',$id)->first();
		$data = ['user' => $user ,'id' => $id];
		return view('admin.users.form',$data);

	}

	public function profile()
    {
		$id 	= Auth::guard('admin')->user()->id;
		$user 	= User::where('id',$id)->first();
		$data 	= ['user' => $user ,'id' => $id];
		return view('admin.users.form',$data);

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
		if( $request->exists('btn-delete') ){
			$this->postDelete($request);
			return redirect()->back();
		}else{
			$user 		= User::where('id',$id)->first();
			$user->fname 		= $request->input('fname');
			$user->position 	= $request->input('position');
			$user->id_office 	= $request->input('id_office');
			$user->levelg 		= $request->input('levelg');
			$user->typeu 		= $request->has('typeu') ? 1 : 0;

			if($request->input('password') != ''){
				$user->password = bcrypt($request->input('password'));
			}
				$username 	= $user->username;
				$email	 	= $user->email;
				if($request->input('username') != $username){
					$c = User::where('username',$request->input('username'))->first();
					if(!$c){
						$user->username = $request->input('username');
					}else{
						return redirect()->back()->withErrors(['msg' => 'Error! Username is already in use Plest try again']);
					}
				}

			$user->save();
			//echo '<pre>',print_r($request->all()),  '</pre>';
			return redirect('admin/user');
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $this->del($id);
		return redirect()->back();
    }

	public function del($id = 0){
		User::where('id',$id)->delete();
	}

	public function logout(){
		Auth::guard('admin')->logout();
		//Auth::logout();
		return redirect('/');
	}
}
