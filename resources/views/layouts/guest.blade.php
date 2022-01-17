@extends('layouts.default')

@section("adds-to-head")
        <!-- Scripts -->
    <script src="{{ asset('js/front.js') }}" defer></script>
@endsection

@section('page-content')
        @include("partials.header");
        <!-- Page content-->
        @yield('main-content')
        <!-- Footer-->
@endsection