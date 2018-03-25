<?php $__env->startSection('title','โปรแกรมระบบบริหารงานฌาปนกิจและงานสารบัญ'); ?>
<?php $__env->startSection('header'); ?>
  <a href='<?php echo e(url('fundfile')); ?>' ><i class="fa  fa-arrow-circle-left text-danger" style="font-size:25px"></i></a>
  ไฟล์เอกสาร-<?php echo e(App\Fundtype::getnamefund($data2->fundid)); ?>

 <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

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
                      <th class="text-center">ลำดับที่</th>
                      <th  class="text-center">ประเภทเอกสาร </th>
                      <th  class="text-center">วันที่</th>
                      <th  class="text-center">รายละเอียด</th>
                      <th  class="text-center"> <a href='<?php echo e(url('fundfile/create?mbid='.$data2->mbid.'&samano='.Request::input('samano').'&fundid='.Request::input('fundid').'&mbmember='.Request::input('mbmember').'&keywords='.Request::input('keywords'))); ?>' class="btn btn-primary btn-xs"><i class="fa fa-plus-circle"> เพิ่มข้อมูล</i> </a> </th>
                  </tr>
             </thead>
         <tbody>
           <?php $i=0;?>
<?php foreach($data as $data1 ): ?>
  <?php $i++;?>
            <tr>
                      <td class="text-center"> <?php echo e($i); ?>  </td>
                      <td> <?php echo e($data1->namefile); ?> </td>
                      <td class="text-center"> <?php echo e(App\Lib::dateThai($data1->filedate)); ?>  </td>
                      <td class="text-center">	<a href="<?php echo e(url('fileuploads/file/'.$data1->filename)); ?>"  class="link3"> <?php echo e($data1->filename); ?></a>  </td>
                      <td class="text-center">
                       <?php if($data1->filedate<date('Ymd')): ?>
                        <a href="<?php echo e(url('fundfile-delete/'. $data1->idfile)); ?>" onclick="return confirm('ยืนยันการลบ')" style="font-size:15px"><i class="fa fa-times text-danger" ></i> </a>
                      <?php endif; ?>
                      </td>
              </tr>
<?php endforeach; ?>

      </tbody>
      </table>
  </div>



<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
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
  					  onClosed:function(){ parent.location='<?php $file?>';}
  					 });

  				$(".link6").colorbox({
  					  iframe:true,
  					  innerWidth:"550",
  					  innerHeight:"200",
  					  title: "ถ้าต้องการปิดกดที่นี้  ====>>",
  					  onClosed:function(){ parent.location='<?php $file?>';}
  					 });

   				$(".msg0").colorbox({width:"35%", inline:true, href:"#msg0"});


    		});
  	</script>




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