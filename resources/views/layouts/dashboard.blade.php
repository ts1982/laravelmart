<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/d5001603e3.js" crossorigin="anonymous"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>

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
        @component('components.dashboard.header')
        @endcomponent

        <div class="row">
            @if (Auth::guard('admins')->check())
                <div class="col-3 pt-3">
                    @component('components.dashboard.sidebar')
                    @endcomponent
                </div>
            @endauth
            <div class="col">
                <main class="mt-5 mb-2">
                    @yield('content')
                </main>
            </div>
    </div>

    {{-- @component('components.dashboard.footer')
        @endcomponent --}}
</div>
</body>

</html>
