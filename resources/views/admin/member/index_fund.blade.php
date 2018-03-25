@extends('admin.home')
@section('title','ระบบควบคุมหลักประกันเงินกู้ แบบรวมศูนย์ ออนไลน์')
@section('header')
<a href='{{url('indexadmin')}}' ><i class="fa  fa-home  text-Primary" style="font-size:25px"></i></a>
ข้อมูลสมาชิก
 @endsection
 @section('csscus')
   <link href="{{url('public/theme/sweetalert/sweetalert.css')}}" rel="stylesheet" type="text/css">

   <link href="{{url('public/theme/ton/template_css.css')}}" rel="stylesheet" type="text/css">
   <link href="{{url('public/theme/colorbox/colorbox.css')}}" rel="stylesheet" type="text/css">

  @endsection
@section('content')

<div class="panel panel-default">
  <form class="form-horizontal"  method="get" action="{{url('member')}}">
       <div class="input-group">
          {{ Form::text('keywords', Request::input('keywords'),['class' => 'form-control','placeholder'=>'กรุณาป้อนคำที่ต้องการค้นหา ทะเบียน ชื่อ นามสกุล ']) }}
                  <span class="input-group-btn ">
                              <button class="btn btn-default" type="sumbit"><i class="fa fa-search"></i>
                              </button>
                    </span>
      </div>
  </form>
</div>



  <div class="table-responsive" >

     <table class="table table-striped table-bordered table-hover">
             <thead>
                 <tr class="info" >

                        <th class="text-center ">ทะเบียน</th>
                        <th class="text-center">ชื่อ - นามสกุล</th>
                        <th class="text-center">หน่วย</th>
                        <th class="text-center">วันเดือนปีเกิด</th>
                        <th class="text-center">อายุ</th>
                        <th class="text-center"><a href='{{url('member/create')}}' class="btn btn-primary btn-xs"><i class="fa fa-plus-circle"> เพิ่มข้อมูล</i> </a> </th>
                 </tr>
             </thead>
         <tbody>
      @foreach ($data as $data)
              <tr>

                        <td class="text-center"> {{ $data->member_no}} </td>
                        <td  > {{ $data->memb_name}} </td>
                        <td class="text-center"> {{ $data->membgroup}} </td>
                        <td class="text-center"> {{ App\Lib::dateThai($data->birth_date) }} </td>
                        <td class="text-center"> {{ App\Lib::agey($data->birth_date) }} </td>
                          <td class="text-center">
                       <a href="{{ url('member/'.$data->idpc .'/edit') }}" > <i class="fa fa-edit text-success" style="font-size:15px"></i></a>
                       <a href="{{ url('member-delete/'. $data->idpc) }}" onclick="return confirm('ยืนยันการลบ')" style="font-size:15px"><i class="fa fa-times text-danger" ></i> </a>



                      </td>
              </tr>
        @endforeach
      </tbody>
      </table>
  </div>

  <div class="text-center">
  <i class="fa fa-plus-circle text-success" style="font-size:16px"></i> การเพิ่ม &nbsp;<i class="fa fa-edit text-success" style="font-size:16px"></i>&nbsp; การแก้ไข <i class="fa fa-times text-danger" ></i> การลบ</div>

@endsection



@section('javascript')
  <script src="{{url('public/theme/sweetalert/sweetalert.min.js')}}"></script>


  <script src="{{url('public/theme/colorbox/jquery.colorbox.js')}}"></script>
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
              onClosed:function(){ parent.location='{{url('import')}}';}
             });

          $(".link6").colorbox({
              iframe:true,
              innerWidth:"550",
              innerHeight:"200",
              title: "ถ้าต้องการปิดกดที่นี้  ====>>",
              onClosed:function(){ parent.location='{{url('import')}}';}
             });



        });
    </script>

    @if ($msg ==0)
        <script>
            swal("ไม่พบข้อมูลที่คุณค้นหา...", "{{Request::input('keywords')}}", "warning")
        </script>
    @endif

    @if (session()->has('status'))
        <script>
            swal("บันทึกข้อมูลเสร็จเรียบร้อยแล้ว...", "{{Request::input('keywords')}}", "success")
        </script>
    @endif
@endsection
