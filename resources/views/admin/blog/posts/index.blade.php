@extends('layouts.admin')

@section('leftSideContent')
    @include('admin.includes.leftSideContent')
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">

            @include('admin.blog.posts.includes.result_messages')

            <a class="btn btn-primary mb-3" href="{{ route('admin.blog.posts.create') }}">Добавить</a>

            <div class="card">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Автор</th>
                            <th>Категория</th>
                            <th>Заголовок</th>
                            <th>Опубликовано</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $item)
                        @php
                            /** @var \App\Models\Admin\Blog\BlogPost $post */
                        @endphp
                        <tr @if(!$item->is_published) style="background-color: #ddd;" @endif>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->category->title }}</td>
                            <td>
                                <a href="{{ route('admin.blog.posts.edit', $item->id) }}">{{ $item->title }}</a>
                            </td>
                            <td>{{ $item->published_at ? \Carbon\Carbon::parse($item->published_at)->format('d.M H:i') : '' }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot></tfoot>
                </table>
            </div>
        </div>
    </div>
    @if($items->total() > $items->count())
        <div class="row mt-3">
            <div class="col-md-12">
                {{ $items->links() }}
            </div>
        </div>
    @endif
@endsection
