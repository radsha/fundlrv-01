<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\bookRequest;
use App\Book;
use Auth;
use Request as Req;
use DB;

class bookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
            $fundid =Req::input('fundid');
            $data=book::where('fundid',$fundid )->where('bookoffice',Auth::guard('admin')->user()->idoffice)->get();
        //ชื่อกองทุน

        return view('admin.book.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return  view('admin.book.create',['url' => 'book','bookid' => 0,'data' => false]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(bookRequest $request)
    {
        //
        print_r( $request->all() );

            if ($request->input('booksta')=='1') {
              DB::table('book')->where('fundid',$request->input('fundid'))->where('bookoffice',$request->input('bookoffice'))->update(['booksta' => 2]);
            }
            $item = new book;
            $item -> bookid= $request->input('bookid');
            $item -> bookyear= $request->input('bookyear');
            $item -> bookname= $request->input('bookname');
            $item -> booklast= $request->input('booklast');
            $item -> booksta= $request->input('booksta');
            $item -> bookoffice= $request->input('bookoffice');
            $item -> keydata= $request->input('keydata');
            $item -> fundid= $request->input('fundid');
            $item -> fundidlink= $request->input('fundidlink');
            $item->save();
            
          return redirect('book/?fundid='.$request->input('fundid'));
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
        return view('admin.book.show',compact('id','data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $item = book::where('bookid', $id)->first();
      if( !$item ) return false;
      return  view('admin.book.create',['url' => 'book/'. $id ,'bookid' => $id , 'data' => $item ]);
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
          print_r( $request->all() );
          if ($request->input('booksta')=='1') {
            DB::table('book')->where('fundid',$request->input('fundid'))->where('bookoffice',$request->input('bookoffice'))->update(['booksta' => 2]);
          }
          $item =  book::where('bookid', $id)->first();
          $item -> bookid= $request->input('bookid');
          $item -> bookyear= $request->input('bookyear');
          $item -> bookname= $request->input('bookname');
          $item -> booklast= $request->input('booklast');
          $item -> booksta= $request->input('booksta');
          $item -> bookoffice= $request->input('bookoffice');
          $item -> keydata= $request->input('keydata');
          $item -> fundid= $request->input('fundid');
          $item -> fundidlink= $request->input('fundidlink');
          $item->save();
        return redirect('book/?fundid='.$request->input('fundid'));
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
