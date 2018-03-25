@extends('admin.home')
@section('title','ระบบควบคุมหลักประกันเงินกู้ แบบรวมศูนย์ ออนไลน์')
@section('header')
  <a href='{{url('fundpic')}}' ><i class="fa  fa-arrow-circle-left text-danger" style="font-size:25px"></i></a>
  ไฟล์เอกสาร-{{App\Fundtype::getnamefund($data2->fundid)}}
 @endsection
@section('content')

  <div class="alert-warning text-center" >
      <label class=".col-md-1 ">ทะเบียน สมาคม</label>
      <label class=".col-md-1 form-control-static text-primary"> {{$data2->samano}}</label>
      <label class=".col-md-1 ">ชื่อ - นามสกุล สมาคม</label>
      <label class=".col-md-1 form-control-static text-primary"> {{$data2->fname}}</label>
      <label class=".col-md-1 ">ความสัมพันธ์ </label>
      <label class=".col-md-1 form-control-static text-primary"> {{App\Fundrela::getnamerela($data2->fundrelaid)}}</label>
      <label class=".col-md-1 ">ทะเบียน สอ.</label>
      <label class=".col-md-1 form-control-static text-primary"> {{$data2->mbmember}}</label>
      <label class=".col-md-1 control-label">ชื่อ - นามสุกล สอ.</label>
      <label class=".col-md-1 form-control-static text-primary"> {{ App\Tbmembmaster::getnamemember($data2->mbmember)}}</label>
  </div>


   <div class="table-responsive">
     <table class="table table-striped table-bordered table-hover">
             <thead>
                 <tr class="info" >
                      <th class="text-center">ลำดับที่</th>
                      <th  class="text-center">ประเภทเอกสาร </th>
                      <th  class="text-center">วันที่</th>
                      <th  class="text-center">รายละเอียด</th>
                      <th  class="text-center"> <a href='{{url('fundpic/create?mbid='.$data2->mbid.'&samano='.Request::input('samano').'&fundid='.Request::input('fundid').'&mbmember='.Request::input('mbmember').'&keywords='.Request::input('keywords'))}}' class="btn btn-primary btn-xs"><i class="fa fa-plus-circle"> เพิ่มข้อมูล</i> </a> </th>
                  </tr>
             </thead>
         <tbody>
           <?php $i=0;?>
@foreach ($data as $data1 )
  <?php $i++;?>
            <tr>
                      <td class="text-center"> {{$i}}  </td>
                      <td> {{$data1->picname}} </td>
                      <td class="text-center"> {{App\Lib::dateThai($data1->filedate) }}  </td>
                      <td class="text-center">	<a href="{{url('fileuploads/pic/T'.$data1->filename)}}"  class="link1"> {{$data1->filename}}</a>  </td>
                      <td class="text-center">
                       @if($data1->filedate<date('Ymd'))
                        <a href="{{ url('fundpic-delete/'. $data1->idpic) }}" onclick="return confirm('ยืนยันการลบ')" style="font-size:15px"><i class="fa fa-times text-danger" ></i> </a>
                      @endif
                      </td>
              </tr>
@endforeach

      </tbody>
      </table>
  </div>



@endsection
@section('javascript')
  <script type="text/javascript">

  		$(document).ready(function(){
   				$(".link1").colorbox();

  				$(".link2").colorbox({iframe:true, innerWidth:795, innerHeight:500,title: "ถ้าต้องการปิดกดที่นี้  ====>>"});

  				$(".link3").colorbox({ iframe:true,width:"98%", height:"98%",title: "ถ้าต้องการปิดกดที่นี้  ====>>"});

  				$(".link4").colorbox({iframe:true, innerWidth:230, innerHeight:220,title: "ถ้าต้องการปิดกดที่นี้  ====>>"});

  				$(".link5").colorbox({
  					  iframe:true,
  					  width:"98%",
  					  height:"98%",
  					  title: "ถ้าต้องการปิดกดที่นี้  ====>>",
  					  onClosed:function(){ parent.location='<?php $file?>';}
  					 });

  				$(".link6").colorbox({
  					  iframe:true,
  					  innerWidth:"550",
  					  innerHeight:"200",
  					  title: "ถ้าต้องการปิดกดที่นี้  ====>>",
  					  onClosed:function(){ parent.location='<?php $file?>';}
  					 });

   				$(".msg0").colorbox({width:"35%", inline:true, href:"#msg0"});


    		});
  	</script>




       @if (session()->has('status'))
           <script>
               swal("บันทึกข้อมูลเสร็จเรียบร้อยแล้ว...", "{{session()->get('status')}}", "success")
           </script>
       @endif

       @if (session()->has('status1'))
           <script>
               swal("ลบข้อมูลเสร็จเรียบร้อยแล้ว...", "{{session()->get('status')}}", "success")
           </script>
       @endif
@endsection
