<?php
    /** @var \App\BlogPost $item */
?>

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <?php if($item->is_published): ?>
                    Опубликовано
                <?php else: ?>
                    Черновик
                <?php endif; ?>
            </div>
            <div class="card-body">
                <div class="card-title"></div>
                <div class="card-subtitle mb-2 text-muted"></div>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#maindata" role="tab">Основные данные</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#adddata" role="tab">Доп.данные</a>
                    </li>
                </ul>
                <div class="tab-content mt-2">
                    <div class="tab-pane active" id="maindata" role="tabpanel">
                        <div class="form-group">
                            <label for="title">Заголовок</label>
                            <input name="title" value="<?php echo e(old('title', $item->title)); ?>"
                                   id="title"
                                   type="text"
                                   class="form-control"
                                   minlength="3"
                                   required>
                        </div>

                        <div class="form-group">
                            <label for="content_raw">Статья</label>
                            <textarea name="content_raw"
                                      id="content_raw"
                                      class="form-control"
                                      rows="20"><?php echo e(old('content_raw', $item->content_raw)); ?></textarea>
                        </div>
                    </div>
                    <div class="tab-pane" id="adddata" role="tabpanel">
                        <div class="form-group">
                            <label for="category_id">Категория</label>
                            <select name="category_id"
                                    id="category_id"
                                    class="custom-select"
                                    placeholder="Выберите категорию"
                                    required>
                                <?php $__currentLoopData = $categoryList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryOption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($categoryOption->id); ?>"
                                            <?php if($categoryOption->id == $item->category_id): ?> selected <?php endif; ?>>
                                        <?php echo e($categoryOption->id_title); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="slug">Идентификатор</label>
                            <input name="slug"
                                   value="<?php echo e($item->slug); ?>"
                                   id="slug"
                                   type="text"
                                   class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="excerpt">Выдержка</label>
                            <textarea name="excerpt"
                                      id="excerpt"
                                      class="form-control"
                                      rows="3"><?php echo e(old('excerpt', $item->excerpt)); ?></textarea>
                        </div>
                        <div class="form-group">
                            <div class = "custom-control custom-switch">
                                <input name="is_published"
                                       type="hidden"
                                       value="0">

                                <input name = "is_published"
                                       type = "checkbox"
                                       class = "custom-control-input"
                                       id = "is_published"
                                       value="1"
                                       <?php if($item->is_published): ?>
                                            checked = "checked"
                                       <?php endif; ?>
                                >
                            <label class="custom-control-label" for="is_published">Опубликовано</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card my-2">
            <div class="card-body">
                <div class="custom-file">
                    <input class="custom-file-input"
                           id="upload"
                           type="file"
                           name="photo_upload[]"
                           multiple>
                    <label class="custom-file-label" for="upload" data-browse="Выбрать">
                        Добавить фото (jpeg, jpg, png, до 5Мб)
                    </label>
                </div>

                <?php if(isset($photoFiles) && !$photoFiles->isEmpty()): ?>
                    <div class="mt-3">
                        <div class="card-columns">
                            <?php $__currentLoopData = $photoFiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photoFile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="card">
                                    <img class="card-img-top"
                                         src="<?php echo e($photoFile->getUrl('photo-conversion_optimize')); ?>"
                                         data-toggle="tooltip"
                                         data-placement="top"
                                         title="<?php echo e($photoFile->name); ?>">
                                    
                                    
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\OSPanel\domains\blog\resources\views/admin/blog/posts/includes/post_create_main_col.blade.php ENDPATH**/ ?>