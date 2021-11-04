@extends('admin.layouts.main')
@section('content')
    <section class="content mt-2">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$number_booking}}</h3>

                            <p>{{__('admin_home.new_booking')}}</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-shopping-bag"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{getPrice($revenue)}}</sup></h3>

                            <p>{{__('admin_home.revenue')}}</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-signal"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{$register}}</h3>

                            <p>{{__('admin_home.user_register')}}</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-12 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-header row d-flex">
                            <div class="col-4">
                                @csrf
                                <label class="col-12">{{__('admin_home.date_from')}}</label>
                                <input type="date" id="dateFrom" class="p-2 form-row form-control col-8">
                                <button type="submit" id="btn_sort" class="btn btn-success mt-2">{{__('admin_home.filter_result')}}</button>
                            </div>
                            <div class="col-4">
                                <label class="col-12">{{__('admin_home.date_to')}}</label>
                                <input type="date" id="dateTo" class="p-2 form-row form-control col-8">
                                <a href="/admin/export-excel" class="btn btn-success mt-2">{{__('admin_home.export')}}</a>
                            </div>
                            <div class="col-4">
                                <label class="col-12">{{__('admin_home.filter_the')}}</label>
                                <select class="p-2 form-row form-control col-8" id="selectSort">
                                    <option value="">----------Select----------</option>
                                    <option value="day">{{__('admin_home.sub7day')}}</option>
                                    <option value="lastmonth">{{__('admin_home.last_month')}}</option>
                                    <option value="thismonth">{{__('admin_home.this_month')}}</option>
                                    <option value="month">{{__('admin_home.sub12month')}}</option>
                                </select>
                            </div>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content p-0">
                                <!-- Morris chart - Sales -->
                                <div class="chart tab-pane active" id="revenue-chart"
                                     style="position: relative; height: 500px;">
                                    <canvas id="revenue-chart-canvas" height="300" style="height: 500px;"></canvas>
                                </div>
                            </div>
                        </div><!-- /.card-body -->
                    </div>
                </section>
            </div>
        </div>
    </section>
@endsection
@push('script')
    <script src="{{asset('dist/js/pages/dashboard.js')}}"></script>
@endpush
