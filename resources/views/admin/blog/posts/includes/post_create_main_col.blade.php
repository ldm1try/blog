@php
    /** @var \App\BlogPost $item */
@endphp

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                @if($item->is_published)
                    Опубликовано
                @else
                    Черновик
                @endif
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
                            <input name="title" value="{{ old('title', $item->title) }}"
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
                                      rows="20">{{ old('content_raw', $item->content_raw) }}</textarea>
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
                                @foreach($categoryList as $categoryOption)
                                    <option value="{{ $categoryOption->id }}"
                                            @if($categoryOption->id == $item->category_id) selected @endif>
                                        {{ $categoryOption->id_title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="slug">Идентификатор</label>
                            <input name="slug"
                                   value="{{ $item->slug }}"
                                   id="slug"
                                   type="text"
                                   class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="excerpt">Выдержка</label>
                            <textarea name="excerpt"
                                      id="excerpt"
                                      class="form-control"
                                      rows="3">{{ old('excerpt', $item->excerpt) }}</textarea>
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
                                       @if($item->is_published)
                                            checked = "checked"
                                       @endif
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
            </div>
            @if (isset($photoFiles) && !$photoFiles->isEmpty())
                <div class="card-footer">
                    <div class="row">
                        @foreach ($photoFiles as $photoFile)
                            <div class="mr-2 mb-2">
                                <img class="img-thumb"
                                     src="{{ $photoFile->getUrl('photo-conversion_optimize') }}"
                                     data-toggle="tooltip"
                                     data-placement="top"
                                     title="{{ $photoFile->name }}">
                                {{--{{ $photoFile('photo-conversion') }}--}}
                                {{--<img src="{{ $photoFile->getUrl() }}">--}}
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>