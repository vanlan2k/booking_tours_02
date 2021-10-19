@extends('web.layouts.main', ['title' => 'News Page'])
@section('content')
    <section class="design-process-section wrapper" id="process-tab">
        <div class="container bootstrap snippet pb-5">
        <hr>
            <div class="row"><h3>{{$new->title}}</h3></div>
            <hr>
            <div class="row">
             {!! $new->content !!}
            </div>
            <div class="row">
                <em class="col-12">{{__('news.author')}} {{$new->user->name}}</em>
                <em class="col-12">{{__('news.publication_date')}} {{getDateBooking($new->created_at)}}</em>
            </div>
        </div>
    </section>
@endsection
