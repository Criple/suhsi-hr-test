<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @yield('stylesheets')
</head>
<body>
    <div class="container">
        <div class="row">
            @include('parts.navbar')
            @yield('content')
        </div>
    </div>

    @yield('javascripts')
</body>
</html>
