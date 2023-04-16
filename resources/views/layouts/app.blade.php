<!DOCTYPE>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta charset="viewport" content="width=device-width", initial-scale="1">

        <title>라라벨 - @yield('title')</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <ul>
                    <li>{{ $error }}</li>
                </ul>
            @endforeach
        @endif
        <main>@yield('content')</main>
    </body>
</html>
