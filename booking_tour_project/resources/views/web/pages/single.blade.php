@extends('web.layouts.main', ['title' => 'Detail Tour'])
@section('content')
    <section class="parallax_window_in" data-parallax="scroll"
             data-image-src="{{asset('dist/img/sub_header_list_museum_in.jpg')}}"
             data-natural-width="1400" data-natural-height="470">
        <div id="sub_content_in">
            <div id="animate_intro">
                <h1>{{$tour->name}}</h1>

            </div>
        </div>
    </section>
    <section class="wrapper">
        <div class="divider_border"></div>

        <div class="container">
            <div class="row" id="tab">
                <div class="col-md-7">

                    <div class="owl-carousel add_bottom_15">
                        <div class="item"><img src="{{asset('dist/img/carousel/carousel_in_1.jpg')}}" alt="">
                        </div>
                        <div class="item"><img src="{{asset('dist/img/carousel/carousel_in_2.jpg')}}" alt="">
                        </div>
                        <div class="item"><img src="{{asset('dist/img/carousel/carousel_in_3.jpg')}}" alt="">
                        </div>
                    </div>

                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_1" data-toggle="tab">{{__('single.overview')}}</a>
                        </li>
                        <li><a href="#tab_2" data-toggle="tab">{{__('single.reviews')}}</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane in active" id="tab_1">

                            <p>{{$tour->description}}</p>
                            <hr>

                            <h3>Program <span>(4 days)</span></h3>
                            <p>
                                Iudico omnesque vis at, ius an laboramus adversarium. An eirmod doctus admodum est, vero
                                numquam et mel, an duo modo error. No affert timeam mea, legimus ceteros his in. Aperiri
                                honestatis sit at. Eos aeque fuisset ei, case denique eam ne. Augue invidunt has ad,
                                ullum debitis mea ei, ne aliquip dignissim nec.
                            </p>
                            <ul>
                                <li>
                                    <div>
                                        1
                                    </div>
                                    <div>
                                        <div class="hidden-xs">
                                            <img src="img/tour_plan_1.jpg" alt="" class="img-circle thumb_visit">
                                        </div>
                                        <h4>Augue invidunt has</h4>
                                        <p>
                                            Vero consequat cotidieque ad eam. Ea duis errem qui, impedit blandit sed eu.
                                            Ius diam vivendo ne.
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <time class="cbp_tmtime" datetime="11:30"><span>2 hours</span><span>11:30</span>
                                    </time>
                                    <div class="cbp_tmicon">
                                        2
                                    </div>
                                    <div class="cbp_tmlabel">
                                        <div class="hidden-xs">
                                            <img src="img/tour_plan_2.jpg" alt="" class="img-circle thumb_visit">
                                        </div>
                                        <h4>An eirmod doctus admodum</h4>
                                        <p>
                                            Vero consequat cotidieque ad eam. Ea duis errem qui, impedit blandit sed eu.
                                            Ius diam vivendo ne.
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <time class="cbp_tmtime" datetime="13:30"><span>1 hour</span><span>13:30</span>
                                    </time>
                                    <div class="cbp_tmicon">
                                        3
                                    </div>
                                    <div class="cbp_tmlabel">
                                        <div class="hidden-xs">
                                            <img src="img/tour_plan_3.jpg" alt="" class="img-circle thumb_visit">
                                        </div>
                                        <h4>Eos aeque fuisset</h4>
                                        <p>
                                            Vero consequat cotidieque ad eam. Ea duis errem qui, impedit blandit sed eu.
                                            Ius diam vivendo ne.
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <time class="cbp_tmtime" datetime="14:30"><span>2 hours</span><span>14:30</span>
                                    </time>
                                    <div class="cbp_tmicon">
                                        4
                                    </div>
                                    <div class="cbp_tmlabel">
                                        <div class="hidden-xs">
                                            <img src="img/tour_plan_4.jpg" alt="" class="img-circle thumb_visit">
                                        </div>
                                        <h4>No affert timeam mea</h4>
                                        <p>
                                            Vero consequat cotidieque ad eam. Ea duis errem qui, impedit blandit sed eu.
                                            Ius diam vivendo ne.
                                        </p>
                                    </div>
                                </li>
                            </ul>

                        </div>
                        <!-- End tab_1 -->

                        <div class="tab-pane" id="tab_2">

                            <div id="summary_review">
                                <div class="review_score">
                                    <span>{{\App\Models\AssessRate::getRating($tour->id)!= null ? number_format(\App\Models\AssessRate::getRating($tour->id), 1) : '5.0'}}</span>
                                </div>
                                <div class="review_score_2">
                                    <h4>Fabulous <span>(Based on {{\App\Models\Review::countReview()}} reviews)</span>
                                    </h4>
                                    <p>
                                        Vero consequat cotidieque ad eam. Ea duis errem qui, impedit blandit sed eu. Ius
                                        diam vivendo ne.
                                    </p>
                                </div>
                            </div>
                            <!-- End review summary -->
                            <div class="reviews-container" id="review_data">
                                @csrf
                            </div>
                            <!-- End review-container -->
                            <hr>

                            <div class="add-review">
                                <h4>{{__('single.leaver_eview')}}</h4>
                                <div id="message-review"></div>
                                <form method="post" action="/comment/{{$tour->id}}" class="row">
                                    @csrf
                                    <div class="form-group col-md-12">
                                        <label>{{__('single.rating')}}</label>
                                        <select name="rating" class="form-control">
                                            <option value="">Select</option>
                                            {!! forRate() !!}
                                        </select>
                                    </div>
                                    <div style="color: red" class="form-group">
                                        @error('rating')
                                        {{$message}}
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>{{__('single.your_review')}}</label>
                                        <textarea name="comment" class="form-control"
                                                  style="height:130px;"></textarea>
                                    </div>
                                    <div style="color: red" class="form-group">
                                        @error('comment')
                                        {{$message}}
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        {!! getBTNSB() !!}
                                    </div>
                                </form>
                            </div>

                        </div>
                        <!-- End tab_2 -->
                        <!-- End tab_3 -->
                    </div>
                    <!-- End tabs -->
                </div>
                <!-- End Col -->

                <aside class="col-md-5">
                    <div class="box_style_1">
                        <div class="price">
                            <strong>{{getPrice($tour->priceAdult)}}</strong><small>{{__('single.per_adult')}}</small>
                        </div>
                        <div class="price">
                            <strong>{{getPrice($tour->priceChild)}}</strong><small>{{__('single.per_child')}}</small>
                        </div>
                        <ul class="list_ok">
                            <li>Sea te propriae lobortis</li>
                            <li>Aperiri electram</li>
                            <li>12 Quando omnium</li>
                            <li>4 Vide urbanitas</li>
                        </ul>
                    </div>
                    <div class="box_style_2">
                        <h3>{{__('single.book_your_tour')}}<span>{{__('single.free_service')}}</span></h3>
                        <div id="message-booking"></div>
                        <form method="post" action="/booking/{{$tour->id}}" autocomplete="off">
                            @method('PUT')
                            @csrf
                            <table id="tickets" class="table">
                                <thead>
                                <tr>
                                    <th>{{__('single.tickers')}}</th>

                                    <th>{{__('single.quantity')}}</th>
                                    <th class="text-center"><span class="subtotal">{{__('single.subtotal')}}</span>
                                    </th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr class="total_row">
                                    <td colspan="2"><strong>{{__('single.total')}}</strong>
                                    </td>
                                    <td class="text-center">
                                        <input class="total_tour" data-total="0" id="total" value="₫0">
                                    </td>
                                </tr>
                                </tfoot>
                                <tbody>
                                <tr>
                                    <td><strong>{{__('single.adult')}}</strong>
                                    </td>
                                    <td>
                                        <div class="styled-select">
                                            <input type="number" value="0" name="adult"
                                                   class="qty_adult {{$errors->has('adult') ? 'is-invalid' : ''}}"
                                                   onchange="getTotalFunction()"
                                                   data-adult="{{$tour->tour_detail[0]->price}}">
                                        </div>
                                    </td>
                                    <td class="text-center total_adult"><span class="subtotal">₫0</span>
                                    </td>
                                <tr>
                                    <td colspan="3" style="border-top: none; padding: 0 10px">
                                        <div style="color: red">
                                            @error('adult')
                                            {{$message}}
                                            @enderror
                                        </div>
                                    </td>
                                <tr>
                                    <td colspan="3" style="border-top: none; padding: 0 10px">
                                        <div style="color: red">
                                            @error('adult')
                                            {{$message}}
                                            @enderror
                                        </div>
                                    </td>
                                </tr>
                                </tr>
                                </tr>
                                <tr>
                                    <td><strong>{{__('single.child')}}</strong>
                                    </td>
                                    <td>
                                        <div class="styled-select">
                                            <input type="number" name="child"
                                                   class="qty_child {{$errors->has('child') ? 'is-invalid' : ''}}"
                                                   value="0"
                                                   data-child="{{$tour->tour_detail[1]->price}}"
                                                   onchange="getTotalFunction()">
                                        </div>
                                    </td>
                                    <td class="text-center total_child"><span class="subtotal">₫0</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" style="border-top: none; padding: 0 10px">
                                        <div style="color: red">
                                            @error('child')
                                            {{$message}}
                                            @enderror
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="form-group">
                                @if(\Illuminate\Support\Facades\Auth::user() != null)
                                    <button class="btn_full">{{__('single.bookings')}}</button>
                                @else
                                    <a href="/login" class="btn_full">{{__('single.bookings')}}</a>
                                @endif
                            </div>
                        </form>
                        <hr>
                    </div>
                </aside>
            </div>
            <!-- End row -->
        </div>
        <!-- End container -->
    </section>
    <!-- End section -->

    <div class="container margin_30">
        <h3 class="second_title">{{__('single.related_tours')}}</h3>
        <div class="carousel add_bottom_30">
            @foreach($tours as $tourItem)
                <div class=" wow fadeIn animated" data-wow-delay="0.2s">
                    <div class="img_wrapper">
                        <div class="price_grid">
                            {{getPrice($tour->tour_detail[1]->price)}}
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
        <!-- End carousel -->
    </div>
    <!-- End container -->
@endsection
@push('script')
    <script src="{{asset('dist/js/sweetalert.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('dist/js/single.js')}}"></script>
@endpush
