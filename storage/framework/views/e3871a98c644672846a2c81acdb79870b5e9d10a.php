<!DOCTYPE html>
<html lang="en">

<head>


    <title><?php echo $__env->yieldContent('title'); ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo e(url('public/theme/vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo e(url('public/theme/vendor/metisMenu/metisMenu.min.css')); ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo e(url('public/theme/dist/css/sb-admin-2.css')); ?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo e(url('public/theme/vendor/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet" type="text/css">


    <?php echo $__env->yieldContent('csscus'); ?>

</head>

<body>


    <!-- jQuery -->
    <!-- Page Content -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h5 class="page-header"> <?php echo $__env->yieldContent('header'); ?></h5>
                </div>
                </div>
              <?php echo $__env->yieldContent('content'); ?>
        </div>


        <!-- /.container-fluid -->
  
    <!-- /#page-wrapper -->



    <!-- jQuery -->
    <script src="<?php echo e(url('public/theme/vendor/jquery/jquery.min.js')); ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo e(url('public/theme/vendor/bootstrap/js/bootstrap.min.js')); ?>"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo e(url('public/theme/vendor/metisMenu/metisMenu.min.js')); ?>"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo e(url('public/theme/dist/js/sb-admin-2.js')); ?>"></script>





<?php echo $__env->yieldContent('javascript'); ?>;

</body>

</html>
