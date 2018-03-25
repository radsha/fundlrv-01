<?php $__env->startSection('title','ระบบควบคุมหลักประกันเงินกู้ แบบรวมศูนย์ ออนไลน์'); ?>
<?php $__env->startSection('header'); ?>
  <a href='<?php echo e(url('booktype')); ?>' ><i class="fa  fa-arrow-circle-left text-Primary fa-1x" ></i></a>
  การกำหนดประเภทเอกสาร
 <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
  <form class="form-horizontal" method="post" action="<?php echo e(url( $url )); ?>">
          <?php if( $idctty != 0): ?>
               <input type="hidden" name="_method" value="PUT" />
          <?php endif; ?>
               <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

  <div class="form-group has-success">
               <label class="col-sm-2 control-label">ลำดับที่</label>
        <div class="col-sm-10">
                 <input type="text" class="form-control" name="idctty" placeholder="Auto" value="<?php echo e($data ? $data->idctty : old('idctty')); ?>">
        </div>
  </div>

  <div class="form-group has-success">
               <label class="col-sm-2 control-label">ประเภท</label>
        <div class="col-sm-10">
                 <input type="text" class="form-control" name="namectty" placeholder="ประเภท" value="<?php echo e($data ? $data->namectty : old('namectty')); ?>">
                 <?php echo $errors->first('namectty'); ?>

        </div>
  </div>

  <div class="form-group has-success">
               <label class="col-sm-2 control-label">สี</label>
        <div class="col-sm-10">
                 <input type="text" class="form-control" name="colorct" placeholder="colorct" value="<?php echo e($data ? $data->colorct : old('colorct')); ?>">
                 <?php echo $errors->first('colorct'); ?>

        </div>
  </div>

  <div class="form-group has-success">
               <label class="col-sm-2 control-label">ไอคอน</label>
        <div class="col-sm-10">
                 <input type="text" class="form-control" name="iconct" placeholder="iconct" value="<?php echo e($data ? $data->iconct : old('iconct')); ?>">
                 <?php echo $errors->first('iconct'); ?>

        </div>
  </div>


  <div class="form-group">
               <div class="col-sm-offset-2 col-sm-10">
                   <button type="submit" class="btn btn-primary">บันทึก</button>
              </div>
        </div>
  </form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>