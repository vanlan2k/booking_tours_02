@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">{{__('admin_cate.create')}}</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('category.store') }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">{{__('admin_cate.name')}}</label>
                                <input type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}"
                                       name="name" id="username"
                                       placeholder="{{__('admin_cate.name_note')}}" value="{{ old('name') }}"/>
                                <div style="color: red">
                                    @error('name')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="category">{{__('admin_cate.category')}}</label>
                                <select class="custom-select" name="parent_id">
                                    <option value="0">{{__('admin_cate.null')}}</option>
                                    {{showCategories($categories)}}
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">{{__('single.submit')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
