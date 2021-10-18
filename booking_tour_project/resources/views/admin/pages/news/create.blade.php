@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">{{__('admin_news.create_title')}}</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('news.store') }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">{{__('admin_news.title')}}</label>
                                <input type="text" class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}"
                                       name="title"
                                       placeholder="{{__('admin_news.title_note')}}" value="{{ old('title') }}"/>
                                <div style="color: red">
                                    @error('title')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group" id="add-item">
                                <label>{{__('admin_news.content')}}</label>
                                <textarea id="my-editor" name="content"
                                          class="form-control {{$errors->has('content') ? 'is-invalid' : ''}}"></textarea>
                                <div style="color: red">
                                    @error('content  ')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">{{__('single.submit')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <script type="text/javascript" src="{{asset('dist/js/admin_news.js')}}"></script></script>
@endpush
