@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>{{__('admin_news.admin_post')}}</th>
                                <th>{{__('admin_news.title')}}</th>
                                <th>{{__('admin_news.date_post')}}</th>
                                <th>{{__('admin_news.content')}}</th>
                                <th>{{__('admin_news.action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($news as $new)
                                <tr class="row-item{{$loop->iteration}}">
                                    <td class="stt">{{$loop->iteration}}</td>
                                    <td>{{$new->user->name }}</td>
                                    <td>{{$new->title}}</td>
                                    <td>{{getDateBooking($new->created_at)}}</td>
                                    <td><div class="text_review">{!! $new->content !!}</div></td>
                                    <td>
                                        <a class="btn btn-success" href="{{ route('news.show', $new) }}" title="Detail"><i class="fa fa-eye"></i></a>
                                        <a class="btn btn-danger " href="#" onclick="deleteTour({{$new->id}}, '{{@csrf_token()}}', {{$loop->iteration}})" title="Delete"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $news->links('admin.layouts.pagelist') }}
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
    <script type="text/javascript" src="{{asset('dist/js/admin_news.js')}}">
    </script>
@endpush

