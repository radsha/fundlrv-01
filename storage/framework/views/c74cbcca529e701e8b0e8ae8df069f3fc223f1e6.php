<?php $__env->startSection('title','ระบบควบคุมหลักประกันเงินกู้ แบบรวมศูนย์ ออนไลน์'); ?>
<?php $__env->startSection('header'); ?>
  <a href='<?php echo e(url('newstype')); ?>' ><i class="fa  fa-arrow-circle-left text-danger fa-1x"  ></i></a>
 การกำหนดเลขที่หนังสือ-หมวด<?php echo e($data2->namectty); ?>

 <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

  <div class="table-responsive" >
    <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr class="info" >
                    <th class="text-center">ประจำปี</th>
                     <th class="text-center">คำนำหน้า</th>
                     <th class="text-center">เลขที่สุดท้าย</th>
                     <th class="text-center">สถานะ</th>
                     <th  class="text-center"><a href='<?php echo e(url('newsbook/create?idctty='.$data2->idctty)); ?>' ><i class="fa fa-plus-circle text-success" style="font-size:25px"></i> </a> </th>
                </tr>
            </thead>
        <tbody>
     <?php foreach($data as $data1): ?>
             <tr>
                      <td class="text-center"> <?php echo e($data1->bookyear); ?> </td>
                       <td class="text-center"> <?php echo e($data1->bookname); ?> </td>
                       <td class="text-center"> <?php echo e($data1->booklast); ?> </td>
                       <td class="text-center"> <?php echo e($data1->booksta); ?> </td>
                       <td class="text-center">
                           <a href="<?php echo e(url('newsbook/'.$data1->bookid .'/edit')); ?>"> <i class="fa fa-edit text-success" style="font-size:16px"></i></a>
                           <a href="<?php echo e(url('newsbook-delete/'. $data1->bookid)); ?>" onclick="return confirm('ยืนยันการลบ')" style="font-size:16px"><i class="fa fa-times text-danger" ></i> </a>
                     </td>
             </tr>
       <?php endforeach; ?>
     </tbody>
     </table>
 </div>

 <div class="text-center">
 <i class="fa fa-plus-circle text-success" style="font-size:16px"></i> การเพิ่ม &nbsp;<i class="fa fa-edit text-success" style="font-size:16px"></i>&nbsp; การแก้ไข <i class="fa fa-times text-danger" ></i> การลบ</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>