<div id="header_1" class="layer_slider">
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-3">
                    <div id="logo_home">
                        <h1><a href="/" title="City tours travel template">BesTours Travel&amp;Excursion
                                Multipurpose Template</a></h1>
                    </div>
                </div>
                <nav class="col-md-9 col-sm-9 col-xs-9">
                    <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="javascript:void(0);"><span>Menu mobile</span></a>
                    <div class="main-menu">
                        <div id="header_menu">
                            <img src="img/logo_menu.png" width="145" height="34" alt="Bestours" data-retina="true">
                        </div>
                        <a href="#" class="open_close" id="close_in"><i class="icon_set_1_icon-77"></i></a>
                        <ul>
                            <li class="submenu">
                                <a href="/" class="show-submenu">{{__('menu.home')}}</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="/tour" data-toggle="dropdown">{{__('menu.tours')}}</a>
                                <ul class="dropdown-menu">
                                    @foreach($categories as $category)
                                        <li><a class="dropdown-item" href="/search?category={{$category->id}}"> {{$category->name}} </a>
                                            @include('web.layouts.Elements.menu-child', ['category' => $category])
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="#" class="show-submenu">{{__('menu.news')}}</a>
                            </li>
                            <li>
                                <a href="about.html">{{__('menu.about')}}</a>
                            </li>
                            @if(\Illuminate\Support\Facades\Auth::user() == null)
                                <li>
                                    <a href="{{route('loginUser')}}">{{__('menu.singin')}}</a>
                                </li>
                                <li>
                                    <a href="{{route('register.index')}}">{{__('menu.register')}}</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link" data-toggle="dropdown" href="#">{{__('menu.language')}}</a>
                                    <div class="dropdown-menu dropdown-menu-right p-0">
                                        <a href="/language/en"
                                           class="dropdown-item {{session()->get('language') == 'en' ? 'active' : ''}}">English</a>
                                        <a href="/language/vi"
                                           class="dropdown-item {{session()->get('language') == 'vi' ? 'active' : ''}}">VietNamese</a>
                                    </div>
                                </li>
                            @else
                                <li class="nav-item dropdown">
                                    <a class="nav-link " data-toggle="dropdown" href="#" role="button"
                                       aria-haspopup="true"
                                       aria-expanded="false">
                                        <img src="{{getAvata()}}" alt="thumb"
                                             class="img-rounded avata">&nbsp;{{Auth::user()->name}}</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item"
                                           href="{{route('profile.index')}}">{{__('menu.profile')}}</a>
                                        <a class="dropdown-item" href="/your-booking">{{__('menu.your_booking')}}</a>
                                        <a class="dropdown-item" href="/review">{{__('menu.your_review')}}</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{route('logoutUser')}}">{{__('menu.logout')}}</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link" data-toggle="dropdown" href="#">{{__('menu.language')}}</a>
                                    <div class="dropdown-menu dropdown-menu-right p-0">
                                        <a href="/language/en"
                                           class="dropdown-item {{session()->get('language') == 'en' ? 'active' : ''}}">English</a>
                                        <a href="/language/vi"
                                           class="dropdown-item {{session()->get('language') == 'vi' ? 'active' : ''}}">VietNamese</a>
                                    </div>
                                </li>
                            @endif
                        </ul>
                    </div>
                    <!-- End main-menu -->
                </nav>
            </div>
        </div>
        <!-- container -->
    </header>
    <!-- End Header -->
</div>
