<?php
    /** @var \Illuminate\Support\ViewErrorBag $errors */
?>

<?php if($errors->any()): ?>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;﻿</span>
                </button>
                
                <ul class="list-unstyled">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorTxt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($errorTxt); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if(session('success')): ?>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;﻿</span>
                </button>
                <?php echo e(session()->get('success')); ?>


                
            </div>
        </div>
    </div>
<?php endif; ?><?php /**PATH C:\OSPanel\domains\blog\resources\views/admin/users/includes/result_messages.blade.php ENDPATH**/ ?>