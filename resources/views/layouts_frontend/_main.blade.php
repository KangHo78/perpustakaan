<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>SolMusic | HTML Template</title>
    <meta charset="UTF-8">
    <meta name="description" content="SolMusic HTML Template">
    <meta name="keywords" content="music, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('assets/img/favicon.ico') }}" rel="shortcut icon"/>
    @include('layouts_frontend._css') 
</head>
<body>
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <!-- Header section -->
    <header class="header-section clearfix">
        <a href="index.html" class="site-logo">
            <img src="{{ asset('assets/img/logo.png') }}" alt="">
        </a>
        <div class="header-right">
            <a href="#" class="hr-btn">Help</a>
            <span>|</span>
            <div class="user-panel">
                <a href="{{ route('login') }}" class="login">Login</a>
                <a href="{{ route('register') }}" class="register">Create an account</a>
            </div> 
        </div>
        <ul class="main-menu">
            <li><a href="index.html">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Pages</a>
                <ul class="sub-menu">
                    <li><a href="category.html">Category</a></li>
                    <li><a href="playlist.html">Playlist</a></li>
                    <li><a href="artist.html">Artist</a></li>
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </li>
            <li><a href="blog.html">News</a></li>
            <li><a href="contact.html">Contact</a></li>
        </ul>
    </header>
    @yield('content')
  <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-7 order-lg-2">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="footer-widget">
                                <h2>About us</h2>
                                <ul>
                                    <li><a href="">Our Story</a></li>
                                    <li><a href="">Sol Music Blog</a></li>
                                    <li><a href="">History</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="footer-widget">
                                <h2>Products</h2>
                                <ul>
                                    <li><a href="">Music</a></li>
                                    <li><a href="">Subscription</a></li>
                                    <li><a href="">Custom Music</a></li>
                                    <li><a href="">Footage</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="footer-widget">
                                <h2>Playlists</h2>
                                <ul>
                                    <li><a href="">Newsletter</a></li>
                                    <li><a href="">Careers</a></li>
                                    <li><a href="">Press</a></li>
                                    <li><a href="">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-5 order-lg-1">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="">
                    <div class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
                    <div class="social-links">
                        <a href=""><i class="fa fa-instagram"></i></a>
                        <a href=""><i class="fa fa-pinterest"></i></a>
                        <a href=""><i class="fa fa-facebook"></i></a>
                        <a href=""><i class="fa fa-twitter"></i></a>
                        <a href=""><i class="fa fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    @include('layouts_frontend._script') 
</body>
</html>