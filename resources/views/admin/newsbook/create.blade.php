@extends('admin.home')
@section('title','ระบบควบคุมหลักประกันเงินกู้ แบบรวมศูนย์ ออนไลน์')
@section('header')
  <a href='{{url('booktype')}}' ><i class="fa  fa-arrow-circle-left text-Primary fa-1x" ></i></a>
  การกำหนดประเภทเอกสาร
 @endsection
@section('content')
  <form class="form-horizontal" method="post" action="{{url( $url )}}">
         @if( $bookid != 0)
              <input type="hidden" name="_method" value="PUT" />
         @endif
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
 <div class="form-group has-success">
              <label class="col-sm-2 control-label">ลำดับที่</label>
       <div class="col-sm-10">
                <input type="text" class="form-control" name="bookid" placeholder="Auto" value="{{ $data ? $data->bookid : old('bookid') }}">
                {!! $errors->first('bookid') !!}
       </div>
 </div>

 <div class="form-group has-success">
              <label class="col-sm-2 control-label">ประจำปี</label>
       <div class="col-sm-10">
                <input type="text" class="form-control" name="bookyear" placeholder="bookyear" value="{{ $data ? $data->bookyear : old('bookyear') }}">
                {!! $errors->first('bookyear') !!}
       </div>
 </div>

 <div class="form-group has-success">
              <label class="col-sm-2 control-label">คำนำหน้า</label>
       <div class="col-sm-10">
                <input type="text" class="form-control" name="bookname" placeholder="bookname" value="{{ $data ? $data->bookname : old('bookname') }}">
                {!! $errors->first('bookname') !!}
       </div>
 </div>

 <div class="form-group has-success">
              <label class="col-sm-2 control-label">เลขที่สุดท้าย</label>
       <div class="col-sm-10">
                <input type="text" class="form-control" name="booklast" placeholder="booklast" value="{{ $data ? $data->booklast : old('booklast') }}">
                {!! $errors->first('booklast') !!}
       </div>
 </div>

 <div class="form-group has-success">
      <label class="col-sm-2 control-label">สถานะ</label>
       <div class="col-sm-10">
           <?php $datasta=DB::table('book_sta')->get();?>
             <select name="booksta" class="form-control">
                   @foreach ($datasta as $datasta1)
                       <option value="{{$datasta1->bookstaid}}" <?php if(!(strcmp($datasta1->bookstaid,$data ? $data->booksta:1))) {echo "selected=\"selected\"";}?>>{{$datasta1->bookstaid.'|'.$datasta1->bookstaname}}</option>
                   @endforeach
             </select>
       </div>
 </div>



 <div class="form-group has-success">
              <label class="col-sm-2 control-label">วันที่บันทึก</label>
       <div class="col-sm-10">
                <input type="text" class="form-control" name="keydata" placeholder="keydata" value="{{  Auth::guard('admin')->user()->fname .' | '.Auth::guard('admin')->user()->idoffice.' | '.date('d-m-').(date('Y')+543).' | '.date('H:i:s')  }}">

       </div>
 </div>

                <input type="text"   name="bookoffice"   value="{{ Auth::guard('admin')->user()->idoffice }}">
                <input type="text"   name="idctty"  value="{{ Request::input('idctty') ? Request::input('idctty') :$data->idctty}}">



 <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-primary">บันทึก</button>
             </div>
       </div>
 </form>
@endsection
