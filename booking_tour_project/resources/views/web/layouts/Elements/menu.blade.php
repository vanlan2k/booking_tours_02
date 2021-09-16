<div id="header_1" class="layer_slider">
    <header>
        <div id="top_line">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <a href="tel://004542344599" id="phone_top">0045 043204434</a><span id="opening">Mon - Sat 8.00/18.00</span>
                    </div>
                    <div class="col-md-6 col-sm-6 hidden-xs">
                        <ul id="top_links">
                            <li><a href="wishlist.html" id="wishlist_link">Wishlist</a>
                            </li>
                            <li><a href="#0">PURCHASE THIS TEMPLATE</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- End row -->
            </div>
            <!-- End container-->
        </div>
        <!-- End top line-->

        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-3">
                    <div id="logo_home">
                        <h1><a href="index.html" title="City tours travel template">BesTours Travel&amp;Excursion
                                Multipurpose Template</a></h1>
                    </div>
                </div>
                <nav class="col-md-9 col-sm-9 col-xs-9">
                    {{--                    <ul id="tools_top" class="d-flex">--}}
                    {{--                        <li><a href="login.html">Sign In</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#">Sign Up</a></li>--}}
                    {{--                    </ul>--}}
                    <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="javascript:void(0);"><span>Menu mobile</span></a>
                    <div class="main-menu">
                        <div id="header_menu">
                            <img src="img/logo_menu.png" width="145" height="34" alt="Bestours" data-retina="true">
                        </div>
                        <a href="#" class="open_close" id="close_in"><i class="icon_set_1_icon-77"></i></a>
                        <ul>
                            <li class="submenu">
                                <a href="javascript:void(0);" class="show-submenu">Home</a>
                                <ul>
                                    <li><a href="index.html">Home Video background</a>
                                    </li>
                                    <li><a href="index_2.html">Home Layer Slider</a>
                                    </li>
                                    <li><a href="index_3.html">Home Full Header</a>
                                    </li>
                                    <li><a href="index_4.html">Home Popup</a>
                                    </li>
                                    <li><a href="index_5.html">Home Cookie bar</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="/tour" class="show-submenu">Tours</a>
                            </li>
                            <li>
                                <a href="about.html">About us</a>
                            </li>
                            <li><a href="faq.html">Faq</a>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);" class="show-submenu">Other pages</a>
                                <ul>
                                    <li><a href="index_3.html">Header Version 2</a>
                                    </li>
                                    <li><a href="blog.html">Blog</a>
                                    </li>
                                    <li><a href="blog_post.html">Blog post</a>
                                    </li>
                                    <li><a href="gallery.html">Gallery</a>
                                    </li>
                                    <li><a href="maintenance.html">Mantainance</a>
                                    </li>
                                    <li><a href="profile.html">Team Profile</a>
                                    </li>
                                    <li><a href="contacts_2.html">Contact 2</a>
                                    </li>
                                    <li><a href="coming_soon/index.html">Coming soon</a>
                                    </li>
                                    <li><a href="shortcodes.html">Shortcodes</a>
                                    </li>
                                    <li><a href="icon_pack_1.html">Icon pack 1</a>
                                    </li>
                                    <li><a href="icon_pack_2.html">Icon pack 2</a>
                                    </li>
                                    <li><a href="icon_pack_3.html">Icon pack 3</a>
                                    </li>
                                </ul>
                            </li>
                            @if(\Illuminate\Support\Facades\Auth::user() == null)
                                <li>
                                    <a href="/login/page">Sign In</a>
                                </li>
                                <li>
                                    <a href="login.html">Sign Up</a>
                                </li>
                            @else
                                <li class="nav-item dropdown">
                                    <a class="nav-link " data-toggle="dropdown" href="#" role="button"
                                       aria-haspopup="true"
                                       aria-expanded="false">
                                        <img src="http://localhost:8000/dist/img/tour_list_1.jpg" alt="thumb"
                                             class="img-rounded" style="width: 25px;height: 25px;border-radius: 50%;">&nbsp;{{\Illuminate\Support\Facades\Auth::user()->name}}</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="/logout">Sign Out</a>
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
