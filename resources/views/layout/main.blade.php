<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Page : @yield('site_title')</title>
    <meta name="viewport" content="width=device-width,initial-scale=1" >
    <meta http-equiv="X-UA-Compatible" content="IE-edge" />
    <!-- Bootstrap Core CSS -->
    <link href="{{url('public/theme/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{url('public/theme/vendor/metisMenu/metisMenu.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{url('public/theme/dist/css/sb-admin-2.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{url('public/theme/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

  </head>
  <body>
    <div class="navbar navar-default" role="navigation">
        <div class="container-fluid">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" >

                 <span class="sr-only"> </span>
                 <span class="icon-bar"> </span>
                 <span class="icon-bar"> </span>
                 <span class="icon-bar"> </span>
               </button>
               <a class="navbar-brand" href="{{url('articles')}}"
              </div>
        </div>
    </div>

  <div class="container">
    @yield('content')

  </div>

       <div class="footer">
         Copyright &Copy 2005
       </div>

       <!-- jQuery -->
       <script src="{{url('public/theme/vendor/jquery/jquery.min.js')}}"></script>

       <!-- Bootstrap Core JavaScript -->
       <script src="{{url('public/theme/vendor/bootstrap/js/bootstrap.min.js')}}"></script>

       <!-- Metis Menu Plugin JavaScript -->
       <script src="{{url('public/theme/vendor/metisMenu/metisMenu.min.js')}}"></script>

       <!-- Custom Theme JavaScript -->
       <script src="{{url('public/theme/dist/js/sb-admin-2.js')}}"></script>
  </body>
</html>
