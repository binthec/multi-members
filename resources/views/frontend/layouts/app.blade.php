<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <title>{{ config('app.name') }}</title>

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content=""/>
    <meta name="twitter:image" content=""/>
    <meta name="twitter:url" content=""/>
    <meta name="twitter:card" content=""/>

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('/frontend/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('/frontend/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('/frontend/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('/frontend/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('/frontend/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('/frontend/css/style.css') }}">

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
                    <div id="gtco-logo"><a href="{{ route('home') }}">{{ config('app.name') }}</a></div>
                </div>
                <div class="col-xs-10 text-right menu-1">
                    <ul>
                        <li><a href="{{ route('about') }}">このサーチについて</a></li>
                        <li><a href="">検索</a></li>

                        @if(Auth::guard('user')->check())
                            <li class="has-dropdown">
                                <a>マイページ</a>
                                <ul class="dropdown">
                                    <li><a href="{{ route('user.site.edit') }}">サイト情報</a></li>
                                    @if(Auth::guard('user')->user()->hasSite())
                                        <li><a href="{{ route('user.novel') }}">作品一覧</a></li>
                                        <li><a href="{{ route('user.novel.create') }}">新規登録</a></li>
                                    @endif
                                    <li><a href="{{ route('user.edit') }}">設定</a></li>
                                </ul>
                            </li>
                            <li><a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">ログアウト</a></li>
                            <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        @else
                            <li><a href="{{ route('user.showLogin') }}">ログイン</a></li>
                        @endif
                    </ul>
                </div>
            </div>

        </div>
    </nav>

    {{-- フラッシュメッセージの表示 --}}
    @if (Session::has('flashMsg'))
        <div class="flash-msg">{{ Session::get('flashMsg') }}</div>
    @elseif(Session::has('flashErrMsg'))
        <div class="flash-msg err">{{ Session::get('flashErrMsg') }}</div>
    @endif

    @yield('content')

    <footer id="gtco-footer" class="gtco-section" role="contentinfo">
        <div class="gtco-container">
            <div class="row row-pb-md">
                <div class="col-md-4 col-sm-12 gtco-footer-link gtco-footer-paragraph">
                    <h3>Site Map</h3>
                    <ul class="gtco-list-link">
                        <li><a href="#">このサーチについて</a></li>
                        <li><a href="#">検索</a></li>
                        @if(Auth::guard('user')->check())
                            <a href="{{ route('user.site.edit') }}">マイページ</a>
                        @else
                            <li><a href="{{ route('user.showLogin') }}">ログイン</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="gtco-copyright">
            <div class="gtco-container">
                <div class="row">
                    <div class="col-md-6 text-left">
                        <p>
                            <small>&copy; 2018 {{ config('app.name') }}. All Rights Reserved.</small>
                        </p>
                    </div>
                    <div class="col-md-6 text-right">
                        <p>
                            <small>Designed by <a href="http://freehtml5.co/" target="_blank">FreeHTML5.co</a> Demo Images: <a href="http://pixeden.com/" target="_blank">Pixeden</a> &amp; <a href="http://unsplash.com" target="_blank">Unsplash</a></small>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</div><!-- /#page -->

<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
</div>

<script src="{{ asset('js/app.js') }}"></script><!-- vue.js -->
<script src="{{ asset('/frontend/js/jquery.min.js') }}"></script>
<script src="{{ asset('/frontend/js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('/frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/frontend/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('/frontend/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('/frontend/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('/frontend/js/magnific-popup-options.js') }}"></script>
<script src="{{ asset('/frontend/js/main.js') }}"></script>
<script src="{{ asset('/frontend/js/custom.js') }}"></script>

{{--<script src="/vendor/moment/moment.js"></script>--}}


@yield('js')

</body>
</html>