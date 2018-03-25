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
                    <th >#</th>
                    <th>id</th>
                    <th>fname</th>
                    <th>position</th>
                    <th>username</th>
                    <th>password</th>
                    <th>remember_token</th>
                    <th>e_mail</th>
                    <th>tel_mobile</th>
                    <th>address</th>
                    <th>idoffice</th>
                    <th>level</th>
                    <th>visit</th>
                    <th>visitday</th>
                    <th>startday</th>
                    <th>endday</th>
                    <th>created_at</th>
                    <th>updated_at</th>
                    <th ><a href='{{url('users/create')}}' ><i class="fa fa-plus-circle text-success" style="font-size:25px"></i> </a> </th>
               </tr>
           </thead>
       <tbody>
    @foreach ($data as $data)
            <tr>
                    <th scope="row">{{++$no}}</th>
                    <td> {{ $data->id}} </td>
                      <td> {{ $data->fname}} </td>
                      <td> {{ $data->position}} </td>
                      <td> {{ $data->username}} </td>
                      <td> {{ $data->password}} </td>
                      <td> {{ $data->remember_token}} </td>
                      <td> {{ $data->e_mail}} </td>
                      <td> {{ $data->tel_mobile}} </td>
                      <td> {{ $data->address}} </td>
                      <td> {{ $data->idoffice}} </td>
                      <td> {{ $data->level}} </td>
                      <td> {{ $data->visit}} </td>
                      <td> {{ $data->visitday}} </td>
                      <td> {{ $data->startday}} </td>
                      <td> {{ $data->endday}} </td>
                      <td> {{ $data->created_at}} </td>
                      <td> {{ $data->updated_at}} </td>
                      <td>
                     <a href="{{ url('users/'.$data->id .'/edit') }}"> <i class="fa fa-edit text-success" style="font-size:16px"></i></a>
                     <a href="{{ url('users-delete/'. $data->id) }}" onclick="return confirm('ยืนยันการลบ')" style="font-size:16px"><i class="fa fa-times text-danger" ></i> </a>

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

<div class="text-center">
<i class="fa fa-plus-circle text-success" style="font-size:16px"></i> การเพิ่ม &nbsp;<i class="fa fa-edit text-success" style="font-size:16px"></i>&nbsp; การแก้ไข <i class="fa fa-times text-danger" ></i> การลบ</div>
@endsection
