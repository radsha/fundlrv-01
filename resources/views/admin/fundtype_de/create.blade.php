@extends('admin.home')
@section('title','ระบบควบคุมหลักประกันเงินกู้ แบบรวมศูนย์ ออนไลน์(กำหนดรายละเอียด)')
@section('header')
  <a href='{{url('fundtype')}}' ><i class="fa  fa-home  text-Primary" style="font-size:25px"></i></a>
   รายละเอียดงานฌาปนกิจ (กำหนดรายละเอียด)
 @endsection
@section('content')
<form class="form-horizontal" method="post" action="{{url( $url )}}">
        @if( $id != 0)
             <input type="hidden" name="_method" value="PUT" />
        @endif
             <input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group has-success">
             <label class="col-sm-2 control-label">ชื่อฌาปนกิจ</label>
      <div class="col-sm-10">
               <input type="text" class="form-control" name="fundname" placeholder="fundidd" value="{{ App\Fundtype::getnamefund(Request::input('fundid')) }}">

      </div>
</div>



<div class="form-group has-success">
             <label class="col-sm-2 control-label">เลขที่บัญชีสหกรณ์</label>
      <div class="col-sm-10">
               <input type="text" class="form-control" name="accsaha" placeholder="เลขที่บัญชีสหกรณ์" value="{{ $data ? $data->accsaha : old('accsaha') }}">
               {!! $errors->first('accsaha') !!}
      </div>
</div>

<div class="form-group has-success">
             <label class="col-sm-2 control-label">หลักค้ำประกัน</label>
      <div class="col-sm-10">
               <input type="text" class="form-control" name="numpay" placeholder="หลักค้ำประกัน" value="{{ $data ? $data->numpay : old('numpay') }}">
               {!! $errors->first('numpay') !!}
      </div>
</div>

<div class="form-group has-success">
             <label class="col-sm-2 control-label">เหรัญญิก/ผู้จัดการ</label>
      <div class="col-sm-10">
               <input type="text" class="form-control" name="moneyname" placeholder="เหรัญญิก/ผู้จัดการ" value="{{ $data ? $data->moneyname : old('moneyname') }}">
               {!! $errors->first('moneyname') !!}
      </div>
</div>

<div class="form-group has-success">
             <label class="col-sm-2 control-label">ลายมือชื่อ</label>
      <div class="col-sm-10">
               <input type="text" class="form-control" name="signature" placeholder="ลายมือชื่อ" value="{{ $data ? $data->signature : old('signature') }}">
               {!! $errors->first('signature') !!}
      </div>
</div>

<div class="form-group has-success">
             <label class="col-sm-2 control-label">fundid</label>
      <div class="col-sm-10">
               <input type="text" class="form-control" name="fundid" placeholder="fundid" value="{{ Request::input('fundid')}}">

      </div>
</div>

<div class="form-group has-success">
             <label class="col-sm-2 control-label">idoffice</label>
      <div class="col-sm-10">
               <input type="text" class="form-control" name="idoffice" placeholder="idoffice" value="{{Auth::guard('admin')->user()->idoffice}}">

      </div>
</div>

<div class="form-group">
             <div class="col-sm-offset-2 col-sm-10">
                 <button type="submit" class="btn btn-primary">บันทึก</button>
            </div>
      </div>
</form>
@endsection
