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
            <div class="side-menu col-2">
                <div class="row flex-column justify-content-center">
                    <div class="menu-header">
                        <p>Меню</p>
                    </div>
                    <nav class="navbar navbar-default">
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="{{ route('index') }}">Погода</a>
                            </li>
                            <li>
                                <a href="{{ route('orders_list') }}">Заказы</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-10">
                <div class="row">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    @yield('javascripts')
</body>
</html>
