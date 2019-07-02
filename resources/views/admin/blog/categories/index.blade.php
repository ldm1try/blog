@extends('layouts.admin')

@section('leftSideContent')
    @include('admin.includes.leftSideContent')
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">

            @include('admin.blog.categories.includes.result_messages')

            <a href="{{ route('admin.blog.categories.create') }}" class="btn btn-primary mb-3">Добавить</a>

            <div class="card">
                <table class="table table-borderless table-hover">
                    <thread>
                        <tr>
                            <th>#</th>
                            <th>Категория</th>
                            <th>Родитель</th>
                        </tr>
                    </thread>
                    <tbody>
                        @foreach($items as $item)
                            @php /** @var \App\BlogCategory $item */ @endphp
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>
                                    <a href="{{ route('admin.blog.categories.edit', $item->id) }}">
                                        {{ $item->title }}
                                    </a>
                                </td>
                                <td @if(in_array($item->parent_id, [0, 1])) style="color: #ccc" @endif>
                                    {{--{{ $item->parentCategory()->title ?? '?' }}

                                    {{ optional($item->parentCategory)->title }}

                                    {{
                                        $item->parentCategory()->title
                                            ?? ($item->id === \App\Models\BlogCategory::ROOT
                                                ? 'Корень'
                                                : '???')
                                    }}--}}

                                    {{ $item->parentTitle }} {{--accessor в BlogCategory--}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
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