<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\News_type;
use App\News;
use Auth;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $data=news_type::take(20)->get();
        return view('admin.news.index',compact('data'));
       
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            session()->flash('idoffice',Auth::guard('admin')->user()->idoffice);
         return  view('admin.news.create',['url' => 'newslist','idct' => 0,'data' => false]);
 //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        print_r( $request->all() );
             
             
/*
            foreach ($request->multiselect as $key => $value) {
               echo  $value;
            }


            $item = new news;
            $item -> idctty= $request->input('idctty');
            $item -> namectty= $request->input('namectty');
            $item -> colorct= $request->input('colorct');
            $item -> iconct= $request->input('iconct');
            $item -> created_at= $request->input('created_at');
            $item -> updated_at= $request->input('updated_at');
            $item->save();
*/
     //return redirect('newstype');
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
