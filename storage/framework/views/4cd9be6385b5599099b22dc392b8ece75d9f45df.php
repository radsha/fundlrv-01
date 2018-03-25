<?php $__env->startSection('title','โปรแกรมระบบบริหารงานฌาปนกิจและงานสารบัญ'); ?>
<?php $__env->startSection('header'); ?>
  <a href='<?php echo e(url('fundview')); ?>' ><i class="fa  fa-home  text-Primary" style="font-size:25px"></i></a>
   แก้ไขรายละเอียดงานฌาปนกิจ
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
      <?php /*  <label class=".col-md-2 form-control-static text-primary"> <?php echo e(App\Tbmembmaster::getnamemember($data2->mbmember)); ?></label>  */ ?>
  </div>

  <form class="form-horizontal" method="post" action="<?php echo e(url( $url )); ?>">
         <?php if( $glid != 0): ?>
              <input type="hidden" name="_method" value="PUT" />
         <?php endif; ?>
                  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
         <div class="form-group has-success">
                      <label class="col-sm-2 control-label">@</label>
               <div class="col-sm-10">
                        <input type="text" class="form-control" name="glid" placeholder="glid" value="<?php echo e($data ? $data->glid : old('glid')); ?>">
                </div>
         </div>

         <div class="form-group has-success">
                      <label class="col-sm-2 control-label">ลำดับที่</label>
               <div class="col-sm-10">
                        <input type="text" class="form-control" name="glno" placeholder="ลำดับที่" value="<?php echo e($data ? $data->glno : old('glno')); ?>">
                        <?php echo $errors->first('glno'); ?>

               </div>
         </div>

         <div class="form-group has-success">
                      <label class="col-sm-2 control-label">ชื่อ - นามสกุล</label>
               <div class="col-sm-10">
                        <input type="text" class="form-control" name="glname" placeholder="ชื่อ - นามสกุล" value="<?php echo e($data ? $data->glname : old('glname')); ?>">
                        <?php echo $errors->first('glname'); ?>

               </div>
         </div>

         <div class="form-group has-success">
                      <label class="col-sm-2 control-label">บัตรประชาชน</label>
               <div class="col-sm-10">
                        <input type="text" class="form-control" name="glpinid" placeholder="บัตรประชาชน" value="<?php echo e($data ? $data->glpinid : old('glpinid')); ?>">
                        <?php echo $errors->first('glpinid'); ?>

               </div>
         </div>

         <div class="form-group has-success">
                      <label class="col-sm-2 control-label">ที่อยู่</label>
               <div class="col-sm-10">
                        <input type="text" class="form-control" name="gladdress" placeholder="ที่อยู่" value="<?php echo e($data ? $data->gladdress : old('gladdress')); ?>">
                        <?php echo $errors->first('gladdress'); ?>

               </div>
         </div>

         <div class="form-group has-success">
                      <label class="col-sm-2 control-label">วันที่</label>
               <div class="col-sm-10">
                        <input type="text" class="form-control" name="glbdate" placeholder="glbdate" value="<?php echo e($data ? $data->glbdate : old('glbdate')); ?>">
                        <?php echo $errors->first('glbdate'); ?>

               </div>
         </div>



         <div class="form-group has-success">
                      <label class="col-sm-2 control-label">mbmember</label>
               <div class="col-sm-10">
                        <input type="text" class="form-control" name="mbmember" placeholder="mbmember" value="<?php echo e(Request::input('mbmember')); ?>">
                        <?php echo $errors->first('mbmember'); ?>

               </div>
         </div>

         <div class="form-group has-success">
                      <label class="col-sm-2 control-label">idoffice</label>
               <div class="col-sm-10">
                        <input type="text" class="form-control" name="idoffice" placeholder="idoffice" value="<?php echo e($data ? $data->idoffice : old('idoffice')); ?>">
                        <?php echo $errors->first('idoffice'); ?>

               </div>
         </div>

         <div class="form-group has-success">
                      <label class="col-sm-2 control-label">keydata</label>
               <div class="col-sm-10">
                        <input type="text" class="form-control" name="keydata" placeholder="keydata" value="<?php echo e(date('Y-m-d Hms')); ?>">
                        <?php echo $errors->first('keydata'); ?>

               </div>
         </div>

         <div class="form-group has-success">
                      <label class="col-sm-2 control-label">samano</label>
               <div class="col-sm-10">
                        <input type="text" class="form-control" name="samano" placeholder="samano" value="<?php echo e(Request::input('samano')); ?>">
                        <?php echo $errors->first('samano'); ?>

               </div>
         </div>

         <div class="form-group has-success">
                      <label class="col-sm-2 control-label">mbid</label>
               <div class="col-sm-10">
                        <input type="text" class="form-control" name="mbid" placeholder="samano" value="<?php echo e(Request::input('mbid')); ?>">
                        <?php echo $errors->first('mbid'); ?>

               </div>
         </div>

         <div class="form-group has-success">
                      <label class="col-sm-2 control-label">mbid</label>
               <div class="col-sm-10">
                        <input type="text" class="form-control" name="fundid" placeholder="fundid" value="<?php echo e(Request::input('fundid')); ?>">
                        <?php echo $errors->first('fundid'); ?>

               </div>
         </div>

         <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-primary">บันทึก</button>
                     </div>
               </div>
         </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>

  <script type="text/javascript">
  (function($){
    var d = new Date();
        var toDay = d.getDate() + '-' + (d.getMonth() + 1) + '-' + (d.getFullYear() + 543);

        $('input[name="mdate"]').datepicker({
        dateFormat: 'dd-mm-yy',
        isBuddhist: true,
        defaultDate: toDay,
        dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
        dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
        monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
        monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']
      });
  }(jQuery));
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>