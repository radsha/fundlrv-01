<?php $__env->startSection('title','โปรแกรมระบบบริหารงานฌาปนกิจและงานสารบัญ'); ?>
<?php $__env->startSection('header'); ?>
  <a href='<?php echo e(url('fundview')); ?>' ><i class="fa  fa-home  text-Primary" style="font-size:25px"></i></a>
  รายละเอียดการชำระ-<?php echo e(App\Fundtype::getnamefund($data2->fundid)); ?>

 <?php $__env->stopSection(); ?>

 <?php $__env->startSection('csscus'); ?>
   <link href="<?php echo e(url('public/theme/jquery-ui-1.12.1.full/jquery-ui.min.css')); ?>" rel="stylesheet" type="text/css">
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

  <form class="form-horizontal" method="post" action="<?php echo e(url( $url )); ?>">
         <?php if( $inid != 0): ?>
              <input type="hidden" name="_method" value="PUT" />
         <?php endif; ?>
              <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
 <div class="form-group has-success">
            <label class="col-sm-2 control-label">ลำดับที่</label>
          <div class="col-sm-2">
                 <input type="text" class="form-control" name="inid" placeholder="Auto" value="<?php echo e($data ? $data->inid : old('inid')); ?>">
          </div>
 </div>

            <?php  $fundlink=App\Fundtype::getfundidlink($data2->fundid)?>

 <div class="form-group has-success">
              <label class="col-sm-2 control-label">เลมที่</label>
       <div class="col-sm-1">
                <input type="text" class="form-control" name="numbook1" placeholder="numbook1" value="<?php echo e($data ? $data->numbook1 : App\Book::getnumbook1($fundlink)); ?>">
                <?php echo $errors->first('numbook1'); ?>

       </div>
       <div class="col-sm-1">
            <label class="col-sm-1 control-label">/</label>
       </div>
              <div class="col-sm-1">
                <input type="text" class="form-control" name="numbook2" placeholder="numbook2" value="<?php echo e($data ? $data->numbook2 :App\Book::getnumbook1($data2->fundid)+1); ?>">
                <?php echo $errors->first('numbook2'); ?>

       </div>
 </div>



 <div class="form-group has-success">
              <label class="col-sm-2 control-label">เงินสงเคราะห์ล่วงหน้า</label>
       <div class="col-sm-2">
                <input type="text" class="form-control" name="payment1" placeholder="payment1" value="<?php echo e($data ? $data->payment1 : old('payment1')); ?>">
                <?php echo $errors->first('payment1'); ?>

       </div>

         <label class="col-sm-2 control-label">ค่าสมัคร</label>
       <div class="col-sm-2">

                <input type="text" class="form-control" name="payment2" placeholder="payment2" value="<?php echo e($data ? $data->payment2 : old('payment2')); ?>">
                <?php echo $errors->first('payment2'); ?>

       </div>

 </div>


 <div class="form-group has-success">
              <label class="col-sm-2 control-label">ค่าบำรุงรายปี</label>
       <div class="col-sm-2">
                <input type="text" class="form-control" name="payment3" placeholder="payment3" value="<?php echo e($data ? $data->payment3 : old('payment3')); ?>">
                <?php echo $errors->first('payment3'); ?>

       </div>
                 <label class="col-sm-2 control-label">อื่น ๆ</label>
       <div class="col-sm-2">
                <input type="text" class="form-control" name="payment4" placeholder="payment4" value="<?php echo e($data ? $data->payment4 : old('payment4')); ?>">
                <?php echo $errors->first('payment4'); ?>

       </div>
 </div>


 <div class="form-group has-success">
              <label class="col-sm-2 control-label">วันที่</label>
       <div class="col-sm-2">
                <input type="text" class="date form-control" name="mdate"  id='mdate'  placeholder="mdate" value="<?php echo e($data ? App\Lib::dayen2($data->mdate) : date('d-m-Y')); ?>">
                <?php echo $errors->first('mdate'); ?>

       </div>
 </div>

 <div class="form-group has-success">
              <label class="col-sm-2 control-label">ประเภทการชำระ</label>
       <div class="col-sm-2">
                <input type="text" class="form-control" name="paytype" placeholder="paytype" value="<?php echo e($data ? $data->paytype : old('paytype')); ?>">
                <?php echo $errors->first('paytype'); ?>

       </div>
                    <label class="col-sm-2 control-label">ชำระโดย</label>
       <div class="col-sm-2">
                <input type="text" class="form-control" name="typepayid" placeholder="typepayid" value="<?php echo e($data ? $data->typepayid : old('typepayid')); ?>">
                <?php echo $errors->first('typepayid'); ?>

       </div>
 </div>



 <div class="form-group has-success">
              <label class="col-sm-2 control-label">หมายเหตุ</label>
       <div class="col-sm-10">
                <input type="text" class="form-control" name="inmemo" placeholder="inmemo" value="<?php echo e($data ? $data->inmemo : old('inmemo')); ?>">
                <?php echo $errors->first('inmemo'); ?>

       </div>
 </div>

 <div class="form-group has-success">
              <label class="col-sm-2 control-label">เลขที่สมาคม</label>
       <div class="col-sm-2">
                <input type="text" class="form-control" name="samano" placeholder="samano" value="<?php echo e($data ? $data->samano : old('samano')); ?>">
                <?php echo $errors->first('samano'); ?>

       </div>
 </div>

 <div class="form-group has-success">
              <label class="col-sm-2 control-label">วันที่บันทึกข้อมูล</label>
       <div class="col-sm-4">
                <input type="text" class="form-control" name="keydata" placeholder="keydata" value="<?php echo e(Auth::guard('admin')->user()->fname .'|'.Auth::guard('admin')->user()->idoffice.'|'.date('d-m-').(date('Y')+543).' | '.date('H:i:s')); ?>">
                <?php echo $errors->first('keydata'); ?>

       </div>
 </div>



 <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-primary">บันทึก</button>
             </div>
       </div>


       <input type="text" name="mbid"  value="<?php echo e($data2 ? $data2->mbid : old('mbid')); ?>">
       <input type="text"  name="idoffice"  value="<?php echo e($data2 ? $data2->idoffice : old('idoffice')); ?>">
       <input type="text"  name="mbmember" value="<?php echo e($data2 ? $data2->mbmember : old('mbmember')); ?>">
       <input type="text" name="fundid"  value="<?php echo e($data2 ? $data2->fundid : old('fundid')); ?>">
 </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
<script src="<?php echo e(url('public/theme/jquery-ui-1.12.1.full/jquery-ui.js')); ?>"></script>
  <script type="text/javascript">


         $(function () {

           var d = new Date();
         var toDay = d.getDate() + '-' + (d.getMonth() + 1) + '-' + (d.getFullYear() );

         $('input[name="mdate"]').datepicker({ dateFormat: 'dd-mm-yy', isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
                dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
                monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
                monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});

         });


   </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>