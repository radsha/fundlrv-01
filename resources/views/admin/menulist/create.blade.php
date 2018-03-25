@extends('admin.home')
@section('title','ระบบควบคุมหลักประกันเงินกู้ แบบรวมศูนย์ ออนไลน์')
@section('header')
  <a href='{{url('fundtype')}}' ><i class="fa  fa-home  text-Primary" style="font-size:25px"></i></a>
   แก้ไขรายละเอียดงานฌาปนกิจ
 @endsection
@section('content')
{{ $url}}
    <form class="form-horizontal"  method="post" action="{{url( $url )}}">

	@if( $id != 0)
    <input type="hidden" name="_method" value="PUT" />
	@endif

    <input type="hidden" name="_token" value="{{ csrf_token() }}">


        <div class="form-group has-success">
            <label  class="col-sm-2 control-label">ชื่อฌาปนกิจ</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control" name="fundname" placeholder="ชื่อฌาปนกิจ" value="{{ $data ? $data->fundname : old('fundname') }}">
                  {!! $errors->first('fundname') !!}
               </div>
        </div>

        <div class="form-group has-success">
            <label  class="col-sm-2 control-label">ชื่อย่อ</label>
            <div class="col-sm-10">
                <input type="text" class="form-control has-success" name="fundname2" placeholder="ชื่อย่อ"value="{{ $data ? $data->fundname2 : old('fundname') }}" >
                  {!! $errors->first('fundname') !!}
            </div>
        </div>

        <div class="form-group has-success">
                    <label class="col-sm-2 control-label">เลขที่บัญชีสมาคม</label>
             <div class="col-sm-10">
                      <input type="text" class="form-control" name="accsama" placeholder="เลขที่บัญชีสมาคม" value="{{ $data ? $data->accsama : old('accsama') }}">
                      {!! $errors->first('accsama') !!}
             </div>
       </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary"> บันทึก</button>
            </div>
        </div>
    </form>

@endsection
