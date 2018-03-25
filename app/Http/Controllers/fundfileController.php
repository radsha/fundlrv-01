<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\fundfileRequest;
use App\Fund;
use App\Fundtype;
use App\Fundfile;
use Request as Req;
use DB;
use File;
use Image;

class fundfileController extends Controller
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
        return view('admin.fundfile.index',compact('data','msg','datafund'));
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

        return view('admin.fundfile.create',['url'=>'fundfile','idfile'=>0,'data'=>false,'data2'=>$data2]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(fundfileRequest $request)
     {


                  print_r( $request->all() );

                   $file = $request->file('filename');
                   $path = 'fileuploads/file';
                   $fullName = $file->getClientOriginalName();

                  $onlyName = explode('.',$fullName);
                  $newfilename=$request->input('fundid').'_'.$request->input('mbid').'_'.date('dmY_Hmmss').'.'.$onlyName[1];
                  $file->move($path,$newfilename);

                  $item = new fundfile;
                   $item -> idfile= $request->input('idfile');
                   $item -> mbid= $request->input('mbid');
                   $item -> idfiletype= $request->input('idfiletype');
                   $item -> mbmember= $request->input('mbmember');
                   $item -> idoffice= $request->input('idoffice');
                   $item -> fundid= $request->input('fundid');
                   $item -> filedate= date('Y-m-d');
                   $item -> filename=   $newfilename;
                   $item -> filenamet= 'T'.$newfilename;
                   $item -> keydata= $request->input('keydata');

                   $item->save();
                   $request->session()->flash('status','บันทึก');

                //?mbid=22178&samano=68827&fundid=3&mbmember=02208&keywords=
              return redirect('fundfile/'.$request->input('mbid').'?samano='.$request->input('samano').'&fundid='.$request->input('fundid').'&mbmember='.$request->input('mbmember').'&keywords='.$request->input('keywords'));
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
           $data=DB::table('fundfile')->join('fundfiletype','fundfile.idfiletype','=','fundfiletype.idfiletype')->where('fundfile.mbid',$id)->get();

         return view('admin.fundfile.show',compact('data','data2'));
     }

    /**
     * Show the form for editing the specified resource.

     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function delete($id){
       $row=fundfile::where('idfile',$id)->first();
       @File::delete('fileuploads/file/'. $row->filename);
       $row->delete();



       return redirect()->back();
     }




}
