@extends('web.layouts.main', ['title' => 'HomePage'])
@section('content')
    <div id="full-slider-wrapper">
        <div id="layerslider" style="width:100%;height:600px;">
            <!-- first slide -->
            <div class="ls-slide" data-ls="slidedelay: 5000; transition2d:85;">
                <img src="{{asset('dist/img/slides/slide_2.jpg')}}" class="ls-bg" alt="Slide background">
                <h3 class="ls-l slide_typo" style="top: 45%; left: 50%;" data-ls="offsetxin:0;durationin:2000;delayin:1000;easingin:easeOutElastic;rotatexin:90;transformoriginin:50% bottom 0;offsetxout:0;rotatexout:90;transformoriginout:50% bottom 0;">More than 100 tours available</h3>
                <p class="ls-l slide_typo_2" style="top:55%; left:50%;" data-ls="durationin:2000;delayin:1000;easingin:easeOutElastic;">
                    Historic Buildings - Attractions - Museums
                </p>
                <a class="ls-l button_intro_2 outline" style="top:65%; left:50%;white-space: nowrap;" data-ls="durationin:2000;delayin:1400;easingin:easeOutElastic;" href='grid.html'>Read more</a>
            </div>
            <!-- second slide -->
            <div class="ls-slide" data-ls="slidedelay:5000; transition2d:103;">
                <img src="{{asset('dist/img/slides/slide_3.jpg')}}" class="ls-bg" alt="Slide background">
                <h3 class="ls-l slide_typo" style="top: 45%; left: 50%;" data-ls="offsetxin:0;durationin:2000;delayin:1000;easingin:easeOutElastic;rotatexin:90;transformoriginin:50% bottom 0;offsetxout:0;rotatexout:90;transformoriginout:50% bottom 0;">Discover Fantastic Places</h3>
                <p class="ls-l slide_typo_2" style="top:55%; left:50%;" data-ls="durationin:2000;delayin:1000;easingin:easeOutElastic;">
                    We offer a variety of services and options
                </p>
                <a class="ls-l button_intro_2 outline" style="top:65%; left:50%;white-space: nowrap;" data-ls="durationin:2000;delayin:1400;easingin:easeOutElastic;" href='grid.html'>Read more</a>
            </div>
            <!-- third slide -->
            <div class="ls-slide" data-ls="slidedelay: 5000; transition2d:5;">
                <img src="'{{asset('dist/img/slides/slide_1.jpg')}}" class="ls-bg" alt="Slide background">
                <h3 class="ls-l slide_typo" style="top:45%; left: 50%;" data-ls="offsetxin:0;durationin:2000;delayin:1000;easingin:easeOutElastic;rotatexin:90;transformoriginin:50% bottom 0;offsetxout:0;rotatexout:90;transformoriginout:50% bottom 0;">Enjoy a Lovely Tour</h3>
                <p class="ls-l slide_typo_2" style="top:55%; left:50%;" data-ls="durationin:2000;delayin:1000;easingin:easeOutElastic;">
                    Buildings - Attractions - Museums
                </p>
                <a class="ls-l button_intro_2" style="top:65%; left:50%;" data-ls="durationin:2000;delayin:1400;easingin:easeOutElastic;" href='grid.html'>Explore</a>
            </div>
        </div>
    </div>
    <!-- End layerslider -->

    <section class="wrapper">
        <div class="divider_border"></div>

        <div class="container">

            <div class="main_title">
                <h2>Our <span>Top</span> Travel Tours</h2>
                <p>Quisque at tortor a libero posuere laoreet vitae sed arcu. Curabitur consequat.</p>
            </div>
            <div class="row">
                @foreach($tours as $tour)
                <div class="col-md-4 col-sm-6 wow fadeIn animated" data-wow-delay="0.2s">
                    <div class="img_wrapper">
                        <div class="ribbon">
                            <span>Popular</span>
                        </div>
                        <div class="price_grid">
                            ₫{{number_format($tour->tour_detail[1]->price, 0, ',', '.')}}
                        </div>
                        <div class="img_container">
                            <a href="/single/{{$tour->id}}">
                                <img src="{{$tour->avata}}" width="350" height="200" class="img-responsive" alt="">
                                <div class="short_info">
                                    <h3>{{$tour->name}}</h3>
                                    <em>{{$tour->name}}</em>
                                    <p>
                                        {{$tour->description}}
                                    </p>
                                    <div class="score_wp">Superb
                                        <div class="score">7.5</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- End img_wrapper -->
                </div>
                @endforeach

            </div>
            <!-- End row -->

            <div class="main_title_2">
                <h3>View other <span>popular</span> tours</h3>
                <p>Quisque at tortor a libero posuere laoreet vitae sed arcu. Curabitur consequat.</p>
            </div>
            <div class="row list_tours">
                <div class="col-sm-6">
                    <h3>New Tours</h3>
                    <ul>
                        @foreach($tours_new as $tour_new)
                        <li>
                            <div>
                                <a href="/single/{{$tour_new->id}}">
                                    <figure><img src="{{$tour_new->avata}}" alt="thumb" class="img-rounded" width="60" height="60">
                                    </figure>
                                    <h4>{{$tour_new->name}}</h4>
                                    <small>Point rate &nbsp; </small>
                                    <small class="score-1">{{$tour_new->rate}}</small>
                                    <span class="price_list">₫{{number_format($tour_new->tour_detail[1]->price, 0, ',', '.')}}</span>
                                </a>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-sm-6">
                    <h3>Highly rated tour</h3>
                    <ul>
                        @foreach($tours_highly as $tour_highly)
                        <li>
                            <div>
                                <a href="/single/{{$tour_highly->id}}">
                                    <figure><img src="{{$tour_highly->avata}}" alt="thumb" class="img-rounded" width="60" height="60">
                                    </figure>
                                    <h4>{{$tour_highly->name}}</h4>
                                    <small>Point rate &nbsp; </small>
                                    <small class="score-1">{{$tour_highly->rate}}</small>
                                    <span class="price_list">₫{{number_format($tour_highly->tour_detail[1]->price, 0, ',', '.')}}</span>
                                </a>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>

            </div>
            <!-- End row -->

            <p class="text-center add_bottom_45">
                <a href="/tour" class="btn_1">Explore all tours (24)</a>
            </p>

        </div>
    </section>
    <!-- End section -->

    <section class="container margin_60">
        <div class="main_title">
            <h3>Why choose BesTours</h3>
            <p>Quisque at tortor a libero posuere laoreet vitae sed arcu. Curabitur consequat.</p>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="box_how">
                    <div class="icon_how"><span class="icon_set_1_icon-81"></span>
                    </div>
                    <h4>Best price guarantee</h4>
                    <p>Lorem ipsum dolor sit amet, et cum civibus referrentur, at propriae forensibus qui. Duo aliquip necessitatibus ne.</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="box_how">
                    <div class="icon_how"><span class="icon_set_1_icon-94"></span>
                    </div>
                    <h4>Professional local guides</h4>
                    <p>Lorem ipsum dolor sit amet, et cum civibus referrentur, at propriae forensibus qui. Duo aliquip necessitatibus ne.</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="box_how">
                    <div class="icon_how"><span class="icon_set_1_icon-92"></span>
                    </div>
                    <h4>Certifcate of Excellence</h4>
                    <p>Lorem ipsum dolor sit amet, et cum civibus referrentur, at propriae forensibus qui. Duo aliquip necessitatibus ne.</p>
                </div>
            </div>
        </div>
        <!-- End Row -->
    </section>
    <!-- End Container -->

    <section class="promo_full">
        <div class="promo_full_wp">
            <div>
                <h3>What Clients say<span>Id tale utinam ius, an mei omnium recusabo iracundia.</span></h3>
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="carousel_testimonials">
                                <div>
                                    <div class="box_overlay">
                                        <div class="pic">
                                            <figure><img src="{{asset('dist/img/testimonial_1.jpg')}}" alt="" class="img-circle">
                                            </figure>
                                            <h4>Roberta<small>12 October 2015</small></h4>
                                        </div>
                                        <div class="comment">
                                            "Mea ad postea meliore fuisset. Timeam repudiare id eum, ex paulo dictas elaboraret sed, mel cu unum nostrud."
                                        </div>
                                    </div>
                                    <!-- End box_overlay -->
                                </div>

                                <div>
                                    <div class="box_overlay">
                                        <div class="pic">
                                            <figure><img src="{{asset('dist/img/testimonial_1.jpg')}}" alt="" class="img-circle">
                                            </figure>
                                            <h4>Roberta<small>12 October 2015</small></h4>
                                        </div>
                                        <div class="comment">
                                            "No nam indoctum accommodare, vix ei discere civibus philosophia. Vis ea dicant diceret ocurreret."
                                        </div>
                                    </div>
                                    <!-- End box_overlay -->
                                </div>

                                <div>
                                    <div class="box_overlay">
                                        <div class="pic">
                                            <figure><img src="{{asset('dist/img/testimonial_1.jpg')}}" alt="" class="img-circle">
                                            </figure>
                                            <h4>Roberta<small>12 October 2015</small></h4>
                                        </div>
                                        <div class="comment">
                                            "No nam indoctum accommodare, vix ei discere civibus philosophia. Vis ea dicant diceret ocurreret."
                                        </div>
                                    </div>
                                    <!-- End box_overlay -->
                                </div>

                            </div>
                            <!-- End carousel_testimonials -->
                        </div>
                        <!-- End col-md-8 -->
                    </div>
                    <!-- End row -->
                </div>
                <!-- End container -->
            </div>
            <!-- End promo_full_wp -->
        </div>
        <!-- End promo_full -->
    </section>
@endsection
