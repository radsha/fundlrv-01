<?php $__env->startSection('title','ระบบควบคุมหลักประกันเงินกู้ แบบรวมศูนย์ ออนไลน์'); ?>
<?php $__env->startSection('header'); ?>
<a href='<?php echo e(url('fundtype')); ?>' ><i class="fa  fa-home  text-Primary" style="font-size:25px"></i></a>
   รายละเอียดงานฌาปนกิจ
 <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
 <div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
      <thead>
        <tr class="info" >
          <th >#</th>
            <th>กลุ่ม</th>
            <th>รหัส</th>
           <th>ชื่อฌาปนกิจ</th>
            <th>อักษรย่อ</th>
             <th>เลขที่บัญชี</th>
             <th >
                 <?php if(Auth::guard('admin')->user()->levelg=='A'): ?>
               <a href='<?php echo e(url('fundtype/create')); ?>' ><i class="fa  fa-plus-circle  text-info" style="font-size:25px"></i> </a>
              <?php endif; ?>
               </th>
           </tr>
         </thead>
         <tbody>

           <?php foreach($data as $data): ?>

           <tr>
               <td scope="row"><?php echo e(++$no); ?></td>
                <td>  <?php echo e($data->fundidL); ?> </td>
                <td>  <?php echo e($data->fundid); ?></td>
                <td>  <?php echo e($data->fundname); ?></td>
                <td>  <?php echo e($data->fundname2); ?></td>
                <td>  <?php echo e($data->accsama); ?></td>
                <td align="center">
              <?php if(Auth::guard('admin')->user()->levelg=='A'): ?>
                <a href="<?php echo e(url('fundtype/'.$data->fundid .'/edit')); ?>"> <i class="fa fa-edit text-success" style="font-size:16px"></i></a>
                <a href="<?php echo e(url('fundtype-delete/'. $data->fundid)); ?>" onclick="return confirm('ยืนยันการลบ')"  style="font-size:16px"><i class="fa fa-times text-danger" ></i> </a>
              <?php endif; ?>

<?php if(App\Fundtype::gettypefund($data->fundid)=='1'): ?>
        <?php $fundidd=App\fundtype_de::getfundidd($data->fundid,Auth::guard('admin')->user()->idoffice) ?>
          <a href="<?php echo e(url('book/?fundid='.$data->fundid)); ?>"   style="font-size:16px"><i class="fa fa-book text-warning" ></i> </a>
					<?php if($fundidd=='0'): ?>
              <a href="<?php echo e(url('fundtype_de/create?fundid='.$data->fundid)); ?>"   style="font-size:16px"><i class="fa fa-file-text text-primary" ></i> </a>
					<?php else: ?>
              <a href="<?php echo e(url('fundtype_de/'.$fundidd.'/edit?fundid='.$data->fundid)); ?>"   style="font-size:16px"><i class="fa fa-file-text text-primary" ></i> </a>
					<?php endif; ?>
<?php endif; ?>
              </td>
            </tr>
       <?php endforeach; ?>
                   </tbody>
                 </table>
               </div>

               <div class="text-center">
              <i class="fa  fa-plus-circle  text-success" style="font-size:16px"></i> การเพิ่ม &nbsp;<i class="fa fa-edit text-success" style="font-size:16px"></i>&nbsp; การแก้ไข <i class="fa fa-times text-danger" ></i> การลบ</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>