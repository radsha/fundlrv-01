<?php $__env->startSection('title','โปรแกรมระบบบริหารงานฌาปนกิจและงานสารบัญ'); ?>
<?php $__env->startSection('header'); ?>
  <a href='<?php echo e(url('member')); ?>' ><i class="fa  fa-arrow-left  text-Primary" style="font-size:25px"></i></a>
   แก้ไขราย-ข้อมูลสมาชิก
 <?php $__env->stopSection(); ?>
 <?php $__env->startSection('csscus'); ?>
   <link href="<?php echo e(url('public/theme/jquery-ui-1.12.1.full/jquery-ui.min.css')); ?>" rel="stylesheet" type="text/css">
  <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

  <form class="form-horizontal" method="post" action="<?php echo e(url($url)); ?>">
          <?php if( $idpc != 0): ?>
               <input type="hidden" name="_method" value="PUT" />
          <?php endif; ?>
               <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

  <div class="form-group has-success">
               <label class="col-sm-2 control-label">ลำดับที่</label>
        <div class="col-sm-10">
                 <input type="text" class="form-control" name="idpc" placeholder="Auto" value="<?php echo e($data ? $data->idpc : old('idpc')); ?>">
                 <?php echo $errors->first('idpc'); ?>

        </div>
  </div>

   <input type="text"  name="idoffice"  value="<?php echo e(Auth::guard('admin')->user()->idoffice); ?>">


  <div class="form-group has-success">
               <label class="col-sm-2 control-label">ทะเบียนสมาชิก</label>
        <div class="col-sm-10">
                 <input type="text" class="form-control" name="member_no" placeholder="ทะเบียนสมาชิก" value="<?php echo e($data ? $data->member_no : old('member_no')); ?>">
                 <?php echo $errors->first('member_no'); ?>

        </div>
  </div>

  <div class="form-group has-success">
               <label class="col-sm-2 control-label">ชื่อ - นามสกุล</label>
        <div class="col-sm-10">
                 <input type="text" class="form-control" name="memb_name" placeholder="ชื่อ - นามสกุล" value="<?php echo e($data ? $data->memb_name : old('memb_name')); ?>">
                 <?php echo $errors->first('memb_name'); ?>

        </div>
  </div>

  <div class="form-group has-success">
               <label class="col-sm-2 control-label">หน่วย</label>
        <div class="col-sm-10">
                 <input type="text" class="form-control" name="membgroup" placeholder="หน่วย" value="<?php echo e($data ? $data->membgroup : old('membgroup')); ?>">
                 <?php echo $errors->first('membgroup'); ?>

        </div>
  </div>

  <div class="form-group has-success">
               <label class="col-sm-2 control-label">วันที่สมาชิก</label>
        <div class="col-sm-10">
                 <input type="text" class="form-control" name="member_date" placeholder="วันที่สมาชิก" value="<?php echo e($data ? App\Lib::dayen2($data->member_date) : old('member_date')); ?>">
                 <?php echo $errors->first('member_date'); ?>

        </div>
  </div>

  <div class="form-group has-success">
               <label class="col-sm-2 control-label">วันเดือนปี-เกิด</label>
        <div class="col-sm-10">
                 <input type="text" class="form-control" name="birth_date" placeholder="วันเดือนปี-เกิด" value="<?php echo e($data ? App\Lib::dayen2($data->birth_date) : old('birth_date')); ?>">
                 <?php echo $errors->first('birth_date'); ?>

        </div>
  </div>

  <div class="form-group has-success">
       <label class="col-sm-2 control-label">เพศ</label>
        <div class="col-sm-10">
            <?php $datasex=DB::table('tbmembmaster_sex')->get();?>
              <select name="sex" class="form-control">
                    <?php foreach($datasex as $datasex1): ?>
                        <option value="<?php echo e($datasex1->idsex); ?>" <?php if(!(strcmp($datasex1->idsex,$data ? $data->sex:1))) {echo "selected=\"selected\"";}?>><?php echo e($datasex1->namesex); ?></option>
                    <?php endforeach; ?>
              </select>
        </div>
  </div>

  <div class="form-group has-success">
       <label class="col-sm-2 control-label">สถานภาพ</label>
        <div class="col-sm-10">
            <?php $datasta_m=DB::table('tbmembmaster_sta_m')->get();?>
              <select name="mariage" class="form-control" >
                    <?php foreach($datasta_m as $datasta_m1): ?>
                        <option value="<?php echo e($datasta_m1->idsta_m); ?>" <?php if(!(strcmp($datasta_m1->idsta_m,$data ? $data->mariage:1))) {echo "selected=\"selected\"";}?>><?php echo e($datasta_m1->namesta_m); ?></option>
                    <?php endforeach; ?>
              </select>
        </div>
  </div>




  <div class="form-group has-success">
               <label class="col-sm-2 control-label">ชื่อ-สามี/ภรรยา</label>
        <div class="col-sm-10">
                 <input type="text" class="form-control" name="mate_name" placeholder="ชื่อ-สามี/ภรรยา" value="<?php echo e($data ? $data->mate_name : old('mate_name')); ?>">
                 <?php echo $errors->first('mate_name'); ?>

        </div>
  </div>

  <div class="form-group has-success">
               <label class="col-sm-2 control-label">เบอร์โทรศัพท์</label>
        <div class="col-sm-10">
                 <input type="text" class="form-control" name="tel" placeholder="เบอร์โทรศัพท์" value="<?php echo e($data ? $data->tel : old('tel')); ?>">
                 <?php echo $errors->first('tel'); ?>

        </div>
  </div>

  <div class="form-group has-success">
               <label class="col-sm-2 control-label">เบอร์มือถือ</label>
        <div class="col-sm-10">
                 <input type="text" class="form-control" name="telmobile" placeholder="เบอร์มือถือ" value="<?php echo e($data ? $data->telmobile : old('telmobile')); ?>">
                 <?php echo $errors->first('telmobile'); ?>

        </div>
  </div>

  <div class="form-group has-success">
               <label class="col-sm-2 control-label">E-Mail</label>
        <div class="col-sm-10">
                 <input type="text" class="form-control" name="email_address" placeholder="E-Mail" value="<?php echo e($data ? $data->email_address : old('email_address')); ?>">
                 <?php echo $errors->first('email_address'); ?>

        </div>
  </div>

  <div class="form-group has-success">
               <label class="col-sm-2 control-label">บัตรประชาชน</label>
        <div class="col-sm-10">
                 <input type="text" class="form-control" name="card_person" placeholder="บัตรประชาชน" value="<?php echo e($data ? $data->card_person : old('card_person')); ?>">
                 <?php echo $errors->first('card_person'); ?>

        </div>
  </div>

  <div class="form-group has-success">
               <label class="col-sm-2 control-label">ตำแหน่ง</label>
        <div class="col-sm-10">
                 <input type="text" class="form-control" name="position" placeholder="ตำแหน่ง" value="<?php echo e($data ? $data->position : old('position')); ?>">
                 <?php echo $errors->first('position'); ?>

        </div>
  </div>

  <div class="form-group has-success">
               <label class="col-sm-2 control-label">เงินเดือน</label>
        <div class="col-sm-10">
                 <input type="text" class="form-control" name="salary" placeholder="เงินเดือน" value="<?php echo e($data ? $data->salary : old('salary')); ?>">
                 <?php echo $errors->first('salary'); ?>

        </div>
  </div>


  <div class="form-group has-success">
       <label class="col-sm-2 control-label">สถานะสมาชิก</label>
        <div class="col-sm-10">
            <?php $datasta=DB::table('tbmembmaster_sta')->get();?>
              <select name="member_status" class="form-control" >
                    <?php foreach($datasta as $datasta1): ?>
                        <option value="<?php echo e($datasta1->idsta); ?>" <?php if(!(strcmp($datasta1->idsta,$data ? $data->member_status:1))) {echo "selected=\"selected\"";}?>><?php echo e($datasta1->namesta); ?></option>
                    <?php endforeach; ?>
              </select>
        </div>
  </div>




  <div class="form-group has-success">
               <label class="col-sm-2 control-label">วันที่ลาออก</label>
        <div class="col-sm-10">
                 <input type="text" class="form-control" name="resign_date" placeholder="วันที่ลาออก" value="<?php echo e($data ? App\Lib::dayen2($data->resign_date) : old('resign_date')); ?>">
                 <?php echo $errors->first('resign_date'); ?>

        </div>
  </div>

  <div class="form-group has-success">
               <label class="col-sm-2 control-label">ที่อยู่</label>
        <div class="col-sm-10">
                 <input type="text" class="form-control" name="address" placeholder="address" value="<?php echo e($data ? $data->address : old('address')); ?>">
                 <?php echo $errors->first('address'); ?>

        </div>
  </div>

  <div class="form-group has-success">
               <label class="col-sm-2 control-label">ผู้บันทึกข้อมูล</label>
        <div class="col-sm-10">
                 <input type="text" class="form-control" name="kaydata" placeholder="kaydata"  value="<?php echo e(Auth::guard('admin')->user()->fname .' | '.Auth::guard('admin')->user()->idoffice.'|'.date('d-m-').(date('Y')+543).' | '.date('H:i:s')); ?>">
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
<script src="<?php echo e(url('public/theme/jquery-ui-1.12.1.full/jquery-ui.js')); ?>"></script>
  <script type="text/javascript">


   		  $(function () {

   		    var d = new Date();
  		    var toDay = d.getDate() + '-' + (d.getMonth() + 1) + '-' + (d.getFullYear() );

  		    $('input[name="member_date"]').datepicker({ dateFormat: 'dd-mm-yy', isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
                dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
                monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
                monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});

  		    $('input[name="birth_date"]').datepicker({ dateFormat: 'dd-mm-yy', isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
                dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
                monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
                monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});

                $('input[name="resign_date"]').datepicker({ dateFormat: 'dd-mm-yy', isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
                      dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
                      monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
                      monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});



   			});


   </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>