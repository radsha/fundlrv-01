<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\fundgaintRequest;
use App\Fund;
use App\Fundtype;
use App\Fundgaint;
use Request as Req;



class fundgaintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request){

       $keywords = $request->input('keywords');
            if (!$keywords) {
              $data=fund::take(20)->get();
            } else {
              $data=fund::where('fname','like', '%'.$keywords.'%')->orWhere('mbmember','like', '%'.$keywords.'%')->take(20)->get();
            }
            if (count($data)<=0) {
                  $msg=0;
            } else {
                  $msg=1;
            }

        //ชื่อกองทุน
          $datafund=fundtype::all();
        return view('admin.fundgaint.index',compact('data','msg','datafund'));
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $mbid=Req::input('mbid');
          $data2=fund::where('mbid', $mbid)->first();

        return view('admin.fundgaint.create',['url'=>'fundgaint','glid'=>0,'data'=>false,'data2'=>$data2]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(fundgaintRequest $request)
     {


               print_r( $request->all() );
               /*
               F_fundtype_d_l::insert($input);
               return redirect('fundtype_d');
               */
               $item = new fundgaint;
               $item -> glid= $request->input('glid');
               $item -> glname= $request->input('glname');
               $item -> glpinid= $request->input('glpinid');
               $item -> gladdress= $request->input('gladdress');
               $item -> glbdate= $request->input('glbdate');
               $item -> glno= $request->input('glno');
               $item -> mbmember= $request->input('mbmember');
               $item -> idoffice= $request->input('idoffice');
               $item -> keydata= $request->input('keydata');
               $item -> samano= $request->input('samano');
               $item -> created_at= $request->input('created_at');
               $item -> updated_at= $request->input('updated_at');

               $item->save();
               $request->session()->flash('status','บันทึก');

                //?mbid=22178&samano=68827&fundid=3&mbmember=02208&keywords=
               return redirect('fundgaint/'.$request->input('mbid').'?samano='.$request->input('samano').'&fundid='.$request->input('fundid').'&mbmember='.$request->input('mbmember').'&keywords='.$request->input('keywords'));
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show($id)
     {
        //  $keywords = $request->input('keywords');
          $samano=Req::input('samano');
          $data2=fund::where('mbid', $id)->first();
          $data=fundgaint::where('samano',$samano)->get();

         return view('admin.fundgaint.show',compact('data','data2'));
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit($id)
     {

         $item=fundgaint::where('glid', $id)->first();
         $mbid=Req::input('mbid');
         $data2=fund::where('mbid', $mbid)->first();
         if(!$item) return false;
       return view('admin.fundgaint.create',['url'=>'fundgaint/'.$id,'glid'=>$id,'data'=>$item,'data2'=>$data2]);
     }

     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function update(fundgaintRequest $request, $id)
     {
       echo '<pre>'
       , print_r( $request->all())
       ,'</pre>';

       $item =  fundgaint::where('glid', $id)->first();

       $item -> glid= $request->input('glid');
       $item -> glname= $request->input('glname');
       $item -> glpinid= $request->input('glpinid');
       $item -> gladdress= $request->input('gladdress');
       $item -> glbdate= $request->input('glbdate');
       $item -> glno= $request->input('glno');
       $item -> mbmember= $request->input('mbmember');
       $item -> idoffice= $request->input('idoffice');
       $item -> keydata= $request->input('keydata');
       $item -> samano= $request->input('samano');
       $item -> created_at= $request->input('created_at');
       $item -> updated_at= $request->input('updated_at');

       $item->save();
       $request->session()->flash('status','บันทึก');
       return redirect('fundgaint/'.$request->input('mbid').'?samano='.$request->input('samano').'&fundid='.$request->input('fundid').'&mbmember='.$request->input('mbmember').'&keywords='.$request->input('keywords'));
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function delete($id){
       fundgaint::where('glid',$id)->delete();
       return redirect()->back();
     }

}
