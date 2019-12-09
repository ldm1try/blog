<div class="list-group mb-2">
    <a class="list-group-item list-group-item-action
       <?php echo e(Request::is('admin/blog/posts', 'admin/blog/posts/*') ? 'active' : ''); ?>"
       href="<?php echo e(route('admin.blog.posts.index')); ?>"
    >
        Статьи
    </a>
    <a class="list-group-item list-group-item-action
        <?php echo e(Request::is('admin/blog/categories', 'admin/blog/categories/*') ? 'active' : ''); ?>"
        href="<?php echo e(route('admin.blog.categories.index')); ?>"
    >
        Категории
    </a>

    <a class="list-group-item list-group-item-action
       <?php echo e(Request::is('admin/users', 'admin/users/*') ? 'active' : ''); ?>"
       href="<?php echo e(route('admin.users.index')); ?>"
    >
        Пользователи
    </a>
</div>
<?php /**PATH C:\OSPanel\domains\blog\resources\views/admin/includes/leftSideContent.blade.php ENDPATH**/ ?>