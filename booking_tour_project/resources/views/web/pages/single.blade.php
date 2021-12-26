@extends('web.layouts.main', ['title' => 'Chi Tiết Tour Du Lịch'])
@section('content')
    <section class="parallax_window_in" data-parallax="scroll"
             data-image-src="{{$tour->avata}}"
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
                    <div class="add_bottom_15">
                        <div id="full-slider-wrapper">
                            <div id="layerslider" style="width:100%; height: 400px">
                                @foreach($tour->image as $img)
                                    <div class="ls-slide" data-ls="slidedelay: 1000">
                                        <img src="{{$img->url}}" class="ls-bg">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <ul class="nav nav-tabs">
                        <li class="active"
                            style="border: 1px solid #ccc;background-color: #faf662; padding: 5px;border-radius: 45% 10% 0 0;">
                            <a href="#tab_1" data-toggle="tab">{{__('single.overview')}}</a>
                        </li>
                        <li style="border: 1px solid #ccc; background-color: #faf662; padding: 5px;border-radius: 45% 10% 0 0;">
                            <a href="#tab_2" data-toggle="tab">{{__('single.reviews')}}</a>
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
                                        <label>Đánh giá</label>
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
                                        <label>Bình luận</label>
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
                            <li>Ngày khởi hành: {{\Carbon\Carbon::parse($tour->date_start)->format('d/m/Y')}}</li>
                            <li>Thời gian: {{$tour->number_date}} ngày - {{$tour->number_date -1}} đêm</li>
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
                    <fieldset class="box_style_2">
                        <div class="d-flex">
                            <h5 class="pr-1">{{__('single.tags')}}</h5>
                            <p class="pr-3"><i class="fa fa-tag"></i></p>
                        </div>
                        @php
                            $tags = $tour->tags;
                            $tags = explode(",", $tags);
                        @endphp
                        @foreach($tags as $tag)
                            <a href="{{url('/tag', $tag)}}" class="tag_style pr-1 pl-1">{{$tag}}</a>
                        @endforeach
                    </fieldset>
                </aside>
            </div>
            <!-- End row -->
        </div>
        <!-- End container -->
    </section>
    <!-- End section -->

    <div class="container margin_30">
        <h3>{{__('single.related_tours')}}</h3>
        <div class="container my-4">
            <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">
                <div class="carousel-inner" role="listbox" style="z-index: 1">
                    @php $x =true; $y = 1; @endphp
                    @foreach($tours as $tour_new)
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
        <!-- End carousel -->
    </div>
    <!-- End container -->
@endsection
@push('script')
    <script src="{{asset('dist/js/sweetalert.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('dist/js/single.js')}}"></script>
@endpush
