<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\fundpicRequest;
use App\Fund;
use App\Fundtype;
use App\Fundpic;
use Request as Req;
use DB;
use File;
use Image;

class fundpicController extends Controller
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
        return view('admin.fundpic.index',compact('data','msg','datafund'));
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

        return view('admin.fundpic.create',['url'=>'fundpic','idfile'=>0,'data'=>false,'data2'=>$data2]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(fundpicRequest $request)
     {


               print_r( $request->all() );
               /*
               F_fundtype_d_l::insert($input);
               return redirect('fundtype_d');
               */


                   $file = $request->file('filename');
                   $path = 'fileuploads/pic';
                   $fullName = $file->getClientOriginalName();

                  $onlyName = explode('.',$fullName);
                  $newfilename=$request->input('fundid').'_'.$request->input('mbid').'_'.date('dmY_Hmmss').'.'.$onlyName[1];
                 $file->move($path,$newfilename);

                  $img = Image::make($path.'/'.$newfilename);
                  $piclabel='No. '.$request->input('mbid').' Day. '.date('d-m-').(date('Y')+543);
                  $img->resize(500, null, function ($constraint) {
                      $constraint->aspectRatio();
                  });
                //  $img->text('This is a example ', 20, 100);
                  $img->text($piclabel,10,30, function($font) {
                                    $font->file('public/theme/tahomabd.ttf');
                                    $font->size(24);
                                    $font->color('#f00');
                                  //  $font->angle(45);
                                });
                  $img->save($path.'/'.'T'.$newfilename);


               $item = new fundpic;
               $item -> idpic= $request->input('idfile');
               $item -> mbid= $request->input('mbid');
               $item -> idpictype= $request->input('idfiletype');
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
               return redirect('fundpic/'.$request->input('mbid').'?samano='.$request->input('samano').'&fundid='.$request->input('fundid').'&mbmember='.$request->input('mbmember').'&keywords='.$request->input('keywords'));
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
        $data=DB::table('fundpic')->join('fundpictype','fundpic.idpictype','=','fundpictype.idtypepic')->where('fundpic.mbid',$id)->get();

         return view('admin.fundpic.show',compact('data','data2'));
     }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function delete($id){
       $row=fundpic::where('idpic',$id)->first();
      @File::delete('fileuploads/pic/'. $row->filename);
      @File::delete('fileuploads/pic/T'. $row->filename);
       $row->delete();
       return redirect()->back();
     }




}
