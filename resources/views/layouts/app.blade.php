<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>LaravelMart</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/d5001603e3.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/vnd.microsoft.icon">
    <link rel="icon" href="img/favicon.ico" type="image/vnd.microsoft.icon">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=BIZ+UDGothic:wght@400;700&family=Sawarabi+Gothic&display=swap');
    </style>
</head>

<body>
    <div id="app">
        @component('components.header')
        @endcomponent

        <main class="mt-5">
            @yield('content')
        </main>

        @component('components.footer')
        @endcomponent
    </div>
</body>

</html>
