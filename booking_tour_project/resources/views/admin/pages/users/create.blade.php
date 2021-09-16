@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">{{__('register.title_user')}}</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('user.store') }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">{{__('register.full_name')}}</label>
                                <input type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" name="name" id="username"
                                       placeholder="{{__('register.full_name_note')}}" value="{{ old('name') }}"/>
                                <div style="color: red">
                                    @error('name')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" name="email" id="email"
                                       placeholder="{{__('register.email_note')}}" value="{{ old('email') }}"/>
                                <div style="color: red">
                                    @error('email')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone">{{__('register.phone')}}</label>
                                <input type="text" class="form-control {{$errors->has('phone') ? 'is-invalid' : ''}}" name="phone" id="phone"
                                       placeholder="{{__('register.phone_note')}}" value="{{ old('phone') }}"/>
                                <div style="color: red">
                                    @error('phone')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password">{{__('register.pass')}}</label>
                                <input type="password" class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}" name="password" id="password"
                                       placeholder="{{__('register.pass_note')}}"/>
                                <div style="color: red">
                                    @error('password')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="checkpassword">{{__('register.pass_confirm')}}</label>
                                <input type="password" class="form-control {{$errors->has('password_confirmation') ? 'is-invalid' : ''}}" name="password_confirmation"
                                       id="checkpassword"
                                       placeholder="{{__('register.pass_confirm')}}"/>
                                <div style="color: red">
                                    @error('password_confirmation')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="role">Role</label>
                                <select class="custom-select" name="role_id">
                                    @foreach($roles as $role)
                                        <option
                                            value="{{$role->id}}">{{$role->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
