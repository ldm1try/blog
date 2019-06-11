@extends('layouts.admin')

@section('leftSideContent')
    @include('admin.includes.leftSideContent')
@endsection

@section('content')
    @php /** @var App\BlogPost $item */ @endphp

    <div class="">

        @include('admin.blog.posts.includes.result_messages')

        @if($item->exists)
            <form method="POST" action="{{ route('admin.blog.posts.update', $item->id) }}" enctype="multipart/form-data">
                @method('PATCH')
        @else
            <form method="POST" action="{{ route('admin.blog.posts.store') }}">
        @endif

            @csrf
                <div class="row justify-content-center">
                    <div class="col-md">
                        @include('admin.blog.posts.includes.post_create_main_col')
                    </div>
                    <div class="col-md-auto">
                        @include('admin.blog.posts.includes.post_create_add_col')
                    </div>
                </div>
            </form>

            @if($item->exists)
                <form id="delete" method="POST" action="{{ route('admin.blog.posts.destroy', $item->id) }}" hidden>
                    @method('DELETE')
                    @csrf
                </form>
            @endif
    </div>
@endsection