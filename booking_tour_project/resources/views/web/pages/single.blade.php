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
                        @foreach($tour->image as $img)
                            <div class="item"><img src="{{$img->url}}" alt=""></div>
                        @endforeach
                    </div>

                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_1" data-toggle="tab">{{__('single.overview')}}</a>
                        </li>
                        <li><a href="#tab_2" data-toggle="tab">{{__('single.reviews')}}</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane in active" id="tab_1">

                            <p>{!! $tour->description !!}</p>
                            <hr>

                            <h3>{{__('single.program')}}
                                <span>({{$tour->number_date}} {{__('single.day')}})</span></h3>
                            <div class="row pl-4 mt-4   ">
                                @foreach($tour->tour_route as $route)
                                    <h6 class=""><u>{{$route->name}}</u></h6>
                                    <div class="col-12 justify-content-between">
                                        {!! $route->description !!}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- End tab_1 -->
                        <div class="tab-pane" id="tab_2">
                            <div id="summary_review" class="pb-5">
                                <div class="review_score">
                                    <span>{{$tour->rate}}</span>
                                </div>
                                <div class="review_score_2">
                                    <h4>
                                        <span>({{__('single.based_on')}} {{$tour->assessRates ? count($tour->assessRates) : 0}} {{__('single.reviews')}})</span>
                                    </h4>
                                </div>
                            </div>
                            <!-- End review summary -->
                            <div class="reviews-container" id="review_data">
                                @csrf
                                <input type="hidden" id="tour_id" data-tour="{{$tour->id}}">
                            </div>
                            <!-- End review-container -->
                            <hr>

                            <div class="add-review">
                                <h4>{{__('single.leave_review')}}</h4>
                                <div id="message-review"></div>
                                <form method="post" action="/comment/{{$tour->id}}" class="row">
                                    @csrf
                                    <div class="form-group col-md-12">
                                        <label>Rating </label>
                                        <div class="rating"><input type="radio" name="rating" value="5" id="5"><label
                                                for="5">☆</label> <input type="radio" name="rating" value="4"
                                                                         id="4"><label for="4">☆</label> <input
                                                type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                                            <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                                            <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                                        </div>
                                    </div>
                                    <div style="color: red" class="form-group">
                                        @error('rating')
                                        {{$message}}
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Your Review</label>
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
                        <form method="POST" action="/booking/{{$tour->id}}" autocomplete="off">
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
                                                   data-adult="{{$tour->priceAdult}}">
                                        </div>
                                    </td>
                                    <td class="text-center total_adult"><span class="subtotal">₫0</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" style="border-top: none; padding: 0 10px">
                                        <div style="color: red">
                                            @error('adult')
                                            {{$message}}
                                            @enderror
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>{{__('single.child')}}</strong>
                                    </td>
                                    <td>
                                        <div class="styled-select">
                                            <input type="number" name="child"
                                                   class="qty_child {{$errors->has('child') ? 'is-invalid' : ''}}"
                                                   value="0"
                                                   data-child="{{$tour->priceChild}}"
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
                                <tbody>
                                <tr>
                                    <td class="col-5">
                                        <strong>
                                            {{__('single.date_start')}}
                                        </strong>
                                    </td>
                                    <td colspan="2" class="m-2" >
                                        <input type="date" name="date_start" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" style="border-top: none; padding: 0 10px">
                                        <div style="color: red">
                                            @error('date_start')
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
                            {{getPrice($tour->priceAdult)}}
                        </div>
                        <div class="img_container">
                            <a href="/single/{{$tour->id}}">
                                <img src="{{$tour->avata}}" width="350" height="200" class="img-responsive" alt="">
                                <div class="short_info">
                                    <h3 class="text_description">{{$tour->name}}</h3>
                                    <div class="score_wp">
                                        <div class="score">{{\App\Models\AssessRate::getRate($tour->id)}}</div>
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
