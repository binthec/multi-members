<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <title> {{ config('app.name') }}</title>

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,700" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="{{ asset('/frontend/css/animate.css') }}">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="{{ asset('/frontend/css/icomoon.css') }}">
    <!-- Themify Icons-->
    <link rel="stylesheet" href="{{ asset('/frontend/css/themify-icons.css') }}">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="{{ asset('/frontend/css/bootstrap.css') }}">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('/frontend/css/magnific-popup.css') }}">

    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="{{ asset('/frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/frontend/css/owl.theme.default.min.css') }}">

    <!-- Theme style  -->
    <link rel="stylesheet" href="{{ asset('/frontend/css/style.css') }}">

    <!-- Modernizr JS -->
    <script src="{{ asset('/frontend/js/modernizr-2.6.2.min.js') }}"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="{{ asset('/frontend/js/respond.min.js') }}"></script>
    <![endif]-->


    @yield('css')

    <link href="{{ asset('/frontend/css/custom.css') }}" rel="stylesheet">
    {{--<link href="{{ asset('/common/css/style.css') }}" rel="stylesheet">--}}
</head><!--/head-->

<body id="@yield('bodyId')">

<div class="gtco-loader"></div>

<div id="page">

    <nav class="gtco-nav" role="navigation">
        <div class="gtco-container">

            <div class="row">
                <div class="col-sm-2 col-xs-12">
                    <div id="gtco-logo"><a href="{{ route('home') }}"><img src="{{ asset('/frontend/images/logo.png') }}" alt="{{ config('app.name') }}"></a></div>
                </div>
                <div class="col-xs-10 text-right menu-1">
                    <ul>
                        <li><a href="{{ route('about') }}">このサーチについて</a></li>
                        <li><a href="">検索</a></li>
                        <li class="has-dropdown">
                            <a href="{{ route('user.mypage') }}">マイページ</a>
                            <ul class="dropdown">
                                <li><a href="#">お気に入り</a></li>
                                <li><a href="#">設定</a></li>
                                <li><a href="#">ログアウト</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </nav>

    @yield('content')

    <footer id="gtco-footer" class="gtco-section" role="contentinfo">
        <div class="gtco-container">
            <div class="row row-pb-md">
                <div class="col-md-8 col-md-offset-2 gtco-cta text-center">
                    <h3>We Love To Talk About Your Business</h3>
                    <p><a href="#" class="btn btn-white btn-outline">Contact Us</a></p>
                </div>
            </div>
            <div class="row row-pb-md">
                <div class="col-md-4 gtco-widget gtco-footer-paragraph">
                    <h3>Cube</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus placerat enim et urna sagittis, rhoncus euismod.</p>
                </div>
                <div class="col-md-4 gtco-footer-link">
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="gtco-list-link">
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Features</a></li>
                                <li><a href="#">Products</a></li>
                                <li><a href="#">Testimonial</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <p>
                                <a href="tel://1234567890">+1 234 4565 2342</a> <br>
                                <a href="#">info@domain.com</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 gtco-footer-subscribe">
                    <form class="form-inline">
                        <div class="form-group">
                            <label class="sr-only" for="exampleInputEmail3">Email address</label>
                            <input type="email" class="form-control" id="" placeholder="Email">
                        </div>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="gtco-copyright">
            <div class="gtco-container">
                <div class="row">
                    <div class="col-md-6 text-left">
                        <p><small>&copy; 2016 Free HTML5. All Rights Reserved. </small></p>
                    </div>
                    <div class="col-md-6 text-right">
                        <p><small>Designed by <a href="http://freehtml5.co/" target="_blank">FreeHTML5.co</a> Demo Images: <a href="http://pixeden.com/" target="_blank">Pixeden</a> &amp; <a href="http://unsplash.com" target="_blank">Unsplash</a></small> </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</div><!-- /#page -->

<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
</div>

<!-- jQuery -->
<script src="{{ asset('/frontend/js/jquery.min.js') }}"></script>
<!-- jQuery Easing -->
<script src="{{ asset('/frontend/js/jquery.easing.1.3.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('/frontend/js/bootstrap.min.js') }}"></script>
<!-- Waypoints -->
<script src="{{ asset('/frontend/js/jquery.waypoints.min.js') }}"></script>
<!-- Carousel -->
<script src="{{ asset('/frontend/js/owl.carousel.min.js') }}"></script>
<!-- Magnific Popup -->
<script src="{{ asset('/frontend/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('/frontend/js/magnific-popup-options.js') }}"></script>
<!-- Main -->
<script src="{{ asset('/frontend/js/main.js') }}"></script>

{{--<script src="/vendor/moment/moment.js"></script>--}}

@yield('js')

</body>
</html>