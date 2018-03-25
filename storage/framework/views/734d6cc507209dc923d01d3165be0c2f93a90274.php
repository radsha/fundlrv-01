<?php $__env->startSection('title','ระบบควบคุมหลักประกันเงินกู้ แบบรวมศูนย์ ออนไลน์'); ?>
<?php $__env->startSection('header'); ?>
  <a href='<?php echo e(url('booktype')); ?>' ><i class="fa  fa-home text-danger fa-1x" ></i></a>
 การกำหนดหมวดเอกสาร
 <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<form class="form-horizontal" method="get" action="<?php echo e(url('newstype')); ?>">
         <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
  <div class="row ">
      <div class=".col-md-12 ">
          <div class="has-success">
                <label class="col-md-1 ">ประจำปี </label>
               <div class="col-md-1">
                     <select name="vyear" onchange="submit()" >
                       <?php $vy1=date('Y');?>
                       <?php $vy2=date('Y')-2;?>
                           <?php for($a=$vy1;$a>=$vy2;$a--): ?>
                               <option value="<?php echo e($a); ?>" <?php if(!(strcmp($a, $vyear ? $vyear :date('Y')))) {echo "selected=\"selected\"";}?>><?php echo e($a+543); ?></option>
                           <?php endfor; ?>
                     </select>
               </div>
          <div class="col-md-10 text-right"> <a href='<?php echo e(url('newstype/create')); ?>' class="btn btn-primary  "><i class="fa fa-plus-circle"> เพิ่มข้อมูล</i> </a></div>

        </div>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> &nbsp;</div>
  </div>
</form>


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
                                      <div><a href="<?php echo e(url('newstype/'.$data1->idctty.'/edit')); ?>"><span style="color:White"> แก้ไข</sapn></a><a href="<?php echo e(url('newstype/'.$data1->idctty)); ?>"><span style="color:White"> กำหนดเลขที่</sapn></a></div>
                                  </div>
                              </div>
                          </div>
                          <a href="">
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>