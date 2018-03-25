<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\images;

class UploadController extends Controller
{
        public function getIndex(){
              $images = images::get();
        return view('admin.uploadfile.index',['images' => $images]);
    }

    public function postAction(Request $request){
        if($request->exists('btn-upload')){
            $file = $request->file('uploader');
            $path = 'file/uploads';
            $fullName = $file->getClientOriginalName();

      			$onlyName = explode('.',$fullName);
      			$newfilename=date('YmdHmmss').'.'.$onlyName[1];
            $file->move('images/uploads',$newfilename);
            $image = new Images;
            $image->image_name = $newfilename;
            $image->save();
            echo 'Uploaded';

        }
        return redirect()->back();
    }

}
