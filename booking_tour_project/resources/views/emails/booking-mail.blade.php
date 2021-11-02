<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<section class="design-process-section wrapper" id="process-tab">
    <div class="container">
        <div>
            <div class="col-xs-12">
                <div role="tabpanel" class="tab-pane active" id="discover">
                    <div class="design-process-content row">
                        <div class="col-6 mt-4">
                            <h4 style="color: red" class="text-center">{{__('checkout.booking_sheet')}}</h4>
                            <table class="row mr-2 cus-num">
                                <tr class="col-12 tour-name d-flex">
                                    <td class="col-4">{{__('checkout.tour_code')}}:</td>
                                    <td class="col-8">{{$tour->id}}</td>
                                </tr>
                                <tr class="col-12 tour-name d-flex">
                                    <td class="col-4">{{__('checkout.name_tour')}}:</td>
                                    <td class="col-8">{{$tour->name}}</td>
                                </tr>
                                <tr class="col-12 tour-name d-flex">
                                    <td class="col-4">{{__('checkout.st_sale')}}:</td>
                                    <td class="col-8">{{$tour->date_start}}</td>
                                </tr>
                                <tr class="col-12 tour-name d-flex">
                                    <td class="col-4">{{__('checkout.end_sale')}}:</td>
                                    <td class="col-8">{{$tour->date_end}}</td>
                                </tr>
                                <tr class="col-12 tour-name d-flex">
                                    <td class="col-4">{{__('checkout.number_day')}}:</td>
                                    <td class="col-8">{{$tour->number_date}}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-6 mt-4 ">
                            <h4 style="color: red" class="text-center">{{__('checkout.communication')}}</h4>
                            <table class="row ml-2 cus-num">
                                <tr class="col-12 tour-name d-flex">
                                    <td class="col-4">{{__('checkout.full_name')}}:</td>
                                    <td class="col-8">{{\Illuminate\Support\Facades\Auth::user()->name}}</td>
                                </tr>
                                <tr class="col-12 tour-name d-flex">
                                    <td class="col-4">{{__('checkout.address')}}:</td>
                                    <td class="col-8">Quảng Nam</td>
                                </tr>
                                <tr class="col-12 tour-name d-flex">
                                    <td class="col-4">{{__('checkout.phone')}}:</td>
                                    <td class="col-8">{{\Illuminate\Support\Facades\Auth::user()->phone}}</td>
                                </tr>
                                <tr class="col-12 tour-name d-flex">
                                    <td class="col-4">Email:</td>
                                    <td class="col-8">{{\Illuminate\Support\Facades\Auth::user()->email}}</td>
                                </tr>
                                <tr class="col-12 tour-name d-flex">
                                    <td class="col-4">{{__('checkout.qty')}}:</td>
                                    <td class="col-8">
                                        {{$cart->cart['qty_adult'] + $cart->cart['qty_child']}}
                                        &nbsp;({{__('checkout.adult')}}:
                                        &nbsp;{{$cart->cart['qty_adult']}} &nbsp;{{__('checkout.child')}}:
                                        &nbsp;{{$cart->cart['qty_child']}})
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-12 mt-4">
                            <h4 style="color: red" class="text-center">{{__('checkout.detail')}}</h4>
                            <table class="col-12 cus-num">
                                <tr class="d-flex tour-name">
                                    <td class="col-2">
                                        {{__('checkout.booking_no')}}:
                                    </td>
                                    <td class="col-10">
                                        {{$cart->cart['booking_no']}} ({{__('checkout.note_no')}})1
                                    </td>
                                </tr>
                                <tr class="d-flex tour-name">
                                    <td class="col-2">
                                        {{__('checkout.total_bill')}}:
                                    </td>
                                    <td class="col-10">
                                        {{getPrice($cart->cart['total'])}}
                                    </td>
                                </tr>
                                <tr class="d-flex tour-name">
                                    <td class="col-2">
                                        {{__('checkout.date_registra')}}:
                                    </td>
                                    <td class="col-10">
                                        {{\Carbon\Carbon::parse($cart->cart['booking_date'])->format('d-m-Y')}}
                                    </td>
                                </tr>
                                <tr class="d-flex tour-name">
                                    <td class="col-2">
                                        {{__('checkout.date_st')}}:
                                    </td>
                                    <td class="col-10">
                                        {{\Carbon\Carbon::parse($cart->cart['date_start'])->format('d-m-Y')}}
                                    </td>
                                </tr>
                                <tr class="d-flex tour-name">
                                    <td class="col-2">
                                        {{__('checkout.payments')}}:
                                    </td>
                                    <td class="col-10">
                                        {{$cart->cart['payment'] == 1 ? __('checkout.ATM') : __('checkout.cash')}}
                                    </td>
                                </tr>
                                <tr class="d-flex tour-name">
                                    <td class="col-2">
                                        {{__('checkout.stt')}}:
                                    </td>
                                    <td class="col-10">
                                        {{$cart->cart['status'] == 0 ? __('checkout.note_stt1') : __('checkout.note_stt2')}}
                                    </td>
                                </tr>
                                <tr class="d-flex tour-name">
                                    <td class="col-2">
                                        {{__('checkout.pay_term')}}:
                                    </td>
                                    <td class="col-10">
                                        {{(new \Carbon\Carbon($cart->cart['booking_date']))->addDays(5)->format('d-m-Y')}}
                                        ({{__('checkout.note_term')}})
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
