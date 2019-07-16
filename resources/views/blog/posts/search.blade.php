@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        <H5>Результаты поиска</H5>
                        @if($count >= 1)
                            (Найдено элементов: {{ $count }})
                        @endif
                    </div>
                    <div class="card-body">
                        @if($count === 0)
                            <h5>Элементов соответствующих условиям поиска не найдено</h5>
                        @endif

                        @isset($searchItems)
                            @foreach($searchItems as $searchItem)
                                    <p>
                                        <a href="/blog/posts/{{ $searchItem->id }}">
                                            {{ $searchItem->title }}
                                        </a>
                                        <br>{{ $searchItem->excerpt }}
                                    </p>
                            @endforeach
                        @endisset
                    </div>
                </div>

            </div>
        </div>

        {{--@isset($searchItem)
                <div class="row mt-3">
                    <div class="col-md-12">
                        {{ $searchItem->links() }}
                    </div>
                </div>
        @endisset--}}
    </div>
@endsection