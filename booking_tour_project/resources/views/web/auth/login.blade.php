@extends('web.layouts.main', ['title' => 'Login Page'])
@section('content')
    <form action="/login" method="POST">
        @csrf
        <div id="signin">
            <div class="form-title"><h3>{{__('menu.singin')}}</h3></div>
            <div class="form-group text-center">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-xs-12 col-sm-4"> <a href="/redirect/facebook" class="btn btn-primary facebook"> <span>Facebook</span> <i class="fab fa-facebook-square"></i></a> </div>
                    <div class="col-lg-4 col-md-4 col-xs-12 col-sm-4"> <a href="/redirect/google" class="btn btn-danger google-plus">Google <i class="fab fa-google-plus-g"></i> </a> </div>
                    <div class="col-lg-4 col-md-4 col-xs-12 col-sm-4"> <a href="#" class="btn btn-primary google-plus">Twitter <i class="fab fa-twitter"></i> </a> </div>
                </div>
                <hr>
                <h5 class="mb-4">or</h5>
                <hr>
            </div>
            <div class="form-group">
                <label for="lastname" style="color: #ffffff">{{__('menu.email_phone')}}</label>
                <input type="email"
                       class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}"
                       name="email" value="{{ old('email') }}" placeholder="">
                <div style="color: red">
                    @error('email')
                    {{$message}}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="lastname" style="color: #ffffff">{{__('menu.password')}}</label>
                <input type="password"
                       class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}"
                       name="password" value="{{ old('password') }}" placeholder="">
                <div style="color: red">
                    @error('password')
                    {{$message}}
                    @enderror
                </div>
            </div>
            <a href="" class="forgot-pw">{{__('menu.forgot_pass')}}</a>
            <button class="login">{{__('menu.singin')}}</button>
        </div>
    </form>
@endsection
@push('script')
    <script type="text/javascript">
        $(document).ready(function () {
            @if ($errors->any())
            @foreach ($errors->all() as $error)
            toastr.error('{{$error}}', 'Đăng nhập thất bại', {timeOut: 5000});
            @endforeach
            @endif
        });
    </script>
@endpush
