<?php $__env->startSection('title','โปรแกรมระบบบริหารงานฌาปนกิจและงานสารบัญ'); ?>
<?php $__env->startSection('header'); ?>
  <a href='<?php echo e(url('fundtype')); ?>' ><i class="fa  fa-arrow-circle-left text-danger" style="font-size:25px"></i></a>
 การกำหนดเลขที่ใบเสร็จ-<?php echo e(App\Fundtype::getnamefund(Request::input('fundid'))); ?>

 <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
  <div class="table-responsive" >
     <table class="table table-striped table-bordered table-hover">
             <thead>
                 <tr class="info" >
                      <th class="text-center" >#</th>
                      <th class="text-center" >ประจำปี</th>
                      <th class="text-center" >ชื่อ</th>
                      <th class="text-center" >เลขที่สุดท้าย</th>
                      <th class="text-center" >สถานะ</th>
                      <th class="text-center" >สมาคม/กองทนุ</th>
                      <th class="text-center" >เชื่อมโยง</th>
                      <th class="text-center"  ><a href='<?php echo e(url('book/create?fundid='.Request::input('fundid'))); ?>' ><i class="fa fa-plus-circle text-success" style="font-size:25px"></i> </a> </th>
                 </tr>
             </thead>
         <tbody>
      <?php $no=0;?>
      <?php foreach($data as $data): ?>
              <tr>
                      <th scope="row" class="text-center " ><?php echo e(++$no); ?></th>
                        <td class="text-center "> <?php echo e($data->bookyear); ?> </td>
                        <td class="text-center" > <?php echo e($data->bookname); ?> </td>
                        <td class="text-center" > <?php echo e($data->booklast); ?> </td>
                        <td class="text-center" >
                           <?php if($data->booksta=='1'): ?>
                            <i class="fa  fa-check-circle  text-success" style="font-size:15px"></i>
                          <?php else: ?>
                            <i class="fa  fa-times-circle  text-danger" style="font-size:15px"></i>
                          <?php endif; ?>
                        </td>
                        <td class="text-center" > <?php echo e(App\fundtype::getnamefund2($data->fundid)); ?> </td>
                        <td class="text-center" > <?php echo e(App\fundtype::getnamefund2($data->fundidlink)); ?> </td>
                        <td class="text-center" >
                       <a href="<?php echo e(url('book/'.$data->bookid .'/edit')); ?>"> <i class="fa fa-edit text-success" style="font-size:15px"></i></a>
                       <a href="<?php echo e(url('book-delete/'. $data->bookid)); ?>" onclick="return confirm('ยืนยันการลบ')" style="font-size:15px"><i class="fa fa-times text-danger" ></i> </a>
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