@extends('layouts.default')

@section("head-vue-scripts")       
    <!-- Vue Scripts -->
    <script src="{{ asset('js/front.js') }}" defer></script>
@endsection



@section('body')
    <body>
        @yield('vue-app')
    </body>
@endsection