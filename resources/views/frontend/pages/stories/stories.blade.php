@extends('frontend.layout')

@section('site-title')
    {{get_static_option('stories_page_name')}}
@endsection
@section('page-title')
    {{get_static_option('stories_page_name')}}
@endsection
@section('page-meta-data')
    <meta name="description" content="{{get_static_option('stories_page_meta_description')}}">
    <meta name="tags" content="{{get_static_option('stories_page_meta_tags')}}">
    {!! render_og_meta_image_by_attachment_id(get_static_option('stories_page_meta_image')) !!}
@endsection

@section('content')
    <!-- ======= story Section ======= -->
    <div id="story" class="our-story-area area-padding">
        <div class="container">
            <div class="row">
                @foreach ($all_stories as $story)
                    <div class="col-lg-4 col-sm-6 col-xs-12 story-wrapper">
                        <div class="single-story-teller">
                            <div class="story-img">
                                <a href="{{ route('frontend.story.single', $story->slug) }}">
                                    {!! render_image_markup_by_attachment_id($story->image) !!}
                                </a>
                            </div>
                            <div class="story-content">
                                <a href="{{ route('frontend.story.single', $story->slug) }}">{{ $story->title }}</a>
                                <p class="story-date">{{ date_format($story->created_at, 'd M y') }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div><!-- End story Section -->
@endsection
