<?php
    /** @var \App\BlogCategory $item */
    /** @var \Illuminate\Support\Collection $categoryList */
?>

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title"></div>
                <ul class="nav nav-tabs mb-2" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#maindata" role="tab">Основные данные</a>
                    </li>
                </ul>
                <div class="tab-pane active" id="maindata" role="tabpanel">
                    <div class="form-group">
                        <label for="title">Заголовок</label>
                        <input name="title" value="<?php echo e($item->title); ?>"
                               id="title"
                               type="text"
                               class="form-control"
                               minlength="3"
                               required>
                    </div>

                    <div class="form-group">
                        <label for="slug">Идентификатор</label>
                        <input name="slug" value="<?php echo e($item->slug); ?>"
                               id="slug"
                               type="text"
                               class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="parent_id">Родитель</label>
                        <select name="parent_id" value="<?php echo e($item->parent_id); ?>"
                                id="parent_id"
                                class="custom-select"
                                class="form-control"
                                placeholder="Выберите категорию"
                                required>
                            <?php $__currentLoopData = $categoryList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryOption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($categoryOption->id); ?>"
                                        <?php if($categoryOption->id == $item->parent_id): ?> selected <?php endif; ?>
                                        <?php if($item->id == $categoryOption->id): ?> class="d-none" <?php endif; ?>>
                                        
                                        <?php echo e($categoryOption->id_title); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="description">Описание</label>
                        <textarea name="description" value="<?php echo e($item->description); ?>"
                                id="description"
                                class="form-control"
                                rows="3"><?php echo e(old('description', $item->description)); ?>

                        </textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\OSPanel\domains\blog\resources\views/admin/blog/categories/includes/item_edit_main_col.blade.php ENDPATH**/ ?>