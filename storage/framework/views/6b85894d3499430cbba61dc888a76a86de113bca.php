<?php $__env->startSection('title','โปรแกรมระบบบริหารงานฌาปนกิจและงานสารบัญ'); ?>
<?php $__env->startSection('header'); ?>
  <a href='<?php echo e(url('fund')); ?>' ><i class="fa  fa-arrow-circle-left text-danger" style="font-size:25px"></i></a>
 การสมัครสมาชิก- <?php echo e($id.'.'.App\Fundtype::getnamefund($id)); ?>

 <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

 <div class="alert-warning text-center" >
          <label class=".col-sm-3 control-label">ทะเบียน สอ.</label>
          <label class=".col-sm-3 form-control-static text-primary"> <?php echo e(Request::input('mbmember')); ?></label>
          <label class=".col-sm-3 control-label">ชื่อ - นามสุกล สอ.</label>
          <label class=".col-sm-3 form-control-static text-primary"> <?php echo e(App\Tbmembmaster::getnamemember(Request::input('mbmember'))); ?></label>
</div>

   <div class="table-responsive" >
     <table class="table table-striped table-bordered table-hover">
             <thead>
                 <tr class="info" >
                      <th class="text-center">ทะเบียน สอ</th>
                      <th  class="text-center">ชื่อ-นามสกุล สอ</th>
                      <th  class="text-center">ทะเบียน สมาคม</th>
                      <th  class="text-center">ชื่อ-นามสกุล ผู้สมัคร</th>
                      <th  class="text-center">ความสัมพันธ์</th>
                      <th  class="text-center">วันที่สมัคร</th>
                      <th  class="text-center">วันที่คุ้มครอง</th>
                      <th  class="text-center">วันที่ลาออก/เสียชีวิต</th>
                      <th  class="text-center"> <a href='<?php echo e(url('fund/create?fundid='.$id.'&mbmember='.$mbmember)); ?>' class="btn btn-primary btn-xs"><i class="fa fa-plus-circle"> เพิ่มข้อมูล</i> </a> </th>
                  </tr>
             </thead>
         <tbody>
<?php foreach($data as $data1 ): ?>
            <tr   >
                      <td class="text-center"> <?php echo e($data1->mbmember); ?>  </td>
                      <td> <?php echo e(App\Tbmembmaster::getnamemember($data1->mbmember)); ?> </td>
                      <td class="text-center"> <?php echo e($data1->samano); ?>  </td>
                      <td> <?php echo e($data1->fname); ?>  </td>
                      <td> <?php echo e(App\Fundrela::getnamerela($data1->fundrelaid)); ?> </td>
                      <td class="text-center"> <?php echo e(App\Lib::dateThai($data1->mbapply)); ?> </td>
                      <td class="text-center"> <?php echo e(App\Lib::dateThai($data1->mbprotech)); ?>  </td>
                      <td class="text-center"> <?php echo e(App\Lib::dateThai($data1->mbresign)); ?> </td>
                      <td class="text-center">
                        <a href="<?php echo e(url('fund/'.$data1->mbid .'/edit?fundid='.$id.'&mbmember='.$mbmember)); ?>" > <i class="fa fa-edit text-success" style="font-size:15px"></i></a>
                        <a href="<?php echo e(url('fund-delete/'. $data1->mbid)); ?>" onclick="return confirm('ยืนยันการลบ')" style="font-size:15px"><i class="fa fa-times text-danger" ></i> </a>
                      </td>
              </tr>
<?php endforeach; ?>
      </tbody>
      </table>
  </div>



<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
  <script type="text/javascript">


   		  $(function () {

   		    var d = new Date();
  		    var toDay = d.getDate() + '-' + (d.getMonth() + 1) + '-' + (d.getFullYear() + 543);

  		    $('input[name="mbapply"]').datepicker({ dateFormat: 'dd-mm-yy', isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
                dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
                monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
                monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});

  		    $('input[name="birth_date"]').datepicker({ dateFormat: 'dd-mm-yy', isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
                dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
                monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
                monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});



   			});


   </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>