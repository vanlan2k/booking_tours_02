@extends('web.layouts.main', ['title'=>'Đánh Giá CỦa Bạn'])
@section('content')
    <section class="parallax_window_in" data-parallax="scroll" data-image-src="{{asset('dist/img/tour_list_2.jpg')}}"
             data-natural-width="1400" data-natural-height="470">
    </section>
    <!-- End section -->
    <!-- End SubHeader ============================================ -->

    <section class="wrapper">


        <div class="container mb-2">
            <div class="row">
                @if($reviews->first())
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">{{__('review_user.list_cmt')}}</h3>
                            </div>
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>{{__('review_user.tour')}}</th>
                                        <th>{{__('review_user.date_cmt')}}</th>
                                        <th>{{__('review_user.content')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($reviews  as $review)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td><a href="/tour/{{$review->tour->id}}">{{$review->tour->name}}</a></td>
                                            <td>{{getDateBooking($review->created_at)}}</td>
                                            <td><p class="text_review">{{$review->comment}}</p></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                @else
                    <h3>{{__('review_user.no_value')}}</h3>
                @endif
            </div>
            <!-- End row -->
        </div>
        <!-- End container -->
    </section>
@endsection
