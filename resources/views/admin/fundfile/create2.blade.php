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

  <form action="{{url('fundfile/action')}}" method="post"  enctype="multipart/form-data">

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
        <?php $datasc=DB::table('fundfiletype')->get();?>
              <select name="idfiletype" class="form-control">
              @foreach ($datasc as $datasc1 )
                  <option value="<?php echo $datasc1->idfiletype?>"<?php if (!(strcmp($datasc1->idfiletype,2))) {echo "selected=\"selected\"";} ?>><?php echo $datasc1->namefile?></option>
              @endforeach
              </select>


      </div>
</div>

<div class="form-group has-success">
             <label class="col-sm-2 control-label">mbmember</label>
      <div class="col-sm-10">
               <input type="text" class="form-control" name="mbmember" placeholder="mbmember" value=" {{ Request::input('mbmember') }}">
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
             <label class="col-sm-2 control-label">ผู้บันทึกข้อมูล</label>
      <div class="col-sm-10">
               <input type="text" class="form-control  name="keydata" placeholder="keydata" value="{{ $data ? $data->keydata : Auth::guard('admin')->user()->fname .' | '.Auth::guard('admin')->user()->idoffice.'|'.date('d-m-').( date('Y')+543 ) .' | ' . date('H:i:s')  }}">


      </div>
</div>

<div class="form-group has-success">
             <label class="col-sm-2 control-label">กรุณาเลือกประเภทและไฟล์ที่ต้องการ Upload</label>
      <div class="col-sm-10">
                       <input type="file" name="uploader" id="uploader" />
      </div>
</div>

<div class="form-group">
             <div class="col-sm-10">
                <button class="btn btn-success btn-xs" type="submit" name = "btn-upload" title="Upload image"><i class="fa fa-upload " ></i> Upload</button>
            </div>
</div>
  </form>
@endsection

@section('javascript')


@endsection
