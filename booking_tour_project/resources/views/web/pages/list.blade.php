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
                @csrf
                <select name="orderby" id="selectbox" class="selectbox">
                    <option
                        value="popularity" {{$sort == 'popularity' ? 'selected' :''}}>{{__('list_tour.sort_by_popularity')}}</option>
                    <option
                        value="date" {{$sort == 'date' ? 'selected' : (!$sort ? 'selected': '')}}>{{__('list_tour.sort_by_new')}}</option>
                    <option
                        value="price" {{$sort == 'price' ? 'selected' :''}}>{{__('list_tour.sort_by_price')}}</option>
                    <option
                        value="priceDesc" {{$sort == 'priceDesc' ? 'selected' :''}}>{{__('list_tour.sort_by_price_desc')}}</option>
                </select>
            </div>
        </div>
        <!-- End filters -->


        <div class="container mb-2">
            <div class="row">
                @if($tours->first())
                    @foreach($tours as $tour)
                        <div class="col-md-4 col-sm-6 wow fadeIn animated" data-wow-delay="0.2s">
                            <div class="img_wrapper">
                                <div class="price_grid">
                                    {{getPrice($tour->priceAdult)}}
                                </div>
                                <div class="img_container">
                                    <a href="/single/{{$tour->id}}">
                                        <img src="{{$tour->avata}}" width="350" height="200" class="img-responsive"
                                             alt="">
                                        <div class="short_info">
                                            <h3 class="text_description">{{$tour->name}}</h3>
                                            @if($tour->rate !=0)
                                                <div class="score_wp">
                                                    <div class="score">{{$tour->rate}}</div>
                                                </div>
                                            @endif

                                    </a>
                                </div>
                            </div>
                            <!-- End img_wrapper -->
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
@push('script')
    <script type="text/javascript" src="{{asset('dist/js/list_tour.js')}}"></script>
@endpush
