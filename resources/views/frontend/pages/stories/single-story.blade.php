@extends('frontend.layout')
@php
    $story_img = null;
    $story_image = get_attachment_image_by_id($story->image, 'full', false);
    $story_img = !empty($story_image) ? $story_image['img_url'] : '';
@endphp
@section('og-meta')
    <meta property="og:url" content="{{ route('frontend.story.single', $story->slug) }}" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ $story->title }}" />
    <meta property="og:image" content="{{ $story_img }}" />
@endsection
@section('page-meta-data')
    <meta name="description" content="{{ $story->meta_description }}">
    <meta name="tags" content="{{ $story->meta_tag }}">
@endsection
@section('site-title')
    {{ $story->title }}
@endsection
@section('page-title')
    {{ $story->title }}
@endsection
@section('content')

    <!-- ======= story Page ======= -->
    <div class="container d-flex justify-content-center align-items-center min-vh-100 py-5">
        <div class="col-md-8 col-sm-10 col-xs-12">
            <div class="card shadow-lg border-0">
                <div class="d-flex align-items-center p-3 text-white story-page-heading">
                    <img src="{{ asset('assets/frontend/images/no-image.webp') }}" class="rounded-circle me-3" alt="Storyteller" style="width: 60px; height: 60px;">
                    <h2 class="mb-0">{{ $story->title }}</h2>
                </div>
                <img src="{{ $story_image['img_url'] }}" class="card-img-top rounded-0" alt="Story Image">
                <div class="card-body">
                    <div class="entry-meta text-center my-3">
                        <span class="author-meta me-3"><i class="bi bi-person"></i>{{ $story->author }}</span>
                        <span><i class="bi bi-clock"></i>{{ date_format($story->created_at, 'd M Y') }}</span>
                    </div>
                    <div class="entry-content">
                        {!! iFrameFilterInSummernoteAndRender($story->content) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
@endsection
