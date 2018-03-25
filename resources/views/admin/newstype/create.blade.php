@extends('admin.home')
@section('title','ระบบควบคุมหลักประกันเงินกู้ แบบรวมศูนย์ ออนไลน์')
@section('header')
  <a href='{{url('booktype')}}' ><i class="fa  fa-arrow-circle-left text-Primary fa-1x" ></i></a>
  การกำหนดประเภทเอกสาร
 @endsection
@section('content')
  <form class="form-horizontal" method="post" action="{{url( $url )}}">
          @if( $idctty != 0)
               <input type="hidden" name="_method" value="PUT" />
          @endif
               <input type="hidden" name="_token" value="{{ csrf_token() }}">

  <div class="form-group has-success">
               <label class="col-sm-2 control-label">ลำดับที่</label>
        <div class="col-sm-10">
                 <input type="text" class="form-control" name="idctty" placeholder="Auto" value="{{ $data ? $data->idctty : old('idctty') }}">
        </div>
  </div>

  <div class="form-group has-success">
               <label class="col-sm-2 control-label">ประเภท</label>
        <div class="col-sm-10">
                 <input type="text" class="form-control" name="namectty" placeholder="ประเภท" value="{{ $data ? $data->namectty : old('namectty') }}">
                 {!! $errors->first('namectty') !!}
        </div>
  </div>

  <div class="form-group has-success">
               <label class="col-sm-2 control-label">สี</label>
        <div class="col-sm-10">
                 <input type="text" class="form-control" name="colorct" placeholder="colorct" value="{{ $data ? $data->colorct : old('colorct') }}">
                 {!! $errors->first('colorct') !!}
        </div>
  </div>

  <div class="form-group has-success">
               <label class="col-sm-2 control-label">ไอคอน</label>
        <div class="col-sm-10">
                 <input type="text" class="form-control" name="iconct" placeholder="iconct" value="{{ $data ? $data->iconct : old('iconct') }}">
                 {!! $errors->first('iconct') !!}
        </div>
  </div>


  <div class="form-group">
               <div class="col-sm-offset-2 col-sm-10">
                   <button type="submit" class="btn btn-primary">บันทึก</button>
              </div>
        </div>
  </form>

@endsection
