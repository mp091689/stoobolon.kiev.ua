<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>@yield('title')</title>
        <meta name="Description" content="@yield('description')">
        <meta name="Keywords" content="@yield('keywords')">
        <link rel="stylesheet" href="{{ URL::asset('src/css/normalize.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('src/css/style.css') }}">
        @yield('styles')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jcarousel/0.3.4/jquery.jcarousel.js"></script>
        <script src="{{ URL::asset('src/js/main.js') }}"></script>
        @yield('scripts')
    </head>
    <body>
        @include('includes.callback')
        @include('includes.header')
        <!-- CONTENT -->
        <div class="content container clearfix">
            @yield('content')
        </div>
        <!-- /CONTENT -->
        @include('includes.footer')
    </body>
</html>