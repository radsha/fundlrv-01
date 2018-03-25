@extends('admin.home')
@section('title','ระบบควบคุมหลักประกันเงินกู้ แบบรวมศูนย์ ออนไลน์')
@section('header','รายละเอียดงานฌาปนกิจ')
@section('content')
    <form class="form-horizontal" >

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">ชื่อฌาปนกิจ</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="ชื่อฌาปนกิจ" value="{{$data->fundnamel}}">
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">ชื่อย่อ</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPassword3" placeholder="ชื่อย่อ" value="{{$data->fundname2l}}">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">บันทึก</button>
            </div>
        </div>
    </form>
@endsection
