<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dryas Library</title>
    <meta charset="UTF-8">
    <meta name="description" content="Dryas Library">
    <meta name="keywords" content="library, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('assets/img/favicon.ico') }}" rel="shortcut icon" />
    @include('layouts_frontend._css')
</head>

<body>
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <!-- Header section -->
    <header class="header-section clearfix">
        <a href="{{ route('welcome') }}" class="site-logo">
            <img src="{{ asset('assets/img/logo.png') }}" alt="">
        </a>
        <div class="header-right">
            <div class="user-panel">
                @if (Auth::user() != null)
                <a href="{{ route('register') }}" class="register">Hy, {{ Auth::user()->name }}</a>
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
            <li><a href="javascript:void(0)">About</a></li>
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