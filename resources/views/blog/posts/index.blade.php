@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                {{--<form method="POST" action="{{ route('search') }}">
                    @method('GET')
                    @csrf
                        <div class="input-group mb-4">
                            <input type="text"
                                   name="search"
                                   id="search"
                                   class="form-control"
                                   placeholder="Поиск по заголовкам"
                                   aria-label="Recipient's username"
                                   a ria-describedby="button-addon2">
                            <div class="input-group-append">
                                <button  class="btn btn-secondary" type="submit" id="button-addon2">Найти</button>
                            </div>
                        </div>
                </form>--}}

                <my-search></my-search>

                <div class="card-columns">
                    @foreach($items as $item)
                        <div class="card">
                            <img class="card-img-top"
                                 src="{{ $item->getFirstMediaUrl('photo') }}">

                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="{{ route('post_detail', $item->id) }}">
                                        {{ $item->title }}
                                    </a>
                                </h5>
                                <p class="card-text">{{ $item->excerpt }}</p>
                                <p class="card-text"><small class="text-muted">{{ $item->created_at }}</small></p>
                            </div>
                        </div>
                    @endforeach
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
    </div>
@endsection