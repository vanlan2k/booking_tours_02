<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin/" class="brand-link text-center">
        <img src="/dist/img/logo.png" alt="BesTour Logo" class=" elevation-3 mb-2"
             style="opacity: .8; background:white">
    </a>
    <!-- Sidebar -->
    <div class="sidebar">

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
                <li class="nav-item {{getUser()}}">
                    <a href="#"
                       class="nav-link {{getUser()}}">
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
                <li class="nav-item {{getTour()}}">
                    <a href="#"
                       class="nav-link {{getTour()}}">
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
                <li class="nav-item {{getBooking()}}">
                    <a href="#"
                       class="nav-link {{getBooking()}}">
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
                <li class="nav-item {{getComment()}}">
                    <a href="#"
                       class="nav-link {{getComment()}}">
                        <i class="nav-icon fas fa-comment-alt"></i>
                        <p>
                            {{__('admin_menu.comment')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('comment.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin_menu.list_cmt')}}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{in_array(\Request::route()->getName(), ['category.index', 'category.create', 'category.show']) ? 'menu-is-opening menu-open' : ""}}">
                    <a href="#"
                       class="nav-link {{in_array(\Request::route()->getName(), ['category.index', 'category.create', 'category.show']) ? 'active' : ""}}">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>
                            {{__('admin_menu.category')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('category.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin_menu.list_cate')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('category.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin_menu.create_cate')}}</p>
                            </a>
                        </li>
                    </ul>
                </li>
{{--                <li class="nav-item {{in_array(\Request::route()->getName(), ['news.index', 'news.create', 'news.show']) ? 'menu-is-opening menu-open' : ""}}">--}}
{{--                    <a href="#"--}}
{{--                       class="nav-link {{in_array(\Request::route()->getName(), ['news.index', 'news.create', 'news.show']) ? 'active' : ""}}">--}}
{{--                        <i class="nav-icon fas fa-list-alt"></i>--}}
{{--                        <p>--}}
{{--                            {{__('admin_menu.post')}}--}}
{{--                            <i class="right fas fa-angle-left"></i>--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                    <ul class="nav nav-treeview">--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="{{route('news.index')}}" class="nav-link">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>{{__('admin_menu.list_post')}}</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="{{route('news.create')}}" class="nav-link">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>{{__('admin_menu.create_post')}}</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
            </ul>
        </nav>
    </div>
    <!-- /.sidebar -->
</aside>
