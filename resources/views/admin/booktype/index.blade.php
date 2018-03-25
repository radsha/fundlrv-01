@extends('admin.home')
@section('title','ระบบควบคุมหลักประกันเงินกู้ แบบรวมศูนย์ ออนไลน์')
@section('header')
  <a href='{{url('fundtype')}}' ><i class="fa  fa-arrow-circle-left text-danger" style="font-size:25px"></i></a>
 การกำหนดเลขที่ใบเสร็จ-{{ App\Fundtype::getnamefund(Request::input('fundid'))}}
 @endsection
@section('content')

      <?php $no=0;?>
      @foreach ($data as $data)

  <div class="col-lg-3 col-md-6">
                      <div class="panel panel-primary">
                          <div class="panel-heading">
                              <div class="row">
                                  <div class="col-xs-3">
                                                <i class="fa fa-comments fa-5x"></i>
                                  </div>
                                  <div class="col-xs-9 text-right">
                                      <div class="huge">{{$data->namectty}}</div>
                                      <div><a href="#"><span class="text-info">เพิ่มข้อมูล</sapn></a></div>
                                  </div>
                              </div>
                          </div>
                          <a href="#">
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
