@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Danh sách người dùng</h3>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>{{__('register.full_name')}}</th>
                                <th>Email</th>
                                <th>{{__('register.phone')}}</th>
                                <th>{{__('admin_user.role')}}</th>
                                <th>{{__('admin_user.action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                                <tr class="row-item{{$loop->iteration}}">
                                    <td class="stt">{{$loop->iteration}}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->roles->name}}</td>
                                    <td>
                                        <a class="btn btn-success" href="{{ route('user.show', $user) }}" title="Detail"><i class="fa fa-eye"></i></a>
                                        <a class="btn btn-danger {{$loop->iteration}}" href="#" onclick="deleteUser({{$user->id}}, '{{csrf_token()}}', {{$loop->iteration}})" title="Delete"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $users->links('admin.layouts.pagelist') }}
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

