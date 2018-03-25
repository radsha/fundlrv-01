<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\fundincomeRequest;
use App\Fundtype;
use App\Fund;
use App\Fundincome;
use Request as Req;
use DB;
use Auth;
class fundviewController extends Controller
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
        return view('admin.fundview.index',compact('data','msg','datafund'));
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id=Req::input('mbid');
        $data2=fund::where('mbid', $id)->first();
          return view('admin.fundview.create',['url'=>'fundview','inid'=>0,'data'=>false,'data2'=>$data2]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(fundincomeRequest $request)
    {


              print_r( $request->all() );
              /*
              F_fundtype_d_l::insert($input);
              return redirect('fundtype_d');
              */
              $item = new fundincome;
              $item -> inid= $request->input('inid');
              $item -> mbid= $request->input('mbid');
              $item -> idoffice= $request->input('idoffice');
              $item -> mbmember= $request->input('mbmember');
              $item -> fundid= $request->input('fundid');
              $item -> numbook1= $request->input('numbook1');
              $item -> numbook2= $request->input('numbook2');
              $item -> payment1= $request->input('payment1');
              $item -> payment2= $request->input('payment2');
              $item -> payment3= $request->input('payment3');
              $item -> payment4= $request->input('payment4');
              $item -> mdate= $request->input('mdate');
              $item -> paytype= $request->input('paytype');
              $item -> typepayid= $request->input('typepayid');
              $item -> inmemo= $request->input('inmemo');
              $item -> samano= $request->input('samano');
              $item -> keydata= $request->input('keydata');
              $item->save();
              $request->session()->flash('status','บันทึก');
              //ค้นหาเล่ม
              $datalink=DB::table('book')->where('fundid',$request->input('fundid'))->where('booksta',1)->where('bookoffice',Auth::guard('admin')->user()->idoffice)->first();
              $fundidlink=$datalink->fundidlink;
          //อัพเดท
              DB::table('book')->where('fundidlink',$fundidlink)->where('booksta',1)->where('bookoffice',Auth::guard('admin')->user()->idoffice)->increment('booklast');

              return redirect('fundview/'.$request->input('mbid'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=fundincome::where('mbid',$id)->get();
        $data2=fund::where('mbid', $id)->first();
        return view('admin.fundview.show',compact('data','data2'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $item=fundincome::where('inid', $id)->first();
        $mbid=$item->mbid;
        $data2=fund::where('mbid', $mbid)->first();
        if(!$item) return false;
      return view('admin.fundview.create',['url'=>'fundview/'.$id,'inid'=>$id,'data'=>$item,'data2'=>$data2]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(fundincomeRequest $request, $id)
    {
      echo '<pre>'
      , print_r( $request->all())
      ,'</pre>';
      $item =  fundincome::where('inid', $id)->first();
      $item -> inid= $request->input('inid');
      $item -> mbid= $request->input('mbid');
      $item -> idoffice= $request->input('idoffice');
      $item -> mbmember= $request->input('mbmember');
      $item -> fundid= $request->input('fundid');
      $item -> numbook1= $request->input('numbook1');
      $item -> numbook2= $request->input('numbook2');
      $item -> payment1= $request->input('payment1');
      $item -> payment2= $request->input('payment2');
      $item -> payment3= $request->input('payment3');
      $item -> payment4= $request->input('payment4');
      $item -> mdate= $request->input('mdate');
      $item -> paytype= $request->input('paytype');
      $item -> typepayid= $request->input('typepayid');
      $item -> inmemo= $request->input('inmemo');
      $item -> samano= $request->input('samano');
      $item -> keydata= $request->input('keydata');
      $item->save();
      $request->session()->flash('status','บันทึก');
      return redirect('fundview/'.$request->input('mbid'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
      fundincome::where('inid',$id)->delete();
      //$request->session()->flash('status1','บันทึก');
      return redirect()->back();

    }
}
