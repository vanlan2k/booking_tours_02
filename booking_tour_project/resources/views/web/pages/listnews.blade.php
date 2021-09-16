@extends('web.layouts.main', ['title'=>'List Tour'])
@section('content')
    <section class="parallax_window_in" data-parallax="scroll" data-image-src="img/sub_header_list_museum.jpg"
             data-natural-width="1400" data-natural-height="470">
    </section>
    <section class="wrapper">
        <div class="divider_border_gray"></div>
        <div class="container mb-2">
            <div class="row">
                @if($news->first())
                    @foreach($news as $new)
                        <div class="col-md-4 col-sm-6 wow fadeIn animated" data-wow-delay="0.2s">
                            <div class="img_wrapper">
                                <div class="img_container">
                                    <a href="/detail/{{$new->id}}">
                                        <img src="{{asset('dist/img/new.png')}}" width="350" height="200" class="img-responsive" alt="">
                                        <div class="short_info">
                                            <h3>{{$new->title}}</h3>
                                            <p class="text_review">
                                                {!! $new->content !!}
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!-- End img_wrapper -->
                        </div>
                    @endforeach
                <!-- End col -->

                    <nav class="d-flex justify-content-center">
                        {{$news->links('web.layouts.pagelist')}}
                    </nav>
                    <!-- End pagination -->
                @else
                    <h3>{{__('single.no_value')}}</h3>
                @endif
            </div>
            <!-- End row -->
        </div>
        <!-- End container -->
    </section>
@endsection
