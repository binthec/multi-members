<!DOCTYPE html>
<html class="no-js" lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> {{ config('app.name') }} | Admin </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- CSS for Tools -->
    <link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="/vendor/AdminLTE/css/AdminLTE.css">
    <link rel="stylesheet" href="/vendor/AdminLTE/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/vendor/select2/select2.css">
    <link rel="stylesheet" href="/vendor/Ionicons/css/ionicons.css">
    <link rel="stylesheet" href="/vendor/iCheck/all.css">
    <link rel="stylesheet" href="/vendor/bootstrap-datepicker/bootstrap-datepicker.css">
    <link rel="stylesheet" href="/vendor/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="/vendor/dropzone/dropzone-custom.css">
    <link rel="stylesheet" href="/vendor/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" href="/vendor/fullcalendar/fullcalendar.print.min.css" media="print">

    @yield('css')

    <link rel="stylesheet" href="/backend/css/custom.css">
    <link rel="stylesheet" href="/common/css/style.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini" id="@yield('bodyId')">
<div class="wrapper">

    <header class="main-header">

        <!-- Logo -->
        <a href="{{ route('dashboard') }}" class="logo">
            <span class="logo-mini"><b><i class="fa fa-cog"></i></b></span>
            <span class="logo-lg"><b>{{ config('app.name') }}</b>Admin</span>
        </a>

        <nav class="navbar navbar-static-top">
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-cog"></i>
                            <span class="hidden-xs"> {{ Auth::guard('admin')->user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-header">
                                <i class="fa fa-child"></i>
                                <p>
                                    <span class="text-lg">{{ Auth::guard('admin')->user()->name }}</span><br>
                                    <span class="text-sm">{{ \App\Admin::$roles[Auth::guard('admin')->user()->role] }}</span>
                                </p>
                            </li>

                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{{ route('admin.mypage') }}" class="btn btn-default btn-flat">マイページ</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ route('logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault();document.getElementById('logout-form').submit();">ログアウト</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </li><!-- /.user-footer -->

                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- sidebar -->
    <aside class="main-sidebar">
        <section class="sidebar">

            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">メインメニュー</li>

                <li class="{{ isActiveUrl('dashboard') }}">
                    <a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                </li>

                <li class="treeview {{ isActiveUrl('novel*') }}">
                    <a href="#">
                        <i class="fa fa-newspaper-o"></i> <span>作品管理</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu {{ isActiveUrl('novel*') }}">
                        <li class="{{ isActiveUrl('novel') }}"><a href="{{ route('novel.index') }}"><i class="fa fa-circle-o"></i> 一覧表示・編集</a></li>
                        <li class="{{ isActiveUrl('novel/create') }}"><a href="{{ route('novel.create') }}"><i class="fa fa-circle-o"></i> 新規登録</a></li>
                    </ul>
                </li>

                @can('owner-higher')
                    <li class="header">管理メニュー</li>

                    <li class="treeview {{ isActiveUrl('admin*') }}">
                        <a href="#">
                            <i class="fa fa-newspaper-o"></i> <span>管理者管理</span>
                            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                        </a>
                        <ul class="treeview-menu {{ isActiveUrl('admin*') }}">
                            <li class="{{ isActiveUrl('admin') }}"><a href="{{ route('admin.index') }}"><i class="fa fa-circle-o"></i> 一覧表示・編集</a></li>
                            <li class="{{ isActiveUrl('admin/create') }}"><a href="{{ route('admin.create') }}"><i class="fa fa-circle-o"></i> 新規登録</a></li>
                        </ul>
                    </li>

                    <li class="{{ isActiveUrl('actionlog*') }}">
                        <a href="{{ route('actionlog.index') }}"><i class="fa fa-circle-o text-aqua"></i> <span>操作ログ閲覧</span></a>
                    </li>
                @endcan
            </ul>
        </section><!-- /.sidebar -->

    </aside>

    {{-- フラッシュメッセージの表示 --}}
    @if (Session::has('flashMsg'))
        <div class="flash-msg">{{ Session::get('flashMsg') }}</div>
    @elseif(Session::has('flashErrMsg'))
        <div class="flash-msg err">{{ Session::get('flashErrMsg') }}</div>
    @endif

    @yield('content')

    <footer class="main-footer">
        <div class="pull-right hidden-xs"><b>Version</b> 1.0.0</div>
        <strong>Copyright &copy; 2017- 大分県体力づくり研究会.</strong> All rightsreserved.
    </footer>

</div><!-- ./wrapper -->

{{--<script src="/vendor/jquery/jquery.js"></script><!-- jQuery 3 -->--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="/vendor/jquery-ui/jquery-ui.js"></script><!-- jQuery UI 1.11.4 -->

<!-- Tools JS -->
<script src="/vendor/bootstrap/js/bootstrap.js"></script>
<script src="/vendor/select2/select2.js"></script>
<script src="/vendor/iCheck/icheck.js"></script>
<script src="/vendor/ckeditor/ckeditor.js"></script>
<script src="/vendor/moment/moment.js"></script>
<script src="/vendor/moment/locale/ja.js"></script>
<script src="/vendor/bootstrap-datepicker/bootstrap-datepicker.js"></script>
<script src="/vendor/bootstrap-datepicker/locales/bootstrap-datepicker.ja.min.js"></script>
<script src="/vendor/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js"></script>
<script src="/vendor/dropzone/dropzone.js"></script>
<script src="/vendor/fullcalendar/fullcalendar.min.js"></script>
<script src='/vendor/fullcalendar/locale/ja.js'></script>
<script src="/vendor/AdminLTE/js/adminlte.js"></script>

@yield('js')

<script src="/backend/js/custom.js"></script>
<script src="/backend/js/functions.js"></script>

</body>
</html>