<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title')</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset("assets/favicon.ico") }}" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('adds-to-head')

</head>