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
@endsection
