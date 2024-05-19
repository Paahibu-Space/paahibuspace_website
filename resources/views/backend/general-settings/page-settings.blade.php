@extends('backend.admin-master')
@section('site-title')
    {{__('Page Settings')}}
@endsection
@section('style')
    <link rel="stylesheet" href="{{asset('assets/backend/css/bootstrap-tagsinput.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/dropzone.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/media-uploader.css')}}">
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="col-lg-12">
                    <x-flash-msg />
                    <x-error-msg />
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__("Page Name & Slug Settings")}}</h4>
                      <x-error-msg/>
                        <form action="{{route('admin.general.page.settings')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    @php
                                        $pages_list = ['about', 'stories', 'team', 'volunteers', 'programs', 'services', 'blog', 'work'];
                                    @endphp
                                    @foreach($pages_list as $page)
                                        <div class="from-group">
                                            <label for="{{$page}}_page_slug">{{__(ucfirst(str_replace('_',' ',$page)))}} {{__('Page Slug')}}</label>
                                            <input type="text" class="form-control" value="{{get_static_option($page.'_page_slug',\Illuminate\Support\Str::slug($page))}}" name="{{$page}}_page_slug" placeholder="{{__('Slug')}}" >
                                            <small>{{__('slug example:')}} {{$page}}</small>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-lg-6">
                                    <div class="tab-content margin-top-30" id="nav-tabContent">
                                            <div class="tab-pane fade show active" id="nav-home-en" role="tabpanel" aria-labelledby="nav-home-tab">
                                                <div class="accordion-wrapper">
                                                    <div id="accordion-en">
                                                        @foreach($pages_list as $page)
                                                        <div class="card">
                                                            <div class="card-header" id="{{$page}}_page">
                                                                <h5 class="mb-0">
                                                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#{{$page}}_page_content" aria-expanded="true" >
                                                                        <span class="page-title">@if(!empty(get_static_option($page.'_page_name'))) {{get_static_option($page.'_page_name')}} @else {{__(ucfirst(str_replace('_',' ',$page)))}}  @endif</span>
                                                                    </button>
                                                                </h5>
                                                            </div>
                                                            <div id="{{$page}}_page_content" class="collapse"  data-parent="#accordion-en">
                                                                <div class="card-body">
                                                                    <div class="from-group">
                                                                        <label for="{{$page}}_page_name">{{__('Name')}}</label>
                                                                        <input type="text" class="form-control" name="{{$page}}_page_name" value="{{get_static_option($page.'_page_name')}}"  placeholder="{{__('Name')}}" >
                                                                    </div>
                                                                    <div class="form-group margin-top-20">
                                                                        <label for="{{$page}}_page_meta_tags">{{__('Meta Tags')}}</label>
                                                                        <input type="text" name="{{$page}}_page_meta_tags"  class="form-control" data-role="tagsinput" value="{{get_static_option($page.'_page_meta_tags')}}" >
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="about_page_meta_description">{{__('Meta Description')}}</label>
                                                                        <textarea name="{{$page}}_page_meta_description"  class="form-control" rows="5" >{{get_static_option($page.'_page_meta_description')}}</textarea>
                                                                    </div>
                                                                    <x-media-upload :title="__('Og Meta Image')" :name="$page.'_page_meta_image'" :dimentions="'1200x1200'"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Update Changes')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('backend.partials.media-upload.media-upload-markup')
@endsection


@section('script')
    <script src="{{asset('assets/backend/js/bootstrap-tagsinput.js')}}"></script>
    <script>
        (function (){
            "use strict";

            <x-btn.update/>
            $(document).ready(function (e) {
                $('.page-name').bind('change paste keyup',function (e) {
                    $(this).parent().parent().parent().prev().find('.page-title').text($(this).val());
                })
            })

        })(jQuery);
    </script>
    <script src="{{asset('assets/backend/js/dropzone.js')}}"></script>
    @include('backend.partials.media-upload.media-js')
@endsection
