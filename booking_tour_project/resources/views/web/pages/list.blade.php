@extends('web.layouts.main', ['title'=>'List Tour'])
@section('content')
    <section class="parallax_window_in" data-parallax="scroll" data-image-src="img/sub_header_list_museum.jpg"
             data-natural-width="1400" data-natural-height="470">
        <div id="sub_content_in">
            <div id="animate_intro">
                <h1>Travel Tours</h1>
                <p>"Usu habeo equidem sanctus no ex melius labitur conceptam eos"</p>
            </div>
        </div>
    </section>
    <!-- End section -->
    <!-- End SubHeader ============================================ -->

    <section class="wrapper">
        <div class="divider_border_gray"></div>
        <div id="filters" class="clearfix">
            <div id="sort_filters">
                <select name="orderby" class="selectbox">
                    <option value="popularity">Sort by Popularity</option>
                    <option value="rating">Sort by Average Rating</option>
                    <option value="date" selected='selected'>Sort by Newness</option>
                    <option value="price">Sort by Price: Low to High</option>
                    <option value="price-desc">Sort by Price: High to Low</option>
                </select>
            </div>
            <div id="view_change">
                <a href="/tour" class="grid_bt"></a>
                <a href="/tour-list" class="list_bt"></a>
            </div>
        </div>
        <!-- End filters -->


        <div class="container mb-2">
            <div class="row">
                @if($tours != null)
                    @foreach($tours as $tour)
                        <div class="col-md-4 col-sm-6 wow fadeIn animated" data-wow-delay="0.2s">
                            <div class="img_wrapper">
                                <div class="price_grid">
                                    {{getPrice($tour->tour_detail[1]->price)}}
                                </div>
                                <div class="img_container">
                                    <a href="/single/{{$tour->id}}">
                                        <img src="{{$tour->avata}}" width="350" height="200" class="img-responsive" alt="">
                                        <div class="short_info">
                                            <h3>{{$tour->name}}</h3>
                                            <p>{{$tour->description}}</p>
                                            <div class="score_wp">Superb<div class="score">{{$tour->rate}}</div></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!-- End img_wrapper -->
                        </div>
                    @endforeach
                <!-- End col -->

                    <nav class="d-flex justify-content-center">
                        {{$tours->links('web.layouts.pagelist')}}
                    </nav>
                    <!-- End pagination -->
                @else
                    <h3>{{__('single.no_value')}}</h3>
                @endif
            </div>
            <!-- End row -->
        </div>
        <!-- End container -->
    </section>
@endsection
