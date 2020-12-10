<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @include('layouts.header')
</head>
<body>
    <div class="wrapper" id="app">
            <main class="py-4">
                <div class="container">
                <!-- Outer Row -->
                <div class="row justify-content-center">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    <form class="user" action="{{ route('login') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="username" id="username" placeholder="Enter Username...">
                                            @if($errors->has('uname'))
                                                <label style="color:red" class="login-field-icon fui-user" for="login-name">
                                                    username Jangan kosong
                                                </label>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Password...">
                                        </div>
                                        <input type="submit" class="btn btn-primary btn-user btn-block" value="Login" required="required">
                                        <div class="text-center">
                                            <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
                                        </div>
                                    <form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('register') }}">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>


