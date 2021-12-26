@extends('web.layouts.main', ['title'=>'Tour Du Lịch Của Bạn'])
@section('content')
    <section class="design-process-section wrapper" id="process-tab">
        <div class="container">
            <div>
                <div class="col-xs-12">
                    <div role="tabpanel" class="tab-pane active" id="discover">
                        <div class="design-process-content">
                            <div class="text-center"><h5 style="color: red">{{__('checkout.tour_info')}}</h5></div>
                            <div class="row">
                                <div class="col-3">
                                    <a href="/single/{{$tour->id}}"></a><img src="{{$tour->avata}}" style="width: 85%">
                                </div>
                                <div class="col-9">
                                    <div class="tour-name">
                                        {{$tour->name}}
                                    </div>
                                    <div class="frame-info">
                                        <div class="row">
                                            <div class="col-6 d-flex">
                                                <i class="fa fa-qrcode mt-1"></i>
                                                <div class="pl-1"><h6>{{__('checkout.id')}}{{$tour->id}}</h6></div>
                                            </div>
                                            <div class="col-6 d-flex">
                                                <i class="fas fa-user-friends"></i>
                                                <div class="pl-1"><h6>
                                                        {{__('checkout.price_adult')}}: {{getPrice($tour->priceAdult)}}
                                                        /{{__('single.per_adult')}}
                                                </h6></div>
                                            </div>

                                            <div class="col-6 d-flex">
                                                <i class="far fa-calendar-alt"></i>
                                                <div class="pl-1"><h6>{{__('checkout.date_st')}}: &nbsp;{{getDateBooking($tour->date_start)}}</h6>
                                                </div>
                                            </div><div class="col-6 d-flex">
                                                <i class="fas fa-child"></i>
                                                <div class="pl-1"><h6>
                                                        {{__('checkout.price_child')}}: {{getPrice($tour->priceChild)}}
                                                        /{{__('single.per_child')}}
                                                    </h6></div>
                                            </div>
                                            <div class="col-6 d-flex">
                                                <i class="far fa-calendar-alt"></i>
                                                <div class="pl-1"><h6>{{__('checkout.date_end')}}: &nbsp;{{(new \Carbon\Carbon($tour->date_start))->addDays($tour->number_date)->format('d-m-Y')}}</h6>
                                                </div>
                                            </div>
                                            <div class="col-6 d-flex">
                                                <i class="far fa-calendar-alt"></i>
                                                <div class="pl-1"><h6>{{__('checkout.time')}}: {{$tour->number_date}} {{__('checkout.day')}} - {{$tour->number_date -1}} {{__('checkout.nigth')}}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="text-center"><h5 style="color: red">{{__('checkout.tour_price')}}</h5></div>
                            <div class="row m-auto d-flex">
                                <div class="col-6">
                                    <div class="cus-num col-12">{{__('checkout.child')}} ({{__('checkout.0_2')}})</div>
                                    <div class="farm-cus text-right">
                                        <label style="font-size: 20px">{{$cart->cart['qty_child']}}</label>
                                    </div>
                                    <div class="farm-cus text-right">
                                        <label
                                            style="font-size: 20px">{{getPrice($cart->cart['price_child'])}}</label>
                                    </div>
                                    <div class="farm-cus text-right">
                                        <label>{{__('checkout.total')}}:<span
                                                class="price-total"> &nbsp;{{getPrice($cart->cart['qty_child'] * $cart->cart['price_child'])}}</span></label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="cus-num col-12">{{__('checkout.adult')}} ({{__('checkout.12_years')}})
                                    </div>
                                    <div class="farm-cus text-right">
                                        <label style="font-size: 20px">{{$cart->cart['qty_adult']}}</label>
                                    </div>
                                    <div class="farm-cus text-right">
                                        <label
                                            style="font-size: 20px">{{getPrice($cart->cart['price_adult'])}}</label>
                                    </div>
                                    <div class="farm-cus text-right">
                                        <label>{{__('checkout.total')}}:<span
                                                class="price-total"> &nbsp;{{getPrice($cart->cart['qty_adult'] * $cart->cart['price_adult'])}}</span></label>
                                    </div>
                                </div>
                                <div class="col-12 mt-4 text-right">
                                    <label>{{__('checkout.total_bill')}}<span
                                            class="price-total"> &nbsp;{{getPrice($cart->gettotal())}}</span></label>
                                </div>
                            </div>
                            <hr>
                            <form action="/payment" method="POST">
                                @csrf
                                <div class="text-center"><h5 style="color: red">{{__('checkout.payment')}}</h5></div>
                                <div class="row">
                                    <div class="col-12 ml-2">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio1" value="0" name="payment"
                                                   class="custom-control-input" checked>
                                            <label class="custom-control-label"
                                                   for="customRadio1">{{__('checkout.cash')}}</label>
                                            <label class="detail">
                                                {{__('checkout.cash_note')}}
                                            </label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio2" name="payment" value="1"
                                                   class="custom-control-input">
                                            <label class="custom-control-label"
                                                   for="customRadio2">{{__('checkout.ATM')}}
                                                Banking</label>
                                            <label class="detail">
                                                {{__('checkout.ATM_note')}}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="text-center">
                                    <button class="bg-primary text-white h5 border-0 p-4">
                                        {{__('checkout.bookings')}} <i class="fas fa-arrow-right"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
