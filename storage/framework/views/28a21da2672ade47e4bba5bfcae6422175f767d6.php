<?php $__env->startSection('title','โปรแกรมระบบบริหารงานฌาปนกิจและงานสารบัญ'); ?>
<?php $__env->startSection('header'); ?>
<a href='<?php echo e(url('fund')); ?>' ><i class="fa  fa-home  text-Primary" style="font-size:25px"></i></a>
   การสมัครสมาชิก-กองทุน/ฌาปนกิจ
 <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="panel panel-default">
  <form class="form-horizontal"  method="get" action="<?php echo e(url('fund')); ?>">
       <div class="input-group">
          <?php echo e(Form::text('keywords', Request::input('keywords'),['class' => 'form-control','placeholder'=>'กรุณาป้อนคำที่ต้องการค้นหา ทะเบียน ชื่อ นามสกุล '])); ?>

              <span class="input-group-btn ">
                      <button class="btn btn-default" type="sumbit"><i class="fa fa-search"></i></button>
              </span>
      </div>
  </form>
</div>

  <div class="table-responsive" >
     <table class="table table-striped table-bordered table-hover">
             <thead>
                 <tr class="info" >
                        <th class="text-center" height='100'>ทะเบียน</th>
                        <th class="text-center">ชื่อ - นามสกุล</th>
                        <th class="text-center">หน่วย</th>
                        <th class="text-center">วันเดือนปีเกิด</th>
                        <th class="text-center">อายุ</th>
                          <?php foreach($datafund as $datafund1): ?>
                        <th width='20' ><svg  width="20" height="120"> <text transform="rotate(270, 12, 0)  translate(-105,0)"   fill="black" > <?php echo e($datafund1->fundname2); ?> </text>
</svg></th>
                          <?php endforeach; ?>
                 </tr>
             </thead>
         <tbody>
      <?php foreach($data as $data): ?>
              <tr>
                        <td class="text-center"> <?php echo e($data->member_no); ?> </td>
                        <td  > <?php echo e($data->memb_name); ?> </td>
                        <td class="text-center"> <?php echo e($data->membgroup); ?> </td>
                        <td class="text-center"> <?php echo e(App\Lib::dateThai($data->birth_date)); ?> </td>
                        <td class="text-center"> <?php echo e(App\Lib::agey($data->birth_date)); ?> </td>
                          <?php foreach($datafund as $datafund1): ?>
                        <td class="text-center">
                          <?php $mbstatus=App\Fund::getapply($datafund1->fundid,$data->member_no)  ?>
                          <?php $fundtype=App\Fundtype::gettypefund($datafund1->fundid) ?>

                          <?php if($fundtype=='1'): ?>

                                <?php if($mbstatus=='0'): ?>
                                      <a href='<?php echo e(url('fund/create?fundid='.$datafund1->fundid.'&mbmember='.$data->member_no)); ?>'  ><?php echo App\Fundstatus::getfundstatus($mbstatus); ?>  </a>
                                <?php else: ?>
                                    <?php $mbid=App\Fund::getmbid($datafund1->fundid,$data->member_no)  ?>
                                      <a href='<?php echo e(url('fund/'.$mbid.'/edit?fundid='.$datafund1->fundid.'&mbmember='.$data->member_no)); ?>'  ><?php echo App\Fundstatus::getfundstatus($mbstatus); ?>  </a>
                                <?php endif; ?>

                          <?php else: ?>
                              <?php $mbstatuslink=App\Fund::getapplylink($datafund1->fundidlink,$data->member_no)  ?>
                                <?php if($mbstatuslink=='1'): ?>
                                  <a href='<?php echo e(url('fund/'.$datafund1->fundid.'?mbmember='.$data->member_no)); ?>'  ><?php echo App\Fundstatus::getfundstatus($mbstatus); ?>  </a>
                                <?php else: ?>
                                  <a href='#' onclick="alert('กรุณาสมัครประเภทสามัญก่อนครับ')" ><?php echo App\Fundstatus::getfundstatus($mbstatus); ?>  </a>
                                <?php endif; ?>

                        <?php endif; ?>


                          </td>
                         <?php endforeach; ?>
              </tr>
        <?php endforeach; ?>
      </tbody>
      </table>
  </div>

  <div class="text-center">
  <i class="fa fa-plus-circle text-success" style="font-size:16px"></i> การเพิ่ม &nbsp;<i class="fa fa-edit text-success" style="font-size:16px"></i>&nbsp; การแก้ไข <i class="fa fa-times text-danger" ></i> การลบ</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <?php if($msg ==0 && @isset($msg)): ?>

    @endisset  )
        <script>
            swal("ไม่พบข้อมูลที่คุณค้นหา...", "<?php echo e(Request::input('keywords')); ?>", "warning")
        </script>
    <?php endif; ?>

    <?php if(session()->has('status')): ?>
        <script>
            swal("บันทึกข้อมูลเสร็จเรียบร้อยแล้ว...", "<?php echo e(Request::input('keywords')); ?>", "success")
        </script>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>