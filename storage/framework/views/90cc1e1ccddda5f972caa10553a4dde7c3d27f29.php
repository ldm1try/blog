<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        <H5>Результаты поиска</H5>
                        <?php if($count >= 1): ?>
                            (Найдено элементов: <?php echo e($count); ?>)
                        <?php endif; ?>
                    </div>
                    <div class="card-body">
                        <?php if($count === 0): ?>
                            <h5>Элементов соответствующих условиям поиска не найдено</h5>
                        <?php endif; ?>

                        <?php if(isset($searchItems)): ?>
                            <?php $__currentLoopData = $searchItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $searchItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <p>
                                        <a href="/blog/posts/<?php echo e($searchItem->id); ?>">
                                            <?php echo e($searchItem->title); ?>

                                        </a>
                                        <br><?php echo e($searchItem->excerpt); ?>

                                    </p>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>

        
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\localhost\blog\resources\views/blog/posts/search.blade.php ENDPATH**/ ?>