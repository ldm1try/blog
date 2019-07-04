<?php $__env->startSection('leftSideContent'); ?>
    <?php echo $__env->make('admin.includes.leftSideContent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php /** @var \App\BlogPost $item */ ?>

    <?php echo $__env->make('admin.blog.posts.includes.result_messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <form method="POST" action="<?php echo e(route('admin.blog.posts.store')); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="row justify-content-center">
                <div class="col-md">
                    <?php echo $__env->make('admin.blog.posts.includes.post_create_main_col', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="col-md-auto">
                    <?php echo $__env->make('admin.blog.posts.includes.post_create_add_col', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </form>

        <?php if($item->exists): ?>
            <form method="POST" action="<?php echo e(route('admin.blog.posts.destroy', $item->id)); ?>" hidden>
                <?php echo method_field('DELETE'); ?>
                <?php echo csrf_field(); ?>
                <div class="row justify-content-center mt-2">
                    <div class="col-md-8">
                        <div class="card card-block">
                            <div class="card-body ml-auto">
                                <button type="submit" class="btn btn-link">Удалить</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </form>
        <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\localhost\blog\resources\views/admin/blog/posts/create.blade.php ENDPATH**/ ?>