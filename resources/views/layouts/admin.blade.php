@extends('layouts.default')

@section('page-content')
    @yield("header")
    <!-- Page content-->
    <div class="container">
        <div class="row mt-4">
            <!-- Blog entries-->
            <div class="col-lg-8">
                @yield('main-content')
            </div>
            <!-- Side widgets-->
            <div class="col-lg-4">
                @include("partials.sidebar")
            </div>
        </div>
    </div>
@endsection