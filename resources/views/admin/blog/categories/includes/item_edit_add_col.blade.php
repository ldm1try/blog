@php /** @var \App\BlogCategory $item */ @endphp

<div class="row justify-content-center mb-2">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-center">
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                    <a class="btn btn-secondary ml-2" href="{{ route('admin.blog.categories.index') }}">Отмена</a>
                </div>
            </div>
        </div>
    </div>
</div>

@if($item->exists)
    <div class="row justify-content-center mb-2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li>ID: {{ $item->id }}</li>
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
                        <input type="text" value="{{ $item->created_at }}" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="title">Изменено</label>
                        <input type="text" value="{{ $item->updated_at }}" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="title">Удалено</label>
                        <input type="text" value="{{ $item->deleted_at }}" class="form-control" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif