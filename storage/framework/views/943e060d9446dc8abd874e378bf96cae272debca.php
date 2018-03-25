<?php $__env->startSection('title','ระบบควบคุมหลักประกันเงินกู้ แบบรวมศูนย์ ออนไลน์'); ?>
<?php $__env->startSection('header'); ?>
<a href='<?php echo e(url('fundfile')); ?>' ><i class="fa  fa-home  text-Primary" style="font-size:25px"></i></a>
   การนำเข้าข้อมูล
 <?php $__env->stopSection(); ?>
 <?php $__env->startSection('csscus'); ?>
   <link href="<?php echo e(url('public/theme/colorbox/colorbox.css')); ?>" rel="stylesheet" type="text/css">
   <link href="<?php echo e(url('public/theme/sweetalert/sweetalert.css')); ?>" rel="stylesheet" type="text/css">
   <link href="<?php echo e(url('public/theme/ton/template_css.css')); ?>" rel="stylesheet" type="text/css">
  <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="table-responsive" >
  <table class="table table-striped table-bordered table-hover">
          <thead>
              <tr class="info" >
                   <th  class="text-center">@</th>
                   <th class="text-center">รายการ</th>
                   <th  class="text-center">Upload</th>
                   <th  class="text-center">จำนวนแถว</th>
                   <th  class="text-center">ตรวจสอบข้อมูล</th>
                   <th  class="text-center">บันทึกลงฐาน</th>
               </tr>
          </thead>
      <tbody>
        <?php $i=1;?>
      <?php foreach($data as $data1 ): ?>
         <tr >
                    <td class="text-center">  <?php echo e($i); ?> <?php $i++;?>  </td>
                   <td class="text-left"> <?php echo e($data1->nameimp.'('.$data1->tbname.')'); ?>  </td>
                   <td  class="text-center"> <a href='<?php echo e(url('import/create?idimp='.$data1->idimp)); ?>' class="btn btn-primary btn-xs"><i class="fa fa-plus-circle"> เพิ่มข้อมูล</i> </a> </td>
                   <td class="text-center"> <?php echo e($data1->vc); ?> </td>
                   <td class="text-left">

                   </td>
                   <td class="text-center"><a  href='<?php echo e(url('fundfile/'.$data1->mbid.'?samano='.$data1->samano.'&fundid='.$data1->fundid.'&mbmember='.$data1->mbmember.'&keywords='.Request::input('keywords'))); ?>'> <i class="fa fa-list-alt"></i> </a>            </td>
           </tr>
 <?php endforeach; ?>
   </tbody>
   </table>
</div>


<?php $__env->stopSection(); ?>


<?php $__env->startSection('javascript'); ?>
  <script src="<?php echo e(url('public/theme/colorbox/jquery.colorbox.js')); ?>"></script>
  <script src="<?php echo e(url('public/theme/sweetalert/sweetalert.min.js')); ?>"></script>
  <script type="text/javascript">
  		$(document).ready(function(){
   				$(".link1").colorbox();

  				$(".link2").colorbox({iframe:true, innerWidth:795, innerHeight:500,title: "ถ้าต้องการปิดกดที่นี้  ====>>"});

  				$(".link3").colorbox({ iframe:true,width:"98%", height:"98%",title: "ถ้าต้องการปิดกดที่นี้  ====>>"});

  				$(".link4").colorbox({iframe:true, innerWidth:230, innerHeight:220,title: "ถ้าต้องการปิดกดที่นี้  ====>>"});

  				$(".link5").colorbox({
  					  iframe:true,
  					  width:"98%",
  					  height:"98%",
  					  title: "ถ้าต้องการปิดกดที่นี้  ====>>",
  					  onClosed:function(){ parent.location='<?php echo e(url('import')); ?>';}
  					 });

  				$(".link6").colorbox({
  					  iframe:true,
  					  innerWidth:"550",
  					  innerHeight:"200",
  					  title: "ถ้าต้องการปิดกดที่นี้  ====>>",
  					  onClosed:function(){ parent.location='<?php echo e(url('import')); ?>';}
  					 });



    		});
  	</script>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>