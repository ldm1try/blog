<?php $__env->startSection('leftSideContent'); ?>
    <?php echo $__env->make('admin.includes.leftSideContent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-md-12">

            <?php echo $__env->make('admin.blog.categories.includes.result_messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <a href="<?php echo e(route('admin.blog.categories.create')); ?>" class="btn btn-primary mb-3">Добавить</a>

            <div class="card">
                <table class="table table-borderless table-hover">
                    <thread>
                        <tr>
                            <th>#</th>
                            <th>Категория</th>
                            <th>Родитель</th>
                        </tr>
                    </thread>
                    <tbody>
                        <?php $__currentLoopData = $paginator; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php /** @var \App\BlogCategory $item */ ?>
                            <tr>
                                <td><?php echo e($item->id); ?></td>
                                <td>
                                    <a href="<?php echo e(route('admin.blog.categories.edit', $item->id)); ?>">
                                        <?php echo e($item->title); ?>

                                    </a>
                                </td>
                                <td <?php if(in_array($item->parent_id, [0, 1])): ?> style="color: #ccc" <?php endif; ?>>
                                    

                                    <?php echo e($item->parentTitle); ?> 
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php if($paginator->total() > $paginator->count()): ?>
        <div class="row mt-3">
            <div class="col-md-12">
                <?php echo e($paginator->links()); ?>

            </div>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\localhost\blog\resources\views/admin/blog/categories/index.blade.php ENDPATH**/ ?>