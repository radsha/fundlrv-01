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
                     <th  class="text-center"><a href='{{url('newsbook/create')}}' ><i class="fa fa-plus-circle text-success" style="font-size:25px"></i> </a> </th>
                </tr>
            </thead>
        <tbody>
     @foreach ($data as $data1)
             <tr>
                      <td> {{ $data->bookyear}} </td>
                       <td> {{ $data->bookname}} </td>
                       <td> {{ $data->booklast}} </td>
                       <td> {{ $data->booksta}} </td>
                       <td>
                      <a href="{{ url('news_book/'.$data->bookid .'/edit') }}"> <i class="fa fa-edit text-success" style="font-size:16px"></i></a>
                      <a href="{{ url('news_book-delete/'. $data->bookid) }}" onclick="return confirm('ยืนยันการลบ')" style="font-size:16px"><i class="fa fa-times text-danger" ></i> </a>

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
