<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\News_bookRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\news_book;

class News_bookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin.newsbook.create',['url' => 'newsbook','bookid' => 0,'data' => false]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(news_bookRequest $request)
    {       
            print_r( $request->all() );
            $item = new news_book;
            $item -> bookid= $request->input('bookid');
            $item -> bookyear= $request->input('bookyear');
            $item -> bookname= $request->input('bookname');
            $item -> booklast= $request->input('booklast');
            $item -> booksta= $request->input('booksta');
            $item -> bookoffice= $request->input('bookoffice');
            $item -> keydata= $request->input('keydata');
            $item -> idctty= $request->input('idctty');
            $item->save();
            return redirect('newstype/'.$request->input('idctty'));
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
        $item = news_book::where('bookid', $id)->first();
        if( !$item ) return false;
        return  view('admin.newsbook.create',['url' => 'newsbook/'. $id ,'bookid' => $id , 'data' => $item]);
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
        
            print_r( $request->all() );

            $item = news_book::where('bookid',$id)->first();
            $item -> bookid= $request->input('bookid');
            $item -> bookyear= $request->input('bookyear');
            $item -> bookname= $request->input('bookname');
            $item -> booklast= $request->input('booklast');
            $item -> booksta= $request->input('booksta');
            $item -> bookoffice= $request->input('bookoffice');
            $item -> keydata= $request->input('keydata');
            $item -> idctty= $request->input('idctty');
            $item->save();
            return redirect('newstype/'.$request->input('idctty'));
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
