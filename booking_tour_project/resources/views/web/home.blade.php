@extends('web.layouts.main', ['title' => 'Trang Chủ'])
@section('content')
    <div id="full-slider-wrapper">
        <div id="layerslider" style="width:100%;height:600px;">
            <!-- first slide -->
            <div class="ls-slide" data-ls="slidedelay: 5000; transition2d:85;">
                <img src="{{asset('dist/img/slides/slide_2.jpg')}}" class="ls-bg" alt="Slide background">
                <h3 class="ls-l slide_typo" style="top: 45%; left: 50%;"
                    data-ls="offsetxin:0;durationin:2000;delayin:1000;easingin:easeOutElastic;rotatexin:90;transformoriginin:50% bottom 0;offsetxout:0;rotatexout:90;transformoriginout:50% bottom 0;">
                    {{__('home.more_than')}}</h3>
                <p class="ls-l slide_typo_2" style="top:55%; left:50%;"
                   data-ls="durationin:2000;delayin:1000;easingin:easeOutElastic;">
                    {{__('home.ft_more_than')}}
                </p>
            </div>
            <!-- second slide -->
            <div class="ls-slide" data-ls="slidedelay:5000; transition2d:103;">
                <img src="{{asset('dist/img/slides/slide_3.jpg')}}" class="ls-bg" alt="Slide background">
                <h3 class="ls-l slide_typo" style="top: 45%; left: 50%;"
                    data-ls="offsetxin:0;durationin:2000;delayin:1000;easingin:easeOutElastic;rotatexin:90;transformoriginin:50% bottom 0;offsetxout:0;rotatexout:90;transformoriginout:50% bottom 0;">
                    {{__('home.discover')}}</h3>
                <p class="ls-l slide_typo_2" style="top:55%; left:50%;"
                   data-ls="durationin:2000;delayin:1000;easingin:easeOutElastic;">
                    {{__('home.ft_discover')}}
                </p>
            </div>
            <!-- third slide -->
            <div class="ls-slide" data-ls="slidedelay: 5000; transition2d:5;">
                <img src="'{{asset('dist/img/slides/slide_1.jpg')}}" class="ls-bg" alt="Slide background">
                <h3 class="ls-l slide_typo" style="top:45%; left: 50%;"
                    data-ls="offsetxin:0;durationin:2000;delayin:1000;easingin:easeOutElastic;rotatexin:90;transformoriginin:50% bottom 0;offsetxout:0;rotatexout:90;transformoriginout:50% bottom 0;">
                    {{__('home.enjoy_tour')}}</h3>
                <p class="ls-l slide_typo_2" style="top:55%; left:50%;"
                   data-ls="durationin:2000;delayin:1000;easingin:easeOutElastic;">
                    {{__('home.ft_enjoy_tour')}}
                </p>
            </div>
        </div>
    </div>
    <!-- End layerslider -->

    <section class="wrapper">
        <div class="divider_border "></div>

        <div class="container">
            <form action="/search" method="GET" class="row mt-3 " autocomplete="off">
                @csrf
                <div class="col-12 card-body d-flex justify-content-center form-outline">
                    <div class="col-10">
                        <input type="search" id="key_works" name="search" class="form-control"
                               placeholder="{{__('home.search_note')}}"/>
                        <div id="auto-conplete" class="row"></div>
                    </div>
                    @csrf
                    <button type="submit" class="btn btn-primary ml-1" style="height: 38px">
                        <strong>{{__('home.search')}}</strong>&nbsp;<i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
            <hr>
            <div class="main_title">
                <h2>{{__('home.our_top')}}</h2>
            </div>
            <div class="row">
                @foreach($tours as $tour)
                    <div class="col-md-4 col-sm-6 wow fadeIn animated" data-wow-delay="0.2s">
                        <div class="img_wrapper">
                            <div class="price_grid date_gid">
                                <p>{{\Carbon\Carbon::parse($tour->date_start)->format('d/m/Y')}} - {{$tour->number_date}}N{{$tour->number_date -1}}Đ</p>
                            </div>
                            <div class="price_grid">
                                {{getPrice($tour->priceAdult)}}
                            </div>
                            <div class="img_container">
                                <a href="/single/{{$tour->id}}">
                                    <img src="{{$tour->avata}}" width="350" height="200" class="img-responsive" alt="">
                                    <div class="short_info">
                                        <h3 class="text_description">{{$tour->name}}</h3>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End img_wrapper -->
                @endforeach
            </div>

        </div>
        <!-- End row -->
        <hr>
        <div class="wrapper pl-5 pr-5">
            <div class="main_title_2">
                <h3>{{__('home.our_popular')}}</h3>
            </div>
            <hr>
            <div class="row">
                <h3>{{__('home.new_tour')}}</h3>
                <div class="container my-4">
                    <div class="controls-top" style="position:absolute; top: 32%; z-index: 3; width: 100%">
                        <a class="btn-floating" href="#multi-item-example" style="margin-left: -3%;"
                           data-slide="prev"><i
                                class="fa-solid fa-circle-chevron-left fa-2xl"></i></a>
                        <a class="btn-floating" href="#multi-item-example"
                           style="margin-left: 93%;"
                           data-slide="next"><i
                                class="fa-solid fa-circle-chevron-right fa-2xl"></i></a>
                    </div>
                    <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">
                        <div class="carousel-inner" role="listbox" style="z-index: 1">
                            @php $x =true; $y = 1; @endphp
                            @foreach($tours_new as $tour_new)
                                @if($x)
                                    <div class="carousel-item active">
                                        <div class="row">
                                @endif
                                @if($y == 1 && !$x)
                                    <div class="carousel-item">
                                        <div class="row">
                                @endif
                                    <div class="col-md-4">
                                        <div class="card mb-2">
                                            <div class="wow fadeIn animated animated"
                                                 data-wow-delay="0.2s"
                                                 style="visibility: visible; animation-delay: 0.2s; animation-name: fadeIn;">
                                                <div class="price_grid date_gid">
                                                    <p>{{\Carbon\Carbon::parse($tour->date_start)->format('d/m/Y')}} - {{$tour->number_date}}N{{$tour->number_date -1}}Đ</p>
                                                </div>
                                                <div class="price_grid">
                                                    {{getPrice($tour_new->priceAdult)}}
                                                </div>
                                                <div class="img_container">
                                                    <a href="/single/{{$tour_new->id}}">
                                                        <img
                                                            src="{{$tour_new->avata}}"
                                                            width="350" height="200"
                                                            class="img-responsive" alt="">
                                                        <div class="short_info">
                                                            <h3 class="text_description">{{$tour_new->name}}</h3>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @php
                                    $x = false;
                                    $y += 1;
                                    if($y > 3)
                                    {
                                        echo '</div></div>';
                                        $y = 1;
                                    }
                                @endphp
                                @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <h3>{{__('home.highly_tour')}}</h3>
                <div class="container my-4">
                    <div class="controls-top" style="position:absolute; top: 72%; z-index: 3; width: 100%">
                        <a class="btn-floating" href="#multi-item" style="margin-left: -3%;
                           data-slide="prev"><i
                                class="fa-solid fa-circle-chevron-left fa-2xl"></i></a>
                        <a class="btn-floating" href="#multi-item"
                           style="margin-left: 93%;
                           data-slide="next"><i
                                class="fa-solid fa-circle-chevron-right fa-2xl"></i></a>
                    </div>
                    <div id="multi-item" class="carousel slide carousel-multi-item" data-ride="carousel">
                        <div class="carousel-inner" role="listbox" style="z-index: 1">
                            @php $x =true; $y = 1; @endphp
                            @foreach($tours_highly as $tour_highly)
                                @if($x)
                                    <div class="carousel-item active">
                                        <div class="row">
                                            @endif
                                            @if($y == 1 && !$x)
                                                <div class="carousel-item">
                                                    <div class="row">
                                                        @endif
                                                        <div class="col-md-4">
                                                            <div class="card mb-2">
                                                                <div class="wow fadeIn animated animated"
                                                                     data-wow-delay="0.2s"
                                                                     style="visibility: visible; animation-delay: 0.2s; animation-name: fadeIn;">
                                                                    <div class="price_grid date_gid">
                                                                        <p>{{\Carbon\Carbon::parse($tour->date_start)->format('d/m/Y')}} - {{$tour->number_date}}N{{$tour->number_date -1}}Đ</p>
                                                                    </div>
                                                                    <div class="price_grid">
                                                                        {{getPrice($tour_highly->priceAdult)}}
                                                                    </div>
                                                                    <div class="img_container">
                                                                        <a href="/single/{{$tour_highly->id}}">
                                                                            <img
                                                                                src="{{$tour_highly->avata}}"
                                                                                width="350" height="200"
                                                                                class="img-responsive" alt="">
                                                                            <div class="short_info">
                                                                                <h3 class="text_description">{{$tour_highly->name}}</h3>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @php
                                                            $x = false;
                                                            $y += 1;
                                                            if($y > 3)
                                                            {
                                                                echo '</div></div>';
                                                                $y = 1;
                                                            }
                                                        @endphp
                                                        @endforeach
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
            <p class="text-center add_bottom_45">
                <a href="/tour" class="btn_1">{{__('home.all_tour')}}</a>
            </p>
        </div>
    </section>
    <section class="container margin_60">
        <div class="main_title">
            <h3>{{__('home.why_choose')}}</h3>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="box_how">
                    <div class="icon_how"><span class="icon_set_1_icon-81"></span></div>
                    <h4>{{__('home.best_price')}}</h4>
                    <p>{{__('home.ft_best_price')}}</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="box_how">
                    <div class="icon_how"><span class="icon_set_1_icon-94"></span></div>
                    <h4>{{__('home.professional')}}</h4>
                    <p>{{__('home.ft_professional')}}</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="box_how">
                    <div class="icon_how"><span class="icon_set_1_icon-92"></span></div>
                    <h4>{{__('home.certifcate')}}</h4>
                    <p>{{__('home.ft_certifcate')}}</p>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script')
    <script type="text/javascript" src="{{asset('dist/js/home.js')}}"></script>
@endpush
