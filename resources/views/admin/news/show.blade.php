@extends('admin.home')
@section('title','ระบบควบคุมหลักประกันเงินกู้ แบบรวมศูนย์ ออนไลน์')
@section('header')
  <a href='{{url('fundtype')}}' ><i class="fa  fa-arrow-circle-left text-danger" style="font-size:25px"></i></a>
 การกำหนดเลขที่ใบเสร็จ-{{ App\Fundtype::getnamefund($id)}}
 @endsection
@section('content')
  <div class="table-responsive" >
     <table class="table table-striped table-bordered table-hover">
             <thead>
                 <tr class="info" >
                      <th class="text-center" >#</th>
                      <th class="text-center" >ประจำปี</th>
                      <th class="text-center" >ชื่อ</th>
                      <th class="text-center" >เลขที่สุดท้าย</th>
                      <th class="text-center" >สถานะ</th>
                      <th class="text-center" >สมาคม/กองทนุ</th>
                      <th class="text-center" >เชื่อมโยง</th>
                      <th class="text-center"  ><a href='{{url('book/create')}}' ><i class="fa fa-plus-circle text-success" style="font-size:25px"></i> </a> </th>
                 </tr>
             </thead>
         <tbody>
      @foreach ($data as $data)
              <tr>
                      <th scope="row">{{++$no}}</th>
                        <td class="text-center "> {{ $data->bookyear}} </td>
                        <td class="text-center" > {{ $data->bookname}} </td>
                        <td class="text-center" > {{ $data->booklast}} </td>
                        <td class="text-center" > {{ $data->booksta}} </td>
                        <td class="text-center" > {{ $data->fundid}} </td>
                        <td class="text-center" > {{ $data->fundidlink}} </td>
                        <td class="text-center" >
                       <a href="{{ url('book/'.$data->bookid .'/edit') }}"> <i class="fa fa-edit text-success" style="font-size:16px"></i></a>
                       <a href="{{ url('book-delete/'. $data->bookid) }}" onclick="return confirm('ยืนยันการลบ')" style="font-size:16px"><i class="fa fa-times text-danger" ></i> </a>

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

@section('javascript')

@endsection
