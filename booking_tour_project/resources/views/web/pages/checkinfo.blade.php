@extends('web.layouts.main', ['title'=>'Your Tour'])
@section('content')
    <section class="design-process-section wrapper" id="process-tab">
        <div class="container">
            <div>
                <div class="col-xs-12">
                    <div role="tabpanel" class="tab-pane active" id="discover">
                        <div class="design-process-content row">
                            <div class="cus-num text-center col-12">
                                {{__('checkout.thanks')}}
                            </div>
                            <div class="col-6 mt-4">
                                <h4 style="color: red" class="text-center">{{__('checkout.booking_sheet')}}</h4>
                                <div class="row mr-2 cus-num">
                                    <div class="col-12 tour-name d-flex">
                                        <div class="col-4">{{__('checkout.tour_code')}}:</div>
                                        <div class="col-8">{{$tour->id}}</div>
                                    </div>
                                    <div class="col-12 tour-name d-flex">
                                        <div class="col-4">{{__('checkout.name_tour')}}:</div>
                                        <div class="col-8">{{$tour->name}}</div>
                                    </div>
                                    <div class="col-12 tour-name d-flex">
                                        <div class="col-4">{{__('checkout.date_st')}}:</div>
                                        <div class="col-8">{{$tour->date_start}}</div>
                                    </div>
                                    <div class="col-12 tour-name d-flex">
                                        <div class="col-4">{{__('checkout.date_end')}}:</div>
                                        <div class="col-8">{{$tour->date_end}}</div>
                                    </div>
                                    <div class="col-12 tour-name d-flex">
                                        <div class="col-4">{{__('checkout.number_day')}}:</div>
                                        <div class="col-8">{{$tour->number_date}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 mt-4 ">
                                <h4 style="color: red" class="text-center">{{__('checkout.communication')}}</h4>
                                <div class="row ml-2 cus-num">
                                    <div class="col-12 tour-name d-flex">
                                        <div class="col-4">{{__('checkout.full_name')}}:</div>
                                        <div class="col-8">{{\Illuminate\Support\Facades\Auth::user()->name}}</div>
                                    </div>
                                    <div class="col-12 tour-name d-flex">
                                        <div class="col-4">{{__('checkout.address')}}:</div>
                                        <div class="col-8">Quảng Nam</div>
                                    </div>
                                    <div class="col-12 tour-name d-flex">
                                        <div class="col-4">{{__('checkout.phone')}}:</div>
                                        <div class="col-8">{{\Illuminate\Support\Facades\Auth::user()->phone}}</div>
                                    </div>
                                    <div class="col-12 tour-name d-flex">
                                        <div class="col-4">Email:</div>
                                        <div class="col-8">{{\Illuminate\Support\Facades\Auth::user()->email}}</div>
                                    </div>
                                    <div class="col-12 tour-name d-flex">
                                        <div class="col-4">{{__('checkout.qty')}}:</div>
                                        <div class="col-8">
                                            {{$cart->cart['qty_adult'] + $cart->cart['qty_child']}}&nbsp;({{__('checkout.adult')}}:
                                            &nbsp;{{$cart->cart['qty_adult']}} &nbsp;{{__('checkout.child')}}:
                                            &nbsp;{{$cart->cart['qty_child']}})
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-4">
                                <h4 style="color: red" class="text-center">{{__('checkout.detail')}}</h4>
                                <div class="col-12 cus-num">
                                    <div class="d-flex tour-name">
                                        <div class="col-2">
                                            {{__('checkout.booking_no')}}:
                                        </div>
                                        <div class="col-10">
                                            {{$booking->booking_no}} ({{__('checkout.note_no')}})
                                        </div>
                                    </div>
                                    <div class="d-flex tour-name">
                                        <div class="col-2">
                                            {{__('checkout.total_bill')}}:
                                        </div>
                                        <div class="col-10">
                                            {{getPrice($booking->total)}}
                                        </div>
                                    </div>
                                    <div class="d-flex tour-name">
                                        <div class="col-2">
                                            {{__('checkout.date_registra')}}:
                                        </div>
                                        <div class="col-10">
                                            {{\Carbon\Carbon::parse($booking->booking_date)->format('d-m-Y')}}
                                        </div>
                                    </div>
                                    <div class="d-flex tour-name">
                                        <div class="col-2">
                                            {{__('checkout.payments')}}:
                                        </div>
                                        <div class="col-10">
                                            {{$booking->payment == 1 ? __('checkout.ATM') : __('checkout.cash')}}
                                        </div>
                                    </div>
                                    <div class="d-flex tour-name">
                                        <div class="col-2">
                                            {{__('checkout.stt')}}:
                                        </div>
                                        <div class="col-10">
                                            {{$booking->status == 0 ? __('checkout.note_stt1') : __('checkout.note_stt2')}}
                                        </div>
                                    </div>
                                    <div class="d-flex tour-name">
                                        <div class="col-2">
                                            {{__('checkout.pay_term')}}:
                                        </div>
                                        <div class="col-10">
                                            {{(new \Carbon\Carbon($booking->booking_date))->addDays(5)->format('d-m-Y')}}
                                            ({{__('checkout.note_term')}})
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 text-center mt-5">
                                @if($booking->payment == 1)
                                <button class="bg-primary text-white h5 border-0 p-4">
                                    {{__('checkout.make_pay')}} <i class="fas fa-arrow-right"></i>
                                </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
