@extends('frontend.layout')
@section('site-title')
    {{ get_static_option('services_page_name') }}
@endsection
@section('page-title')
    {{ get_static_option('services_page_name') }}
@endsection
@section('page-meta-data')
    <meta name="description" content="{{ get_static_option('services_page_meta_description') }}">
    <meta name="tags" content="{{ get_static_option('services_page_meta_tags') }}">
    {!! render_og_meta_image_by_attachment_id(get_static_option('services_page_meta_image')) !!}
@endsection
@section('content')
    <section id="services-hero" class="services-hero d-flex align-items-center"
        style="background: url('{{ asset('assets/frontend/images/girlcode2.webp') }}') top center; background-size:cover;">
        <div class="container">
            <div class="row">
                <div class="col-xl-4">
                    <h2 data-aos="fade-up">Paahibu Digital Solutions</h2>
                    <blockquote data-aos="fade-up" data-aos-delay="100">
                        <p>More Than Business, It's Family. At Paahibu Digital Solutions, we go beyond the conventional
                            client-vendor relationship. For us, it's not merely about the deals inked; it's about the
                            transformative impact those deals have on your business. When you choose us, you become a valued
                            member of our community.</p>
                    </blockquote>
                    <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                        <a href="" target="_self" class="slider-boxed-btn"><span>Get Started</span></a>
                    </div>

                </div>
            </div>
        </div>
    </section><!-- End Services Hero Section -->
    <section class="service-area service-page padding-120">
        <div class="container">
            <div class="section-title">
                <h2>Paahibu Digital Solutions: Elevating Your Business to New Heights</h2>
                <p>Welcome to Paahibu Digital Solutions, where we're not just creating solutions; we're crafting success
                    stories for your business.</p>
            </div>
            <div class="row">
                @php $a = 1; @endphp
                @foreach ($all_services as $data)
                    <div class="col-lg-4 col-md-6">
                        <x-frontend.service.grid :increment="$a" :service="$data" />
                    </div>
                    @php
                        if ($a == 4) {
                            $a = 1;
                        } else {
                            $a++;
                    } @endphp
                @endforeach
                <div class="col-lg-12">
                    <div class="pagination-wrapper">
                        {{ $all_services->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--  Testimonial section -->
    <section class="feedback-area home-21 home-21-section-bg padding-top-70 padding-bottom-100">
        <div class="container container-three">
            <div class="row">
                <div class="col-lg-12">
                    <div class="global-slick-init feedback-slider feedback-nav" data-infinite="true" data-arrows="true" data-dots="false" data-slidesToShow="1" data-swipeToSlide="true" data-autoplay="true" data-autoplaySpeed="2500" data-prevArrow='<div class="prev-icon"><i class="fas fa-arrow-left"></i></div>'
                         data-nextArrow='<div class="next-icon"><i class="fas fa-arrow-right"></i></div>'>
                        @foreach($all_testimonials as $test)
                            <div class="slick-slider-item">
                                <div class="row align-items-center">
                                    <div class="col-lg-5 margin-top-30">
                                        <div class="feedback-image-wrapper">
                                            <div class="feedback-thumb">
                                                {!! render_image_markup_by_attachment_id($test->image) !!}
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-7 margin-top-30">
                                        <div class="feedback-contents-wrapper">
                                            <div class="section-title-21">
                                                <span class="subtitle color-light mb-3">Testimonial</span>
                                                <h2 class="title">
                                                    @php
                                                        $header_title = 'Clients Feedback';
                                                        $header_title = str_replace(['{shape}','{/shape}'],['<span class="section-shape">','</span>'],$header_title);
                                                    @endphp
                                                    {!! $header_title !!}
                                                </h2>
                                            </div>
                                            <div class="feedback-contents mt-5">
                                                <p class="feedback-para"> {{$test->description}} </p>
                                                <div class="clients-contents mt-5">
                                                    <h3 class="client-title"> {{$test->name}} </h3>
                                                    <span class="client-subtitle color-light mt-2"> {{$test->designation}}  </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
