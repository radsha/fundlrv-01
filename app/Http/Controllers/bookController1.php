<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\bookRequest;
use App\Tbmembmaster;
use App\Booktype;
use App\ฺBook;
use Request as Req;
use App\Lib;

class bookController extends Controller
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
          $databook=booktype::all();
        return view('admin.book.index',compact('data','msg','databook'));
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin.book.create',['url' => 'book','mbid' => 0,'data' => false]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(bookRequest $request)
    {
      print_r( $request->all() );
      /*
      F_booktype_l::insert($input);
      return redirect('booktype');
      */
          $item = new book;
          $item -> mbid= $request->input('mbid');
          $item -> mbmember= $request->input('mbmember');
          $item -> idoffice= $request->input('idoffice');
          $item -> bookid= $request->input('bookid');
          $item -> mbapply=Lib::dayen1($request->input('mbapply'));
          $item -> mbresign= Lib::dayen1($request->input('mbresign'));
          $item -> mbprotech= Lib::dayen1($request->input('mbprotech'));
          $item -> bookrelaid= $request->input('bookrelaid');
          $item -> mbstatus= $request->input('mbstatus');
          $item -> mbmemo= $request->input('mbmemo');
          $item -> keydata= $request->input('keydata');
          $item -> round= $request->input('round');
          $item -> pbody= $request->input('pbody');
          $item -> dbody= $request->input('dbody');
          $item -> samano= $request->input('samano');
          $item -> pay= $request->input('pay');
          $item -> booktypeid= $request->input('booktypeid');
          $item -> fname= $request->input('fname');
          $item->save();
          $msg2=1;

     return redirect('book');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          $data=book::where('fundid',$id )->where('bookoffice',Auth::guard('admin')->user()->idoffice)->get();
          return view('admin.book.create',compact('id','data'));
    }


    public function edit($id)
    {
          $item = book::where('mbid', $id)->first();
          if( !$item ) return false;
          return  view('admin.book.create',['url' => 'book/'. $id ,'mbid' => $id , 'data' => $item,'mbmember'=>$item->mbmember ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(bookRequest $request, $id)
    {
      echo '<pre>'
      , print_r( $request->all()),'</pre>';

      $item =  book::where('mbid', $id)->first();
      $item -> mbid= $request->input('mbid');
      $item -> mbmember= $request->input('mbmember');
      $item -> idoffice= $request->input('idoffice');
      $item -> bookid= $request->input('bookid');
      $item -> mbapply=Lib::dayen1($request->input('mbapply'));
      $item -> mbresign= Lib::dayen1($request->input('mbresign'));
      $item -> mbprotech= Lib::dayen1($request->input('mbprotech'));
      $item -> bookrelaid= $request->input('bookrelaid');
      $item -> mbstatus= $request->input('mbstatus');
      $item -> mbmemo= $request->input('mbmemo');
      $item -> keydata= $request->input('keydata');
      $item -> round= $request->input('round');
      $item -> pbody= $request->input('pbody');
      $item -> dbody= $request->input('dbody');
      $item -> samano= $request->input('samano');
      $item -> pay= $request->input('pay');
      $item -> booktypeid= $request->input('booktypeid');
      $item -> fname= $request->input('fname');
    //  print_r( $item->mbapply);
      $item->save();
    return redirect('book');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function delete($id){
            book::where('mbid',$id)->delete();
      return redirect()->back();
        }
}
