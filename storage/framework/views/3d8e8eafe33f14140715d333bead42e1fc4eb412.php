<?php /** @var \App\BlogCategory $item */ ?>

<div class="row justify-content-center mb-2">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <button type="submit" class="btn btn-primary">Сохранить</button>
                <?php if(isset($item->id)): ?>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#deleteModal">
                        Удалить
                    </button>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php if($item->exists): ?>
    <div class="row justify-content-center mb-2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li>ID: <?php echo e($item->id); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mb-2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Создано</label>
                        <input type="text" value="<?php echo e($item->created_at); ?>" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="title">Изменено</label>
                        <input type="text" value="<?php echo e($item->updated_at); ?>" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="title">Удалено</label>
                        <input type="text" value="<?php echo e($item->deleted_at); ?>" class="form-control" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?><?php /**PATH C:\OSPanel\domains\blog\resources\views/admin/blog/categories/includes/item_edit_add_col.blade.php ENDPATH**/ ?>