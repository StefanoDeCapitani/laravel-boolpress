{{-- Template from https://startbootstrap.com/template/blog-home, https://startbootstrap.com/template/blog-post --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include("partials.head")
    @yield('body')
</html>