<?php $__env->startSection('title','โปรแกรมระบบบริหารงานฌาปนกิจและงานสารบัญ'); ?>
<?php $__env->startSection('header'); ?>
  <a href='<?php echo e(url('fund')); ?>' ><i class="fa  fa-arrow-circle-left text-danger" style="font-size:25px"></i></a>
การสมัครสมาชิก-<?php echo e(App\Fundtype::getnamefund(Request::input('fundid'))); ?>

 <?php $__env->stopSection(); ?>

 <?php $__env->startSection('csscus'); ?>
   <link href="<?php echo e(url('public/theme/jquery-ui-1.12.1.full/jquery-ui.min.css')); ?>" rel="stylesheet" type="text/css">
  <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <form class="form-horizontal" method="post" action="<?php echo e(url( $url )); ?>">
          <?php if( $mbid != 0): ?>
               <input type="hidden" name="_method" value="PUT" />
          <?php endif; ?>

          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

          <label class="col-sm-2 control-label">ทะเบียน สอ.</label>
          <label class="col-sm-2 form-control-static text-primary"> <?php echo e(Request::input('mbmember')); ?></label>
          <label class="col-sm-2 control-label">ชื่อ - นามสุกล สอ.</label>
          <label class="col-sm-6 form-control-static text-primary"> <?php echo e(App\Tbmembmaster::getnamemember(Request::input('mbmember'))); ?></label>





  <div class="form-group has-success">
               <label class="col-sm-2 control-label">ลำดับที่</label>
        <div class="col-sm-10">
                 <input type="text" class="form-control" name="mbid" placeholder="Auto" value="<?php echo e($data ? $data->mbid : old('mbid')); ?>">
        </div>
  </div>

  <div class="form-group has-success">
       <label class="col-sm-2 control-label">ความสัมพันธ์</label>
        <div class="col-sm-10">
            <?php $fundtype=App\Fundtype::gettypefund(Request::input('fundid')) ?>
            <?php if($fundtype=='1'): ?>
            <?php $datarela=DB::table('fundrela')->where('fundrelaid','=', '1')->orderBy('fundrelaid', 'asc')->get();?>
          <?php else: ?>
            <?php $datarela=DB::table('fundrela')->where('fundrelaid','>','1')->orderBy('fundrelaid', 'asc')->get();?>
          <?php endif; ?>
              <select name="fundrelaid" class="form-control">
                    <?php foreach($datarela as $datarela1): ?>
                        <option value="<?php echo e($datarela1->fundrelaid); ?>" <?php if(!(strcmp($datarela1->fundrelaid,$data ? $data->fundrelaid:1))) {echo "selected=\"selected\"";}?>><?php echo e($datarela1->fundrelaname); ?></option>
                    <?php endforeach; ?>
              </select>
        </div>
  </div>

  <div class="form-group has-success">
               <label class="col-sm-2 control-label">ชื่อ - นามสกุล ผู้สมัคร</label>
        <div class="col-sm-10">
                 <input type="text" class="form-control" name="fname" placeholder="fname" value="<?php echo e($data ? $data->fname : App\Tbmembmaster::getnamemember(Request::input('mbmember'))); ?>">
                 <?php echo $errors->first('fname'); ?>

        </div>

  </div>


  <div class="form-group has-success">
         <label class="col-sm-2 control-label">วันที่สมัคร</label>
        <div class="col-sm-2">
                 <input type="text" class="form-control" name="mbapply" id="mbapply" placeholder="วันที่สมัคร" value="<?php echo e($data ? App\Lib::dayen2($data->mbapply) : date('d-m-Y')); ?>">
                 <?php echo $errors->first('mbapply'); ?>

  </div>

       <label class="col-sm-2 control-label">วันที่คุ้มครอง</label>
        <div class="col-sm-2">
                 <input type="text" class="form-control" name="mbprotech" placeholder="วันที่คุ้มครอง" value="<?php echo e($data ? App\Lib::dayen2($data->mbprotech) : old('mbprotech')); ?>">
                 <?php echo $errors->first('mbprotech'); ?>

        </div>

               <label class="col-sm-2 control-label">วันที่ลาออก/เสียชีวิต</label>
        <div class="col-sm-2">
                 <input type="text" class="form-control" name="mbresign" placeholder="วันที่ลาออก/เสียชีวิต" value="<?php echo e($data ? App\Lib::dayen2($data->mbresign) : '00-00-0000'); ?>">
                 <?php echo $errors->first('mbresign'); ?>

        </div>
  </div>


  <div class="form-group has-success">

               <label class="col-sm-2 control-label">สถานะ</label>
               <div class="col-sm-2">
                   <?php $dataopt=DB::table('fundstatus')->where('statusid','>', '0')->get();?>
                     <select name="mbstatus" class="form-control">
                           <?php foreach($dataopt as $dataopt1): ?>
                               <option value="<?php echo e($dataopt1->statusid); ?>" <?php if(!(strcmp($dataopt1->statusid,$data ? $data->mbstatus:1))) {echo "selected=\"selected\"";}?>><?php echo e($dataopt1->statusname); ?></option>
                           <?php endforeach; ?>
                     </select>
               </div>

               <label class="col-sm-2 control-label">ทะเบียน สมาคม</label>
    <div class="col-sm-2">
                 <input type="text" class="form-control" name="samano" placeholder="ทะเบียน สมาคม" value="<?php echo e($data ? $data->samano : old('samano')); ?>">
                 <?php echo $errors->first('samano'); ?>

    </div>

       <label class="col-sm-2 control-label">รอบที่สมัคร</label>
        <div class="col-sm-2">
                 <input type="text" class="form-control" name="round" placeholder="รอบที่สมัคร" value="<?php echo e($data ? $data->round : old('round')); ?>">
                 <?php echo $errors->first('round'); ?>

        </div>
  </div>


  <div class="form-group has-success">
               <label class="col-sm-2 control-label">สามี/ภรรยา</label>
        <div class="col-sm-4">
                 <input type="text" class="form-control" name="pbody" placeholder="สามี/ภรรยา" value="<?php echo e($data ? $data->pbody : old('pbody')); ?>">
                 <?php echo $errors->first('pbody'); ?>

        </div>

               <label class="col-sm-2 control-label">ผู้จัดการศพ</label>
        <div class="col-sm-4">
                 <input type="text" class="form-control" name="dbody" placeholder="ผู้จัดการศพ" value="<?php echo e($data ? $data->dbody : old('dbody')); ?>">
                 <?php echo $errors->first('dbody'); ?>

        </div>
  </div>



  <div class="form-group has-success">
               <label class="col-sm-2 control-label">จำนวนเงินสะสม</label>
        <div class="col-sm-10">
                 <input type="text" class="form-control" name="pay" placeholder="pay" value="<?php echo e($data ? $data->pay : old('pay')); ?>">
                 <?php echo $errors->first('pay'); ?>

        </div>
  </div>

  <div class="form-group has-success">
               <label class="col-sm-2 control-label">หมายเหตุ</label>
        <div class="col-sm-10">
                 <input type="text" class="form-control" name="mbmemo" placeholder="หมายเหตุ" value="<?php echo e($data ? $data->mbmemo : old('mbmemo')); ?>">
                 <?php echo $errors->first('mbmemo'); ?>

        </div>
  </div>

  <div class="form-group has-success">
               <label class="col-sm-2 control-label">วันที่บันทึก</label>
        <div class="col-sm-10">
                 <input type="text" class="form-control" name="keydata" placeholder="keydata" value="<?php echo e(Auth::guard('admin')->user()->fname .'|'.Auth::guard('admin')->user()->idoffice.'|'.date('d-m-').(date('Y')+543).' | '.date('H:i:s')); ?>">
                 <?php echo $errors->first('keydata'); ?>

        </div>
  </div>



  <div class="form-group">
               <div class="col-sm-offset-2 col-sm-10">
                   <button type="submit" class="btn btn-primary">บันทึก</button>
              </div>
        </div>

       <input type="text" name="fundtypeid"  value="<?php echo e($fundtype=App\Fundtype::gettypefund(Request::input('fundid'))); ?>">
       <input type="text"  name="mbmember"  value="<?php echo e(Request::input('mbmember')); ?>">
       <input type="text" name="idoffice"  value="<?php echo e(Auth::guard('admin')->user()->idoffice); ?>">
       <input type="text"  name="fundid"  value="<?php echo e(Request::input('fundid')); ?>">


  </form>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
<script src="<?php echo e(url('public/theme/jquery-ui-1.12.1.full/jquery-ui.js')); ?>"></script>
  <script type="text/javascript">


         $(function () {

           var d = new Date();
         var toDay = d.getDate() + '-' + (d.getMonth() + 1) + '-' + (d.getFullYear() );

         $('input[name="mbapply"]').datepicker({ dateFormat: 'dd-mm-yy', isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
                dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
                monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
                monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});

         $('input[name="mbresign"]').datepicker({ dateFormat: 'dd-mm-yy', isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
                dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
                monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
                monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});

                $('input[name="mbprotech"]').datepicker({ dateFormat: 'dd-mm-yy', isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
                      dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
                      monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
                      monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});



         });


   </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>