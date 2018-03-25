<?php $__env->startSection('title','ระบบควบคุมหลักประกันเงินกู้ แบบรวมศูนย์ ออนไลน์'); ?>
<?php $__env->startSection('header'); ?>
<a href='<?php echo e(url('indexadmin')); ?>' ><i class="fa  fa-home  text-Primary" style="font-size:25px"></i></a>
ข้อมูลสมาชิก
 <?php $__env->stopSection(); ?>
 <?php $__env->startSection('csscus'); ?>
   <link href="<?php echo e(url('public/theme/sweetalert/sweetalert.css')); ?>" rel="stylesheet" type="text/css">

   <link href="<?php echo e(url('public/theme/ton/template_css.css')); ?>" rel="stylesheet" type="text/css">
   <link href="<?php echo e(url('public/theme/colorbox/colorbox.css')); ?>" rel="stylesheet" type="text/css">

  <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="panel panel-default">
  <form class="form-horizontal"  method="get" action="<?php echo e(url('member')); ?>">
       <div class="input-group">
          <?php echo e(Form::text('keywords', Request::input('keywords'),['class' => 'form-control','placeholder'=>'กรุณาป้อนคำที่ต้องการค้นหา ทะเบียน ชื่อ นามสกุล '])); ?>

                  <span class="input-group-btn ">
                              <button class="btn btn-default" type="sumbit"><i class="fa fa-search"></i>
                              </button>
                    </span>
      </div>
  </form>
</div>



  <div class="table-responsive" >

     <table class="table table-striped table-bordered table-hover">
             <thead>
                 <tr class="info" >

                        <th class="text-center ">ทะเบียน</th>
                        <th class="text-center">ชื่อ - นามสกุล</th>
                        <th class="text-center">หน่วย</th>
                        <th class="text-center">วันเดือนปีเกิด</th>
                        <th class="text-center">อายุ</th>
                        <th class="text-center"><a href='<?php echo e(url('member/create')); ?>' class="btn btn-primary btn-xs"><i class="fa fa-plus-circle"> เพิ่มข้อมูล</i> </a> </th>
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
                          <td class="text-center">
                       <a href="<?php echo e(url('member/'.$data->idpc .'/edit')); ?>" > <i class="fa fa-edit text-success" style="font-size:15px"></i></a>
                       <a href="<?php echo e(url('member-delete/'. $data->idpc)); ?>" onclick="return confirm('ยืนยันการลบ')" style="font-size:15px"><i class="fa fa-times text-danger" ></i> </a>



                      </td>
              </tr>
        <?php endforeach; ?>
      </tbody>
      </table>
  </div>

  <div class="text-center">
  <i class="fa fa-plus-circle text-success" style="font-size:16px"></i> การเพิ่ม &nbsp;<i class="fa fa-edit text-success" style="font-size:16px"></i>&nbsp; การแก้ไข <i class="fa fa-times text-danger" ></i> การลบ</div>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('javascript'); ?>
  <script src="<?php echo e(url('public/theme/sweetalert/sweetalert.min.js')); ?>"></script>


  <script src="<?php echo e(url('public/theme/colorbox/jquery.colorbox.js')); ?>"></script>
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

    <?php if($msg ==0): ?>
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