<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>Products</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600|Raleway:100,600|Fira+Sans+Extra+Condensed"
          rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/css/general.css" type="text/css">
    <script src="/js/admcontrols.js"></script>
</head>
<body>
@if (Route::has('login') && (Route::currentRouteName() != 'login'))
    <div class="navbar">
        @include('admin.menu')
        <div class="ral links">
            @auth
                <span onmouseover="showDDMenu(this)" onmouseout="closeDDMenu()" onclick="return false;">
                    <a href="#">@user(id)</a>
                </span>
                <div id="dd_menu" class="h">
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                          style="display: none;">
                        @csrf
                    </form>
                </div>
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
