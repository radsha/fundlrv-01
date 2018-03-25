@extends('admin.home')
@section('title','ระบบควบคุมหลักประกันเงินกู้ แบบรวมศูนย์ ออนไลน์')
@section('header')
  <a href='{{url('booktype')}}' ><i class="fa  fa-home text-danger fa-1x" ></i></a>
 การกำหนดหมวดเอกสาร
 @endsection

@section('content')

<form class="form-horizontal" method="get" action="{{url('newstype')}}">
         <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="row ">
      <div class=".col-md-12 ">
          <div class="has-success">
                <label class="col-md-1 ">ประจำปี </label>
               <div class="col-md-1">
                     <select name="vyear" onchange="submit()" >
                       <?php $vy1=date('Y');?>
                       <?php $vy2=date('Y')-2;?>
                           @for ($a=$vy1;$a>=$vy2;$a--)
                               <option value="{{$a}}" <?php if(!(strcmp($a, $vyear ? $vyear :date('Y')))) {echo "selected=\"selected\"";}?>>{{$a+543}}</option>
                           @endfor
                     </select>
               </div>
          <div class="col-md-10 text-right"> <a href='{{url('newstype/create')}}' class="btn btn-primary  "><i class="fa fa-plus-circle"> เพิ่มข้อมูล</i> </a></div>

        </div>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> &nbsp;</div>
  </div>
</form>


  @foreach ($data as $data1)
  <div class="col-lg-3 col-md-6">
          <div class="panel panel-{{$data1->colorct ? $data1->colorct :"primary  " }}">
                    <div class="panel-heading">
                            <div class="row">
                                  <div class="col-xs-3">
                                        <i class="fa {{$data1->iconct ? $data1->iconct  :"fa-comments-o" }} fa-5x"></i>
                                  </div>
                              <div class="col-xs-9 text-right">
                                      <div class="huge">{{$data1->namectty}}</div>
                                      <div><a href="{{url('newstype/'.$data1->idctty.'/edit')}}"><span style="color:White"> แก้ไข</sapn></a><a href="{{url('newstype/'.$data1->idctty)}}"><span style="color:White"> กำหนดเลขที่</sapn></a></div>
                                  </div>
                              </div>
                          </div>
                          <a href="">
                              <div class="panel-footer">
                                  <span class="pull-left">รายละเอียด</span>
                                  <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                  <div class="clearfix"></div>
                              </div>
                          </a>
                </div>
  </div>
  @endforeach

@endsection

@section('javascript')

@endsection
