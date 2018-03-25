@extends('admin.home')
@section('title','ระบบควบคุมหลักประกันเงินกู้ แบบรวมศูนย์ ออนไลน์')
@section('header')
  <a href='{{url('fundtype')}}' ><i class="fa  fa-home  text-Primary" style="font-size:25px"></i></a>
   แก้ไขรายละเอียดงานฌาปนกิจ
 @endsection
@section('content')


{{ $url}}
<form class="form-horizontal" method="post" action="{{url( $url )}}">
      @if( $idpc != 0)
           <input type="hidden" name="_method" value="PUT" />
      @endif
           <input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="form-group has-success">
           <label class="col-sm-2 control-label">idpc</label>
    <div class="col-sm-10">
             <input type="text" class="form-control" name="idpc" placeholder="idpc" value="{{ $data ? $data->idpc : old('idpc') }}">
             {!! $errors->first('idpc') !!}
    </div>
</div>

<div class="form-group has-success">
           <label class="col-sm-2 control-label">idoffice</label>
    <div class="col-sm-10">
             <input type="text" class="form-control" name="idoffice" placeholder="idoffice" value="{{ $data ? $data->idoffice : old('idoffice') }}">
             {!! $errors->first('idoffice') !!}
    </div>
</div>

<div class="form-group has-success">
           <label class="col-sm-2 control-label">ทะเบียน</label>
    <div class="col-sm-10">
             <input type="text" class="form-control" name="member_no" placeholder="ทะเบียน" value="{{ $data ? $data->member_no : old('member_no') }}">
             {!! $errors->first('member_no') !!}
    </div>
</div>

<div class="form-group has-success">
           <label class="col-sm-2 control-label">ชื่อ - นามสกุล</label>
    <div class="col-sm-10">
             <input type="text" class="form-control" name="memb_name" placeholder="ชื่อ -  นามสกุล" value="{{ $data ? $data->memb_name : old('memb_name') }}">
             {!! $errors->first('memb_name') !!}
    </div>
</div>

<div class="form-group has-success">
           <label class="col-sm-2 control-label">หน่วย</label>
    <div class="col-sm-10">
             <input type="text" class="form-control" name="membgroup" placeholder="หน่วย" value="{{ $data ? $data->membgroup : old('membgroup') }}">
             {!! $errors->first('membgroup') !!}
    </div>
</div>

<div class="form-group has-success">
           <label class="col-sm-2 control-label">วันที่เป็นสามัคร</label>
    <div class="col-sm-10">
             <input type="text" class="form-control" name="MEMBER_DATE" placeholder="วันที่เป็นสามัคร" value="{{ $data ? $data->MEMBER_DATE : old('MEMBER_DATE') }}">
             {!! $errors->first('MEMBER_DATE') !!}
    </div>
</div>

<div class="form-group has-success">
           <label class="col-sm-2 control-label">วันเดือนปีเกิด</label>
    <div class="col-sm-10">
             <input type="text" class="form-control" name="birth_date" placeholder="วันเดือนปีเกิด" value="{{ $data ? $data->birth_date : old('birth_date') }}">
             {!! $errors->first('birth_date') !!}
    </div>
</div>

<div class="form-group has-success">
           <label class="col-sm-2 control-label">เพศ</label>
    <div class="col-sm-10">
             <input type="text" class="form-control" name="SEX" placeholder="เพศ" value="{{ $data ? $data->SEX : old('SEX') }}">
             {!! $errors->first('SEX') !!}
    </div>
</div>

<div class="form-group has-success">
           <label class="col-sm-2 control-label">สถานะภาพ</label>
    <div class="col-sm-10">
             <input type="text" class="form-control" name="MARIAGE" placeholder="สถานะภาพ" value="{{ $data ? $data->MARIAGE : old('MARIAGE') }}">
             {!! $errors->first('MARIAGE') !!}
    </div>
</div>

<div class="form-group has-success">
           <label class="col-sm-2 control-label">ชื่อคู่สมรส</label>
    <div class="col-sm-10">
             <input type="text" class="form-control" name="MATE_NAME" placeholder="ชื่อคู่สมรส" value="{{ $data ? $data->MATE_NAME : old('MATE_NAME') }}">
             {!! $errors->first('MATE_NAME') !!}
    </div>
</div>

<div class="form-group has-success">
           <label class="col-sm-2 control-label">เบอร์โทรศัพท์</label>
    <div class="col-sm-10">
             <input type="text" class="form-control" name="TEL" placeholder="เบอร์โทรศัพท์" value="{{ $data ? $data->TEL : old('TEL') }}">
             {!! $errors->first('TEL') !!}
    </div>
</div>

<div class="form-group has-success">
           <label class="col-sm-2 control-label">มือถือ</label>
    <div class="col-sm-10">
             <input type="text" class="form-control" name="TELMOBILE" placeholder="มือถือ" value="{{ $data ? $data->TELMOBILE : old('TELMOBILE') }}">
             {!! $errors->first('TELMOBILE') !!}
    </div>
</div>

<div class="form-group has-success">
           <label class="col-sm-2 control-label">E-MAIL</label>
    <div class="col-sm-10">
             <input type="text" class="form-control" name="EMAIL_ADDRESS" placeholder="E-MAIL" value="{{ $data ? $data->EMAIL_ADDRESS : old('EMAIL_ADDRESS') }}">
             {!! $errors->first('EMAIL_ADDRESS') !!}
    </div>
</div>

<div class="form-group has-success">
           <label class="col-sm-2 control-label">บัตรประชาชน</label>
    <div class="col-sm-10">
             <input type="text" class="form-control" name="CARD_PERSON" placeholder="บัตรประชาชน" value="{{ $data ? $data->CARD_PERSON : old('CARD_PERSON') }}">
             {!! $errors->first('CARD_PERSON') !!}
    </div>
</div>

<div class="form-group has-success">
           <label class="col-sm-2 control-label">ตำแหน่ง</label>
    <div class="col-sm-10">
             <input type="text" class="form-control" name="POSITION" placeholder="ตำแหน่ง" value="{{ $data ? $data->POSITION : old('POSITION') }}">
             {!! $errors->first('POSITION') !!}
    </div>
</div>

<div class="form-group has-success">
           <label class="col-sm-2 control-label">เงินเดือน</label>
    <div class="col-sm-10">
             <input type="text" class="form-control" name="SALARY" placeholder="เงินเดือน" value="{{ $data ? $data->SALARY : old('SALARY') }}">
             {!! $errors->first('SALARY') !!}
    </div>
</div>

<div class="form-group has-success">
           <label class="col-sm-2 control-label">สถานะสมาชิก</label>
    <div class="col-sm-10">
             <input type="text" class="form-control" name="MEMBER_STATUS" placeholder="สถานะสมาชิก" value="{{ $data ? $data->MEMBER_STATUS : old('MEMBER_STATUS') }}">
             {!! $errors->first('MEMBER_STATUS') !!}
    </div>
</div>

<div class="form-group has-success">
           <label class="col-sm-2 control-label">วันเดือนปีลาออก</label>
    <div class="col-sm-10">
             <input type="text" class="form-control" name="RESIGN_DATE" placeholder="วันเดือนปีลาออก" value="{{ $data ? $data->RESIGN_DATE : old('RESIGN_DATE') }}">
             {!! $errors->first('RESIGN_DATE') !!}
    </div>
</div>

<div class="form-group has-success">
           <label class="col-sm-2 control-label">ที่อยู่</label>
    <div class="col-sm-10">
             <input type="text" class="form-control" name="address" placeholder="ที่อยู่" value="{{ $data ? $data->address : old('address') }}">
             {!! $errors->first('address') !!}
    </div>
</div>





<div class="form-group">
           <div class="col-sm-offset-2 col-sm-10">
               <button type="submit" class="btn btn-primary">บันทึก</button>
          </div>
    </div>
</form>

@endsection

