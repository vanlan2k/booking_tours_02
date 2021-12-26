@extends('web.layouts.main', ['title' => 'Đăng Kí Tài Khoản'])
@section('content')
    <section class="design-process-section wrapper" id="process-tab">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="cus-num text-center" style="color: red">{{__('register.create')}}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="GET" action="{{route('register.create')}}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">{{__('register.full_name')}}</label>
                                    <input type="text" class="form-control" name="name" id="username"
                                           placeholder="{{__('register.full_name_note')}}" value="{{ old('name') }}"/>
                                    <div style="color: red">
                                        @error('name')
                                        {{$message}}
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                           placeholder="{{__('register.email_note')}}" value="{{ old('email') }}"/>
                                    <div style="color: red">
                                        @error('email')
                                        {{$message}}
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="phone">{{__('register.phone')}}</label>
                                    <input type="text" class="form-control" name="phone" id="phone"
                                           placeholder="{{__('register.phone_note')}}" value="{{ old('phone') }}"/>
                                    <div style="color: red">
                                        @error('phone')
                                        {{$message}}
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password">{{__('register.pass')}}</label>
                                    <input type="password" class="form-control" name="password" id="password"
                                           placeholder="{{__('register.pass_note')}}"/>
                                    <div style="color: red">
                                        @error('password')
                                        {{$message}}
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="checkpassword">{{__('register.pass_confirm')}}</label>
                                    <input type="password" class="form-control" name="password_confirmation" id="checkpassword"
                                           placeholder="{{__('register.pass_confirm')}}"/>
                                    <div style="color: red">
                                        @error('password_confirmation')
                                        {{$message}}
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="gender">{{__('register.gender')}}</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio1"
                                                   value="1" checked>
                                            <label class="form-check-label" for="gender">{{__('register.male')}}</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio2"
                                                   value="0">
                                            <label class="form-check-label" for="inlineRadio2">{{__('register.female')}}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-primary">{{__('register.submit')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
