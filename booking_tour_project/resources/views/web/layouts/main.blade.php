<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="BESTOURS - Travel and Tours multipurpose template">
    <meta name="author" content="Ansonika">
    <title>BESTOURS | {{$title}}</title>
    @include('web.layouts.header-libs')
</head>
<body class="tg-home tg-homevone">
@include('web.layouts.Elements.menu')
{{--Main Start--}}
@yield('content')
{{--Main End--}}
{{--Footer Start--}}
@include('web.layouts.Elements.footer')
@include('web.layouts.footer-libs')
@stack('script')
</body>
</html>
