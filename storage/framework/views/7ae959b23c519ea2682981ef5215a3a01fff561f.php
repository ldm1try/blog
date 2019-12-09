<?php $__env->startSection('leftSideContent'); ?>
    <?php echo $__env->make('admin.includes.leftSideContent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-md-12">

            <?php echo $__env->make('admin.blog.posts.includes.result_messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <a class="btn btn-primary mb-3" href="<?php echo e(route('admin.blog.posts.create')); ?>">Добавить</a>

            <div class="card">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Автор</th>
                            <th>Категория</th>
                            <th>Заголовок</th>
                            <th>Опубликовано</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            /** @var \App\Models\Admin\Blog\BlogPost $post */
                        ?>
                        <tr <?php if(!$item->is_published): ?> style="background-color: #ddd;" <?php endif; ?>>
                            <td><?php echo e($item->id); ?></td>
                            <td><?php echo e($item->user->name); ?></td>
                            <td><?php echo e($item->category->title); ?></td>
                            <td>
                                <a href="<?php echo e(route('admin.blog.posts.edit', $item->id)); ?>"><?php echo e($item->title); ?></a>
                            </td>
                            <td><?php echo e($item->published_at ? \Carbon\Carbon::parse($item->published_at)->format('d.M H:i') : ''); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    <tfoot></tfoot>
                </table>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\blog\resources\views/admin/blog/posts/index.blade.php ENDPATH**/ ?>