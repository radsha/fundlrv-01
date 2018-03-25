<?php $__env->startSection('title','โปรแกรมระบบบริหารงานฌาปนกิจและงานสารบัญ'); ?>
<?php $__env->startSection('header'); ?>
  <a href='<?php echo e(url('fundview')); ?>' ><i class="fa  fa-arrow-circle-left text-danger" style="font-size:25px"></i></a>
  รายละเอียดการชำระ-<?php echo e(App\Fundtype::getnamefund($data2->fundid)); ?>

 <?php $__env->stopSection(); ?>

 <?php $__env->startSection('csscus'); ?>
   <link href="<?php echo e(url('public/theme/sweetalert/sweetalert.css')); ?>" rel="stylesheet" type="text/css">
  <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

  <?php  $fundlink=App\Fundtype::getfundidlink($data2->fundid)?>
  <?php $ck=0; ?>
    <?php if(App\Book::getnumbook1($fundlink)=='0'): ?>
      <?php $ck=2;?>
                    ไม่สามารถทำรายการได้
    <?php else: ?>
  <div class="alert-warning text-center" >
      <label class=".col-md-1 ">ทะเบียน สมาคม</label>
      <label class=".col-md-1 form-control-static text-primary"> <?php echo e($data2->samano); ?></label>
      <label class=".col-md-1 ">ชื่อ - นามสกุล สมาคม</label>
      <label class=".col-md-1 form-control-static text-primary"> <?php echo e($data2->fname); ?></label>
      <label class=".col-md-1 ">ความสัมพันธ์ </label>
      <label class=".col-md-1 form-control-static text-primary"> <?php echo e(App\Fundrela::getnamerela($data2->fundrelaid)); ?></label>
      <label class=".col-md-1 ">ทะเบียน สอ.</label>
      <label class=".col-md-1 form-control-static text-primary"> <?php echo e($data2->mbmember); ?></label>
      <label class=".col-md-1 control-label">ชื่อ - นามสุกล สอ.</label>
      <label class=".col-md-1 form-control-static text-primary"> <?php echo e(App\Tbmembmaster::getnamemember($data2->mbmember)); ?></label>
  </div>


   <div class="table-responsive">
     <table class="table table-striped table-bordered table-hover">
             <thead>
                 <tr class="info" >
                      <th class="text-center">ใบเสร็จ</th>
                      <th  class="text-center">รายการ</th>
                      <th  class="text-center">ล่วงหน้า</th>
                      <th  class="text-center">แรกเข้า</th>
                      <th  class="text-center">บำรุง</th>
                      <th  class="text-center">อื่นๆ</th>
                      <th  class="text-center">วันที่</th>
                      <th  class="text-center"> <a href='<?php echo e(url('fundview/create?mbid='.$data2->mbid)); ?>' class="btn btn-primary btn-xs"><i class="fa fa-plus-circle"> เพิ่มข้อมูล</i> </a> </th>
                  </tr>
             </thead>
         <tbody>
          <?php $tpayment1=0; $tpayment2=0; $tpayment3=0; $tpayment4=0; ?>

<?php foreach($data as $data1 ): ?>
            <tr>
                      <td class="text-center"> <?php echo e($data1->numbook1.'/'.$data1->numbook2); ?>  </td>
                      <td> <?php echo e($data1->typepayid); ?> </td>
                      <td class="text-center"><?php $tpayment1+=($data1->payment1) ?> <?php echo e($data1->payment1); ?></td>
                      <td  class="text-center"> <?php $tpayment2+=($data1->payment2) ?> <?php echo e($data1->payment2); ?> </td>
                      <td  class="text-center">  <?php $tpayment3+=($data1->payment3) ?> <?php echo e($data1->payment3); ?> </td>
                      <td class="text-center"> <?php $tpayment4+=($data1->payment4) ?> <?php echo e($data1->payment4); ?> </td>
                      <td class="text-center"> <?php echo e(App\Lib::dateThai($data1->mdate)); ?>  </td>
                      <td class="text-center">
                        <a href="<?php echo e(url('fundview/'.$data1->inid.'/edit?mbid='.$data1->mbid)); ?>" > <i class="fa fa-edit text-success" style="font-size:15px"></i></a>
                        <a href="<?php echo e(url('fundview-delete/'. $data1->inid)); ?>" onclick="return confirm('ยืนยันการลบ')" style="font-size:15px"><i class="fa fa-times text-danger" ></i> </a>
                        <a href="<?php echo e(url('fundview-print/'. $data1->inid)); ?>" onclick="return confirm('ยืนยันการลบ')" style="font-size:15px"><i class="fa fa-print" ></i> </a>

                      </td>
              </tr>
<?php endforeach; ?>

      <tr>
          <td class="text-center" colspan="2"> รวม </td>
          <td class="text-center">  <?php echo e($tpayment1); ?> </td>
          <td class="text-center"> <?php echo e($tpayment2); ?>  </td>
          <td class="text-center">  <?php echo e($tpayment3); ?> </td>
          <td class="text-center"> <?php echo e($tpayment4); ?>   </td>
          <td class="text-center">    </td>
          <td class="text-center">   </td>
        </tr>

      </tbody>
      </table>
  </div>


<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>

  <script src="<?php echo e(url('public/theme/sweetalert/sweetalert.min.js')); ?>"></script>

  <script type="text/javascript">

  <?php if($ck=='2'): ?>
       <script>
          swal("ไม่ทำรายการ กรุณากำหนดรายละเอียดใบเสร็จก่อน...", "<?php echo e(session()->get('status')); ?>", "success")
      </script>
  <?php endif; ?>


       <?php if(session()->has('status')): ?>
           <script>
               swal("บันทึกข้อมูลเสร็จเรียบร้อยแล้ว...", "<?php echo e(session()->get('status')); ?>", "success")
           </script>
       <?php endif; ?>

       <?php if(session()->has('status1')): ?>
           <script>
               swal("ลบข้อมูลเสร็จเรียบร้อยแล้ว...", "<?php echo e(session()->get('status')); ?>", "success")
           </script>
       <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>