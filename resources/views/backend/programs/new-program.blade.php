@extends('backend.admin-master')
@section('site-title')
    {{__('New Programs Post')}}
@endsection
@section('style')
    <link rel="stylesheet" href="{{asset('assets/backend/css/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/dropzone.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/media-uploader.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/bootstrap-tagsinput.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/bootstrap-datepicker.min.css')}}">
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
               <x-error-msg/>
                <x-flash-msg/>
            </div>
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="header-wrap d-flex justify-content-between">
                            <h4 class="header-title">{{__('Add New Program Post')}}</h4>
                            <a href="{{route('admin.programs.all')}}" class="btn btn-primary">{{__('All Programs')}}</a>
                        </div>

                        <form action="{{route('admin.programs.new')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="title">{{__('Title')}}</label>
                                        <input type="text" class="form-control"  id="title" name="title" value="{{old('title')}}" placeholder="{{__('Title')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="slug">{{__('Slug')}}</label>
                                        <input type="text" class="form-control"  id="slug" name="slug" value="{{old('slug')}}" placeholder="{{__('slug')}}">
                                    </div>
                                    <div class="form-group">
                                        <label>{{__('Content')}}</label>
                                        <input type="hidden" name="program_content" >
                                        <div class="summernote"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="date">{{__('Date')}}</label>
                                        <input type="date" class="form-control datepicker"  id="date" name="date" placeholder="{{__('Date')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="time">{{__('Time')}}</label>
                                        <input type="text" class="form-control"  id="time" name="time" placeholder="{{__('time')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="cost">{{__('Cost')}}</label>
                                        <input type="text" class="form-control"  id="cost" name="cost" placeholder="{{__('cost')}}">
                                        <span class="info-text">{{__('enter zero (0) to make this program free of cost')}}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="available_registrations">{{__('Available Registrations')}}</label>
                                        <input type="text" class="form-control"  id="available_registrations" name="available_registrations" placeholder="{{__('available registrations')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="venue">{{__('Venue')}}</label>
                                        <input type="text" class="form-control"  id="venue" name="venue" value="{{old('venue')}}" placeholder="{{__('Program Venue')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="venue_location">{{__('Venue Location')}}</label>
                                        <input type="text" class="form-control"  id="venue_location" name="venue_location" value="{{old('venue_location')}}" placeholder="{{__('Venue Location')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_tags">{{__('Meta Tags')}}</label>
                                        <input type="text" name="meta_tags"  class="form-control" data-role="tagsinput" id="meta_tags">
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_description">{{__('Meta Description')}}</label>
                                        <textarea name="meta_description"  class="form-control" rows="5" id="meta_description"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">{{__('Image')}}</label>
                                        <div class="media-upload-btn-wrapper">
                                            <div class="img-wrap"></div>
                                            <input type="hidden" name="image">
                                            <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="{{__('Select Program Image')}}" data-modaltitle="{{__('Upload Program Image')}}" data-toggle="modal" data-target="#media_upload_modal">
                                                {{__('Upload Image')}}
                                            </button>
                                        </div>
                                        <small>{{__('Recommended image size 1920x1280')}}</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">{{__('Status')}}</label>
                                        <select name="status" id="status"  class="form-control">
                                            <option value="publish">{{__('Publish')}}</option>
                                            <option value="draft">{{__('Draft')}}</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Add New Program')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('backend.partials.media-upload.media-upload-markup')
@endsection
@section('script')
    <script src="{{asset('assets/backend/js/bootstrap-datepicker.min.js')}}"></script>
    <x-backend.auto-slug-js :url="route('admin.programs.slug.check')" :type="'new'"/>
    <script>
        $(document).ready(function () {
            $('.summernote').summernote({
                height: 400,   //set editable area's height
                codemirror: { // codemirror options
                    theme: 'monokai'
                },
                callbacks: {
                    onChange: function(contents, $editable) {
                        $(this).prev('input').val(contents);
                    }
                }
            });
        });
    </script>
    <script src="{{asset('assets/backend/js/summernote-bs4.js')}}"></script>
    <script src="{{asset('assets/backend/js/dropzone.js')}}"></script>
    <script src="{{asset('assets/backend/js/bootstrap-tagsinput.js')}}"></script>
    @include('backend.partials.media-upload.media-js')
@endsection
