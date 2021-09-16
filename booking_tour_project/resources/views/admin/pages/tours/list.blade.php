@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tour List</h3>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Tour name</th>
                                <th>Avata</th>
                                <th>Date Start</th>
                                <th>Date End</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $count = 0;
                            @endphp
                            @foreach ($tours as $key => $tour)
                                <tr>
                                    <td>{{++$count}}</td>
                                    <td>{{$tour->name }}</td>
                                    <td><img src="{{$tour->avata }}" class="img-admin-tour"></td>
                                    <td>{{$tour->date_start}}</td>
                                    <td>{{$tour->date_end}}</td>
                                    <td>
                                        <a class="btn btn-success" href="{{ route('tour.show', $tour) }}" title="Edit"><i class="fa fa-edit"></i></a>
                                        <a class="btn btn-danger " href="#" onclick="deleteTour({{$tour->id}}, '{{@csrf_token()}}')" title="Delete"><i class="fa fa-trash"></i></a>
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

