@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">{{__('admin_cate.detail')}}</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('category.update', $category) }}">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">{{__('admin_cate.name')}}</label>
                                <input type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" name="name" id="username"
                                       placeholder="{{__('admin_cate.name_note')}}" value="{{ $category->name }}"/>
                                <div style="color: red">
                                    @error('name')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">{{__('admin_tour.save')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
