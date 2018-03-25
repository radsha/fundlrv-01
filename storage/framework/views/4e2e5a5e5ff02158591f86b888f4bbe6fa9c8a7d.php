<?php $__env->startSection('title','ระบบควบคุมหลักประกันเงินกู้ แบบรวมศูนย์ ออนไลน์'); ?>
<?php $__env->startSection('header'); ?>
<a href='<?php echo e(url('indexadmin')); ?>' ><i class="fa  fa-home  text-Primary" style="font-size:25px"></i></a>
   ประเภทกองทุน/ฌาปนกิจ
 <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

  <?php foreach($data3 as $data3): ?>
    <h5> <span class="text-info"><?php echo e($data3->fundname); ?></span> </h5>

<?php $data= DB::table('fundtype')->where('fundtype.fundidlink', $data3->fundidlink)->get(); ?>
      <?php if(count($data)>0): ?>

        <div class="table-responsive" >
           <table class="table table-striped table-bordered table-hover">
                   <thead>
                       <tr>
                           <th class="info text-center" >ประเภท</th>
                           <?php foreach($data2 as $datav2): ?>
                           <th class="info text-center"><i class="fa <?php echo e($datav2->icon); ?> text-success" style="font-size:15px;color:<?php echo e($datav2->color); ?>"></i> <?php echo e($datav2->statusname); ?> </th>
                           <?php endforeach; ?>
                       </tr>
                   </thead>
               <tbody>


                  <?php foreach($data as $data1): ?>
                    <tr class="text-center">
                         <td> <?php echo e($data1->fundtype==1?"สามัญ":"สมทบ"); ?> </td>
                          <?php foreach($data2 as $datav2): ?>
                        <td>  <?php echo e(App\Fund::getfund($data1->fundid,$datav2->statusid)); ?> </td>
                          <?php endforeach; ?>
                    </tr>
                  <?php endforeach; ?>

            </tbody>
            </table>


        <?php endif; ?>
        <?php endforeach; ?>
     </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>