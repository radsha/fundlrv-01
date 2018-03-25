<?php $__env->startSection('title','ระบบบริหารงานสหกรณ'); ?>
<?php $__env->startSection('header'); ?>
<a href='<?php echo e(url('indexadmin')); ?>' ><i class="fa  fa-home  text-Primary" style="font-size:25px"></i></a>
   ประเภทกองทุน/ฌาปนกิจ
 <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

 {!ทดสอบ!}

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>