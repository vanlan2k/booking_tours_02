@extends('web.layouts.main', ['title' => 'Login Page'])
@section('content')
    <form action="/login" method="POST">
        @csrf
        <div id="signin">
            <div class="form-title"><h3>{{__('menu.singin')}}</h3></div>
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
