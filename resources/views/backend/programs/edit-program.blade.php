@extends('backend.admin-master')
@section('site-title')
    {{__('Edit Programs Post')}}
@endsection
@section('style')
    <link rel="stylesheet" href="{{asset('assets/backend/css/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/dropzone.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/media-uploader.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/bootstrap-tagsinput.css')}}">
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
               <x-flash-msg/>
                <x-error-msg/>
            </div>
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="header-wrap d-flex justify-content-between">
                            <h4 class="header-title">{{__('Edit Program Post')}}</h4>
                            <a href="{{route('admin.programs.all')}}" class="btn btn-primary">{{__('All Programs')}}</a>
                        </div>
                        <form action="{{route('admin.programs.update')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="program_id" value="{{$program->id}}">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="title">{{__('Title')}}</label>
                                        <input type="text" class="form-control"  id="title" name="title" value="{{$program->title}}" >
                                    </div>
                                    <div class="form-group">
                                        <label for="slug">{{__('Slug')}}</label>
                                        <input type="text" class="form-control"  id="slug" name="slug" value="{{$program->slug}}" placeholder="{{__('slug')}}">
                                    </div>
                                    <div class="form-group">
                                        <label>{{__('Content')}}</label>
                                        <input type="hidden" name="program_content" value="{{$program->content}}">
                                        <div class="summernote" data-content='{{$program->content}}'></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="date">{{__('Date')}}</label>
                                        <input type="date" class="form-control" value="{{$program->date}}" id="date" name="date" >
                                    </div>
                                    <div class="form-group">
                                        <label for="time">{{__('Time')}}</label>
                                        <input type="text" class="form-control"  id="time" name="time" value="{{$program->time}}" placeholder="{{__('time')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="cost">{{__('Cost')}}</label>
                                        <input type="text" class="form-control"  id="cost" name="cost" value="{{$event->cost}}" placeholder="{{__('cost')}}">
                                        <span class="info-text">{{__('enter zero (0) to make this program free of cost')}}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="available_registrations">{{__('Available Registrations')}}</label>
                                        <input type="text" class="form-control"  id="available_registrations" value="{{$program->available_registrations}}" name="available_registrations" placeholder="{{__('available tickets')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="venue">{{__('Venue')}}</label>
                                        <input type="text" class="form-control"  id="venue" name="venue" value="{{$program->venue}}" placeholder="{{__('Program Venue')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="venue_location">{{__('Venue Location')}}</label>
                                        <input type="text" class="form-control"  id="venue_location" name="venue_location" value="{{$program->venue_location}}" placeholder="{{__('Venue Location')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_tags">{{__('Meta Tags')}}</label>
                                        <input type="text" name="meta_tags"  class="form-control" data-role="tagsinput" value="{{$program->meta_tags}}" id="meta_tags">
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_description">{{__('Meta Description')}}</label>
                                        <textarea name="meta_description"  class="form-control" rows="5" id="meta_description">{{$program->meta_description}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">{{__('Image')}}</label>
                                        <div class="media-upload-btn-wrapper">
                                            <div class="img-wrap">
                                                @php
                                                    $program_img = get_attachment_image_by_id($program->image,null,false);
                                                    $program_img_btn_label = 'Upload Image';
                                                @endphp
                                                @if (!empty($program_img))
                                                    <div class="attachment-preview">
                                                        <div class="thumbnail">
                                                            <div class="centered">
                                                                <img class="avatar user-thumb" src="{{$program_img['img_url']}}" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @php  $program_img_btn_label = 'Change Image'; @endphp
                                                @endif
                                            </div>
                                            <input type="hidden" name="image" value="{{$program->image}}">
                                            <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="{{__('Select Program Image')}}" data-modaltitle="{{__('Upload Program Image')}}" data-toggle="modal" data-target="#media_upload_modal">
                                                {{$program_img_btn_label}}
                                            </button>
                                        </div>
                                        <small>{{__('Recommended image size 1920x1280')}}</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">{{__('Status')}}</label>
                                        <select name="status" id="status"  class="form-control">
                                            <option @if($program->status == 'publish') selected @endif value="publish">{{__('Publish')}}</option>
                                            <option @if($program->status == 'draft') selected @endif value="draft">{{__('Draft')}}</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Update Program')}}</button>
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
    <script src="{{asset('assets/backend/js/summernote-bs4.js')}}"></script>
    <x-backend.auto-slug-js :url="route('admin.programs.slug.check')" :type="'update'"/>
    <script>
        $(document).ready(function () {


            $('.summernote').summernote({
                height: 500,   //set editable area's height
                codemirror: { // codemirror options
                    theme: 'monokai'
                },
                callbacks: {
                    onChange: function(contents, $editable) {
                        $(this).prev('input').val(contents);
                    }
                }
            });
            if($('.summernote').length > 0){
                $('.summernote').each(function(index,value){
                    $(this).summernote('code', $(this).data('content'));
                });
            }
        });
    </script>

    <script src="{{asset('assets/backend/js/dropzone.js')}}"></script>
    <script src="{{asset('assets/backend/js/bootstrap-tagsinput.js')}}"></script>
    @include('backend.partials.media-upload.media-js')
@endsection
