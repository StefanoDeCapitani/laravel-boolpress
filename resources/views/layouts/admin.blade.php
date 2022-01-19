@extends('layouts.default')

@section('body')   


<body class="full-page overflow-hidden">
    <!-- Navbar -->
    @include('partials.navbar')
    <!-- Page content-->
    <div class="container-fluid p-0 h-100 overflow-hidden d-flex">
        <div class="menu h-100">
            @include("admin.partials.menu")
        </div>
        <!-- Blog entries-->
        <div class="dashboard p-4">
            <div class="container-fluid">
                <div class="row">
                    @yield('main-content')
                </div>
            </div>
        </div>
    </div>
    <!-- Footer-->
    @include("partials.footer")
    @yield('body-additional-scripts')
</body>


    
@endsection