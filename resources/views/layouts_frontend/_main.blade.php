<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dryas Library</title>
    <meta charset="UTF-8">
    <meta name="description" content="Dryas Library">
    <meta name="keywords" content="library, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Meta Color -->
    <meta content='#08192d' name='theme-color' />
    <meta content='#08192d' name='msapplication-navbutton-color' />
    <meta content='#08192d' name='apple-mobile-web-app-status-bar-style' />
    <!-- Icon -->
    <link href="{{ asset('assets/favicon.ico') }}" rel="shortcut icon" type='image/x-icon' />
    <link href='{{ asset('assets/favicon-32x32.png') }}' rel='icon' sizes='32x32' />
    <link href='{{ asset('assets/android-icon-192x192.png') }}' rel='icon' sizes='192x192' />
    <link href='{{ asset('assets/apple-icon-180x180.png') }}' rel='apple-touch-icon' sizes='180x180' />
    <meta content='{{ asset('assets/apple-icon-114x114.png') }}' name='msapplication-TileImage' />
    @include('layouts_frontend._css')
</head>

<body>
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <!-- Header section -->
    <header class="header-section clearfix">
        <a href="{{ route('welcome') }}" class="site-logo">
            <h4><span>Dryas</span> Library</h4>
        </a>
        <div class="header-right">
            <div class="user-panel">
                @if (Auth::user() != null)
                <a href="{{ route('home') }}" class="register">Hy, {{ Auth::user()->name }}</a>
                @else
                <a href="{{ route('login') }}" class="login">Login</a>
                <span>|</span>
                <a href="{{ route('register') }}" class="register">Create an account</a>
                @endif
            </div>
        </div>
        <ul class="main-menu">
            <li><a href="{{ route('welcome') }}">Home</a></li>
            <li><a href="{{ route('buku_katalog') }}">Catalog</a></li>
            <li><a href="{{ route('about') }}">About</a></li>
            <li><a href="{{ route('team') }}">Our Team</a></li>
        </ul>
    </header>
    @yield('content')
    <footer class="footer-section">
        <div class="copyright">
            This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i>
            by Five Team
        </div>
    </footer>
    @include('layouts_frontend._script')
</body>

</html>