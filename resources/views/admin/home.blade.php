<!DOCTYPE html>
<html lang="en">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    <meta name="robots" content="noindex, nofollow">

    <!-- Bootstrap Core CSS -->
    <link href="{{url('public/theme/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{url('public/theme/vendor/metisMenu/metisMenu.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{url('public/theme/dist/css/sb-admin-2.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{url('public/theme/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">


    @yield('csscus')

</head>

<body>
<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>


            <h3 class="navbar-brand text-info" > <i class="fa fa-user-md text-info" style="font-size:25px; "></i>ระบบควบคุมหลักประกันเงินกู้ แบบรวมศูนย์ ออนไลน์ </h3>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">

            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="{{ url('logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="{{url('index')}}"><i class="fa fa-dashboard fa-fw"></i> ทักทาย</a>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-male fa-fw"></i> งานฌาปนกิจ<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">


                            <li> <a href="{{url('indexadmin')}}">1.หน้าแรก</a> </li>
                            <li> <a href="{{url('member')}}">2.ทะเบียนสมาชิก</a> </li>
                            <li> <a href="{{url('fund')}}">3.การสมัคร</a> </li>
                            <li> <a href="{{url('fundview')}}">4.การชำระเงิน</a> </li>
                            <li> <a href="{{url('fundgaint')}}">5.ผู้รับผลประโยชน์</a> </li>
                            <li> <a href="{{url('indexadmin')}}">6.ทะเบียนฌาปนกิจ</a> </li>
                            <li> <a href="{{url('indexadmin')}}">7.ทะเบียนผู้เสียชีวิต</a> </li>
                            <li> <a href="{{url('fundfile')}}">8.การแทรกไฟล์</a> </li>
                            <li> <a href="{{url('fundpic')}}">7.การแทรกรูป</a> </li>


                            <li>
                                <a href="#"><i class="fa fa-print fa-fw"></i>  รายงาน <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li> <a href="{{url('indexadmin')}}l">1.รายงานรายวัน</a>  </li>
                                </ul>
                            </li>





                        </ul>
                    </li>


                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> งานสารบัญ<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                               <li> <a href="newslist">เอกสารส่ง</a>   </li>
                               <li> <a href="newsreive">เอกสารรับ</a> </li>
                               <li>
                                   <a href="#"><i class="fa fa-print fa-fw"></i> การตั้งค่า <span class="fa arrow"></span></a>
                                         <ul class="nav nav-second-level">
                                         <li> <a href="{{url('newstype')}}" >1.ประเภทเอกสาร</a>  </li>
                                         </ul>
                                 </li>
                            </ul>
                    </li>
@if(Auth::guard('admin')->user()->level=='A')
                  <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> AdminMenu<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                               <li> <a href="{{url('menulist')}}">เมนู</a>   </li>
                               <li> <a href="{{url('userper')}}">กำหนดสิทธิ์</a> </li>
                            </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-print fa-fw"></i> การตั้งค่า <span class="fa arrow"></span></a>
                              <ul class="nav nav-second-level">
                              <li> <a href="{{url('fundtype')}}" >1.งานฌาปนกิจ</a>  </li>
                              <li> <a href="{{url('import')}}" >2.การนำเข้าข้อมูล</a>  </li>
                              </ul>
                      </li>

@endif
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>
</div>




<!-- /#wrapper -->

    <!-- jQuery -->
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <h5 class="page-header"> @yield('header')</h5>
                </div>
                </div>
              @yield('content')
        </div>


        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->



    <!-- jQuery -->
    <script src="{{url('public/theme/vendor/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{url('public/theme/vendor/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{url('public/theme/vendor/metisMenu/metisMenu.min.js')}}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{url('public/theme/dist/js/sb-admin-2.js')}}"></script>





@yield('javascript')

</body>

</html>
