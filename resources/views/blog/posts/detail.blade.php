@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    {{--<img class="card-img-top"
                         src="{{ $item->getFirstMediaUrl('photo') }}"
                         data-toggle="tooltip"
                         data-placement="top">--}}

                    <div class="card-body">

                        <h5 class="card-title">
                            <a href="{{ route('post_detail', $item->id) }}">
                                {{ $item->id }} - {{ $item->title }}
                            </a>
                        </h5>

                        <p class="card-text text-justify">{{ $item->content_raw }}</p>

                        <div class="card-columns">
                            @foreach($photoFiles as $photoFile)
                                <div class="card">
                                    <a href="{{ $photoFile->getUrl('photo-conversion_optimize') }}"
                                       data-lightbox="image-{{ $item->id }}"
                                       data-title="{{ $item->title }}">
                                            <img class="card-img-top"
                                                 src="{{ $photoFile->getUrl('photo-conversion_optimize') }}"
                                                 {{--data-toggle="tooltip"
                                                 data-placement="top"
                                                 title="{{ $photoFile->name }}"--}}>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection