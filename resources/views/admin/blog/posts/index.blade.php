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
                    @foreach($paginator as $post)
                        @php
                            /** @var \App\Models\BlogPost $post */
                        @endphp
                        <tr @if(!$post->is_published) style="background-color: #ddd;" @endif>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->user->name }}</td>
                            <td>{{ $post->category->title }}</td>
                            <td>
                                <a href="{{ route('admin.blog.posts.edit', $post->id) }}">{{ $post->title }}</a>
                            </td>
                            <td>{{ $post->published_at ? \Carbon\Carbon::parse($post->published_at)->format('d.M H:i') : '' }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot></tfoot>
                </table>
            </div>
        </div>
    </div>
    @if($paginator->total() > $paginator->count())
        <div class="row mt-3">
            <div class="col-md-12">
                {{ $paginator->links() }}
            </div>
        </div>
    @endif
@endsection
