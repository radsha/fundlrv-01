<?php $__env->startSection('title','ระบบควบคุมหลักประกันเงินกู้ แบบรวมศูนย์ ออนไลน์'); ?>
<?php $__env->startSection('header'); ?>
  <a href='<?php echo e(url('booktype')); ?>' ><i class="fa  fa-home text-danger fa-1x" ></i></a>
 การกำหนดหมวดเอกสาร
 <?php $__env->stopSection(); ?>

 <?php $__env->startSection('csscus'); ?>
   <link href="<?php echo e(url('public/theme/colorbox/colorbox.css')); ?>" rel="stylesheet" type="text/css">
  <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

  <div class="row ">
      <div class=".col-md-12 ">
            <div class="has-success">
                <label class="col-md-1 ">ประจำปี</label>
               <div class="col-md-1">
                     <select name="vyear"   >
                       <?php $vyear=Request::input('vyear')?>
                       <?php $vy1=date('Y')-5;?>
                       <?php $vy2=date('Y');?>
                           <?php for($a=$vy1;$a<=$vy2;$a++): ?>
                               <option value="<?php echo e($a); ?>" <?php if(!(strcmp($a, $vyear ? $vyear :date('Y')))) {echo "selected=\"selected\"";}?>><?php echo e($a+543); ?></option>
                           <?php endfor; ?>
                     </select>
               </div>
          <div class="col-md-10 text-right">
          </div>

        </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> &nbsp;</div>
  </div>


  <?php foreach($data as $data1): ?>
  <div class="col-lg-3 col-md-6">
          <div class="panel panel-<?php echo e($data1->colorct ? $data1->colorct :"primary  "); ?>">
                    <div class="panel-heading">
                            <div class="row">
                                  <div class="col-xs-3">
                                        <i class="fa <?php echo e($data1->iconct ? $data1->iconct  :"fa-comments-o"); ?> fa-5x"></i>
                                  </div>
                              <div class="col-xs-9 text-right">
                                      <div class="huge"><?php echo e($data1->namectty); ?></div>
                                      <div><a href="<?php echo e(url('newslist/create?idctty='.$data1->idctty)); ?>" class="link5"><span style="color:White">เพิ่มเอกสาร</sapn></a></div>
                                  </div>
                              </div>
                          </div>
                          <a href="#">
                              <div class="panel-footer">
                                  <span class="pull-left">รายละเอียด</span>
                                  <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                  <div class="clearfix"></div>
                              </div>
                          </a>
                </div>
  </div>
  <?php endforeach; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
<script src="<?php echo e(url('public/theme/colorbox/jquery.colorbox-min.js')); ?>"></script>
<script>
		$(document).ready(function(){

 				$(".link1").colorbox();

				$(".link2").colorbox({iframe:true, innerWidth:795, innerHeight:500,title: "ถ้าต้องการปิดกดที่นี้  ====>>"});

				$(".link3").colorbox({ iframe:true,width:"95%", height:"95%",title: "ถ้าต้องการปิดกดที่นี้  ====>>"});

				$(".link4").colorbox({iframe:true, innerWidth:230, innerHeight:220,title: "ถ้าต้องการปิดกดที่นี้  ====>>"});

				$(".link5").colorbox({
					  iframe:true,
					  width:"95%",
					  height:"95%",
					  title: "ถ้าต้องการปิดกดที่นี้  ====>>",
					  onClosed:function(){ parent.location='<?php echo e(url('newslist')); ?>';}
					 });

				$(".link6").colorbox({
					  iframe:true,
					  innerWidth:"550",
					  innerHeight:"200",
					  title: "ถ้าต้องการปิดกดที่นี้  ====>>",
					  onClosed:function(){ parent.location='<?php echo e(url('newslist')); ?>';}
					 });


  		});
	</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>