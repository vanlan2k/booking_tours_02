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
                <img src="{{getAvata()}}" class="img-circle elevation-2" alt="User Image">
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
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item {{in_array(\Request::route()->getName(), ['user.index', 'user.create', 'user.show']) ? 'menu-is-opening menu-open' : ""}}">
                    <a href="#"
                       class="nav-link {{in_array(\Request::route()->getName(), ['user.index', 'user.create', 'user.show']) ? 'active' : ""}}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            {{__('admin_menu.user')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('user.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin_menu.list_user')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('user.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin_menu.create_user')}}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{in_array(\Request::route()->getName(), ['tour.index', 'tour.create', 'tour.show']) ? 'menu-is-opening menu-open' : ""}}">
                    <a href="#"
                       class="nav-link {{in_array(\Request::route()->getName(), ['tour.index', 'tour.create', 'tour.show']) ? 'active' : ""}}">
                        <i class="nav-icon fas fa-archway"></i>
                        <p>
                            {{__('admin_menu.tour')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('tour.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin_menu.list_tour')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('tour.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin_menu.create_tour')}}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{in_array(\Request::route()->getName(), ['booking.index', 'booking.create', 'booking.show']) ? 'menu-is-opening menu-open' : ""}}">
                    <a href="#"
                       class="nav-link {{in_array(\Request::route()->getName(), ['booking.index', 'booking.create', 'booking.show']) ? 'active' : ""}}">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>
                            {{__('admin_menu.bookings')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('booking.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin_menu.list_booking')}}</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
    <!-- /.sidebar -->
</aside>
