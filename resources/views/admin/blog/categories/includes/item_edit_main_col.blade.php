@php
    /** @var \App\BlogCategory $item */
    /** @var \Illuminate\Support\Collection $categoryList */
@endphp

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
                        <input name="title" value="{{ $item->title }}"
                               id="title"
                               type="text"
                               class="form-control"
                               minlength="3"
                               required>
                    </div>

                    <div class="form-group">
                        <label for="slug">Идентификатор</label>
                        <input name="slug" value="{{ $item->slug }}"
                               id="slug"
                               type="text"
                               class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="parent_id">Родитель</label>
                        <select name="parent_id"
                                id="parent_id"
                                class="custom-select"
                                class="form-control"
                                placeholder="Выберите категорию"
                                required>
                            @foreach($categoryList as $categoryOption)
                                <option @if($categoryOption->id == $item->parent_id) selected @endif
                                        @if($item->id == $categoryOption->id) class="d-none" @endif>
                                        {{--{{ $categoryOption->id }}. {{ $categoryOption->title}}--}}
                                        {{ $categoryOption->id_title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="description">Описание</label>
                        <textarea name="description" value="{{ $item->description }}"
                                id="description"
                                class="form-control"
                                rows="3">{{ old('description', $item->description) }}
                        </textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>