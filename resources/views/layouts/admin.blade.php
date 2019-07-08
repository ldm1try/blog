<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Панель управления</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/bs-custom-file-input.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    {{--<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">--}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bsskin.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @include('blog.includes.navbar')

        <main class="py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-auto">
                        <div>@yield('leftSideContent')</div>
                    </div>
                    <div class="col-md">
                        <div>@yield('content')</div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
