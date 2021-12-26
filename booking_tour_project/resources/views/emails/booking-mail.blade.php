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
                        <div class="col-12 mt-4">
                            <h4 style="color: red" class="text-center">{{__('checkout.detail')}}</h4>
                            <table class="col-12 cus-num">
                                <tr class="d-flex tour-name">
                                    <td class="col-3">
                                        {{__('checkout.booking_no')}}:
                                    </td>
                                    <td class="col-9">
                                        {{$bk->booking_no}}
                                    </td>
                                </tr>
                                <tr class="col-12 tour-name d-flex">
                                    <td class="col-3">{{__('checkout.qty')}}:</td>
                                    <td class="col-9">
                                        {{$bk_dt->child + $bk_dt->adult}}
                                        &nbsp;({{__('checkout.adult')}}:
                                        &nbsp;{{$bk_dt->adult}} &nbsp;{{__('checkout.child')}}:
                                        &nbsp;{{$bk_dt->child}})
                                    </td>
                                </tr>
                                <tr class="d-flex tour-name">
                                    <td class="col-3">
                                        {{__('checkout.total_bill')}}:
                                    </td>
                                    <td class="col-9">
                                        {{getPrice($bk->total)}}
                                    </td>
                                </tr>
                                <tr class="d-flex tour-name">
                                    <td class="col-3">
                                        {{__('checkout.date_registra')}}:
                                    </td>
                                    <td class="col-9">
                                        {{\Carbon\Carbon::parse($bk->booking_date)->format('d/m/Y')}}
                                    </td>
                                </tr>
                                <tr class="d-flex tour-name">
                                    <td class="col-3">
                                        {{__('checkout.date_st')}}:
                                    </td>
                                    <td class="col-9">
                                        {{\Carbon\Carbon::parse($bk_dt->tour->date_start)->format('d/m/Y')}}
                                    </td>
                                </tr>
                                <tr class="d-flex tour-name">
                                    <td class="col-3">
                                        {{__('checkout.payments')}}:
                                    </td>
                                    <td class="col-9">
                                        {{$bk->payment == 1 ? __('checkout.ATM') : __('checkout.cash')}}
                                    </td>
                                </tr>
                                <tr class="d-flex tour-name">
                                    <td class="col-3">
                                        {{__('checkout.pay_term')}}:
                                    </td>
                                    <td class="col-9">
                                        {{(new \Carbon\Carbon($bk->booking_date))->addDays(5)->format('d-m-Y')}}
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <h4><a href="{{route('booking.show', $bk->id)}}">Xem Chi Tiết >>>>></a></h4>
        </div>
    </div>
</section>
</body>
</html>
