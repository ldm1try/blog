<?php $__env->startSection('leftSideContent'); ?>
    <?php echo $__env->make('admin.includes.leftSideContent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php /** @var App\BlogPost $item */ ?>

    <div class="">

        <?php echo $__env->make('admin.blog.posts.includes.result_messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php if($item->exists): ?>
            <form method="POST" action="<?php echo e(route('admin.blog.posts.update', $item->id)); ?>" enctype="multipart/form-data">
                <?php echo method_field('PATCH'); ?>
        <?php else: ?>
            <form method="POST" action="<?php echo e(route('admin.blog.posts.store')); ?>">
        <?php endif; ?>

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
                <form 
                      id="delete"
                      method="POST"
                      action="<?php echo e(route('admin.blog.posts.destroy', $item->id)); ?>"
                      hidden>
                    <?php echo method_field('DELETE'); ?>
                    <?php echo csrf_field(); ?>
                </form>
            <?php endif; ?>
    </div>

    <!-- deleteModal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleDeleteLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleDeleteLabel">Удаление</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Подтвертить удаление статьи?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                    <button type="submit" form="delete" class="btn btn-primary">Ок</button>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\localhost\blog\resources\views/admin/blog/posts/edit.blade.php ENDPATH**/ ?>