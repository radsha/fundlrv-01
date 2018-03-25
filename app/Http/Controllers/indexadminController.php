<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\fundtypeRequest;
use App\fundtype_de;
use App\fundstatus;
use App\fundtype;

class indexadminController extends Controller
{
            public function index(){

              $data2=fundstatus::where('statusid','>', '0')->get();
          //  $data2=fundstatus::whereNotIn('statusid', [0])->get();
                $data3=fundtype::groupBy('fundidlink')->get();
                //dd($data2);
               return view('admin.indexadmin.index_fund',compact('data2','data3'));
            }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id){

                $data=fundtype::find($id);
                return view('admin.fundtype.show',compact('data'));

     }

     public  function create(){

        return  view('admin.fundtype.create',['url' => 'fundtype','id' => 0,'data' => false]);
     }


    public function store(fundtypeRequest $request){

        print_r( $request->all() );
        /*
        F_fundtype_l::insert($input);
        return redirect('fundtype');
        */
        $item = new fundtype;
        $item->fundname = $request->input('fundname');
        $item->fundname2 = $request->input('fundname2');
        $item -> accsama = $request->input('accsama');
        $item->save();
        return redirect('fundtype');
    }

    public function edit($id){
      $item = fundtype::where('fundid', $id)->first();
      if( !$item ) return false;
      return  view('admin.fundtype.create',['url' => 'fundtype/'. $id ,'id' => $id , 'data' => $item ]);

    }

    public function update( Request $request, $id){
      echo '<pre>'
      , print_r( $request->all()),'</pre>';
      $item =  fundtype::where('fundid', $id)->first();
      $item->fundname = $request->input('fundname');
      $item->fundname2 = $request->input('fundname2');
      $item -> accsama= $request->input('accsama');
      $item->save();
      return redirect('fundtype');
    }

    public function delete($id){
      fundtype::where('fundid',$id)->delete();
      return redirect()->back();
    }

}
