@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Booking #{{ $booking->id }}</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('booking.update', $booking)}}" method="POST">
                            @csrf
                            @method("PUT")
                            <table class="col-12">
                                <tr>
                                    <th class="col-3">{{__('admin_booking.name')}}:</th>
                                    <td>{{$booking->user->name}}</td>
                                </tr>
                                <tr>
                                    <th class="col-3">Email:</th>
                                    <td>{{$booking->user->email}}</td>
                                </tr>
                                <tr>
                                    <th class="col-3">{{__('admin_booking.date_bk')}}:</th>
                                    <td>{{getDateBooking($booking->booing_date)}}</td>
                                </tr>
                                <tr>
                                    <th class="col-3">{{__('admin_booking.stt')}}:</th>
                                    <td>
                                        @if($booking->payment == 2)
                                            <span class="badge badge-danger" style="font-size: 14px; padding: 6px;">Đã hủy</span>
                                        @else
                                            <select class="form-control col-2" name="status">
                                                @foreach(\App\Models\Booking::$status as $key => $stt)
                                                    <option
                                                        value="{{$key}}" {{$booking->status == $key ? 'selected':''}}>{{$stt}}</option>
                                                @endforeach
                                            </select>
                                        @endif
                                        <a href="#" id="status" data-type="select" data-pk="{{$booking->id}}"
                                           data-title="Select status"></a>
                                    </td>
                                </tr>
                            </table>
                            <table id="example2" class="table table-bordered table-hover mt-4">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>{{__('admin_booking.ticker')}}</th>
                                    <th>{{__('admin_booking.price')}}</th>
                                    <th>{{__('admin_booking.qty')}}</th>
                                    <th>{{__('admin_booking.total')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td>{{__('admin_booking.adult')}}</td>
                                    <td>{{getPriceAdmin($booking->booking_detail[0]->tour->priceAdult)}}</td>
                                    <td>{{$booking->booking_detail[0]->adult}}</td>
                                    <td>{{getPriceAdmin($booking->booking_detail[0]->adult * $booking->booking_detail[0]->tour->priceAdult)}}</td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>{{__('admin_booking.child')}}</td>
                                    <td>{{getPriceAdmin($booking->booking_detail[0]->tour->priceChild)}}</td>
                                    <td>{{$booking->booking_detail[0]->child}}</td>
                                    <td>{{getPriceAdmin($booking->booking_detail[0]->child * $booking->booking_detail[0]->tour->priceChild)}}</td>
                                </tr>
                                </tbody>
                                <tr>
                                    <th colspan="4">{{__('admin_booking.total_b')}}:</th>
                                    <td id="total_bill"
                                        data-total="{{ $booking->total }}">{{getPriceAdmin($booking->total)}} VNĐ
                                    </td>
                                </tr>
                            </table>
                            <div class="d-flex justify-content-between">
                                <div>
                                    <a class="btn btn-default"
                                       href="{{ route('booking.index') }}">{{__('admin_booking.back')}}</a>
                                </div>
                                @if($booking->payment != 2)
                                    <button type="submit" class="btn btn-primary">{{__('admin_booking.save')}}</button>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
