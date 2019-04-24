<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>JS-EVENTS-APP</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
    @yield('styles')
    @yield('header-scripts')
    <script>
        window.Laravel = {
            csrfToken: '{{ csrf_token() }}',
            basePath: '{{ url('/') }}'
        }
    </script>
</head>
<body>
@include('layouts.partials.menu')
<div class="container" id="app">
    @yield('content')
</div>
<script src="{{ mix('/js/app.js') }}"></script>
    @yield('footer-scripts')
</body>
</html>