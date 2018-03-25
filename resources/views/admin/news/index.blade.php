@extends('admin.home')
@section('title','ระบบควบคุมหลักประกันเงินกู้ แบบรวมศูนย์ ออนไลน์')
@section('header')
  <a href='{{url('booktype')}}' ><i class="fa  fa-home text-danger fa-1x" ></i></a>
 การกำหนดหมวดเอกสาร
 @endsection

 @section('csscus')
   <link href="{{url('public/theme/colorbox/colorbox.css')}}" rel="stylesheet" type="text/css">
  @endsection

@section('content')

  <div class="row ">
      <div class=".col-md-12 ">
            <div class="has-success">
                <label class="col-md-1 ">ประจำปี</label>
               <div class="col-md-1">
                     <select name="vyear"   >
                       <?php $vyear=Request::input('vyear')?>
                       <?php $vy1=date('Y')-5;?>
                       <?php $vy2=date('Y');?>
                           @for ($a=$vy1;$a<=$vy2;$a++)
                               <option value="{{$a}}" <?php if(!(strcmp($a, $vyear ? $vyear :date('Y')))) {echo "selected=\"selected\"";}?>>{{$a+543}}</option>
                           @endfor
                     </select>
               </div>
          <div class="col-md-10 text-right">
          </div>

        </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> &nbsp;</div>
  </div>


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
                                      <div><a href="{{url('newslist/create?idctty='.$data1->idctty)}}" class="link5"><span style="color:White">เพิ่มเอกสาร</sapn></a></div>
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
<script src="{{url('public/theme/colorbox/jquery.colorbox-min.js')}}"></script>
<script>
		$(document).ready(function(){

 				$(".link1").colorbox();

				$(".link2").colorbox({iframe:true, innerWidth:795, innerHeight:500,title: "ถ้าต้องการปิดกดที่นี้  ====>>"});

				$(".link3").colorbox({ iframe:true,width:"95%", height:"95%",title: "ถ้าต้องการปิดกดที่นี้  ====>>"});

				$(".link4").colorbox({iframe:true, innerWidth:230, innerHeight:220,title: "ถ้าต้องการปิดกดที่นี้  ====>>"});

				$(".link5").colorbox({
					  iframe:true,
					  width:"95%",
					  height:"95%",
					  title: "ถ้าต้องการปิดกดที่นี้  ====>>",
					  onClosed:function(){ parent.location='{{url('newslist')}}';}
					 });

				$(".link6").colorbox({
					  iframe:true,
					  innerWidth:"550",
					  innerHeight:"200",
					  title: "ถ้าต้องการปิดกดที่นี้  ====>>",
					  onClosed:function(){ parent.location='{{url('newslist')}}';}
					 });


  		});
	</script>
@endsection
