@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Product List</h3>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Category Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $count = 0;
                            @endphp
                            @foreach ($categories as $key => $category)
                                <tr>
                                    <td>{{++$count}}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <a class="btn btn-success" href="{{ route('category.show', $category) }}"
                                           title="Edit"><i class="fa fa-edit"></i></a>
                                        <a class="btn btn-danger" href="#" onclick="deleteCategory({{$category->id}}, '{{@csrf_token()}}')"
                                           title="Delete"><i class="fas fa-trash-alt"></i></a>
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
    {{$categories->links('admin.layouts.pagelist')}}
    <!-- /.row -->
    </div>
@endsection
@push('script')
    <script type="text/javascript" src="{{asset('dist/js/sweetalert.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('dist/js/admin_category.js')}}"></script>
@endpush
