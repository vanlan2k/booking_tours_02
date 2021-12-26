@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">{{__('admin_tour.detail')}}</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('tour.update', $tour) }}">
                        @csrf
                        @method('PATCH')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">{{__('admin_tour.name')}}</label>
                                <input type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}"
                                       name="name"
                                       placeholder="{{__('admin_tour.name_note')}}" value="{{ $tour->name }}"/>
                                <div style="color: red">
                                    @error('name')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="category">{{__('admin_tour.category')}}</label>
                                <select class="custom-select" name="cate_id">
                                    @foreach($categories as $category)
                                        <option
                                            value="{{$category->id}}" {{$category->id == $tour->cate_id ? 'selected' : ''}}>{{$category->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">{{__('admin_tour.avata')}}</label>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                     <a data-input="thumbnail_avata" id="lfm_avata" data-preview="avata"
                                        class="btn btn-primary">
                                       <i class="fa fa-picture-o"></i> {{__('admin_user.chosse')}}
                                     </a>
                                    </span>
                                    <input id="thumbnail_avata"
                                           class="form-control {{$errors->has('avata') ? 'is-invalid' :''}}"
                                           type="text" name="avata" value="{{$tour->avata}}">
                                </div>
                                <img id="avata" style="margin-top:15px;max-height:100px;" src="{{$tour->avata}}">
                                <div style="color: red">
                                    @error('avata')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group" id="add-item">
                                <label>{{__('admin_tour.description')}}</label>
                                <textarea id="my-editor" name="description"
                                          class="form-control {{$errors->has('description') ? 'is-invalid' : ''}}">{{ $tour->description }}</textarea>
                                <div style="color: red">
                                    @error('description')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name">{{__('admin_tour.start')}}</label>
                                <input type="text" name="date_start" class="form-control dateformat" value="{{\Carbon\Carbon::parse($tour->date_start)->format('d-m-Y')}}" autocomplete="off" placeholder="dd/mm/yyyy">
                                <div style="color: red">
                                    @error('date_start')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <div class="ml-3">
                                    <div class="">
                                        <label>{{__('admin_tour.adult')}}</label>
                                        <input type="text" name="priceAdult" placeholder="{{__('admin_tour.adult_note')}}"
                                               value="{{$tour->priceAdult}}"
                                               class="form-control {{$errors->has('adult') ? 'is-invalid' :''}}">
                                        <div style="color: red">
                                            @error('priceAdult')
                                            {{$message}}
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="">
                                        <label>{{__('admin_tour.child')}}</label>
                                        <input type="number" name="priceChild" placeholder="{{__('admin_tour.child_note')}}"
                                               value="{{$tour->priceChild}}"
                                               class="form-control {{$errors->has('child') ? 'is-invalid' :''}}">
                                        <div style="color: red">
                                            @error('priceChild')
                                            {{$message}}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name">{{__('admin_tour.tags')}}</label>
                                <input type="text" data-role="tagsinput"
                                       class="form-control {{$errors->has('tags') ? 'is-invalid' : ''}}"
                                       name="tags" value="{{$tour->tags}}"/>
                                <div style="color: red">
                                    @error('tags')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name">{{__('admin_tour.list_img')}}</label>
                                <div class="ml-3" id="add_img">
                                    @if($tour->image)
                                        @foreach($tour->image as $key => $img)
                                            <div class="list_img">
                                                <label>{{__('admin_tour.img')}} #{{++$key}}</label>
                                                <div class="input-group">
                                            <span class="input-group-btn">
                                             <a data-input="thumbnail{{$key}}" id="lfm{{$key}}"
                                                data-preview="holder{{$key}}"
                                                class="btn btn-primary">
                                               <i class="fa fa-picture-o"></i> {{__('admin_user.chosse')}}
                                             </a>
                                            </span>
                                                    <input id="thumbnail{{$key}}"
                                                           class="form-control {{$errors->has('avata') ? 'is-invalid' :''}}"
                                                           type="text" name="image[]" value="{{$img->url}}">
                                                    <div class="form-group col-md-2 d-flex align-items-end add-button">
                                                        <button type="button" onclick="clickAddImg()"
                                                                class="btn btn-success btn-outline js-addSize">
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <img id="holder{{$key}}" style="margin-top:15px;max-height:100px;"
                                                     src="{{$img->url}}">
                                                <div style="color: red">
                                                    @error('image.*')
                                                    {{$message}}
                                                    @enderror
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="form-group col-md-2 d-flex align-items-end add-button">
                                            <button type="button" onclick="clickAddImg()"
                                                    class="btn btn-success btn-outline js-addSize">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group" id="add_item">
                                <label>{{__('admin_tour.program')}}</label>
                                @foreach($tour->tour_route as $key => $route)
                                    <div class="ml-3 program">
                                        <label>{{__('admin_tour.pro_number')}}{{++$key}}</label>
                                        <input type="text" name="title[]"
                                               class="form-control mb-3 {{$errors->has('title.*') ? 'is-invalid' :''}}"
                                               value="{{$route->name}}">
                                        <div style="color: red">
                                            @error('title.*')
                                            {{$message}}
                                            @enderror
                                        </div>
                                        <textarea id="my-editor{{$key}}" name="program[]"
                                                  class="form-control tour_route {{$errors->has('program.*') ? 'is-invalid' :''}}"
                                                  placeholder="Enter title program">{{$route->description}}</textarea>
                                        <div style="color: red">
                                            @error('program.*')
                                            {{$message}}
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-3 mt-3 d-flex align-items-end add-button">
                                            <div onclick="clickAddElementFunction()"
                                                 class="btn btn-success btn-outline js-addSize"
                                                 style="display: block;height: 40px;">{{__('admin_tour.add_cl')}}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">{{__('admin_tour.save')}}</button>
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
    <script type="text/javascript" src="{{asset('dist/js/admin_tour.js')}}"></script>
    <script type="text/javascript" src="{{asset('dist/js/file_manager.js')}}"></script>
    <script type="text/javascript" src="{{asset('dist/js/CKEditer_view.js')}}"></script>
@endpush
