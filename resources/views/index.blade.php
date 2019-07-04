@extends('layouts.app')

@section('content')
    <div class="d-none">{{ $posts = \App\Models\Admin\Blog\BlogPost::all() }}</div>
    <example-component v-bind:blogposts="{{ json_encode($posts) }}"></example-component>
@endsection