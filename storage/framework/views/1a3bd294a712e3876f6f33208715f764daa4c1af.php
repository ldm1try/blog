<?php $__env->startSection('content'); ?>
    <div class="d-none"><?php echo e($posts = \App\Models\Admin\Blog\BlogPost::all()); ?></div>
    <example-component v-bind:blogposts="<?php echo e(json_encode($posts)); ?>"></example-component>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\localhost\blog\resources\views/index.blade.php ENDPATH**/ ?>