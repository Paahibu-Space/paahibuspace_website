@extends('backend.admin-master')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/backend/css/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/dropzone.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/media-uploader.css') }}">
@endsection
@section('site-title')
    {{ __('New Story Post') }}
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                <x-flash-msg />
                <x-error-msg />
            </div>
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="header-wrap d-flex justify-content-between">
                            <h4 class="header-title">{{ __('Add New Story Post') }}</h4>
                            <a href="{{ route('admin.story') }}" class="btn btn-primary">{{ __('All Stories') }}</a>
                        </div>

                        <form action="{{ route('admin.story.new') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label for="title">{{ __('Name / Title') }}</label>
                                        <input type="text" class="form-control" value="{{ old('name') }}"
                                            name="name" id="title" placeholder="{{ __('Name') }}">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="full_story_heading">{{ __('Full Story Heading') }}</label>
                                        <input type="text" class="form-control" value="{{ old('full_story_heading') }}"
                                            name="full_story_heading" placeholder="{{ __('Full Story Heading') }}">
                                    </div>

                                    <div class="form-group">
                                        <label>{{ __('Full Story Content') }}</label>
                                        <input type="hidden" name="stories_content">
                                        <div class="summernote"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="quote">{{ __('Quote') }}</label>
                                        <textarea name="quote" class="form-control" rows="3">{{ old('quote') }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="short_story">{{ __('Short Story (Excerpt)') }}</label>
                                        <textarea name="short_story" class="form-control" rows="3">{{ old('short_story') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="slug">{{ __('Slug') }}</label>
                                        <input type="text" class="form-control" id="slug"
                                            value="{{ old('slug') }}" name="slug" placeholder="{{ __('Slug') }}">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="story_type_id">{{ __('Story Type') }}</label>
                                        <select name="story_type_id" class="form-control">
                                            <option value="">Select Type</option>
                                            @foreach($story_types as $type)
                                                <option value="{{ $type->id }}" {{ old('story_type_id') == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="program_id">{{ __('Program') }}</label>
                                        <select name="program_id" class="form-control">
                                            <option value="">Select Program</option>
                                            @foreach($programs as $program)
                                                <option value="{{ $program->id }}" {{ old('program_id') == $program->id ? 'selected' : '' }}>{{ $program->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="role">{{ __('Role') }}</label>
                                        <input type="text" class="form-control" name="role"
                                            value="{{ old('role') }}" placeholder="e.g. Beneficiary">
                                    </div>
                                    <div class="form-group">
                                        <label for="year">{{ __('Year') }}</label>
                                        <input type="text" class="form-control" name="year"
                                            value="{{ old('year') }}" placeholder="e.g. 2024">
                                    </div>

                                    <div class="form-group">
                                        <label for="status">{{ __('Status') }}</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="publish">{{ __('Publish') }}</option>
                                            <option value="draft">{{ __('Draft') }}</option>
                                        </select>
                                    </div>

                                    <x-media-upload :id="''" :name="'image'" :dimentions="'1920x1280'"
                                        :title="__('Image')" />
                                    
                                    <button type="submit"
                                        class="btn btn-primary mt-4 pr-4 pl-4">{{ __('Add New Post') }}</button>
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
    <script src="{{ asset('assets/backend/js/summernote-bs4.js') }}"></script>
    <script src="{{ asset('assets/backend/js/bootstrap-tagsinput.js') }}"></script>
    <x-backend.auto-slug-js :url="route('admin.story.slug.check')" :type="'new'" />
    <script>
        $(document).ready(function() {

            $('.summernote').summernote({
                height: 400, //set editable area's height
                codemirror: { // codemirror options
                    theme: 'monokai'
                },
                callbacks: {
                    onChange: function(contents, $editable) {
                        let finalContenat = iFrameFilterInSummernote(contents);
                        $(this).prev('input').val(finalContenat);
                    }
                }
            });
            if ($('.summernote').length > 1) {
                $('.summernote').each(function(index, value) {
                    $(this).summernote('code', $(this).data('content'));
                });
            }

        });
    </script>
    <script src="{{ asset('assets/backend/js/dropzone.js') }}"></script>
    @include('backend.partials.media-upload.media-js')
@endsection
