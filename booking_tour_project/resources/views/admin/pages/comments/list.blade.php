@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{__('admin_booking.list_cmt')}}</h3>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>{{__('admin_booking.id')}}</th>
                                <th>{{__('admin_booking.name')}}</th>
                                <th>{{__('admin_booking.date_cmt')}}</th>
                                <th>{{__('admin_booking.status')}}</th>
                                <th>{{__('admin_booking.action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($comments as $key => $comment)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$comment->user->id}}</td>
                                    <td>{{$comment->user->name}}</td>
                                    <td>{{getDateBooking($comment->created_at)}}</td>
                                    <td>
                                        <label class="switch">
                                            @csrf
                                            <input class="checkbox1" type="checkbox" value="{{$comment->id}}" {{$comment->status ? 'checked' : ''}}>
                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <a class="btn btn-success" href="{{ route('comment.show', $comment) }}"
                                           title="Detail"><i class="fa fa-eye"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
    {{$comments->links('admin.layouts.pagelist')}}
    <!-- /.row -->
    </div>
@endsection
@push('script')
    <script type="text/javascript" src="{{asset('dist/js/admin_comment.js')}}"></script>
@endpush
