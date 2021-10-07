@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Comment #{{ $comment->id }}</h3>
                    </div>
                    <div class="card-body">
                        <table class="col-12">
                            <tr>
                                <th class="col-3">{{__('admin_booking.name')}}:</th>
                                <td>{{$comment->user->name}}</td>
                            </tr>
                            <tr>
                                <th class="col-3">Email:</th>
                                <td>{{$comment->user->email}}</td>
                            </tr>
                            <tr>
                                <th class="col-3">{{__('admin_booking.date_cmt')}}:</th>
                                <td>{{getDateBooking($comment->booing_date)}}</td>
                            </tr>
                            <tr>
                                <th class="col-3">{{__('admin_booking.cmt')}}:</th>
                                <td>
                                    <textarea class="form-control" rows="3">{{$comment->comment}}</textarea>
                                </td>
                            </tr>
                        </table>
                        <div class="d-flex justify-content-between">
                            <div>
                                <a class="btn btn-default" href="{{ route('booking.index') }}">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
