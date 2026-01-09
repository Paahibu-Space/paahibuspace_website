@extends('backend.admin-master')
@section('style')
    <link rel="stylesheet" href="{{asset('assets/backend/css/bootstrap-tagsinput.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/dropzone.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/media-uploader.css')}}">
@endsection
@section('site-title')
    {{__('Edit Blog Post')}}
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
                            <h4 class="header-title">{{__('Edit Blog Post')}}</h4>
                            <a href="{{route('admin.blog')}}" class="btn btn-primary">{{__('All Blog')}}</a>
                        </div>

                        <form action="{{route('admin.blog.update',$blog_post->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$blog_post->id}}">{{-- Sometimes needed --}}
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label for="title">{{__('Title')}}</label>
                                        <input type="text" class="form-control"  id="title" name="title" value="{{$blog_post->title}}">
                                    </div>
                                    <div class="form-group">
                                        <label>{{__('Content')}}</label>
                                        <textarea class="form-control d-none" name="blog_content" >{{$blog_post->content}}</textarea>
                                        {{-- Removed iFrameFilterInSummernoteAndRender as it might not be available or compatible. Just basic content --}}
                                        <div class="summernote" data-content='{{ $blog_post->content }}'></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="seo_title">{{__('SEO Title')}}</label>
                                        <input type="text" name="seo_title"  class="form-control" value="{{$blog_post->seo_title}}" id="seo_title">
                                    </div>
                                    <div class="form-group">
                                        <label for="seo_description">{{__('SEO Description')}}</label>
                                        <textarea name="seo_description"  class="form-control" rows="5" id="seo_description">{{$blog_post->seo_description}}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="title">{{__('Slug')}}</label>
                                        <input type="text" class="form-control"  id="slug" value="{{$blog_post->slug}}"  name="slug" placeholder="{{__('Slug')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="title">{{__('Excerpt')}}</label>
                                        <textarea name="excerpt" id="excerpt" class="form-control max-height-150" cols="30" rows="10">{{$blog_post->excerpt}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="category">{{__('Category')}}</label>
                                        <select name="category" class="form-control" id="category">
                                            <option value="">{{__("Select Category")}}</option>
                                            @foreach($all_category as $category)
                                                <option @if($blog_post->blog_category_id == $category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">{{__('Tags')}}</label>
                                        <input type="text" class="form-control" value="{{$blog_post->tag_list}}" name="tags" data-role="tagsinput">
                                    </div>
                                    <div class="form-group">
                                        <label for="author_id">{{__('Author')}}</label>
                                        <select name="author_id" class="form-control" id="author_id">
                                            <option value="">{{__("Select Author")}}</option>
                                            @foreach($all_team_members as $member)
                                                <option @if($blog_post->author_id == $member->id) selected @endif value="{{$member->id}}">{{$member->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="status">{{__('Status')}}</label>
                                        <select name="status" id="status" class="form-control">
                                            <option  @if($blog_post->is_published) selected @endif value="publish">{{__('Publish')}}</option>
                                            <option  @if(!$blog_post->is_published) selected @endif value="draft">{{__('Draft')}}</option>
                                        </select>
                                    </div>
                                    <x-media-upload :id="$blog_post->featured_image" :name="'image'" :dimentions="'1920x1280'" :title="__('Image')"/>
                                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Update Post')}}</button>
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
    <script src="{{asset('assets/backend/js/bootstrap-tagsinput.js')}}"></script>
    <x-backend.auto-slug-js :url="route('admin.blog.slug.check')" :type="'update'"/>
    <script>
        $(document).ready(function () {
            $('.summernote').summernote({
                height: 400,   //set editable area's height
                codemirror: { // codemirror options
                    theme: 'monokai'
                },
                callbacks: {
                    onChange: function(contents, $editable) {
                        let finalContenat =  iFrameFilterInSummernote(contents);
                        $(this).prev('textarea').val(finalContenat);
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
    @include('backend.partials.media-upload.media-js')
@endsection
