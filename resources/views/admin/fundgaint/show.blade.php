@extends('admin.home')
@section('title','ระบบควบคุมหลักประกันเงินกู้ แบบรวมศูนย์ ออนไลน์')
@section('header')
  <a href='{{url('fundview')}}' ><i class="fa  fa-arrow-circle-left text-danger" style="font-size:25px"></i></a>
  รายละเอียดการชำระ-{{App\Fundtype::getnamefund($data2->fundid)}}
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
                      <th  class="text-center">ชื่อ - นามสกุล </th>
                      <th  class="text-center">บัตรประชาชน</th>
                      <th  class="text-center">ที่อยู่</th>
                      <th  class="text-center">วันที่</th>
                      <th  class="text-center"> <a href='{{url('fundgaint/create?mbid='.$data2->mbid.'&samano='.Request::input('samano').'&fundid='.Request::input('fundid').'&mbmember='.Request::input('mbmember').'&keywords='.Request::input('keywords'))}}' class="btn btn-primary btn-xs"><i class="fa fa-plus-circle"> เพิ่มข้อมูล</i> </a> </th>
                  </tr>
             </thead>
         <tbody>
@foreach ($data as $data1 )
            <tr>
                      <td class="text-center"> {{$data1->glno}}  </td>
                      <td> {{$data1->glname}} </td>
                      <td class="text-center"> {{$data1->glpinid }}</td>
                      <td> {{  $data1->gladdress }}  </td>
                      <td class="text-center"> {{App\Lib::dateThai($data1->glbdate) }}  </td>
                      <td class="text-center">
                        <a href="{{ url('fundgaint/'.$data1->glid.'/edit?mbid='.$data2->mbid.'&samano='.Request::input('samano').'&fundid='.Request::input('fundid').'&mbmember='.Request::input('mbmember').'&keywords='.Request::input('keywords'))}}" > <i class="fa fa-edit text-success" style="font-size:15px"></i></a>
                        <a href="{{ url('fundgaint-delete/'. $data1->glid) }}" onclick="return confirm('ยืนยันการลบ')" style="font-size:15px"><i class="fa fa-times text-danger" ></i> </a>
                        <a href="{{ url('fundgaint-print/'. $data1->inid) }}" onclick="return confirm('ยืนยันการลบ')" style="font-size:15px"><i class="fa fa-print" ></i> </a>
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

  		    $('input[name="mbapply"]').datepicker({ dateFormat: 'dd-mm-yy', isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
                dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
                monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
                monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});

  		    $('input[name="birth_date"]').datepicker({ dateFormat: 'dd-mm-yy', isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
                dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
                monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
                monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});



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
