@extends('admin.home')
@section('title','ระบบควบคุมหลักประกันเงินกู้ แบบรวมศูนย์ ออนไลน์')
@section('header')
  <a href='{{url('newstype')}}' ><i class="fa  fa-arrow-circle-left text-danger fa-1x"  ></i></a>
 การกำหนดเลขที่หนังสือ-หมวด{{$data2->namectty}}
 @endsection
@section('content')

  <div class="table-responsive" >
    <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr class="info" >
                    <th class="text-center">ประจำปี</th>
                     <th class="text-center">คำนำหน้า</th>
                     <th class="text-center">เลขที่สุดท้าย</th>
                     <th class="text-center">สถานะ</th>
                     <th  class="text-center"><a href='{{url('newsbook/create?idctty='.$data2->idctty)}}' ><i class="fa fa-plus-circle text-success" style="font-size:25px"></i> </a> </th>
                </tr>
            </thead>
        <tbody>
     @foreach ($data as $data1)
             <tr>
                      <td class="text-center"> {{ $data1->bookyear}} </td>
                       <td class="text-center"> {{ $data1->bookname}} </td>
                       <td class="text-center"> {{ $data1->booklast}} </td>
                       <td class="text-center"> {{ $data1->booksta}} </td>
                       <td class="text-center">
                           <a href="{{ url('newsbook/'.$data1->bookid .'/edit') }}"> <i class="fa fa-edit text-success" style="font-size:16px"></i></a>
                           <a href="{{ url('newsbook-delete/'. $data1->bookid) }}" onclick="return confirm('ยืนยันการลบ')" style="font-size:16px"><i class="fa fa-times text-danger" ></i> </a>
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
