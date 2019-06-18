@extends('layouts.admin')

@section('leftSideContent')
    @include('admin.includes.leftSideContent')
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">

            {{--@include('admin.blog.posts.includes.result_messages')--}}

            <a class="btn btn-primary mb-3" href="{{ route('admin.users.create') }}">Добавить</a>

            <div class="card">
                <table class="table table-borderless table-hover">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Имя</th>
                        <th>e-mail</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $item)
                        @php
                            /** @var \App\User $item */
                        @endphp
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td><a href="{{ route('admin.users.edit', $item->id) }}">{{ $item->name }}</a></td>
                            <td>{{ $item->email }}</td>
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