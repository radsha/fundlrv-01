@extends('admin.home')
@section('title','ระบบควบคุมหลักประกันเงินกู้ แบบรวมศูนย์ ออนไลน์')
@section('header')
  <a href='{{url('fundtype')}}' ><i class="fa  fa-home  text-Primary" style="font-size:25px"></i></a>
   แก้ไขรายละเอียดงานฌาปนกิจ
 @endsection
@section('content')
  <div class="table-responsive" >
     <table class="table table-striped table-bordered table-hover">
             <thead>
                 <tr class="info" >
                      <th >#</th>
                      <th>fundid</th>
                      <th>fundidL</th>
                      <th>fundid2</th>
                      <th>idoffice</th>
                      <th>fundname</th>
                      <th>fundname2</th>
                      <th>age</th>
                      <th>fundtype</th>
                      <th>accsama</th>
                      <th>created_at</th>
                      <th>updated_at</th>
                      <th ><a href='{{url('fundtype/create')}}' ><i class="fa fa-plus-circle text-success" style="font-size:25px"></i> </a> </th>
                 </tr>
             </thead>
         <tbody>
      @foreach ($data as $data)
              <tr>
                      <th scope="row">{{++$no}}</th>
                      <td> {{ $data->fundid}} </td>
                        <td> {{ $data->fundidL}} </td>
                        <td> {{ $data->fundid2}} </td>
                        <td> {{ $data->idoffice}} </td>
                        <td> {{ $data->fundname}} </td>
                        <td> {{ $data->fundname2}} </td>
                        <td> {{ $data->age}} </td>
                        <td> {{ $data->fundtype}} </td>
                        <td> {{ $data->accsama}} </td>
                        <td> {{ $data->created_at}} </td>
                        <td> {{ $data->updated_at}} </td>
                        <td>
                       <a href="{{ url('fundtype/'.$data->fundid .'/edit') }}"> <i class="fa fa-edit text-success" style="font-size:16px"></i></a>
                       <a href="{{ url('fundtype-delete/'. $data->fundid) }}" onclick="return confirm('ยืนยันการลบ')" style="font-size:16px"><i class="fa fa-times text-danger" ></i> </a>

                      {{$ck=App\fundtype_de::tdata($data->fundid,'0000')}}
                      @if($ck=='yes')
                         <a href="{{ url('fundtype_de/'. $data->fundid) }}" style="font-size:16px"><i class="fa fa-file-text text-primary" ></i> </a>
                      @else
                         <a href="{{ url('fundtype_de/create?fundid='.$data->fundid) }}" style="font-size:16px"><i class="fa fa-file-text text-primary" ></i> </a>
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


   		  $(function () {

   		    var d = new Date();
  		    var toDay = d.getDate() + '-' + (d.getMonth() + 1) + '-' + (d.getFullYear() + 543);

  		    $('input[name="MEMBER_DATE"]').datepicker({ dateFormat: 'dd-mm-yy', isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
                dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
                monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
                monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});

  		    $('input[name="birth_date"]').datepicker({ dateFormat: 'dd-mm-yy', isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
                dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
                monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
                monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});



   			});


   </script>
@endsection
