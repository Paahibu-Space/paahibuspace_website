@extends('frontend.layout')
@section('og-meta')
    <meta property="og:url" content="{{ route('frontend.services.single', $service_item->slug) }}" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ $service_item->title }}" />
    {!! render_og_meta_image_by_attachment_id($service_item->image) !!}
@endsection
@section('page-meta-data')
    <meta name="description" content="{{ $service_item->meta_description }}">
    <meta name="tags" content="{{ $service_item->meta_tag }}">
    {!! render_og_meta_image_by_attachment_id($service_item->image) !!}
@endsection
@section('site-title')
    {{ $service_item->title }} - {{ get_static_option('service_page_name') }}
@endsection
@section('page-title')
    {{ $service_item->title }}
@endsection
@section('content')
    <div class="page-content service-details padding-top-120 padding-bottom-115">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="service-details-item">
                        <div class="thumb margin-bottom-40">
                            {!! render_image_markup_by_attachment_id($service_item->image) !!}
                        </div>
                        <div class="service-description">
                            {!! iFrameFilterInSummernoteAndRender($service_item->description) !!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="widget-area">
                        <div class="widget-nav-menu margin-bottom-30 service-category sidebars-single-content">
                            <ul>
                                @foreach ($service_category as $category)
                                <li>
                                    <a href="{{ route('frontend.services.category', ['id' => $category->id,'any' => Str::slug(purify_html($category->name))]) }}"
                                        class="service-widget active">
                                        <div class="service-title">
                                            <h6 class="title">{{ $category->name }}</h6>
                                        </div>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="no-padding-border service-widget widget">
                            <div class="attorney-contact-form-wrap">
                                <h3 class="title">Have Query ?</h3>
                                <div class="attorney-contact-form">
                                    <form action="{{ route('frontend.form.builder.custom.submit') }}" method="post"
                                        id="custom_form_builder_crZ6HNapi2" class="custom-form-builder-form "
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="custom_form_id" value="1">
                                        <input type="hidden" name="captcha_token" id="gcaptcha_token">
                                        <div class="error-message"></div>
                                        <div class="form-group"><label for="your-name">Your Name</label> <input
                                                type="text" id="your-name" name="your-name" class="form-control"
                                                placeholder="Your Name" required="required"></div>
                                        <div class="form-group"> <label for="your-email">Your Email</label> <input
                                                type="email" id="your-email" name="your-email" class="form-control"
                                                placeholder="Your Email" required="required"></div>
                                        <div class="form-group"> <label for="your-phone">Your Phone</label> <input
                                                type="tel" id="your-phone" name="your-phone" class="form-control"
                                                placeholder="Your Phone"></div>
                                        <div class="form-group textarea"><label for="your-message">Your Message</label>
                                            <textarea name="your-message" id="your-message" cols="30" rows="5" class="form-control"
                                                placeholder="Your Message" required="required"></textarea>
                                        </div>
                                        <div class="btn-wrapper">
                                            <button type="submit"
                                                class="submit-btn custom_submit_form_button submit-btn">Submit
                                                Request</button>
                                            <div class="ajax-loading-wrap hide">
                                                <div class="sk-fading-circle">
                                                    <div class="sk-circle1 sk-circle"></div>
                                                    <div class="sk-circle2 sk-circle"></div>
                                                    <div class="sk-circle3 sk-circle"></div>
                                                    <div class="sk-circle4 sk-circle"></div>
                                                    <div class="sk-circle5 sk-circle"></div>
                                                    <div class="sk-circle6 sk-circle"></div>
                                                    <div class="sk-circle7 sk-circle"></div>
                                                    <div class="sk-circle8 sk-circle"></div>
                                                    <div class="sk-circle9 sk-circle"></div>
                                                    <div class="sk-circle10 sk-circle"></div>
                                                    <div class="sk-circle11 sk-circle"></div>
                                                    <div class="sk-circle12 sk-circle"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
