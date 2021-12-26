<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trang Admin</title>
    @include('admin.layouts.header-libs')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>
    <!-- Header -->
    <header>

    </header>
    <!-- Main Sidebar Container -->
    @include('admin.layouts.elements.menu')
    <main>
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/" class="nav-link">Trang Chủ</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
            {{--                <!-- Navbar Search -->--}}
            {{--                <li class="nav-item">--}}
            {{--                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">--}}
            {{--                        <i class="fas fa-search"></i>--}}
            {{--                    </a>--}}
            {{--                    <div class="navbar-search-block">--}}
            {{--                        <form class="form-inline">--}}
            {{--                            <div class="input-group input-group-sm">--}}
            {{--                                <input class="form-control form-control-navbar" type="search" placeholder="Search"--}}
            {{--                                       aria-label="Search">--}}
            {{--                                <div class="input-group-append">--}}
            {{--                                    <button class="btn btn-navbar" type="submit">--}}
            {{--                                        <i class="fas fa-search"></i>--}}
            {{--                                    </button>--}}
            {{--                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">--}}
            {{--                                        <i class="fas fa-times"></i>--}}
            {{--                                    </button>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                        </form>--}}
            {{--                    </div>--}}
            {{--                </li>--}}
            <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown dropdown-notifications">
                    <a href="#notifications-panel" data-toggle="dropdown">
                        <i data-count="0" class="far fa-bell glyphicon glyphicon-bell notification-icon"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right add_notify" id="dropdown_menu">
                        @foreach($notifications as $notification)
                            {!! exportNotify($notification) !!}
                        @endforeach
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link " data-toggle="dropdown" href="#" role="button"
                       aria-haspopup="true"
                       aria-expanded="false">
                        <img src="{{getAvata()}}" alt="thumb" style="width: 25px;height: 25px;border-radius: 50%;"
                             class="img-rounded avata">&nbsp;{{Auth::user()->name}}</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{route('auth.logout')}}">{{__('menu.logout')}}</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div class="content-wrapper">
            @yield('content')
        </div>
    </main>
    @include('admin.layouts.elements.footer')
</div>

<!-- /.control-sidebar -->
@include('admin.layouts.footer-libs')
@stack('script')
</body>
</html>
