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
    <style>
        @import url('https://fonts.googleapis.com/css2?family=BIZ+UDGothic:wght@400;700&family=Sawarabi+Gothic&display=swap');
    </style>
</head>

<body>
    <div id="app">
        @component('components.mypage.header')
        @endcomponent

        <main class="my-5 mb-2">
            <div class="row">
                <div class="col-md-2">
                    @component('components.mypage.sidebar')
                    @endcomponent
                </div>
                <div class="col-md-8">
                    @yield('content')
                </div>
            </div>
        </main>

        @component('components.mypage.footer')
        @endcomponent
    </div>
</body>

</html>
