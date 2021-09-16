<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
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
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{\Illuminate\Support\Facades\Auth::user()->name}}</a>
                </div>
            </div>

            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                           aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
{{--            <nav class="mt-2">--}}
{{--                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"--}}
{{--                    data-accordion="false">--}}
{{--                    <!-- Add icons to the links using the .nav-icon class--}}
{{--                         with font-awesome or any other icon font library -->--}}
{{--                    <li class="nav-item">--}}
{{--                        <a href="#"--}}
{{--                           class="nav-link {{Request::route()->getName()=="" ? 'menu-is-opening menu-open active' : ""}}">--}}
{{--                            <i class="nav-icon fas fa-tachometer-alt"></i>--}}
{{--                            <p>--}}
{{--                                Dashboard--}}
{{--                            </p>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item {{in_array(\Request::route()->getName(), ['product.index', 'product.create', 'product.show']) ? 'menu-is-opening menu-open' : ""}}">--}}
{{--                        <a href="#"--}}
{{--                           class="nav-link {{in_array(\Request::route()->getName(), ['product.index', 'product.create', 'product.show']) ? 'active' : ""}}">--}}
{{--                            <i class="nav-icon fas fa-copy"></i>--}}
{{--                            <p>--}}
{{--                                Products--}}
{{--                                <i class="fas fa-angle-left right"></i>--}}
{{--                            </p>--}}
{{--                        </a>--}}
{{--                        <ul class="nav nav-treeview">--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="{{ route('product.index') }}" class="nav-link">--}}
{{--                                    <i class="far fa-circle nav-icon"></i>--}}
{{--                                    <p>List products</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="{{ route('product.create') }}" class="nav-link">--}}
{{--                                    <i class="far fa-circle nav-icon"></i>--}}
{{--                                    <p>Create product</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item {{in_array(\Request::route()->getName(), ['category.index', 'category.create', 'category.show']) ? 'menu-is-opening menu-open' : ""}}">--}}
{{--                        <a href="#"--}}
{{--                           class="nav-link {{in_array(\Request::route()->getName(), ['category.index', 'category.create', 'category.show']) ? 'active' : ""}}">--}}
{{--                            <i class="nav-icon fas fa-copy"></i>--}}
{{--                            <p>--}}
{{--                                Categories--}}
{{--                                <i class="fas fa-angle-left right"></i>--}}
{{--                            </p>--}}
{{--                        </a>--}}
{{--                        <ul class="nav nav-treeview">--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="{{ route('category.index') }}" class="nav-link">--}}
{{--                                    <i class="far fa-circle nav-icon"></i>--}}
{{--                                    <p>List categories</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="{{ route('category.create') }}" class="nav-link">--}}
{{--                                    <i class="far fa-circle nav-icon"></i>--}}
{{--                                    <p>Create category</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item {{in_array(\Request::route()->getName(), ['user.index', 'user.create', 'user.show']) ? 'menu-is-opening menu-open' : ""}}">--}}
{{--                        <a href="#"--}}
{{--                           class="nav-link {{in_array(\Request::route()->getName(), ['user.index', 'user.create', 'user.show']) ? 'active' : ""}}">--}}
{{--                            <i class="nav-icon fas fa-user"></i>--}}
{{--                            <p>--}}
{{--                                Users--}}
{{--                                <i class="right fas fa-angle-left"></i>--}}
{{--                            </p>--}}
{{--                        </a>--}}
{{--                        <ul class="nav nav-treeview">--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="{{route('user.index')}}" class="nav-link">--}}
{{--                                    <i class="far fa-circle nav-icon"></i>--}}
{{--                                    <p>List Users</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="{{route('user.create')}}" class="nav-link">--}}
{{--                                    <i class="far fa-circle nav-icon"></i>--}}
{{--                                    <p>Create User</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item {{in_array(\Request::route()->getName(), ['order.index', 'order.show']) ? 'menu-is-opening menu-open' : ""}}">--}}
{{--                        <a href="#"--}}
{{--                           class="nav-link {{in_array(\Request::route()->getName(), ['order.index', 'order.show']) ? 'active' : ""}}">--}}
{{--                            <i class="nav-icon fas fa-shopping-cart"></i>--}}
{{--                            <p>--}}
{{--                                Order--}}
{{--                                <i class="right fas fa-angle-left"></i>--}}
{{--                            </p>--}}
{{--                        </a>--}}
{{--                        <ul class="nav nav-treeview">--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="{{route('order.index')}}"--}}
{{--                                   class="nav-link" {{in_array(\Request::route()->getName() , ['order.index', 'order.show']) ? "background-color= #6a6464" : ''}}>--}}
{{--                                    <i class="far fa-circle nav-icon"></i>--}}
{{--                                    <p>List Order</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item {{in_array(\Request::route()->getName(), ['testimony.index', 'testimony.show']) ? 'menu-is-opening menu-open' : ""}}">--}}
{{--                        <a href="#"--}}
{{--                           class="nav-link {{in_array(\Request::route()->getName(), ['testimony.index', 'testimony.show']) ? 'active' : ""}}">--}}
{{--                            <i class="nav-icon fas fa-comment"></i>--}}
{{--                            <p>--}}
{{--                                Comment--}}
{{--                                <i class="right fas fa-angle-left"></i>--}}
{{--                            </p>--}}
{{--                        </a>--}}
{{--                        <ul class="nav nav-treeview">--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="{{route('testimony.index')}}"--}}
{{--                                   class="nav-link" {{in_array(\Request::route()->getName() , ['testimony.index', 'testimony.show']) ? "background-color= #6a6464" : ''}}>--}}
{{--                                    <i class="far fa-circle nav-icon"></i>--}}
{{--                                    <p>List Comment</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </nav>--}}
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
    <main>
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                       aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user1-128x128.jpg" alt="User Avatar"
                                     class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user8-128x128.jpg" alt="User Avatar"
                                     class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user3-128x128.jpg" alt="User Avatar"
                                     class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="content-wrapper">
            @yield('content')
        </div>
    </main>
    <footer class="main-footer">
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.1.0
        </div>
    </footer>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
</div>

<!-- /.control-sidebar -->
@include('admin.layouts.footer-libs')
@stack('script')
</body>
</html>
