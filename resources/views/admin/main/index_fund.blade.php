@extends('admin.home')
@section('title','ระบบควบคุมหลักประกันเงินกู้ แบบรวมศูนย์ ออนไลน์')
@section('header')
<a href='{{url('indexadmin')}}' ><i class="fa  fa-home  text-Primary" style="font-size:25px"></i></a>
   ประเภทกองทุน/ฌาปนกิจ
 @endsection
@section('content')

  @foreach ($data3 as $data3)
    <h5> <span class="text-info">{{$data3->fundname}}</span> </h5>


<?php $data= DB::table('fundtype')->where('fundtype.fundidlink', $data3->fundidlink)->get(); ?>
      @if (count($data)>0)

        <div class="table-responsive" >
           <table class="table table-striped table-bordered table-hover">
                   <thead>
                       <tr>
                           <th class="info text-center" >ประเภท</th>
                           @foreach ($data2 as $datav2)
                           <th class="info text-center"><i class="fa {{$datav2->icon}} text-success" style="font-size:15px;color:{{$datav2->color}}"></i> {{$datav2->statusname}} </th>
                           @endforeach
                       </tr>
                   </thead>
               <tbody>


                  @foreach ($data as $data1)
                    <tr class="text-center">
                         <td> {{ $data1->fundtype==1?"สามัญ":"สมทบ"}} </td>
                          @foreach ($data2 as $datav2)
                        <td>  {{ App\Fund::getfund($data1->fundid,$datav2->statusid) }} </td>
                          @endforeach
                    </tr>
                  @endforeach

            </tbody>
            </table>


        @endif
        @endforeach
     </div>

@endsection
