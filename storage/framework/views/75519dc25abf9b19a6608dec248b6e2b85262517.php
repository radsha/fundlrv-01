<?php $__env->startSection('title','โปรแกรมระบบบริหารงานฌาปนกิจและงานสารบัญ'); ?>
<?php $__env->startSection('header','รายละเอียดงานฌาปนกิจ'); ?>
<?php $__env->startSection('content'); ?>
    <form class="form-horizontal" >

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">ชื่อฌาปนกิจ</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="ชื่อฌาปนกิจ" value="<?php echo e($data->fundnamel); ?>">
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">ชื่อย่อ</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPassword3" placeholder="ชื่อย่อ" value="<?php echo e($data->fundname2l); ?>">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">บันทึก</button>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>