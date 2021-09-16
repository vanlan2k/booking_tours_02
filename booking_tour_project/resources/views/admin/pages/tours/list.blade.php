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
                                <th>{{__('admin_tour.name')}}</th>
                                <th>{{__('admin_tour.avata')}}</th>
                                <th>{{__('admin_tour.start')}}</th>
                                <th>{{__('admin_tour.end')}}</th>
                                <th>{{__('admin_user.action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($tours as $key => $tour)
                                <tr class="row-item{{$loop->iteration}}">
                                    <td class="stt">{{$loop->iteration}}</td>
                                    <td>{{$tour->name }}</td>
                                    <td><img src="{{$tour->avata }}" class="img-admin-tour"></td>
                                    <td>{{$tour->date_start}}</td>
                                    <td>{{$tour->date_end}}</td>
                                    <td>
                                        <a class="btn btn-success" href="{{ route('tour.show', $tour) }}" title="Edit"><i class="fa fa-edit"></i></a>
                                        <a class="btn btn-danger " href="#" onclick="deleteTour({{$tour->id}}, '{{@csrf_token()}}', {{$loop->iteration}})" title="Delete"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $tours->links('admin.layouts.pagelist') }}
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
    <script type="text/javascript" src="{{asset('dist/js/admin_tour.js')}}">
    </script>
@endpush

