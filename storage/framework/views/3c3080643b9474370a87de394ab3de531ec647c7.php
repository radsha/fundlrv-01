<?php $__env->startSection('title','โปรแกรมระบบบริหารงานฌาปนกิจและงานสารบัญ'); ?>
<?php $__env->startSection('header'); ?>
<a href='<?php echo e(url('indexadmin')); ?>' ><i class="fa  fa-home  text-Primary" style="font-size:25px"></i></a>
   ประเภทกองทุน/ฌาปนกิจ
 <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="table-responsive" >
   <table class="table table-striped table-bordered table-hover">
           <thead>
               <tr class="info" >
                    <th>ลำดับที่</th>
                    <th>ชื่อ - นามสกุล</th>
                    <th>ตำแหน่ง</th>
                    <th>User</th>
                    <th>E-mail</th>
                    <th>Tel</th>
                    <th>ที่อยู่</th>
                    <th>สถานบริการ</th>
                    <th>ระดับ</th>
                    <th>จำนวนครั้ง</th>
                    <th>วันล่าสุด</th>
                    <th>เริ่มต้น</th>
                    <th>สิ้นสุด</th>
                    <th ><a href='<?php echo e(url('users/create')); ?>' ><i class="fa fa-plus-circle text-success" style="font-size:25px"></i> </a> </th>
               </tr>
           </thead>
       <tbody>
    <?php foreach($data1 as $data): ?>
            <tr>

                    <td> <?php echo e($data->id); ?> </td>
                      <td> <?php echo e($data->fname); ?> </td>
                      <td> <?php echo e($data->position); ?> </td>
                      <td> <?php echo e($data->username); ?> </td>
                      <td> <?php echo e($data->e_mail); ?> </td>
                      <td> <?php echo e($data->tel_mobile); ?> </td>
                      <td> <?php echo e($data->address); ?> </td>
                      <td> <?php echo e($data->idoffice); ?> </td>
                      <td> <?php echo e($data->level); ?> </td>
                      <td> <?php echo e($data->visit); ?> </td>
                      <td> <?php echo e($data->visitday); ?> </td>
                      <td> <?php echo e($data->startday); ?> </td>
                      <td> <?php echo e($data->endday); ?> </td>
                       <td>
                     <a href="<?php echo e(url('users/'.$data->id .'/edit')); ?>"> <i class="fa fa-edit text-success" style="font-size:16px"></i></a>
                     <a href="<?php echo e(url('users-delete/'. $data->id)); ?>" onclick="return confirm('ยืนยันการลบ')" style="font-size:16px"><i class="fa fa-times text-danger" ></i> </a>



                    </td>
            </tr>
      <?php endforeach; ?>
    </tbody>
    </table>
</div>

<div class="text-center">
<i class="fa fa-plus-circle text-success" style="font-size:16px"></i> การเพิ่ม &nbsp;<i class="fa fa-edit text-success" style="font-size:16px"></i>&nbsp; การแก้ไข <i class="fa fa-times text-danger" ></i> การลบ</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>