@extends('admin.home')
@section('title','ระบบควบคุมหลักประกันเงินกู้ แบบรวมศูนย์ ออนไลน์')
@section('header')
<a href='{{url('indexadmin')}}' ><i class="fa  fa-home  text-Primary" style="font-size:25px"></i></a>
   ประเภทกองทุน/ฌาปนกิจ
 @endsection
@section('content')

<div class="panel panel-default">
  <form class="form-horizontal"  method="get" action="{{url('fund')}}">
       <div class="input-group">
          {{ Form::text('keywords', Request::input('keywords'),['class' => 'form-control','placeholder'=>'กรุณาป้อนคำที่ต้องการค้นหา ทะเบียน ชื่อ นามสกุล ']) }}
              <span class="input-group-btn ">
                      <button class="btn btn-default" type="sumbit"><i class="fa fa-search"></i></button>
              </span>
      </div>
  </form>
</div>

  <div class="table-responsive" >
     <table class="table table-striped table-bordered table-hover">
             <thead>
                 <tr class="info" >
                        <th class="text-center" height='100'>ทะเบียน</th>
                        <th class="text-center">ชื่อ - นามสกุล</th>
                        <th class="text-center">หน่วย</th>
                        <th class="text-center">วันเดือนปีเกิด</th>
                        <th class="text-center">อายุ</th>
                          @foreach ($datafund as $datafund1)
                        <th width='20' ><svg  width="20" height="120"> <text transform="rotate(270, 12, 0)  translate(-105,0)"   fill="black" > {{$datafund1->fundname2}} </text>
</svg></th>
                          @endforeach
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
                          @foreach ($datafund as $datafund1)
                        <td class="text-center">
                          <?php $mbstatus=App\Fund::getapply($datafund1->fundid,$data->member_no)  ?>
                          <?php $fundtype=App\Fundtype::gettypefund($datafund1->fundid) ?>
                          {{ App\Fundtype::gettypefund($datafund1->fundid)}}
                          @if ($fundtype=='1')
                            <a href='{{ url('fundshow/'.$datafund1->fundid) }}'  >{!! App\Fundstatus::getfundstatus($mbstatus) !!}  </a>
                          @else
                          <a href='{{url('fund/create')}}'  >{!! App\Fundstatus::getfundstatus($mbstatus) !!}  </a>
                          @endif


                          </td>
                         @endforeach
              </tr>
        @endforeach
      </tbody>
      </table>
  </div>

  <div class="text-center">
  <i class="fa fa-plus-circle text-success" style="font-size:16px"></i> การเพิ่ม &nbsp;<i class="fa fa-edit text-success" style="font-size:16px"></i>&nbsp; การแก้ไข <i class="fa fa-times text-danger" ></i> การลบ</div>

@endsection

@section('javascript')
    @if ($msg ==0 && @isset($msg))

    @endisset )
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
