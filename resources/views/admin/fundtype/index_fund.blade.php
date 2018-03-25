@extends('admin.home')
@section('title','ระบบควบคุมหลักประกันเงินกู้ แบบรวมศูนย์ ออนไลน์')
@section('header')
<a href='{{url('fundtype')}}' ><i class="fa  fa-home  text-Primary" style="font-size:25px"></i></a>
   รายละเอียดงานฌาปนกิจ
 @endsection
@section('content')
 <div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
      <thead>
        <tr class="info" >
          <th >#</th>
            <th>กลุ่ม</th>
            <th>รหัส</th>
           <th>ชื่อฌาปนกิจ</th>
            <th>อักษรย่อ</th>
             <th>เลขที่บัญชี</th>
             <th >
                 @if(Auth::guard('admin')->user()->levelg=='A')
               <a href='{{url('fundtype/create')}}' ><i class="fa  fa-plus-circle  text-info" style="font-size:25px"></i> </a>
              @endif
               </th>
           </tr>
         </thead>
         <tbody>

           @foreach ($data as $data)

           <tr>
               <td scope="row">{{++$no}}</td>
                <td>  {{ $data->fundidL}} </td>
                <td>  {{ $data->fundid}}</td>
                <td>  {{ $data->fundname}}</td>
                <td>  {{ $data->fundname2}}</td>
                <td>  {{ $data->accsama}}</td>
                <td align="center">
              @if(Auth::guard('admin')->user()->levelg=='A')
                <a href="{{ url('fundtype/'.$data->fundid .'/edit') }}"> <i class="fa fa-edit text-success" style="font-size:16px"></i></a>
                <a href="{{ url('fundtype-delete/'. $data->fundid) }}" onclick="return confirm('ยืนยันการลบ')"  style="font-size:16px"><i class="fa fa-times text-danger" ></i> </a>
              @endif

@if(App\Fundtype::gettypefund($data->fundid)=='1')
        <?php $fundidd=App\fundtype_de::getfundidd($data->fundid,Auth::guard('admin')->user()->idoffice) ?>
          <a href="{{ url('book/?fundid='.$data->fundid) }}"   style="font-size:16px"><i class="fa fa-book text-warning" ></i> </a>
					@if ($fundidd=='0')
              <a href="{{ url('fundtype_de/create?fundid='.$data->fundid) }}"   style="font-size:16px"><i class="fa fa-file-text text-primary" ></i> </a>
					@else
              <a href="{{ url('fundtype_de/'.$fundidd.'/edit?fundid='.$data->fundid) }}"   style="font-size:16px"><i class="fa fa-file-text text-primary" ></i> </a>
					@endif
@endif
              </td>
            </tr>
       @endforeach
                   </tbody>
                 </table>
               </div>

               <div class="text-center">
              <i class="fa  fa-plus-circle  text-success" style="font-size:16px"></i> การเพิ่ม &nbsp;<i class="fa fa-edit text-success" style="font-size:16px"></i>&nbsp; การแก้ไข <i class="fa fa-times text-danger" ></i> การลบ</div>
@endsection
