<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    

                    <div class="card-body">

                        <h5 class="card-title">
                            <a href="<?php echo e(route('post_detail', $item->id)); ?>">
                                <?php echo e($item->title); ?>

                            </a>
                        </h5>

                        <p class="card-text text-justify"><?php echo e($item->content_raw); ?></p>

                        <div class="card-columns">
                            <?php $__currentLoopData = $photoFiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photoFile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="card">
                                    <a href="<?php echo e($photoFile->getUrl('photo-conversion_optimize')); ?>"
                                       data-lightbox="image-<?php echo e($item->id); ?>"
                                       data-title="<?php echo e($item->title); ?>">
                                            <img class="card-img-top"
                                                 src="<?php echo e($photoFile->getUrl('photo-conversion_optimize')); ?>"
                                                 >
                                    </a>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\localhost\blog\resources\views/blog/posts/detail.blade.php ENDPATH**/ ?>