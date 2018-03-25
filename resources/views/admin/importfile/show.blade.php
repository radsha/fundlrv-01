
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
                      <th  class="text-center">ประเภทเอกสาร </th>
                      <th  class="text-center">วันที่</th>
                      <th  class="text-center">รายละเอียด</th>
                      <th  class="text-center"> <a href='{{url('fundfile/create?mbid='.$data2->mbid.'&samano='.Request::input('samano').'&fundid='.Request::input('fundid').'&mbmember='.Request::input('mbmember').'&keywords='.Request::input('keywords'))}}' class="btn btn-primary btn-xs"><i class="fa fa-plus-circle"> เพิ่มข้อมูล</i> </a> </th>
                  </tr>
             </thead>
         <tbody>
           <?php $i=0;?>
@foreach ($data as $data1 )
  <?php $i++;?>
            <tr>
                      <td class="text-center"> {{$i}}  </td>
                      <td> {{$data1->namefile}} </td>
                      <td class="text-center"> {{App\Lib::dateThai($data1->filedate) }}  </td>
                      <td class="text-center">	<a href="{{url('fileuploads/file/'.$data1->filename)}}"  class="link3"> {{$data1->filename}}</a>  </td>
                      <td class="text-center">
                       @if($data1->filedate<date('Ymd'))
                        <a href="{{ url('fundfile-delete/'. $data1->idfile) }}" onclick="return confirm('ยืนยันการลบ')" style="font-size:15px"><i class="fa fa-times text-danger" ></i> </a>
                      @endif
                      </td>
              </tr>
@endforeach

      </tbody>
      </table>
  </div>

@endsection
