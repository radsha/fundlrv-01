@extends('admin.home')
@section('title','ระบบควบคุมหลักประกันเงินกู้ แบบรวมศูนย์ ออนไลน์')
@section('header')
<a href='{{url('fundview')}}' ><i class="fa  fa-home  text-Primary" style="font-size:25px"></i></a>
   รายการชำระ
 @endsection
@section('content')
<div class="panel panel-default">
  <form class="form-horizontal"  method="get" action="{{url('fundview')}}">
       <div class="input-group">
          {{ Form::text('keywords', Request::input('keywords'),['class' => 'form-control','placeholder'=>'กรุณาป้อนคำที่ต้องการค้นหา ทะเบียน ชื่อ นามสกุล ']) }}
              <span class="input-group-btn ">
                      <button class="btn btn-default" type="sumbit"><i class="fa fa-search"></i></button>
              </span>
      </div>
  </form>
</div>

@foreach ($datafund as $datafund1 )
  <h5><span class="text-primary">{{$datafund1->fundid.'.'.$datafund1->fundname.'('.$datafund1->fundname2.')'}}</span></h5>
<div class="table-responsive" >
  <table class="table table-striped table-bordered table-hover">
          <thead>
              <tr class="info" >
                   <th  class="text-center">@</th>
                   <th class="text-center">ทะเบียน สอ</th>
                   <th  class="text-center">ชื่อ-นามสกุล สอ</th>
                   <th  class="text-center">ทะเบียน สมาคม</th>
                   <th  class="text-center">ชื่อ-นามสกุล ผู้สมัคร</th>
                   <th  class="text-center">ความสัมพันธ์</th>
                   <th  class="text-center">วันที่สมัคร</th>
                   <th  class="text-center">วันที่คุ้มครอง</th>
                   <th  class="text-center">วันที่ลาออก/เสียชีวิต</th>
                 <th  class="text-center">@</th>
               </tr>
          </thead>
      <tbody>
@foreach ($data as $data1 )
  @if($data1->fundid==$datafund1->fundid)
         <tr >
              <td class="text-center"> {!!App\Fundstatus::getfundstatus($data1->mbstatus)!!} </td>
                   <td class="text-center"> {{$data1->mbmember}}  </td>
                   <td> {{App\Tbmembmaster::getnamemember($data1->mbmember)}} </td>
                   <td class="text-center"> {{$data1->samano}}  </td>
                   <td> {{$data1->fname}}  </td>
                   <td> {{ App\Fundrela::getnamerela($data1->fundrelaid)}} </td>
                   <td class="text-center"> {{App\Lib::dateThai($data1->mbapply)}} </td>
                   <td class="text-center"> {{App\Lib::dateThai($data1->mbprotech)}}  </td>
                   <td class="text-center"> {{App\Lib::dateThai($data1->mbresign)}} </td>
                   <td class="text-center"><a  href='{{url('fundview/'.$data1->mbid)}}'>  <i class="fa  fa-list-alt text-success" style="font-size:16px"></i> </a>            </td>
           </tr>
         @endif
@endforeach
   </tbody>
   </table>
</div>
@endforeach

@endsection


@section('javascript')
    @if ($msg ==0 && @isset($msg))

    @endisset )
        <script>
            swal("ไม่พบข้อมูลที่คุณค้นหา...", "{{Request::input('keywords')}}", "warning")
        </script>
    @endif


@endsection
