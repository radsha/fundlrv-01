<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\News_type;
use App\News_book;

use App\Http\Requests\News_typeRequest;
use Request as Req;

class News_typeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $vyear=$request->input('vyear');
        $data=news_type::take(10)->get();
        return view('admin.newstype.index',compact('data','vyear'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return  view('admin.newstype.create',['url' => 'newstype','idctty' => 0,'data' => false]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(News_typeRequest $request)
    {
       
        print_r( $request->all() );
      /*
      F_fundtype_l::insert($input);
      return redirect('fundtype');
      */
            $item = new news_type;
            $item -> idctty= $request->input('idctty');
            $item -> namectty= $request->input('namectty');
            $item -> colorct= $request->input('colorct');
            $item -> iconct= $request->input('iconct');
            $item -> created_at= $request->input('created_at');
            $item -> updated_at= $request->input('updated_at');
            $item->save();

     return redirect('newstype');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          
          $data2=news_type::where('idctty',$id)->first();
          $data=news_book::where('idctty',$id)->get();      
          return view('admin.newstype.show',compact('id','data2','data'));
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
          $item = News_type::where('idctty', $id)->first();
          if( !$item ) return false;
          return  view('admin.newstype.create',['url' => 'newstype/'. $id ,'idctty' => $id , 'data' => $item ]);

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

            $item =  News_type::where('idctty', $id)->first();
            $item -> idctty= $request->input('idctty');
            $item -> namectty= $request->input('namectty');
            $item -> colorct= $request->input('colorct');
            $item -> iconct= $request->input('iconct');
            $item -> created_at= $request->input('created_at');
            $item -> updated_at= $request->input('updated_at');
            $item->save();
    return redirect('newstype');
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
