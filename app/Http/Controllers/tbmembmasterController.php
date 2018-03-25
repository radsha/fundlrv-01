<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\tbmembmasterRequest;
use App\Tbmembmaster;
use Request as Req;
use App\Lib;


class tbmembmasterController extends Controller
{
            public function index(Request $request){

              $keywords = $request->input('keywords');
                if (!$keywords) {
                    $data=tbmembmaster::take(20)->get();
                } else {
                    $data=tbmembmaster::where('memb_name','like', '%'.$keywords.'%')->orWhere('member_no','like', '%'.$keywords.'%')->take(10)->get();
               }
               if (count($data)<=0) {
				              $msg=0;
               } else {
                  $msg=1;
               }
               return view('admin.member.index_fund',compact('data','msg'));
          }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
     public  function create() {
        return  view('admin.member.create',['url' => 'member','idpc' => 0,'data' => false]);
     }


    public function store(tbmembmasterRequest $request){

        //print_r( $request->all() );
     //   print_r($request->input('member_date')."<br>");
     //   print_r(Lib::dayen1($request->input('member_date')));

    $item = new tbmembmaster;

    $item -> idpc= $request->input('idpc');
    $item -> idoffice= $request->input('idoffice');
    $item -> member_no=$request->input('member_no');
    $item -> memb_name= $request->input('memb_name');
    $item -> membgroup= $request->input('membgroup');
    $item -> member_date=Lib::dayen1($request->input('member_date'));
    $item -> birth_date=Lib::dayen1($request->input('birth_date'));
    $item -> sex= $request->input('sex');
    $item -> mariage= $request->input('mariage');
    $item -> mate_name= $request->input('mate_name');
    $item -> tel= $request->input('tel');
    $item -> telmobile= $request->input('telmobile');
    $item -> email_address= $request->input('email_address');
    $item -> card_person= $request->input('card_person');
    $item -> position= $request->input('position');
    $item -> salary= $request->input('salary');
    $item -> member_status= $request->input('member_status');
    $item -> resign_date=Lib::dayen1($request->input('resign_date'));
    $item -> address= $request->input('address');
    $item -> visit_mb= $request->input('visit_mb');
    $item -> visitday_mb= $request->input('visitday_mb');
    $item -> filename_pic= $request->input('filename_pic');
    $item -> created_at= $request->input('created_at');
    $item -> updated_at= $request->input('updated_at');
    $item->save();
   //  dd($item);
    $request->session()->flash('status','1');

    return redirect('member');
    }

    public function edit($id){
      $item = Tbmembmaster::where('idpc', $id)->first();
      if( !$item ) return false;
      return  view('admin.member.create',['url' => 'member/'. $id ,'idpc' => $id , 'data' => $item ]);

    }

    public function update( tbmembmasterRequest $request, $id){
      echo '<pre>'
      , print_r( $request->all()),'</pre>';

    $item = tbmembmaster::where('idpc', $id)->first();
    $item -> idpc= $request->input('idpc');
    $item -> idoffice= $request->input('idoffice');
    $item -> member_no=$request->input('member_no');
    $item -> memb_name= $request->input('memb_name');
    $item -> membgroup= $request->input('membgroup');
    $item -> member_date=Lib::dayen1($request->input('member_date'));
    $item -> birth_date=Lib::dayen1($request->input('birth_date'));
    $item -> sex= $request->input('sex');
    $item -> mariage= $request->input('mariage');
    $item -> mate_name= $request->input('mate_name');
    $item -> tel= $request->input('tel');
    $item -> telmobile= $request->input('telmobile');
    $item -> email_address= $request->input('email_address');
    $item -> card_person= $request->input('card_person');
    $item -> position= $request->input('position');
    $item -> salary= $request->input('salary');
    $item -> member_status= $request->input('member_status');
    $item -> resign_date=Lib::dayen1($request->input('resign_date'));
    $item -> address= $request->input('address');
    $item -> visit_mb= $request->input('visit_mb');
    $item -> visitday_mb= $request->input('visitday_mb');
    $item -> filename_pic= $request->input('filename_pic');
    $item -> created_at= $request->input('created_at');
    $item -> updated_at= $request->input('updated_at');
    $item->save();
    //dd($item);
    $request->session()->flash('status','1');
    return redirect('member');
    }

    public function delete($id){
             tbmembmaster::where('idpc',$id)->delete();
      return redirect()->back();
    }





}
