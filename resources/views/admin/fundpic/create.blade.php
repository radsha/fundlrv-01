@extends('admin.home')
@section('title','ระบบควบคุมหลักประกันเงินกู้ แบบรวมศูนย์ ออนไลน์')
@section('header')
  <a href='{{url('fundfile/'.Request::input('mbid').'?samano='.Request::input('samano').'&fundid='.Request::input('fundid').'&mbmember='.Request::input('mbmember').'&keywords='.Request::input('keywords'))}}' ><i class="fa fa-arrow-circle-left text-danger" style="font-size:25px"></i></a>
   แก้ไขรายละเอียดไฟล์เอกสาร
 @endsection
@section('content')

  <div class="alert-warning text-center" >
      <label class=".col-md-2 ">ทะเบียน สมาคม</label>
      <label class=".col-md-2 form-control-static text-primary"> {{$data2->samano}}</label>
      <label class=".col-md-2 ">ชื่อ - นามสกุล สมาคม</label>
      <label class=".col-md-2 form-control-static text-primary"> {{$data2->fname}}</label>
      <label class=".col-md-2 ">ความสัมพันธ์ </label>
      <label class=".col-md-2 form-control-static text-primary"> {{App\Fundrela::getnamerela($data2->fundrelaid)}}</label>
      <label class=".col-md-2 ">ทะเบียน สอ.</label>
      <label class=".col-md-2 form-control-static text-primary"> {{$data2->mbmember}}</label>
      <label class=".col-md-2 control-label">ชื่อ - นามสุกล สอ.</label>
      <label class=".col-md-2 form-control-static text-primary"> {{ App\Tbmembmaster::getnamemember($data2->mbmember)}}</label>
  </div>

  <form class="form-horizontal" method="post" action="{{url( $url )}}"  enctype="multipart/form-data">
          @if( $idfile != 0)
               <input type="hidden" name="_method" value="PUT" />
          @endif
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="form-group has-success">
               <label class="col-sm-2 control-label">idfile</label>
        <div class="col-sm-10">
                 <input type="text" class="form-control" name="idfile" placeholder="idfile" value="{{ $data ? $data->idfile : old('idfile') }}">
                 {!! $errors->first('idfile') !!}
        </div>
  </div>

  <div class="form-group has-success">
               <label class="col-sm-2 control-label">mbid</label>
        <div class="col-sm-10">
                 <input type="text" class="form-control" name="mbid" placeholder="mbid" value="{{ Request::input('mbid') }}">
                 {!! $errors->first('mbid') !!}
        </div>
  </div>

  <div class="form-group has-success">
               <label class="col-sm-2 control-label">idfiletype</label>
        <div class="col-sm-10">
                 <input type="text" class="form-control" name="idfiletype" placeholder="idfiletype" value="{{ 1 }}">
                 {!! $errors->first('idfiletype') !!}
        </div>
  </div>

  <div class="form-group has-success">
               <label class="col-sm-2 control-label">mbmember</label>
        <div class="col-sm-10">
                 <input type="text" class="form-control" name="mbmember" placeholder="mbmember" value="{{ Request::input('mbmember') }}">
                 {!! $errors->first('mbmember') !!}
        </div>
  </div>

  <div class="form-group has-success">
               <label class="col-sm-2 control-label">idoffice</label>
        <div class="col-sm-10">
                 <input type="text" class="form-control" name="idoffice" placeholder="idoffice" value="{{Auth::guard('admin')->user()->idoffice  }}">
                 {!! $errors->first('idoffice') !!}
        </div>
  </div>

  <div class="form-group has-success">
               <label class="col-sm-2 control-label">fundid</label>
        <div class="col-sm-10">
                 <input type="text" class="form-control" name="fundid" placeholder="fundid" value="{{Request::input('fundid') }}">
                 {!! $errors->first('fundid') !!}
        </div>
  </div>







  <div class="form-group has-success">
               <label class="col-sm-2 control-label">keydata</label>
        <div class="col-sm-10">
                 <input type="text" class="form-control" name="keydata" placeholder="keydata"  value="{{ $data ? $data->keydata : Auth::guard('admin')->user()->fname .' | '.Auth::guard('admin')->user()->idoffice.'|'.date('d-m-').(date('Y')+543).' | '.date('H:i:s')  }}">

        </div>
  </div>



  <div class="form-group has-success">
               <label class="col-sm-2 control-label">กรุณาเลือกไฟล์</label>
        <div class="col-sm-10">
   <input type="file" name="filename" id="filename" />
        </div>
  </div>

  <div class="form-group">
               <div class="col-sm-offset-2 col-sm-10">
                   <button type="submit" class="btn btn-primary">บันทึก</button>
              </div>
        </div>

        <input type="text" class="form-control" name="samano" placeholder="samano"  value="{{  Request::input('samano')  }}">

  </form>

@endsection

@section('javascript')


@endsection
