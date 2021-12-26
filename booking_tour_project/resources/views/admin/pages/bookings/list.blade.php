@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="col-12">
                        <div class="col-8 mt-2 d-flex">
                            <label class="ml-2 mt-2">{{__('admin_tour.search')}}:</label>
                            <form action="{{route('booking.index')}}" method="GET" class="form-group d-flex col-10">
                                <div class="form-outline col-9">
                                    <input type="search" name="search" class="form-control" placeholder="{{__('admin_booking.search_note')}}"/>
                                </div>
                                <button type="submit" class="btn btn-primary ml-2">
                                    <i class="fas fa-search"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>{{__('admin_booking.name')}}</th>
                                <th>{{__('admin_booking.code')}}</th>
                                <th>{{__('admin_booking.date_bk')}}</th>
                                <th>{{__('admin_booking.total_b')}}</th>
                                <th>{{__('admin_booking.stt')}}</th>
                                <th>{{__('admin_booking.method')}}</th>
                                <th>{{__('admin_booking.action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $count = 0;
                            @endphp
                            @foreach ($bookings as $key => $booking)
                                <tr class="row-item{{$loop->iteration}}">
                                    <td class="stt">{{$loop->iteration}}</td>
                                    <td>{{ $booking->user->name }}</td>
                                    <td>{{ $booking->booking_no }}</td>
                                    <td>{{ getDateBooking($booking->booking_date) }}</td>
                                    <td>{{ getPriceAdmin($booking->total) }}</td>
                                    <td>{!!  getStatus($booking->status) !!}</td>
                                    <td>{!!  getPayment($booking->payment) !!}</td>
                                    <td>
                                        <a class="btn btn-success" href="{{ route('booking.show', $booking) }}" title="Detail"><i class="fas fa-eye"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $bookings->links('admin.layouts.pagelist') }}
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
@endsection
@push('script')
    <script type="text/javascript" src="{{asset('dist/js/sweetalert.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('dist/js/admin_user_list.js')}}">
    </script>
@endpush

