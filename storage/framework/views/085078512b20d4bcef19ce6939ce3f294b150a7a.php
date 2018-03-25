<?php $__env->startSection('title','โปรแกรมระบบบริหารงานฌาปนกิจและงานสารบัญ(กำหนดรายละเอียด)'); ?>
<?php $__env->startSection('header'); ?>
  <a href='<?php echo e(url('fundtype')); ?>' ><i class="fa  fa-home  text-Primary" style="font-size:25px"></i></a>
   รายละเอียดงานฌาปนกิจ (กำหนดรายละเอียด)
 <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<form class="form-horizontal" method="post" action="<?php echo e(url( $url )); ?>">
        <?php if( $id != 0): ?>
             <input type="hidden" name="_method" value="PUT" />
        <?php endif; ?>
             <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

<div class="form-group has-success">
             <label class="col-sm-2 control-label">ชื่อฌาปนกิจ</label>
      <div class="col-sm-10">
               <input type="text" class="form-control" name="fundname" placeholder="fundidd" value="<?php echo e(App\Fundtype::getnamefund(Request::input('fundid'))); ?>">

      </div>
</div>



<div class="form-group has-success">
             <label class="col-sm-2 control-label">เลขที่บัญชีสหกรณ์</label>
      <div class="col-sm-10">
               <input type="text" class="form-control" name="accsaha" placeholder="เลขที่บัญชีสหกรณ์" value="<?php echo e($data ? $data->accsaha : old('accsaha')); ?>">
               <?php echo $errors->first('accsaha'); ?>

      </div>
</div>

<div class="form-group has-success">
             <label class="col-sm-2 control-label">หลักค้ำประกัน</label>
      <div class="col-sm-10">
               <input type="text" class="form-control" name="numpay" placeholder="หลักค้ำประกัน" value="<?php echo e($data ? $data->numpay : old('numpay')); ?>">
               <?php echo $errors->first('numpay'); ?>

      </div>
</div>

<div class="form-group has-success">
             <label class="col-sm-2 control-label">เหรัญญิก/ผู้จัดการ</label>
      <div class="col-sm-10">
               <input type="text" class="form-control" name="moneyname" placeholder="เหรัญญิก/ผู้จัดการ" value="<?php echo e($data ? $data->moneyname : old('moneyname')); ?>">
               <?php echo $errors->first('moneyname'); ?>

      </div>
</div>

<div class="form-group has-success">
             <label class="col-sm-2 control-label">ลายมือชื่อ</label>
      <div class="col-sm-10">
               <input type="text" class="form-control" name="signature" placeholder="ลายมือชื่อ" value="<?php echo e($data ? $data->signature : old('signature')); ?>">
               <?php echo $errors->first('signature'); ?>

      </div>
</div>

<div class="form-group has-success">
             <label class="col-sm-2 control-label">fundid</label>
      <div class="col-sm-10">
               <input type="text" class="form-control" name="fundid" placeholder="fundid" value="<?php echo e(Request::input('fundid')); ?>">

      </div>
</div>

<div class="form-group has-success">
             <label class="col-sm-2 control-label">idoffice</label>
      <div class="col-sm-10">
               <input type="text" class="form-control" name="idoffice" placeholder="idoffice" value="<?php echo e(Auth::guard('admin')->user()->idoffice); ?>">

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