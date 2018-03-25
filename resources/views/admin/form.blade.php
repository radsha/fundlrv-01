<!DOCTYPE html>
<html lang="en">

<head>


    <title>@yield('title')</title>

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


    <!-- jQuery -->
    <!-- Page Content -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h5 class="page-header"> @yield('header')</h5>
                </div>
                </div>
              @yield('content')
        </div>


        <!-- /.container-fluid -->
  
    <!-- /#page-wrapper -->



    <!-- jQuery -->
    <script src="{{url('public/theme/vendor/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{url('public/theme/vendor/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{url('public/theme/vendor/metisMenu/metisMenu.min.js')}}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{url('public/theme/dist/js/sb-admin-2.js')}}"></script>





@yield('javascript');

</body>

</html>
