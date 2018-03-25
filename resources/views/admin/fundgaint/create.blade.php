@extends('admin.home')
@section('title','ระบบควบคุมหลักประกันเงินกู้ แบบรวมศูนย์ ออนไลน์')
@section('header')
  <a href='{{url('fundview')}}' ><i class="fa  fa-home  text-Primary" style="font-size:25px"></i></a>
   แก้ไขรายละเอียดงานฌาปนกิจ
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
      {{--  <label class=".col-md-2 form-control-static text-primary"> {{ App\Tbmembmaster::getnamemember($data2->mbmember)}}</label>  --}}
  </div>

  <form class="form-horizontal" method="post" action="{{url( $url )}}">
         @if( $glid != 0)
              <input type="hidden" name="_method" value="PUT" />
         @endif
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
         <div class="form-group has-success">
                      <label class="col-sm-2 control-label">@</label>
               <div class="col-sm-10">
                        <input type="text" class="form-control" name="glid" placeholder="glid" value="{{ $data ? $data->glid : old('glid') }}">
                </div>
         </div>

         <div class="form-group has-success">
                      <label class="col-sm-2 control-label">ลำดับที่</label>
               <div class="col-sm-10">
                        <input type="text" class="form-control" name="glno" placeholder="ลำดับที่" value="{{ $data ? $data->glno : old('glno') }}">
                        {!! $errors->first('glno') !!}
               </div>
         </div>

         <div class="form-group has-success">
                      <label class="col-sm-2 control-label">ชื่อ - นามสกุล</label>
               <div class="col-sm-10">
                        <input type="text" class="form-control" name="glname" placeholder="ชื่อ - นามสกุล" value="{{ $data ? $data->glname : old('glname') }}">
                        {!! $errors->first('glname') !!}
               </div>
         </div>

         <div class="form-group has-success">
                      <label class="col-sm-2 control-label">บัตรประชาชน</label>
               <div class="col-sm-10">
                        <input type="text" class="form-control" name="glpinid" placeholder="บัตรประชาชน" value="{{ $data ? $data->glpinid : old('glpinid') }}">
                        {!! $errors->first('glpinid') !!}
               </div>
         </div>

         <div class="form-group has-success">
                      <label class="col-sm-2 control-label">ที่อยู่</label>
               <div class="col-sm-10">
                        <input type="text" class="form-control" name="gladdress" placeholder="ที่อยู่" value="{{ $data ? $data->gladdress : old('gladdress') }}">
                        {!! $errors->first('gladdress') !!}
               </div>
         </div>

         <div class="form-group has-success">
                      <label class="col-sm-2 control-label">วันที่</label>
               <div class="col-sm-10">
                        <input type="text" class="form-control" name="glbdate" placeholder="glbdate" value="{{ $data ? $data->glbdate : old('glbdate') }}">
                        {!! $errors->first('glbdate') !!}
               </div>
         </div>



         <div class="form-group has-success">
                      <label class="col-sm-2 control-label">mbmember</label>
               <div class="col-sm-10">
                        <input type="text" class="form-control" name="mbmember" placeholder="mbmember" value="{{ Request::input('mbmember')}}">
                        {!! $errors->first('mbmember') !!}
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
                      <label class="col-sm-2 control-label">keydata</label>
               <div class="col-sm-10">
                        <input type="text" class="form-control" name="keydata" placeholder="keydata" value="{{ date('Y-m-d Hms')}}">
                        {!! $errors->first('keydata') !!}
               </div>
         </div>

         <div class="form-group has-success">
                      <label class="col-sm-2 control-label">samano</label>
               <div class="col-sm-10">
                        <input type="text" class="form-control" name="samano" placeholder="samano" value="{{ Request::input('samano')  }}">
                        {!! $errors->first('samano') !!}
               </div>
         </div>

         <div class="form-group has-success">
                      <label class="col-sm-2 control-label">mbid</label>
               <div class="col-sm-10">
                        <input type="text" class="form-control" name="mbid" placeholder="samano" value="{{ Request::input('mbid')  }}">
                        {!! $errors->first('mbid') !!}
               </div>
         </div>

         <div class="form-group has-success">
                      <label class="col-sm-2 control-label">mbid</label>
               <div class="col-sm-10">
                        <input type="text" class="form-control" name="fundid" placeholder="fundid" value="{{ Request::input('fundid')  }}">
                        {!! $errors->first('fundid') !!}
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

  <script type="text/javascript">
  (function($){
    var d = new Date();
        var toDay = d.getDate() + '-' + (d.getMonth() + 1) + '-' + (d.getFullYear() + 543);

        $('input[name="mdate"]').datepicker({
        dateFormat: 'dd-mm-yy',
        isBuddhist: true,
        defaultDate: toDay,
        dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
        dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
        monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
        monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']
      });
  }(jQuery));
    </script>

@endsection
