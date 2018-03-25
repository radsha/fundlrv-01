<?php $__env->startSection('title','โปรแกรมระบบบริหารงานฌาปนกิจและงานสารบัญ'); ?>
<?php $__env->startSection('header'); ?>
  <a href='<?php echo e(url('fundfile/'.Request::input('mbid').'?samano='.Request::input('samano').'&fundid='.Request::input('fundid').'&mbmember='.Request::input('mbmember').'&keywords='.Request::input('keywords'))); ?>' ><i class="fa fa-arrow-circle-left text-danger" style="font-size:25px"></i></a>
   แก้ไขรายละเอียดไฟล์เอกสาร
 <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

  <div class="alert-warning text-center" >
      <label class=".col-md-2 ">ทะเบียน สมาคม</label>
      <label class=".col-md-2 form-control-static text-primary"> <?php echo e($data2->samano); ?></label>
      <label class=".col-md-2 ">ชื่อ - นามสกุล สมาคม</label>
      <label class=".col-md-2 form-control-static text-primary"> <?php echo e($data2->fname); ?></label>
      <label class=".col-md-2 ">ความสัมพันธ์ </label>
      <label class=".col-md-2 form-control-static text-primary"> <?php echo e(App\Fundrela::getnamerela($data2->fundrelaid)); ?></label>
      <label class=".col-md-2 ">ทะเบียน สอ.</label>
      <label class=".col-md-2 form-control-static text-primary"> <?php echo e($data2->mbmember); ?></label>
      <label class=".col-md-2 control-label">ชื่อ - นามสุกล สอ.</label>
      <label class=".col-md-2 form-control-static text-primary"> <?php echo e(App\Tbmembmaster::getnamemember($data2->mbmember)); ?></label>
  </div>

  <form class="form-horizontal" method="post" action="<?php echo e(url( $url )); ?>"  enctype="multipart/form-data">
          <?php if( $idfile != 0): ?>
               <input type="hidden" name="_method" value="PUT" />
          <?php endif; ?>
                 <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                 
                 <input type="text" class="form-control" name="idfile" placeholder="idfile" value="<?php echo e($idfile); ?>">
                 <input type="text" class="form-control" name="mbid" placeholder="mbid" value="<?php echo e(Request::input('mbid')); ?>">
                 <input type="text" class="form-control" name="mbmember" placeholder="mbmember" value="<?php echo e(Request::input('mbmember')); ?>">
                 <input type="text" class="form-control" name="idoffice" placeholder="idoffice" value="<?php echo e(Auth::guard('admin')->user()->idoffice); ?>">
                 <input type="text" class="form-control" name="fundid" placeholder="fundid" value="<?php echo e(Request::input('fundid')); ?>">

    <div class="form-group has-success">
                 <label class="col-sm-2 control-label">idfiletype</label>
          <div class="col-sm-10">
                   <input type="text" class="form-control" name="idfiletype" placeholder="idfiletype" value="<?php echo e(1); ?>">
                   <?php echo $errors->first('idfiletype'); ?>

          </div>
    </div>

  <div class="form-group has-success">
                <label class="col-sm-2 control-label">กรุณาเลือกไฟล์</label>
                <div class="col-sm-10">
                <input type="file" name="filename" id="filename" />
              </div>
  </div>

    <div class="form-group has-success">
               <label class="col-sm-2 control-label">keydata</label>
                <div class="col-sm-10">
                 <input type="text" class="form-control" name="keydata" placeholder="keydata"  value="<?php echo e($data ? $data->keydata : Auth::guard('admin')->user()->fname .' | '.Auth::guard('admin')->user()->idoffice.'|'.date('d-m-').(date('Y')+543).' | '.date('H:i:s')); ?>">
               </div>
  </div>


  <div class="form-group">
               <div class="col-sm-offset-2 col-sm-10">
                   <button type="submit" class="btn btn-primary">บันทึก</button>
              </div>
        </div>

        <input type="text" class="form-control" name="samano" placeholder="samano"  value="<?php echo e(Request::input('samano')); ?>">

  </form>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>