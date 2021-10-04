@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-secondary">
                    <form action="{{route('user.update', $user->id)}}" method="POST" class="ml-4">
                        @method('PUT')
                        @csrf
                        <div class="col-12 d-flex justify-content-center text-center">
                            <div class="col-sm-3">
                                <div class="text-center">
                                    <img src="{{getAvata()}}"
                                         class="avatar img-circle img-thumbnail" id="holder"
                                         alt="avatar">
                                    <div class="input-group">
                                        <a id="lfm" data-input="thumbnail" data-preview="holder"
                                           class="btn btn-primary">
                                            <i class="fa fa-picture-o"></i> {{__('admin_user.chosse')}}
                                        </a>
                                        <input id="thumbnail" class="form-control" type="text" name="avata">
                                    </div>
                                </div>
                            </div>
                            </hr>
                        </div>
                        <div class="col-sm-9">
                            <div class="tab-content">
                                <div class="tab-pane active" id="home">
                                    <hr>
                                    <div class="form-group">

                                        <div class="col-xs-6">
                                            <label for="first_name"><h4>{{__('register.full_name')}}</h4></label>
                                            <input type="text" class="form-control" name="name" id="first_name"
                                                   value="{{$user->name}}"
                                                   placeholder="{{__('register.full_name_note')}}">
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <div class="col-xs-6">
                                            <label for="phone"><h4>{{__('register.phone')}}</h4></label>
                                            <input type="text" class="form-control" name="phone"
                                                   value="{{$user->phone}}"
                                                   placeholder="{{__('register.phone_note')}}"
                                                   title="enter your phone number if any.">
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <div class="col-xs-6">
                                            <label for="email"><h4>Email</h4></label>
                                            <input type="email" class="form-control" name="email" id="email"
                                                   value="{{$user->email}}"
                                                   placeholder="you@email.com" title="enter your email.">
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <div class="col-xs-6">
                                            <label for="password"><h4>{{__('register.pass')}}</h4></label>
                                            <input type="password" class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}" name="password" id="password"
                                                   placeholder="{{__('register.pass_note')}}"
                                                   title="enter your password.">
                                        </div>
                                        <div style="color: red">
                                            @error('password')
                                            {{$message}}
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <div class="col-xs-6">
                                            <label><h4>{{__('register.pass_confirm')}}</h4></label>
                                            <input type="password" class="form-control {{$errors->has('password_confirmation') ? 'is-invalid' : ''}}" name="password_confirmation"
                                                   placeholder="{{__('register.pass_confirm')}}">
                                        </div>
                                        <div style="color: red">
                                            @error('password_confirmation')
                                            {{$message}}
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="role">{{__('admin_user.role')}}</label>
                                        <select class="custom-select" name="role_id">
                                            @foreach($roles as $role)
                                                <option
                                                    value="{{$role->id}}" {{$user->role_id == $role->id ? 'selected' : ''}}>{{$role->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <br>
                                            <button class="btn btn-lg btn-success" type="submit"><i
                                                    class="glyphicon glyphicon-ok-sign"></i>{{__('admin_user.save')}}
                                            </button>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div><!--/tab-pane-->
                        </div><!--/tab-content-->
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script type="text/javascript" src="{{asset('dist/js/file_manager.js')}}">
    </script>
@endpush
