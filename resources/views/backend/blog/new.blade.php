@extends('backend.admin-master')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/backend/css/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/dropzone.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/media-uploader.css') }}">
@endsection
@section('site-title')
    {{ __('New Blog Post') }}
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
                            <h4 class="header-title">{{ __('Add New Blog Post') }}</h4>
                            <a href="{{ route('admin.blog') }}" class="btn btn-primary">{{ __('All Blog') }}</a>
                        </div>

                        <form action="{{ route('admin.blog.new') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label for="title">{{ __('Title') }}</label>
                                        <input type="text" class="form-control" value="{{ old('title') }}"
                                            name="title" placeholder="{{ __('Title') }}">
                                    </div>
                                    <div class="form-group">
                                        <label>{{ __('Content') }}</label>
                                        <input type="hidden" name="blog_content">
                                        <div class="summernote"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="seo_title">{{ __('SEO Title') }}</label>
                                        <input type="text" name="seo_title" class="form-control"
                                            value="{{ old('seo_title') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="seo_description">{{ __('SEO Description') }}</label>
                                        <textarea name="seo_description" class="form-control" rows="5" id="seo_description">{{ old('seo_description') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="title">{{ __('Slug') }}</label>
                                        <input type="text" class="form-control" id="slug"
                                            value="{{ old('slug') }}" name="slug" placeholder="{{ __('Slug') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="title">{{ __('Excerpt') }}</label>
                                        <textarea name="excerpt" id="excerpt" class="form-control max-height-150" cols="30" rows="10">{{ old('excerpt') }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="category">{{ __('Category') }}</label>
                                        <select name="category" class="form-control" id="category">
                                            <option value="">{{ __('Select Category') }}</option>
                                            @foreach ($all_category as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">{{ __('Tags') }}</label>
                                        <input type="text" class="form-control" name="tags"
                                            value="{{ old('tags') }}" data-role="tagsinput" placeholder="Comma separated tags">
                                    </div>
                                    <div class="form-group">
                                        {{-- <label for="author_id">{{ __('Author') }}</label>
                                        <select name="author_id" class="form-control" id="author_id">
                                            <option value="">{{ __('Select Author') }}</option>
                                            @foreach ($all_team_members as $member)
                                                <option value="{{ $member->id }}">{{ $member->name }}</option>
                                            @endforeach
                                        </select> --}}
                                        <input type="hidden" name="author_id" value="{{ Auth::guard('admin')->user()->name }}">
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
    <x-backend.auto-slug-js :url="route('admin.blog.slug.check')" :type="'new'" />
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
