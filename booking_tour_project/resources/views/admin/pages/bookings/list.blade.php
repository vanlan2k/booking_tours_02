@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Booking List</h3>
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
                                <tr>
                                    <td>{{++$count}}</td>
                                    <td>{{ $booking->user->name }}</td>
                                    <td>{{ $booking->booking_no }}</td>
                                    <td>{{ getDateBooking($booking->booking_date) }}</td>
                                    <td>{{ getPriceAdmin($booking->total) }}</td>
                                    <td>{!!  getStatus($booking->status) !!}</td>
                                    <td>{!!  getPayment($booking->status) !!}</td>
                                    <td>
                                        <a class="btn btn-success" href="{{ route('booking.show', $booking) }}" title="Edit"><i class="fa fa-edit"></i></a>
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

