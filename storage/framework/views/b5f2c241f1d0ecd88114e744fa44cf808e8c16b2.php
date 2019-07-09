<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card-columns">
                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="card">
                            <img class="card-img-top"
                                 src="<?php echo e($item->getFirstMediaUrl('photo')); ?>">

                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="<?php echo e(route('post_detail', $item->id)); ?>">
                                        <?php echo e($item->title); ?>

                                    </a>
                                </h5>
                                <p class="card-text"><?php echo e($item->excerpt); ?></p>
                                <p class="card-text"><small class="text-muted"><?php echo e($item->created_at); ?></small></p>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>

        <?php if($items->total() > $items->count()): ?>
            <div class="row mt-3">
                <div class="col-md-12">
                    <?php echo e($items->links()); ?>

                </div>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\localhost\blog\resources\views/blog/posts/index.blade.php ENDPATH**/ ?>