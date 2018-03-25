<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\fundRequest;
use App\Tbmembmaster;
use App\Fundtype;
use App\Fund;
use Request as Req;
use App\Lib;

class fundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 
     public function index(Request $request){

       $keywords = $request->input('keywords');
            if (!$keywords) {
              $data=tbmembmaster::take(10)->get();
            } else {
              $data=tbmembmaster::where('memb_name','like', '%'.$keywords.'%')->orWhere('member_no','like', '%'.$keywords.'%')->take(10)->get();
            }
            if (count($data)<=0) {
                  $msg=0;
            } else {
                  $msg=1;
            }
        //ชื่อกองทุน
          $datafund=fundtype::all();
        return view('admin.fund.index',compact('data','msg','datafund'));
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin.fund.create',['url' => 'fund','mbid' => 0,'data' => false]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(fundRequest $request)
    {
      print_r( $request->all() );
      /*
      F_fundtype_l::insert($input);
      return redirect('fundtype');
      */
          $item = new fund;
          $item -> mbid= $request->input('mbid');
          $item -> mbmember= $request->input('mbmember');
          $item -> idoffice= $request->input('idoffice');
          $item -> fundid= $request->input('fundid');
          $item -> mbapply=Lib::dayen1($request->input('mbapply'));
          $item -> mbresign= Lib::dayen1($request->input('mbresign'));
          $item -> mbprotech= Lib::dayen1($request->input('mbprotech'));
          $item -> fundrelaid= $request->input('fundrelaid');
          $item -> mbstatus= $request->input('mbstatus');
          $item -> mbmemo= $request->input('mbmemo');
          $item -> keydata= $request->input('keydata');
          $item -> round= $request->input('round');
          $item -> pbody= $request->input('pbody');
          $item -> dbody= $request->input('dbody');
          $item -> samano= $request->input('samano');
          $item -> pay= $request->input('pay');
          $item -> fundtypeid= $request->input('fundtypeid');
          $item -> fname= $request->input('fname');
          $item->save();
          $msg2=1;

     return redirect('fund');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          $mbmember =Req::Input('mbmember');
          $data=fund::where('mbmember',$mbmember )->where('fundid',$id)->get();
          return view('admin.fund.create1',compact('id','data','mbmember'));
    }


    public function edit($id)
    {
          $item = fund::where('mbid', $id)->first();
          if( !$item ) return false;
          return  view('admin.fund.create',['url' => 'fund/'. $id ,'mbid' => $id , 'data' => $item,'mbmember'=>$item->mbmember ]);
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
      echo '<pre>'
      , print_r( $request->all()),'</pre>';

      $item =  fund::where('mbid', $id)->first();
      $item -> mbid= $request->input('mbid');
      $item -> mbmember= $request->input('mbmember');
      $item -> idoffice= $request->input('idoffice');
      $item -> fundid= $request->input('fundid');
      $item -> mbapply=Lib::dayen1($request->input('mbapply'));
      $item -> mbresign= Lib::dayen1($request->input('mbresign'));
      $item -> mbprotech= Lib::dayen1($request->input('mbprotech'));
      $item -> fundrelaid= $request->input('fundrelaid');
      $item -> mbstatus= $request->input('mbstatus');
      $item -> mbmemo= $request->input('mbmemo');
      $item -> keydata= $request->input('keydata');
      $item -> round= $request->input('round');
      $item -> pbody= $request->input('pbody');
      $item -> dbody= $request->input('dbody');
      $item -> samano= $request->input('samano');
      $item -> pay= $request->input('pay');
      $item -> fundtypeid= $request->input('fundtypeid');
      $item -> fname= $request->input('fname');
    //  print_r( $item->mbapply);
      $item->save();
    return redirect('fund');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function delete($id){
            fund::where('mbid',$id)->delete();
      return redirect()->back();
        } 
}
