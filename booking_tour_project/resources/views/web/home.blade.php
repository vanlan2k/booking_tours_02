@extends('web.layouts.main', ['title' => 'HomePage'])
@section('content')
    <div class="tg-bannerholder">
        <div class="tg-slidercontent">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <h1>Experience the Wonder</h1>
                        <h2>People don’t take trips, trips take People</h2>
                        <form class="tg-formtheme tg-formtrip">
                            <div class="form-group">
                                <select id='destinations' class="selectpicker" data-live-search="true"
                                        style="padding: 100px"
                                        data-width="100%">
                                    <option value='0'>-- Select User --</option>
                                    <option value='1'>Yogesh singh</option>
                                    <option value='2'>Sonarika Bhadoria</option>
                                    <option value='3'>Anil Singh</option>
                                    <option value='4'>Vishal Sahu</option>
                                    <option value='5'>Mayank Patidar</option>
                                    <option value='6'>Vijay Mourya</option>
                                    <option value='7'>Rakesh sahu</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select id='adventure_type' class="selectpicker" data-live-search="true"
                                        data-width="100%">
                                    <option value='0'>-- Select User --</option>
                                    <option value='1'>Yogesh singh</option>
                                    <option value='2'>Sonarika Bhadoria</option>
                                    <option value='3'>Anil Singh</option>
                                    <option value='4'>Vishal Sahu</option>
                                    <option value='5'>Mayank Patidar</option>
                                    <option value='6'>Vijay Mourya</option>
                                    <option value='7'>Rakesh sahu</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select id='travel_month' class="selectpicker" data-live-search="true"
                                        data-width="100%">
                                    <option value='0'>-- Select User --</option>
                                    <option value='1'>Yogesh singh</option>
                                    <option value='2'>Sonarika Bhadoria</option>
                                    <option value='3'>Anil Singh</option>
                                    <option value='4'>Vishal Sahu</option>
                                    <option value='5'>Mayank Patidar</option>
                                    <option value='6'>Vijay Mourya</option>
                                    <option value='7'>Rakesh sahu</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select id='duration' class="selectpicker" data-live-search="true"
                                        data-width="100%">
                                    <option value='0'>-- Select User --</option>
                                    <option value='1'>Yogesh singh</option>
                                    <option value='2'>Sonarika Bhadoria</option>
                                    <option value='3'>Anil Singh</option>
                                    <option value='4'>Vishal Sahu</option>
                                    <option value='5'>Mayank Patidar</option>
                                    <option value='6'>Vijay Mourya</option>
                                    <option value='7'>Rakesh sahu</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button class="tg-btn" type="submit"><span>find tours</span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="tg-homeslider" class="tg-homeslider owl-carousel tg-haslayout">
            <figure class="item" data-vide-bg="poster: {{asset('/dist/images/slider/img-01.jpg')}}"
                    data-vide-options="position: 0% 50%"></figure>
            <figure class="item" data-vide-bg="poster: {{asset('/dist/images/slider/img-02.jpg')}}"
                    data-vide-options="position: 0% 50%"></figure>
            <figure class="item" data-vide-bg="poster: {{asset('/dist/images/slider/img-03.jpg')}}"
                    data-vide-options="position: 0% 50%"></figure>
        </div>
    </div>
    <main id="tg-main" class="tg-main tg-haslayout">
        <!--************************************
                Advantures Start
        *************************************-->
        <section class="tg-sectionspace tg-haslayout">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="tg-toursdestinations">
                            <div class="tg-tourdestination tg-tourdestinationbigbox">
                                <figure>
                                    <a href="javascript:void(0);">
                                        <img src="{{asset('/dist/images/destination/img-01.jpg')}}"
                                             alt="image destinations">
                                        <div class="tg-hoverbox">
                                            <div class="tg-adventuretitle">
                                                <h2>Ice Adventure Vacations</h2>
                                            </div>
                                            <div class="tg-description">
                                                <p>your best vacation ever</p>
                                            </div>
                                        </div>
                                    </a>
                                </figure>
                            </div>
                            <div class="tg-tourdestination">
                                <figure>
                                    <a href="javascript:void(0);">
                                        <img src="{{asset('/dist/images/destination/img-02.jpg')}}"
                                             alt="image destinations">
                                        <div class="tg-hoverbox">
                                            <div class="tg-adventuretitle">
                                                <h2>National Park</h2>
                                            </div>
                                        </div>
                                    </a>
                                </figure>
                            </div>
                            <div class="tg-tourdestination">
                                <figure>
                                    <a href="javascript:void(0);">
                                        <img src="{{asset('/dist/images/destination/img-03.jpg')}}"
                                             alt="image destinations">
                                        <div class="tg-hoverbox">
                                            <div class="tg-adventuretitle">
                                                <h2>Adult Vacations</h2>
                                            </div>
                                        </div>
                                    </a>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--************************************
                Advantures End
        *************************************-->
        <!--************************************
                Features Start
        *************************************-->
    {{--        <section class="tg-sectionspace tg-zerotoppadding tg-haslayout">--}}
    {{--            <div class="container">--}}
    {{--                <div class="row">--}}
    {{--                    <div class="tg-features">--}}
    {{--                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">--}}
    {{--                            <div class="tg-feature">--}}
    {{--                                <div class="tg-featuretitle">--}}
    {{--                                    <h2><span>01</span>Luxury Hotels</h2>--}}
    {{--                                </div>--}}
    {{--                                <div class="tg-description">--}}
    {{--                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh tempor cum soluta nobis consectetuer nihil imperdiet doming...</p>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">--}}
    {{--                            <div class="tg-feature">--}}
    {{--                                <div class="tg-featuretitle">--}}
    {{--                                    <h2><span>02</span>Tourist Guide</h2>--}}
    {{--                                </div>--}}
    {{--                                <div class="tg-description">--}}
    {{--                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh tempor cum soluta nobis consectetuer nihil imperdiet doming...</p>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">--}}
    {{--                            <div class="tg-feature">--}}
    {{--                                <div class="tg-featuretitle">--}}
    {{--                                    <h2><span>03</span>Flights Tickets</h2>--}}
    {{--                                </div>--}}
    {{--                                <div class="tg-description">--}}
    {{--                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh tempor cum soluta nobis consectetuer nihil imperdiet doming...</p>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </section>--}}
    <!--************************************
                Features End
        *************************************-->
        <!--************************************
                Popular Tour Start
        *************************************-->
        <section class="tg-parallax" data-appear-top-offset="600" data-parallax="scroll"
                 data-image-src="{{asset('/dist/images/parallax/bgparallax-01.jpg')}}">
            <div class="tg-sectionspace tg-haslayout">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="tg-sectiontitle tg-sectiontitleleft">
                                <h2>Popular Tours</h2>
                                <a class="tg-btnvtwo" href="javascript:void(0);">All Tours</a>
                            </div>
                            <div id="tg-populartoursslider" class="tg-populartoursslider tg-populartours owl-carousel">
                                <div class="item tg-populartour">
                                    <figure>
                                        <a href="tourbookingdetail.html"><img
                                                src="{{asset('/dist/images/tours/img-01.jpg')}}"
                                                alt="image destinations"></a>
                                        <span class="tg-descount">25% Off</span>
                                    </figure>
                                    <div class="tg-populartourcontent">
                                        <div class="tg-populartourtitle">
                                            <h3><a href="tourbookingdetail.html">City Tours in Europe, Paris</a></h3>
                                        </div>
                                        <div class="tg-description">
                                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                                                nonummy nibh...</p>
                                        </div>
                                        <div class="tg-populartourfoot">
                                            <div class="tg-durationrating">
                                                <span class="tg-tourduration">7 Days</span>
                                                <span class="tg-stars"><span></span></span>
                                                <em>(3 Review)</em>
                                            </div>
                                            <div class="tg-pricearea">
                                                <del>$2,800</del>
                                                <h4>$2,500</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item tg-populartour">
                                    <figure><a href="tourbookingdetail.html"><img
                                                src="{{asset('/dist/images/tours/img-02.jpg')}}"
                                                alt="image destinations"></a></figure>
                                    <div class="tg-populartourcontent">
                                        <div class="tg-populartourtitle">
                                            <h3><a href="tourbookingdetail.html">Best of Canada Tours and Travel</a>
                                            </h3>
                                        </div>
                                        <div class="tg-description">
                                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                                                nonummy nibh...</p>
                                        </div>
                                        <div class="tg-populartourfoot">
                                            <div class="tg-durationrating">
                                                <span class="tg-tourduration">7 Days</span>
                                                <span class="tg-stars"><span></span></span>
                                                <em>(3 Review)</em>
                                            </div>
                                            <div class="tg-pricearea">
                                                <span>from</span>
                                                <h4>$600</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item tg-populartour">
                                    <figure><a href="tourbookingdetail.html"><img
                                                src="{{asset('/dist/images/tours/img-03.jpg')}}"
                                                alt="image destinations"></a></figure>
                                    <div class="tg-populartourcontent">
                                        <div class="tg-populartourtitle">
                                            <h3><a href="tourbookingdetail.html">Italy – 3 Days in Rome, Golden Gate</a>
                                            </h3>
                                        </div>
                                        <div class="tg-description">
                                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                                                nonummy nibh...</p>
                                        </div>
                                        <div class="tg-populartourfoot">
                                            <div class="tg-durationrating">
                                                <span class="tg-tourduration">7 Days</span>
                                                <span class="tg-stars"><span></span></span>
                                                <em>(3 Review)</em>
                                            </div>
                                            <div class="tg-pricearea">
                                                <span>from</span>
                                                <h4>$1,430</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item tg-populartour">
                                    <figure><a href="tourbookingdetail.html"><img
                                                src="{{asset('/dist/images/tours/img-04.jpg')}}"
                                                alt="image destinations"></a></figure>
                                    <div class="tg-populartourcontent">
                                        <div class="tg-populartourtitle">
                                            <h3><a href="tourbookingdetail.html">Best of Canada Tours and Travel</a>
                                            </h3>
                                        </div>
                                        <div class="tg-description">
                                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                                                nonummy nibh...</p>
                                        </div>
                                        <div class="tg-populartourfoot">
                                            <div class="tg-durationrating">
                                                <span class="tg-tourduration">7 Days</span>
                                                <span class="tg-stars"><span></span></span>
                                                <em>(3 Review)</em>
                                            </div>
                                            <div class="tg-pricearea">
                                                <span>from</span>
                                                <h4>$600</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--************************************
                Popular Tour End
        *************************************-->
        <!--************************************
                Our Destination Start
        *************************************-->
        <section class="tg-sectionspace tg-haslayout">
            <div class="container">
                <div class="row">
                    <div class="tg-ourdestination">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 tg-verticalmiddle">
                            <figure><img src="{{asset('/dist/images/placeholder/placeholder-01.png')}}"
                                         alt="image destinations"></figure>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 tg-verticalmiddle">
                            <div class="tg-ourdestinationcontent">
                                <div class="tg-sectiontitle tg-sectiontitleleft">
                                    <h2>Popular Tours</h2>
                                </div>
                                <div class="tg-description"><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                                        sed diam consectetuer adipiscing elit, sed diam nonummy nibh...</p></div>
                                <ul class="tg-destinations">
                                    <li>
                                        <a href="tourcatagory.html">
                                            <h3>Europe</h3>
                                            <em>(05)</em>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="tourcatagory.html">
                                            <h3>Africa</h3>
                                            <em>(15)</em>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="tourcatagory.html">
                                            <h3>Asia</h3>
                                            <em>(12)</em>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="tourcatagory.html">
                                            <h3>Oceania</h3>
                                            <em>(02)</em>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="tourcatagory.html">
                                            <h3>North America</h3>
                                            <em>(08)</em>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="tourcatagory.html">
                                            <h3>South America</h3>
                                            <em>(27)</em>
                                        </a>
                                    </li>
                                </ul>
                                <a class="tg-btn" href="tourcatagory.html"><span>all destinations</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--************************************
                Our Destination End
        *************************************-->
        <!--************************************
                Destination Start
        *************************************-->
        <section class="tg-sectionspace tg-zerotoppadding tg-haslayout">
            <div class="container">
                <div class="row">
                    <div id="tg-destinationsslider" class="tg-destinationsslider tg-destinations owl-carousel">
                        <div class="item tg-destination">
                            <figure>
                                <a href="tourbookingdetail.html"><img
                                        src="{{asset('/dist/images/destination/img-04.jpg')}}" alt="image description"></a>
                                <figcaption>
                                    <h2><a href="tourbookingdetail.html">Paris</a></h2>
                                    <div class="tg-description">
                                        <p>in the streets of London</p>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="item tg-destination">
                            <figure>
                                <a href="tourbookingdetail.html"><img
                                        src="{{asset('/dist/images/destination/img-05.jpg')}}" alt="image description"></a>
                                <figcaption>
                                    <h2><a href="tourbookingdetail.html">Egypt</a></h2>
                                    <div class="tg-description">
                                        <p>in the streets of London</p>
                                    </div>
                                </figcaption>
                            </figure>
                            <figure>
                                <a href="tourbookingdetail.html"><img
                                        src="{{asset('/dist/images/destination/img-06.jpg')}}" alt="image description"></a>
                                <figcaption>
                                    <h2><a href="tourbookingdetail.html">London</a></h2>
                                    <div class="tg-description">
                                        <p>in the streets of London</p>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="item tg-destination">
                            <figure>
                                <a href="javascript:void(0);"><img
                                        src="{{asset('/dist/images/destination/img-07.jpg')}}" alt="image description"></a>
                                <figcaption>
                                    <h2><a href="javascript:void(0);">Istanbul</a></h2>
                                    <div class="tg-description">
                                        <p>Beautiful Mosque</p>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="item tg-destination">
                            <figure>
                                <a href="javascript:void(0);"><img
                                        src="{{asset('/dist/images/destination/img-04.jpg')}}" alt="image description"></a>
                                <figcaption>
                                    <h2><a href="javascript:void(0);">Paris</a></h2>
                                    <div class="tg-description">
                                        <p>in the streets of London</p>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="item tg-destination">
                            <figure>
                                <a href="javascript:void(0);"><img
                                        src="{{asset('/dist/images/destination/img-05.jpg')}}" alt="image description"></a>
                                <figcaption>
                                    <h2><a href="javascript:void(0);">Egypt</a></h2>
                                    <div class="tg-description">
                                        <p>in the streets of London</p>
                                    </div>
                                </figcaption>
                            </figure>
                            <figure>
                                <a href="javascript:void(0);"><img
                                        src="{{asset('/dist/images/destination/img-06.jpg')}}" alt="image description"></a>
                                <figcaption>
                                    <h2><a href="javascript:void(0);">London</a></h2>
                                    <div class="tg-description">
                                        <p>in the streets of London</p>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="item tg-destination">
                            <figure>
                                <a href="javascript:void(0);"><img
                                        src="{{asset('/dist/images/destination/img-07.jpg')}}" alt="image description"></a>
                                <figcaption>
                                    <h2><a href="javascript:void(0);">Istanbul</a></h2>
                                    <div class="tg-description">
                                        <p>Beautiful Mosque</p>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--************************************
                Destination End
        *************************************-->
        <!--************************************
                Call To Action Start
        *************************************-->
        <section class="tg-parallax" data-appear-top-offset="600" data-parallax="scroll"
                 data-image-src="{{asset('/dist/images/parallax/bgparallax-02.jpg')}}">
            <div class="tg-sectionspace tg-haslayout">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="tg-calltoaction">
                                <div class="tg-pattern"><img src="{{asset('/dist/images/patternw.png')}}"
                                                             alt="image destination"></div>
                                <h2>Get 10% Off on your Next Travel</h2>
                                <div class="tg-description"><p>Travel between 22 April to 21 May and get existing offers
                                        along with a sure 10% cash discount</p></div>
                                <a class="tg-btn" href="javascript:void(0);"><span>Explore Tour</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--************************************
                Call To Action End
        *************************************-->
        <!--************************************
                Our Guides Start
        *************************************-->
        <section class="tg-sectionspace tg-haslayout">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="tg-sectionhead">
                            <div class="tg-sectiontitle">
                                <h2>Meet The Guides</h2>
                            </div>
                            <div class="tg-description">
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam consectetuer.</p>
                            </div>
                        </div>
                        <div id="tg-guidesslider" class="tg-guidesslider tg-guides owl-carousel">
                            <div class="item tg-guide">
                                <figure><img src="{{asset('/dist/images/Guides/img-01.jpg')}}" alt="image destination">
                                </figure>
                                <div class="tg-guidecontent">
                                    <div class="tg-guidecontenthead">
                                        <h3>Martin Blake</h3>
                                        <h4>Adventure Master</h4>
                                        <ul class="tg-socialicons tg-socialiconsvtwo">
                                            <li><a href="javascript:void(0);"><i class="icon-facebook-logo-outline"></i></a>
                                            </li>
                                            <li><a href="javascript:void(0);"><i
                                                        class="icon-instagram-social-outlined-logo"></i></a></li>
                                            <li><a href="javascript:void(0);"><i
                                                        class="icon-twitter-social-outlined-logo"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="tg-description">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                            veniam.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="item tg-guide">
                                <figure><img src="{{asset('/dist/images/Guides/img-02.jpg')}}" alt="image destination">
                                </figure>
                                <div class="tg-guidecontent">
                                    <div class="tg-guidecontenthead">
                                        <h3>Martin Blake</h3>
                                        <h4>Adventure Master</h4>
                                        <ul class="tg-socialicons tg-socialiconsvtwo">
                                            <li><a href="javascript:void(0);"><i class="icon-facebook-logo-outline"></i></a>
                                            </li>
                                            <li><a href="javascript:void(0);"><i
                                                        class="icon-instagram-social-outlined-logo"></i></a></li>
                                            <li><a href="javascript:void(0);"><i
                                                        class="icon-twitter-social-outlined-logo"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="tg-description">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                            veniam.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="item tg-guide">
                                <figure><img src="{{asset('/dist/images/Guides/img-03.jpg')}}" alt="image destination">
                                </figure>
                                <div class="tg-guidecontent">
                                    <div class="tg-guidecontenthead">
                                        <h3>Martin Blake</h3>
                                        <h4>Adventure Master</h4>
                                        <ul class="tg-socialicons tg-socialiconsvtwo">
                                            <li><a href="javascript:void(0);"><i class="icon-facebook-logo-outline"></i></a>
                                            </li>
                                            <li><a href="javascript:void(0);"><i
                                                        class="icon-instagram-social-outlined-logo"></i></a></li>
                                            <li><a href="javascript:void(0);"><i
                                                        class="icon-twitter-social-outlined-logo"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="tg-description">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                            veniam.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="item tg-guide">
                                <figure><img src="{{asset('/dist/images/Guides/img-01.jpg')}}" alt="image destination">
                                </figure>
                                <div class="tg-guidecontent">
                                    <div class="tg-guidecontenthead">
                                        <h3>Martin Blake</h3>
                                        <h4>Adventure Master</h4>
                                        <ul class="tg-socialicons tg-socialiconsvtwo">
                                            <li><a href="javascript:void(0);"><i class="icon-facebook-logo-outline"></i></a>
                                            </li>
                                            <li><a href="javascript:void(0);"><i
                                                        class="icon-instagram-social-outlined-logo"></i></a></li>
                                            <li><a href="javascript:void(0);"><i
                                                        class="icon-twitter-social-outlined-logo"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="tg-description">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                            veniam.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="item tg-guide">
                                <figure><img src="{{asset('/dist/images/Guides/img-02.jpg')}}" alt="image destination">
                                </figure>
                                <div class="tg-guidecontent">
                                    <div class="tg-guidecontenthead">
                                        <h3>Martin Blake</h3>
                                        <h4>Adventure Master</h4>
                                        <ul class="tg-socialicons tg-socialiconsvtwo">
                                            <li><a href="javascript:void(0);"><i class="icon-facebook-logo-outline"></i></a>
                                            </li>
                                            <li><a href="javascript:void(0);"><i
                                                        class="icon-instagram-social-outlined-logo"></i></a></li>
                                            <li><a href="javascript:void(0);"><i
                                                        class="icon-twitter-social-outlined-logo"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="tg-description">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                            veniam.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="item tg-guide">
                                <figure><img src="{{asset('/dist/images/Guides/img-03.jpg')}}" alt="image destination">
                                </figure>
                                <div class="tg-guidecontent">
                                    <div class="tg-guidecontenthead">
                                        <h3>Martin Blake</h3>
                                        <h4>Adventure Master</h4>
                                        <ul class="tg-socialicons tg-socialiconsvtwo">
                                            <li><a href="javascript:void(0);"><i class="icon-facebook-logo-outline"></i></a>
                                            </li>
                                            <li><a href="javascript:void(0);"><i
                                                        class="icon-instagram-social-outlined-logo"></i></a></li>
                                            <li><a href="javascript:void(0);"><i
                                                        class="icon-twitter-social-outlined-logo"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="tg-description">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                            veniam.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--************************************
                Our Guides End
        *************************************-->
        <!--************************************
                Our Partners Start
        *************************************-->
        <section class="tg-parallax" data-appear-top-offset="600" data-parallax="scroll"
                 data-image-src="{{asset('/dist/images/parallax/bgparallax-03.jpg')}}">
            <div class="tg-sectionspace tg-haslayout">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="tg-ourpartners">
                                <div class="tg-pattern"><img src="{{asset('/dist/images//patternw.png')}}"
                                                             alt="image destination"></div>
                                <h2>Our Partners</h2>
                                <ul class="tg-partners">
                                    <li>
                                        <figure><a href="javascript:void(0);"><img
                                                    src="{{asset('/dist/images//partners/img-01.png')}}"
                                                    alt="image destinations"></a></figure>
                                    </li>
                                    <li>
                                        <figure><a href="javascript:void(0);"><img
                                                    src="{{asset('/dist/images//partners/img-02.png')}}"
                                                    alt="image destinations"></a></figure>
                                    </li>
                                    <li>
                                        <figure><a href="javascript:void(0);"><img
                                                    src="{{asset('/dist/images//partners/img-03.png')}}"
                                                    alt="image destinations"></a></figure>
                                    </li>
                                    <li>
                                        <figure><a href="javascript:void(0);"><img
                                                    src="{{asset('/dist/images//partners/img-04.png')}}"
                                                    alt="image destinations"></a></figure>
                                    </li>
                                    <li>
                                        <figure><a href="javascript:void(0);"><img
                                                    src="{{asset('/dist/images//partners/img-05.png')}}"
                                                    alt="image destinations"></a></figure>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--************************************
                Our Partners End
        *************************************-->
    </main>
@endsection
@push('script')
    <script src="{{asset('/dist/js/select2.min.js')}}" type='text/javascript'></script>
    <script>
        $(document).ready(function () {

            // Initialize select2
            $("#destinations").select2();
            $("#adventure_type").select2();
            $("#travel_month").select2();
            $("#duration").select2();
        });
    </script>
@endpush
