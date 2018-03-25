<?php $__env->startSection('title','โปรแกรมระบบบริหารงานฌาปนกิจและงานสารบัญ'); ?>
<?php $__env->startSection('header'); ?>
<a href='<?php echo e(url('fundview')); ?>' ><i class="fa  fa-home  text-Primary" style="font-size:25px"></i></a>
   รายการชำระ
 <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="panel panel-default">
  <form class="form-horizontal"  method="get" action="<?php echo e(url('fundview')); ?>">
       <div class="input-group">
          <?php echo e(Form::text('keywords', Request::input('keywords'),['class' => 'form-control','placeholder'=>'กรุณาป้อนคำที่ต้องการค้นหา ทะเบียน ชื่อ นามสกุล '])); ?>

              <span class="input-group-btn ">
                      <button class="btn btn-default" type="sumbit"><i class="fa fa-search"></i></button>
              </span>
      </div>
  </form>
</div>

<?php foreach($datafund as $datafund1 ): ?>
  <h5><span class="text-primary"><?php echo e($datafund1->fundid.'.'.$datafund1->fundname.'('.$datafund1->fundname2.')'); ?></span></h5>
<div class="table-responsive" >
  <table class="table table-striped table-bordered table-hover">
          <thead>
              <tr class="info" >
                   <th  class="text-center">@</th>
                   <th class="text-center">ทะเบียน สอ</th>
                   <th  class="text-center">ชื่อ-นามสกุล สอ</th>
                   <th  class="text-center">ทะเบียน สมาคม</th>
                   <th  class="text-center">ชื่อ-นามสกุล ผู้สมัคร</th>
                   <th  class="text-center">ความสัมพันธ์</th>
                   <th  class="text-center">วันที่สมัคร</th>
                   <th  class="text-center">วันที่คุ้มครอง</th>
                   <th  class="text-center">วันที่ลาออก/เสียชีวิต</th>
                 <th  class="text-center">@</th>
               </tr>
          </thead>
      <tbody>
<?php foreach($data as $data1 ): ?>
  <?php if($data1->fundid==$datafund1->fundid): ?>
         <tr >
              <td class="text-center"> <?php echo App\Fundstatus::getfundstatus($data1->mbstatus); ?> </td>
                   <td class="text-center"> <?php echo e($data1->mbmember); ?>  </td>
                   <td> <?php echo e(App\Tbmembmaster::getnamemember($data1->mbmember)); ?> </td>
                   <td class="text-center"> <?php echo e($data1->samano); ?>  </td>
                   <td> <?php echo e($data1->fname); ?>  </td>
                   <td> <?php echo e(App\Fundrela::getnamerela($data1->fundrelaid)); ?> </td>
                   <td class="text-center"> <?php echo e(App\Lib::dateThai($data1->mbapply)); ?> </td>
                   <td class="text-center"> <?php echo e(App\Lib::dateThai($data1->mbprotech)); ?>  </td>
                   <td class="text-center"> <?php echo e(App\Lib::dateThai($data1->mbresign)); ?> </td>
                   <td class="text-center"><a  href='<?php echo e(url('fundview/'.$data1->mbid)); ?>'>  <i class="fa  fa-list-alt text-success" style="font-size:16px"></i> </a>            </td>
           </tr>
         <?php endif; ?>
<?php endforeach; ?>
   </tbody>
   </table>
</div>
<?php endforeach; ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('javascript'); ?>
    <?php if($msg ==0 && @isset($msg)): ?>

    @endisset  )
        <script>
            swal("ไม่พบข้อมูลที่คุณค้นหา...", "<?php echo e(Request::input('keywords')); ?>", "warning")
        </script>
    <?php endif; ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>