@extends('web.layouts.main', ['title'=>'Tour Du Lịch Của Bạn'])
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
                            <div class="col-12 mt-4">
                                <h4 style="color: red" class="text-center">{{__('checkout.detail')}}</h4>
                                <div class="col-12 cus-num">
                                    <div class="d-flex tour-name">
                                        <div class="col-3">
                                            {{__('checkout.booking_no')}}:
                                        </div>
                                        <div class="col-9">
                                            {{$cart->cart['booking_no']}} ({{__('checkout.note_no')}})
                                        </div>
                                    </div>
                                    <div class="d-flex tour-name">
                                        <div class="col-3">
                                            {{__('checkout.total_bill')}}:
                                        </div>
                                        <div class="col-9">
                                            {{getPrice($cart->cart['total'])}}
                                        </div>
                                    </div>
                                    <div class="d-flex tour-name">
                                        <div class="col-3">
                                            {{__('checkout.date_registra')}}:
                                        </div>
                                        <div class="col-9">
                                            {{\Carbon\Carbon::parse($cart->cart['booking_date'])->format('d-m-Y')}}
                                        </div>
                                    </div>
                                    <div class="d-flex tour-name">
                                        <div class="col-3">
                                            {{__('checkout.date_st')}}:
                                        </div>
                                        <div class="col-9">
                                            {{\Carbon\Carbon::parse($tour->date_start)->format('d-m-Y')}}
                                        </div>
                                    </div>
                                    <div class="d-flex tour-name">
                                        <div class="col-3">
                                            {{__('checkout.payments')}}:
                                        </div>
                                        <div class="col-9">
                                            {{$cart->cart['payment'] == 1 ? __('checkout.ATM') : __('checkout.cash')}}
                                        </div>
                                    </div>
                                    <div class="d-flex tour-name">
                                        <div class="col-3">
                                            {{__('checkout.pay_term')}}:
                                        </div>
                                        <div class="col-9">
                                            {{(new \Carbon\Carbon($cart->cart['booking_date']))->addDays(5)->format('d-m-Y')}}
                                            ({{__('checkout.note_term')}})
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 text-center mt-5">
                                @if($cart->cart['payment'] == 0)
                                    <div class="row">
                                        <div class="col-6">
                                            <a href="/booking"
                                               class="btn btn-primary rounded">{{__('checkout.confirmation')}}</a>
                                        </div>
                                        <div class="col-6">
                                            <div id="paypal-button"></div>
                                            <input type="hidden" id="input_total"
                                                   value="{{round($cart->cart['total']/23000, 2)}}">
                                            @csrf
                                        </div>
                                    </div>
                                @else
                                    <div class="row">
                                        <div class="col-12">
                                            <div id="paypal-button"></div>
                                            <input type="hidden" id="input_total"
                                                   value="{{round($cart->cart['total']/23000, 2)}}">
                                            @csrf
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script')
    <script src="{{asset('dist/js/checkout_paypal.js')}}"></script>
    <script src="{{asset('dist/js/paypal.js')}}"></script>
@endpush
