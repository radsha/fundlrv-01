@extends('admin.home')
@section('title','ระบบควบคุมหลักประกันเงินกู้ แบบรวมศูนย์ ออนไลน์')
@section('header')
<a href='{{url('indexadmin')}}' ><i class="fa  fa-home  text-Primary" style="font-size:25px"></i></a>
   ประเภทกองทุน/ฌาปนกิจ
 @endsection
@section('content')
<div class="table-responsive" >
   <table class="table table-striped table-bordered table-hover">
           <thead>
               <tr class="info" >
                    <th>ลำดับที่</th>
                    <th>ชื่อ - นามสกุล</th>
                    <th>ตำแหน่ง</th>
                    <th>User</th>
                     <th>Tel</th>
                    <th>สถานบริการ</th>
                    <th>ระดับ</th>
                    <th>จำนวนครั้ง</th>
                    <th>วันล่าสุด</th>
                    <th>เริ่มต้น</th>
                    <th>สิ้นสุด</th>
                    <th ><a href='{{url('users/create')}}' ><i class="fa fa-plus-circle text-success" style="font-size:25px"></i> </a> </th>
               </tr>
           </thead>
       <tbody>
    @foreach ($data1 as $data)
            <tr>

                    <td> {{ $data->id}} </td>
                      <td> {{ $data->fname}} </td>
                      <td> {{ $data->position}} </td>
                      <td> {{ $data->username}} </td>
                      <td> {{ $data->tel_mobile}} </td>
                      <td> {{ $data->idoffice}} </td>
                      <td> {{ $data->level}} </td>
                      <td> {{ $data->visit}} </td>
                      <td> {{ $data->visitday}} </td>
                      <td> {{ $data->startday}} </td>
                      <td> {{ $data->endday}} </td>
                       <td>
                     <a href="{{ url('users/'.$data->id .'/edit') }}"> <i class="fa fa-edit text-success" style="font-size:16px"></i></a>
                     <a href="{{ url('users-delete/'. $data->id) }}" onclick="return confirm('ยืนยันการลบ')" style="font-size:16px"><i class="fa fa-times text-danger" ></i> </a>



                    </td>
            </tr>
      @endforeach
    </tbody>
    </table>
</div>

<div class="text-center">
<i class="fa fa-plus-circle text-success" style="font-size:16px"></i> การเพิ่ม &nbsp;<i class="fa fa-edit text-success" style="font-size:16px"></i>&nbsp; การแก้ไข <i class="fa fa-times text-danger" ></i> การลบ</div>
@endsection
