@extends('layouts.default')

@section('page-content')
        @include("partials.header");
        <!-- Page content-->
        @yield('main-content')
        <!-- Footer-->
@endsection