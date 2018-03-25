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
                      <th>statusid</th>
                      <th>statusname</th>
                      <th>icon</th>
                      <th>color</th>
                      <th ><a href='{{url('fundstatus/create')}}' ><i class="fa fa-plus-circle text-success" style="font-size:25px"></i> </a> </th>
                 </tr>
             </thead>
         <tbody>
      @foreach ($data as $data)
              <tr>
                        <td> {{ $data->statusid}} </td>
                        <td> {{ $data->statusname}} </td>
                        <td> {{ $data->icon}} </td>
                        <td> {{ $data->color}} </td>
                        <td>
                       <a href="{{ url('fundstatus/'.$data->statusid .'/edit') }}"> <i class="fa fa-edit text-success" style="font-size:16px"></i></a>
                       <a href="{{ url('fundstatus-delete/'. $data->statusid) }}" onclick="return confirm('ยืนยันการลบ')" style="font-size:16px"><i class="fa fa-times text-danger" ></i> </a>


                      </td>
              </tr>
        @endforeach
      </tbody>
      </table>
  </div>

@endsection
