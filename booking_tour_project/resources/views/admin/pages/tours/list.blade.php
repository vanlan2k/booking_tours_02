@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{__('admin_tour.title')}}</h3>
                    </div>
                    <div class="col-12 d-flex">
                        <div class="form-group card-body col-3">
                            <label>{{__('admin_home.filter_the')}}</label>
                            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                    id="selectbox"
                                    tabindex="-1" aria-hidden="true" name="address">
                                <option selected="selected" value="">----------{{__('admin_tour.select_category')}}
                                    ----------
                                </option>
                                @foreach($categories as $category)
                                    <option
                                        value="{{$category->id}}" {{$cate == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-5 form-group card-body">
                            <label>{{__('admin_tour.search')}}:</label>
                            <form action="{{route('tour.index')}}" method="GET" class="form-group d-flex col-12">
                                <div class="form-outline col-9">
                                    <input type="search" name="search" class="form-control"
                                           placeholder="{{__('admin_tour.search_note')}}"/>
                                </div>
                                <button type="submit" class="btn btn-primary ml-2">
                                    <i class="fas fa-search"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>{{__('admin_tour.name')}}</th>
                                <th>{{__('admin_tour.avata')}}</th>
                                <th>{{__('admin_tour.start')}}</th>
                                <th>{{__('admin_user.action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($tours as $key => $tour)
                                <tr class="row-item{{$loop->iteration}}">
                                    <td class="stt">{{$loop->iteration}}</td>
                                    <td style="width: 30%">{{$tour->name }}</td>
                                    <td><img src="{{$tour->avata }}" class="img-admin-tour"></td>
                                    <td>{{\Carbon\Carbon::parse($tour->date_start)->format('d-m-Y')}}</td>
                                    <td>
                                        <a class="btn btn-success" href="{{ route('tour.show', $tour) }}"
                                           title="Detail"><i class="fa fa-eye"></i></a>
                                        <a class="btn btn-danger " href="#"
                                           onclick="deleteTour({{$tour->id}}, '{{@csrf_token()}}', {{$loop->iteration}})"
                                           title="Delete"><i class="fa fa-trash"></i></a>
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

