@extends('web.layouts.main', ['title'=>'Đơn Đặt'])
@section('content')
    <section class="parallax_window_in" data-parallax="scroll" data-image-src="{{asset('dist/img/tour_list_1.jpg')}}"
             data-natural-width="1400" data-natural-height="470">
    </section>
    <!-- End section -->
    <!-- End SubHeader ============================================ -->

    <section class="wrapper">


        <div class="container mb-2">
            <div class="row">
                @if($bookings->first())
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">{{__('review_user.list_booking')}}</h3>
                            </div>
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>{{__('review_user.tour')}}</th>
                                        <th>{{__('review_user.date_booking')}}</th>
                                        <th>{{__('review_user.date_start')}}</th>
                                        <th>{{__('review_user.child')}}</th>
                                        <th>{{__('review_user.adult')}}</th>
                                        <th>{{__('review_user.total')}}</th>
                                        <th>{{__('review_user.action')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($bookings  as $booking)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td style="width: 30%">
                                                <a href="/tour/{{($booking->booking_detail)[0]->tour->id}}">{{($booking->booking_detail)[0]->tour->name}}</a>
                                            </td>
                                            <td>{{getDateBooking($booking->booking_date)}}</td>
                                            <td>{{getDateBooking(($booking->booking_detail)[0]->tour->date_start)}}</td>
                                            <td>{{($booking->booking_detail)[0]->child}}</td>
                                            <td>{{($booking->booking_detail)[0]->adult}}</td>
                                            <td>{{getPrice($booking->total)}}</td>
                                            <td><span class="btn btn-danger" style="padding: 0 5px;font-size: 13px;" onclick="cancelBooking({{$booking->id}})"><i
                                                        class="fa-solid fa-rectangle-xmark"></i>&nbsp;Hủy</span></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <nav class="d-flex justify-content-center">
                                    {{$bookings->links('web.layouts.pagelist')}}
                                </nav>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                @else
                    <h3>{{__('review_user.booking_no_value')}}</h3>
                @endif
            </div>
            <!-- End row -->
        </div>
        <!-- End container -->
    </section>
@endsection
@push('script')
    <script type="text/javascript">
        function cancelBooking(id) {
            swal({
                title: "Xác nhận",
                text: "Sau khi hủy, bạn sẽ không thể khôi phục tour du lịch này!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: '/your-booking/cancel/' + id,
                        method: 'GET',
                        success: function (result) {
                            if (!result.error) {
                                swal("Thành công!", "Hủy đặt tour thành công!","success")
                                    .then((value) => {
                                        location.reload()
                                    });
                                return;
                            }
                            swal("Lỗi!", "Đã xảy ra lỗi, vui lòng liên hệ quản trị viên!","error");
                        }
                    })
                } else {
                    swal("Đã Hủy!", "", "success");
                }
            })
        }
    </script>
@endpush
