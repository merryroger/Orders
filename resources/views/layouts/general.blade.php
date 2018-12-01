<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>Products</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600|Raleway:100,600|Fira+Sans+Extra+Condensed"
          rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/css/general.css" type="text/css">
</head>
<body>
@if (Route::has('login') && (Route::currentRouteName() != 'login'))
    <div class="navbar">
        <div class="ral links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>
            @endauth
        </div>
        <br clear="all"/>
        @if(session()->get('orderdone'))
            @yield('inform')
        @endif
    </div>
@endif
@yield('contents')
</body>
</html>
