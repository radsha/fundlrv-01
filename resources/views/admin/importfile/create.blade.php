@extends('admin.home')
@section('title','ระบบควบคุมหลักประกันเงินกู้ แบบรวมศูนย์ ออนไลน์')
@section('header')
  <a href='{{url('fundfile/'.Request::input('mbid').'?samano='.Request::input('samano').'&fundid='.Request::input('fundid').'&mbmember='.Request::input('mbmember').'&keywords='.Request::input('keywords'))}}' ><i class="fa fa-arrow-circle-left text-danger" style="font-size:25px"></i></a>
   แก้ไขรายละเอียดไฟล์เอกสาร
 @endsection
@section('content')



  <form class="form-horizontal" method="post" action="{{url( $url )}}"  enctype="multipart/form-data">
          @if( $idfile != 0)
               <input type="hidden" name="_method" value="PUT" />
          @endif
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">

                 <input type="text" class="form-control" name="idfile" placeholder="idfile" value="{{ $idfile  }}">
                 <input type="text" class="form-control" name="idimp" placeholder="mbid" value="{{ Request::input('idimp') }}">
                 <input type="text" class="form-control" name="idoffice" placeholder="idoffice" value="{{Auth::guard('admin')->user()->idoffice  }}">

  <div class="form-group has-success">
                <label class="col-sm-2 control-label">กรุณาเลือกไฟล์</label>
                <div class="col-sm-10">
                <input type="file" name="filename" id="filename" />
              </div>
  </div>

    <div class="form-group has-success">
               <label class="col-sm-2 control-label">keydata</label>
                <div class="col-sm-10">
                 <input type="text" class="form-control" name="keydata" placeholder="keydata"  value="{{ $data ? $data->keydata : Auth::guard('admin')->user()->fname .' | '.Auth::guard('admin')->user()->idoffice.'|'.date('d-m-').(date('Y')+543).' | '.date('H:i:s')  }}">
               </div>
  </div>


  <div class="form-group">
               <div class="col-sm-offset-2 col-sm-10">
                   <button type="submit" class="btn btn-primary">บันทึก</button>
              </div>
        </div>


  </form>

@endsection

@section('javascript')


@endsection
