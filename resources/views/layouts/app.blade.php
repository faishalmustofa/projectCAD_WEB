<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.header')
</head>
<body>
    <div class="wrapper" id="app">
            @include('layouts.navbar')
            @include('layouts.sidebar')

            @yield('content')
    </div>
</body>
</html>
