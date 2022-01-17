{{-- Template from https://startbootstrap.com/template/blog-home, https://startbootstrap.com/template/blog-post --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include("partials.head")
    <body>
        @include('partials.navbar')
        @yield('page-content')
        <!-- Footer-->
        @include("partials.footer")
      {{--   <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset("js/scripts.js")}}"></script> --}}
    </body>
</html>