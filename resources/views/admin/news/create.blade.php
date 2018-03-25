@extends('admin.form')
@section('title','ระบบควบคุมหลักประกันเงินกู้ แบบรวมศูนย์ ออนไลน์')
@section('header')
  <a href='{{url('booktype')}}' ><i class="fa  fa-arrow-circle-left text-Primary fa-1x" ></i></a>
  การกำหนดประเภทเอกสาร
 @endsection

  @section('csscus')
    <link href="{{url('public/theme/lou-multi/css/multi-select.css')}}" media="screen" rel="stylesheet" type="text/css">
     <link href="{{url('public/theme/summernote/summernote.css')}}" media="screen" rel="stylesheet" type="text/css">   
   @endsection

@section('content')
  <form class="form-horizontal" method="post" action="{{url( $url )}}" role="form" enctype="multipart/form-data">

         @if( $idct != 0)
              <input type="hidden" name="_method" value="PUT" />
         @endif
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
 <div class="form-group has-success">
              <label class="col-sm-2 control-label">idct</label>
       <div class="col-sm-10">
                <input type="text" class="form-control" name="idct" placeholder="idct" value="{{ $data ? $data->idct : old('idct') }}">
                {!! $errors->first('idct') !!}
       </div>
 </div>

 <div class="form-group has-success">
              <label class="col-sm-2 control-label">vyear</label>
       <div class="col-sm-10">
                <input type="text" class="form-control" name="vyear" placeholder="vyear" value="{{ $data ? $data->vyear : old('vyear') }}">
                {!! $errors->first('vyear') !!}
       </div>
 </div>

 <div class="form-group has-success">
              <label class="col-sm-2 control-label">idcttype</label>
       <div class="col-sm-10">
                <input type="text" class="form-control" name="idcttype" placeholder="idcttype" value="{{ $data ? $data->idcttype : old('idcttype') }}">
                {!! $errors->first('idcttype') !!}
       </div>
 </div>

 <div class="form-group has-success">
              <label class="col-sm-2 control-label">idoffice</label>
       <div class="col-sm-10">
                <input type="text" class="form-control" name="idoffice" placeholder="idoffice" value="{{ $data ? $data->idoffice : old('idoffice') }}">
                {!! $errors->first('idoffice') !!}
       </div>
 </div>

 <div class="form-group has-success">
              <label class="col-sm-2 control-label">bookname</label>
       <div class="col-sm-10">
                <input type="text" class="form-control" name="bookname" placeholder="bookname" value="{{ $data ? $data->bookname : old('bookname') }}">
                {!! $errors->first('bookname') !!}
       </div>
 </div>

 <div class="form-group has-success">
              <label class="col-sm-2 control-label">bookno</label>
       <div class="col-sm-10">
                <input type="text" class="form-control" name="bookno" placeholder="bookno" value="{{ $data ? $data->bookno : old('bookno') }}">
                {!! $errors->first('bookno') !!}
       </div>
 </div>

 


 <div class="form-group has-success">
              <label class="col-sm-2 control-label">content1</label>
       <div class="col-sm-10">
                <input type="text" class="form-control" name="content1" placeholder="content1" value="{{ $data ? $data->content1 : old('content1') }}">
                {!! $errors->first('content1') !!}
       </div>
 </div>

 <div class="form-group has-success">
              <label class="col-sm-2 control-label">content2</label>
       <div class="col-sm-10">
                <input type="text" class="form-control" name="content2" placeholder="content2" value="{{ $data ? $data->content2 : old('content2') }}">
                {!! $errors->first('content2') !!}
       </div>
 </div>

 <div class="form-group has-success">
              <label class="col-sm-2 control-label">vday</label>
       <div class="col-sm-10">
                <input type="text" class="form-control" name="vday" placeholder="vday" value="{{ $data ? $data->vday : old('vday') }}">
                {!! $errors->first('vday') !!}
       </div>
 </div>

 <div class="form-group has-success">
              <label class="col-sm-2 control-label">vcout</label>
       <div class="col-sm-10">
                <input type="text" class="form-control" name="vcout" placeholder="vcout" value="{{ $data ? $data->vcout : old('vcout') }}">
                {!! $errors->first('vcout') !!}
       </div>
 </div>

 <div class="form-group has-success">
              <label class="col-sm-2 control-label">iduser</label>
       <div class="col-sm-10">
                <input type="text" class="form-control" name="iduser" placeholder="iduser" value="{{ $data ? $data->iduser : old('iduser') }}">
                {!! $errors->first('iduser') !!}
       </div>
 </div>

 <div class="form-group has-success">
              <label class="col-sm-2 control-label">numuser</label>
       <div class="col-sm-10">
                <input type="text" class="form-control" name="numuser" placeholder="numuser" value="{{ $data ? $data->numuser : old('numuser') }}">
                {!! $errors->first('numuser') !!}
       </div>
 </div>

 <div class="form-group has-success">
              <label class="col-sm-2 control-label">numview</label>
       <div class="col-sm-10">
                <input type="text" class="form-control" name="numview" placeholder="numview" value="{{ $data ? $data->numview : old('numview') }}">
                {!! $errors->first('numview') !!}
       </div>
 </div>


 <div class='span12'>
  
<a href='#' id='select-all'>select all</a>
<a href='#' id='deselect-all'>deselect all</a>

           <select multiple='multiple' id ='public-methods' class="searchable" name="searchable[]">
         <?php $dataoff=DB::table('tboffice')->get();?>
             @foreach ($dataoff as $dataoff1)
                 <option value="{{$dataoff1->idoffice}}">{{$dataoff1->nameoffice}} </option>
              @endforeach

          </select>

  </div>
<?php session_start();?>
<?php $_SESSION["idoffice"]=Auth::guard('admin')->user()->idoffice;?>

        <div class="form-group">
              <div class="col-sm-12">
                <textarea class="form-control" name="detail" id="detail"> {{ $data ? $data->numview : '' }} </textarea>
              </div>
        </div>
            

  

 <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-primary">บันทึก</button>
             </div>
       </div>

    




 </form>


@endsection

@section('javascript')

<script type="text/javascript">
  var _base="{{url('')}}";  
</script>

  <script src="{{asset('public/admin/lib/tinymce/tinymce.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('public/admin/js/tools/tiny-editor.js')}}" type="text/javascript"></script>
  


  </script>
  <script type="text/javascript"> 
  (function($){
    var editor = tiny;
    editor.section    = '#detail';
    editor.content_css  = _base + '/public/admin/css/bootstrap.min.css';
    editor.full();

  }(jQuery));



   </script>


<script src="{{url('public/theme/lou-multi/js/jquery.multi-select.js')}}"></script>
<script src="{{url('public/theme/lou-multi/js/jquery.quicksearch.js')}}"></script>


 <script type="text/javascript">
$('.searchable').multiSelect({

  selectableHeader: "<input type='text' class='search-input' autocomplete='off' placeholder='ค้นหา''>",
  selectionHeader: "<input type='text' class='search-input' autocomplete='off' placeholder='ค้นหา'>",
  afterInit: function(ms){
    var that = this,
        $selectableSearch = that.$selectableUl.prev(),
        $selectionSearch = that.$selectionUl.prev(),
        selectableSearchString = '#'+that.$container.attr('id')+' .ms-elem-selectable:not(.ms-selected)',
        selectionSearchString = '#'+that.$container.attr('id')+' .ms-elem-selection.ms-selected';

    that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
    .on('keydown', function(e){
      if (e.which === 40){
        that.$selectableUl.focus();
        return false;
      }
    });

    that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
    .on('keydown', function(e){
      if (e.which == 40){
        that.$selectionUl.focus();
        return false;
      }
    });
  },
  afterSelect: function(){
    this.qs1.cache();
    this.qs2.cache();
  },
  afterDeselect: function(){
    this.qs1.cache();
    this.qs2.cache();
  }
});


$('#select-all').click(function(){
  $('.searchable').multiSelect('select_all');
  return false;
});

$('#deselect-all').click(function(){
  $('#public-methods').multiSelect('deselect_all');
  return false;
});

  </script>

 





@endsection
