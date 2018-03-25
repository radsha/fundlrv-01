<?php $__env->startSection('title','ระบบควบคุมหลักประกันเงินกู้ แบบรวมศูนย์ ออนไลน์'); ?>
<?php $__env->startSection('header'); ?>
  <a href='<?php echo e(url('booktype')); ?>' ><i class="fa  fa-arrow-circle-left text-Primary fa-1x" ></i></a>
  การกำหนดประเภทเอกสาร
 <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
  <form class="form-horizontal" method="post" action="<?php echo e(url( $url )); ?>">
         <?php if( $bookid != 0): ?>
              <input type="hidden" name="_method" value="PUT" />
         <?php endif; ?>
              <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
 <div class="form-group has-success">
              <label class="col-sm-2 control-label">ลำดับที่</label>
       <div class="col-sm-10">
                <input type="text" class="form-control" name="bookid" placeholder="Auto" value="<?php echo e($data ? $data->bookid : old('bookid')); ?>">
                <?php echo $errors->first('bookid'); ?>

       </div>
 </div>

 <div class="form-group has-success">
              <label class="col-sm-2 control-label">ประจำปี</label>
       <div class="col-sm-10">
                <input type="text" class="form-control" name="bookyear" placeholder="bookyear" value="<?php echo e($data ? $data->bookyear : old('bookyear')); ?>">
                <?php echo $errors->first('bookyear'); ?>

       </div>
 </div>

 <div class="form-group has-success">
              <label class="col-sm-2 control-label">คำนำหน้า</label>
       <div class="col-sm-10">
                <input type="text" class="form-control" name="bookname" placeholder="bookname" value="<?php echo e($data ? $data->bookname : old('bookname')); ?>">
                <?php echo $errors->first('bookname'); ?>

       </div>
 </div>

 <div class="form-group has-success">
              <label class="col-sm-2 control-label">เลขที่สุดท้าย</label>
       <div class="col-sm-10">
                <input type="text" class="form-control" name="booklast" placeholder="booklast" value="<?php echo e($data ? $data->booklast : old('booklast')); ?>">
                <?php echo $errors->first('booklast'); ?>

       </div>
 </div>

 <div class="form-group has-success">
      <label class="col-sm-2 control-label">สถานะ</label>
       <div class="col-sm-10">
           <?php $datasta=DB::table('book_sta')->get();?>
             <select name="booksta" class="form-control">
                   <?php foreach($datasta as $datasta1): ?>
                       <option value="<?php echo e($datasta1->bookstaid); ?>" <?php if(!(strcmp($datasta1->bookstaid,$data ? $data->booksta:1))) {echo "selected=\"selected\"";}?>><?php echo e($datasta1->bookstaid.'|'.$datasta1->bookstaname); ?></option>
                   <?php endforeach; ?>
             </select>
       </div>
 </div>



 <div class="form-group has-success">
              <label class="col-sm-2 control-label">วันที่บันทึก</label>
       <div class="col-sm-10">
                <input type="text" class="form-control" name="keydata" placeholder="keydata" value="<?php echo e(Auth::guard('admin')->user()->fname .' | '.Auth::guard('admin')->user()->idoffice.' | '.date('d-m-').(date('Y')+543).' | '.date('H:i:s')); ?>">

       </div>
 </div>

                <input type="text"   name="bookoffice"   value="<?php echo e(Auth::guard('admin')->user()->idoffice); ?>">
                <input type="text"   name="idctty"  value="<?php echo e(Request::input('idctty') ? Request::input('idctty') :$data->idctty); ?>">



 <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-primary">บันทึก</button>
             </div>
       </div>
 </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>