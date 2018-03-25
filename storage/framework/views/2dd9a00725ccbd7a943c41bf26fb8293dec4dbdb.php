<?php $__env->startSection('title','โปรแกรมระบบบริหารงานฌาปนกิจและงานสารบัญ'); ?>
<?php $__env->startSection('header'); ?>
  <a href='<?php echo e(url('fundtype')); ?>' ><i class="fa  fa-home  text-Primary" style="font-size:25px"></i></a>
   แก้ไขรายละเอียดงานฌาปนกิจ
 <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


<?php if(count($errors)>0): ?>
    <div class="alert alert-warning">
      <ul>
        <?php foreach($errors ->all() as $errors): ?>: ?>
          <li><?php echo e($errors); ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
<?php endif; ?>
    <form class="form-horizontal"  method="post" action="<?php echo e(url( $url )); ?>">

	<?php if( $id != 0): ?>
    <input type="hidden" name="_method" value="PUT" />
	<?php endif; ?>

    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">


        <div class="form-group has-success">
            <label  class="col-sm-2 control-label">ชื่อฌาปนกิจ</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control" name="fundname" placeholder="ชื่อฌาปนกิจ" value="<?php echo e($data ? $data->fundname : old('fundname')); ?>">

               </div>
        </div>

        <div class="form-group has-success">
            <label  class="col-sm-2 control-label">ชื่อย่อ</label>
            <div class="col-sm-10">
                <input type="text" class="form-control has-success" name="fundname2" placeholder="ชื่อย่อ"value="<?php echo e($data ? $data->fundname2 : old('fundname')); ?>" >

            </div>
        </div>

        <div class="form-group has-success">
                    <label class="col-sm-2 control-label">เลขที่บัญชีสมาคม</label>
             <div class="col-sm-10">
                      <input type="text" class="form-control" name="accsama" placeholder="เลขที่บัญชีสมาคม" value="<?php echo e($data ? $data->accsama : old('accsama')); ?>">

             </div>
       </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary"> บันทึก</button>
            </div>
        </div>
    </form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>