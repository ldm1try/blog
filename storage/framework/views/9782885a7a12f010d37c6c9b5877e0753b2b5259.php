<?php $__env->startSection('leftSideContent'); ?>
    <?php echo $__env->make('admin.includes.leftSideContent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
   <?php /** @var \App\Models\Admin\Blog\BlogCategory $item */ ?>

   <?php if($item->exists): ?>
       <form method="POST" action="<?php echo e(route('admin.blog.categories.update', $item->id)); ?>">
       <?php echo method_field('PATCH'); ?>
   <?php else: ?>
       <form method="POST" action="<?php echo e(route('admin.blog.categories.store')); ?>">
   <?php endif; ?>
   <?php echo csrf_field(); ?>

       <div class="">
           <?php
           /** @var \Illuminate\Support\ViewErrorBag $errors */
           ?>

           <?php echo $__env->make('admin.blog.posts.includes.result_messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

           <div class="row justify-content-center">
               <div class="col-md">
                   <?php echo $__env->make('admin.blog.categories.includes.item_edit_main_col', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
               </div>
               <div class="col-md-auto">
                   <?php echo $__env->make('admin.blog.categories.includes.item_edit_add_col', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
               </div>
           </div>
       </div>
   </form>

   <?php if($item->exists): ?>
       <form 
             id="delete"
             method="POST"
             action="<?php echo e(route('admin.blog.categories.destroy', $item->id)); ?>"
             hidden>
           <?php echo method_field('DELETE'); ?>
           <?php echo csrf_field(); ?>
       </form>
   <?php endif; ?>

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
                       Подтвертить удаление категории со всеми вложенными статьями и файлами?
                   </div>
                   <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                       <button type="submit" form="delete" class="btn btn-primary">Ок</button>
                   </div>
               </div>
           </div>
       </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\blog\resources\views/admin/blog/categories/edit.blade.php ENDPATH**/ ?>