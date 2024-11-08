<!DOCTYPE html>
<html lang="en_US" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @php
        $site_favicon = get_attachment_image_by_id(get_static_option('site_favicon'), 'full', false);
    @endphp
    @if (!empty($site_favicon))
        <link rel="icon" href="{{ $site_favicon['img_url'] }}" type="image/png">
    @endif
    <link rel=preload href="{{ asset('assets/frontend/css/fontawesome.min.css') }}" as="style">
    <link rel=preload href="{{ asset('assets/frontend/css/flaticon.css') }}" as="style">
    <link rel=preload href="{{ asset('assets/frontend/css/nexicon.css') }}" as="style">

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/nexicon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/fontawesome.min.css') }}">
    <!-- vendor files -->
    <link rel="stylesheet" href="{{ asset('assets/common/vendor/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/slick.css') }}">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/common/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/common/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/common/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/common/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/owl.carousel.min.css') }}">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/common/vendor/bootstrap/css/bootstrap.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/common/vendor/bootstrap-icons/bootstrap-icons.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/digi-services.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/responsive.css') }}">


    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    @include('frontend.partials.og-meta')

</head>

<body class="/ home_variant_01 nexelit_version_3.6.0 verified apps_key_NB2GLtODUjYOc9bFkPq2pKI8uma3G6WX ">



    <div class="body-overlay" id="body-overlay"></div>


    <div class="top-bar-area header-variant-01">
        <div class="container >
            <div class="row">
            <div class="col-lg-12">
                <div class="top-bar-inner">
                    <div class="left-content">
                        <ul class="social-icons">
                            <li><a href="https://twitter.com/xgenious1" rel="canonical"><i
                                        class="fab fa-twitter"></i></a></li>
                            <li><a href="https://www.facebook.com/xgenious" rel="canonical"><i
                                        class="flaticon-facebook"></i></a></li>
                            <li><a href="#" rel="canonical"><i class="fab fa-pinterest-p"></i></a></li>
                            <li><a href="#" rel="canonical"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                    <div class="right-content">
                        <ul>
                            <li class="login-register"><a href="http://localhost:8888/nexelit/login">Login</a>
                                <span>/</span> <a href="http://localhost:8888/nexelit/register">Register</a>
                            </li>
                            <li>
                                <div class="btn-wrapper">
                                    <a href="http://localhost:8888/nexelit/quote" rel="canonical"
                                        class="boxed-btn reverse-color">Get A Quote</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- ======= Header ======= -->
    <header id="header" class="header">
        <div class="container-fluid d-flex align-items-center justify-content-between p-0">

            <a href="{{ route('homepage') }}" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
                {{-- <img src="{{ asset('assets/frontend/images/white-logo.png') }}" alt=""> --}}
                {!! render_image_markup_by_attachment_id(get_static_option('site_white_logo')) !!}
            </a>

            <nav id="navbar" class="navbar-nav">

                {!! render_frontend_menu() !!}
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

            <div class="btn-donate">
                <a target="_blank" href="https://paystack.com/pay/donate-to-paahibuspace">Donate</a>
            </div>

        </div>
    </header><!-- End Header -->

    <div class="header-slider-one global-carousel-init" data-loop="true" data-desktopitem="1" data-mobileitem="1"
        data-tabletitem="1" data-nav="true" data-autoplay="true" data-margin="0">
        <div class="header-area header-bg"
            style="background-image: url(http://localhost:8888/nexelit/assets/uploads/media-uploader/141590862778.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="header-inner">
                            <p class="subtitle">Who we are</p>
                            <h1 class="title">We are top Cyber solutions provider</h1>
                            <div class="btn-wrapper  desktop-left padding-top-30">
                                <a href="#" class="boxed-btn ">Our Service</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom-area bg-blue padding-bottom-120">
        <div class="header-bottom-inner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-header-bottom-item style-01">
                            <div class="icon">
                                <i class="flaticon-network"></i>
                            </div>
                            <div class="content">
                                <h4 class="title">Provide all kind of it service</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-header-bottom-item style-02">
                            <div class="icon">
                                <i class="flaticon-safe"></i>
                            </div>
                            <div class="content">
                                <h4 class="title">Solutions for all security</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-header-bottom-item style-03">
                            <div class="icon">
                                <i class="flaticon-group"></i>
                            </div>
                            <div class="content">
                                <h4 class="title">Most expert peoples</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-header-bottom-item style-04">
                            <div class="icon">
                                <i class="flaticon-translate"></i>
                            </div>
                            <div class="content">
                                <h4 class="title">Global support for all</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="top-experience-area bg-blue">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="experience-content">
                        <div class="content">
                            <h2 class="title">We have 15 Years of Experience of any kind it solution</h2>
                        </div>
                        <div class="col-lg-09 offset-lg-3">
                            <div class="experience-right">
                                <div class="experience-img">
                                    <img src="http://localhost:8888/nexelit/assets/uploads/media-uploader/011590924636.png"
                                        alt="" />
                                </div>
                                <div class="vdo-btn">
                                    <a class="video-play-btn mfp-iframe"
                                        href="https://www.youtube.com/watch?v=wp_QA1PRZiE"><i
                                            class="fas fa-play"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="what-we-cover padding-bottom-85 padding-top-160">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title desktop-center margin-bottom-50">
                        <h3 class="title">What We Do</h3>
                        <p>Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing
                            sem neque sed ipsum.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-what-we-cover-item margin-bottom-50">
                        <div class="icon style-01">
                            <i class="flaticon-cloud-2"></i>
                        </div>
                        <div class="content">
                            <h4 class="title"><a href="http://localhost:8888/nexelit/service/cyber-security">Cyber
                                    Security</a>
                            </h4>
                            <p>Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-what-we-cover-item margin-bottom-50">
                        <div class="icon style-02">
                            <i class="nexicon-crm"></i>
                        </div>
                        <div class="content">
                            <h4 class="title"><a href="http://localhost:8888/nexelit/service/data-management">Data
                                    Management</a>
                            </h4>
                            <p>Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-what-we-cover-item margin-bottom-50">
                        <div class="icon style-03">
                            <i class="flaticon-optimization"></i>
                        </div>
                        <div class="content">
                            <h4 class="title"><a href="http://localhost:8888/nexelit/service/data-science">Data
                                    Science</a>
                            </h4>
                            <p>Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-what-we-cover-item margin-bottom-50">
                        <div class="icon style-04">
                            <i class="flaticon-verified"></i>
                        </div>
                        <div class="content">
                            <h4 class="title"><a href="http://localhost:8888/nexelit/service/cloud-service">Cloud
                                    Service</a>
                            </h4>
                            <p>Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="quality-area">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col-lg-6">
                    <img src="http://localhost:8888/nexelit/assets/uploads/media-uploader/051595833303.png"
                        class="only-mobile-version-show" alt="" />
                    <div class="quality-img"
                        style="background-image: url(http://localhost:8888/nexelit/assets/uploads/media-uploader/051595833303.png);">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="quality-content">
                        <div class="quality-content-wrapper">
                            <h4 class="title">We provide quality solutions for clients</h4>
                            <p>Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero. Curabitur
                                ullamcorper ultricies nisi. Nameget dui. Etiam rhoncus. Maecenas tempus, tellus eget
                                condimentum.</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="case-studies-area">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section-title white bg-blue desktop-center padding-top-110 padding-bottom-55">
                        <h3 class="title">Our Latest Work</h3>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Numquam sequi tempore eaque id, fugit et placeat ut! Sit eaque ipsum 
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="case-studies-slider-active global-carousel-init"
                         data-loop="true"
                         data-desktopitem="3"
                         data-mobileitem="1"
                         data-tabletitem="2"
                         data-nav="true"
                         data-center="true"
                         data-autoplay="true"
                         data-margin="30"
                    >
                        @foreach($all_work as $data)
                            <div class="slider-img"
                                {!! render_background_image_markup_by_attachment_id($data->image) !!}
                            >
                                <div class="slider-inner-text">
                                    <a href="{{route('frontend.work.single',$data->slug)}}">
                                        <h4 class="title">{{$data->title}}</h4>
                                    </a>
                                    <p>{{$data->excerpt}}</p>
                                    <div class="btn-wrapper padding-top-20">
                                        <a href="{{route('frontend.work.single',$data->slug)}}"
                                           class="boxed-btn">View More</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

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

    <div class="creative-agency-work-process-area padding-top-115 padding-bottom-90">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title desktop-center margin-bottom-60">
                        <span class="subtitle">Journey</span>
                        <h2 class="title">Work Process</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="cagency-work-process-list">
                        <li class="single-work-process-item">
                            <div class="num-wrap style-1">
                                <span class="number">1</span>
                            </div>
                            <h4 class="title">Register/ Login</h4>
                        </li>
                        <li class="single-work-process-item">
                            <div class="num-wrap style-2">
                                <span class="number">2</span>
                            </div>
                            <h4 class="title">Select Service</h4>
                        </li>
                        <li class="single-work-process-item">
                            <div class="num-wrap style-3">
                                <span class="number">3</span>
                            </div>
                            <h4 class="title">Submit Order</h4>
                        </li>
                        <li class="single-work-process-item">
                            <div class="num-wrap style-4">
                                <span class="number">4</span>
                            </div>
                            <h4 class="title">Give Content</h4>
                        </li>
                        <li class="single-work-process-item">
                            <div class="num-wrap style-5">
                                <span class="number">5</span>
                            </div>
                            <h4 class="title">Payment &amp; Delivery</h4>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="creative-agency-call-to-action padding-100">
        <div class="shape shape-01">
            <img src="http://localhost:8888/nexelit/assets/frontend/img/shape/01.png" alt="">
        </div>
        <div class="shape shape-02">
            <img src="http://localhost:8888/nexelit/assets/frontend/img/shape/02.png" alt="">
        </div>
        <div class="shape shape-03">
            <img src="http://localhost:8888/nexelit/assets/frontend/img/shape/03.png" alt="">
        </div>
        <div class="shape shape-04">
            <img src="http://localhost:8888/nexelit/assets/frontend/img/shape/04.png" alt="">
        </div>
        <div class="shape shape-05">
            <img src="http://localhost:8888/nexelit/assets/frontend/img/shape/05.png" alt="">
        </div>
        <div class="right-image-wrap">
            <img src="http://localhost:8888/nexelit/assets/uploads/media-uploader/call-to-action-right-at-2x-min1612009361.jpg"
                alt="" class="img-fluid">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-10">
                    <div class="cagency-cta-area-inner">
                        <h2 class="title">Hope a Project in your Mind</h2>
                        <p class="description">Questions explained agreeable preferred strangers too him her son. Set
                            put shyness offices his females him distant. Improve has message besides shy himself</p>
                        <div class="btn-wrapper margin-top-30">
                            <a href="#" class="cagency-btn">Get Quote <i class="far fa-comments"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="portfolio-news-area dark-section-bg-two padding-top-115 padding-bottom-115">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title white text-center margin-bottom-60">
                        <span
                            class="subtitle">Article</span>
                        <h2 class="title">
                            Recent Blogs
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-grid-carosel-wrapper">
                        <div class=" pcarousel-dots global-carousel-init" data-loop="true" data-desktopitem="3"
                            data-mobileitem="1" data-tabletitem="2" data-dots="true" data-autoplay="true"
                            data-margin="30">
                            @foreach ($all_blog as $data)
                                <div class="single-portfolio-blog-grid">
                                    <div class="thumb">
                                        {!! render_image_markup_by_attachment_id($data->image, 'grid') !!}
                                        <div class="time-wrap">
                                            <span class="date">{{ date_format($data->created_at, 'd') }}</span>
                                            <span class="month">{{ date_format($data->created_at, 'M') }}</span>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <h4 class="title">
                                            <a
                                                href="{{ route('frontend.blog.single', $data->slug) }}">{{ $data->title }}</a>
                                        </h4>
                                        <p class="excerpt">{{ strip_tags($data->excerpt) }}</p>
                                        <a class="readmore"
                                            href="{{ route('frontend.blog.single', $data->slug) }}">Read More</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer-area home-variant-08
">
        <div class="footer-top padding-top-90 padding-bottom-65">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class=" footer-widget widget">
                            <div class="footer-widget widget">
                                <div class="about_us_widget style-01"><img
                                        src="http://localhost:8888/nexelit/assets/uploads/media-uploader/group-11712746901647172354.png"
                                        class="footer-logo" alt="">
                                    <p></p>
                                    <p>Suspicion sportsmen provision suffering mrs saw engrossed something.</p>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class=" footer-widget widget">
                            <h4 class="widget-title style-01">Recent Posts</h4>
                            <ul class="recent_post_item">
                                <li class="single-recent-post-item">
                                    <div class="thumb"><img
                                            src="http://localhost:8888/nexelit/assets/uploads/media-uploader/thumb-pexels-tim-mossholde-g6ujz1648018573.jpg"
                                            alt=""></div>
                                    <div class="content">
                                        <h4 class="title"><a
                                                href="http://localhost:8888/nexelit/blog/a-best-director-oscar-rematch-after-28-years-jane-campion-vs-steven-spielberg">A
                                                best-director Oscar rematch after 28 years: Jane Campion vs Steven
                                                Spielberg</a></h4>
                                        <span class="time"> <i class="far fa-calendar-alt "></i> 23 Mar 2022</span>
                                    </div>
                                </li>
                                <li class="single-recent-post-item">
                                    <div class="thumb"><img
                                            src="http://localhost:8888/nexelit/assets/uploads/media-uploader/thumb-pexels-pixabay-23617-hush81648020515.jpg"
                                            alt=""></div>
                                    <div class="content">
                                        <h4 class="title"><a
                                                href="http://localhost:8888/nexelit/blog/kultar-singh-left-ajay-devgn-in-tears-how-can-i-bless-my-elder-brother">Kultar
                                                Singh left Ajay Devgn in tears: ‘How can I bless my elder brother?</a>
                                        </h4>
                                        <span class="time"> <i class="far fa-calendar-alt "></i> 23 Mar 2022</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class=" footer-widget widget">
                            <div class="footer-widget widget widget_nav_menu">
                                <h4 class="widget-title">Useful Links</h4>
                                <ul>
                                    <li>
                                        <a href="http://localhost:8888/nexelit">Home</a>
                                    </li>
                                    <li>
                                        <a href="http://localhost:8888/nexelit/feedback">Feedback</a>
                                    </li>
                                    <li>
                                        <a href="http://localhost:8888/nexelit/clients-feedback">Clients Feedback</a>
                                    </li>
                                    <li>
                                        <a href="http://localhost:8888/nexelit/support-ticket">Support Ticket</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class=" footer-widget widget">
                            <div class="sidebars-single-content">
                                <h4 class="widget-title">Contact info</h4>
                                <ul class="contact_info_list">
                                    <li class="single-info-item">
                                        <div class="icon">
                                            <i class="fa fa-home"></i>
                                        </div>
                                        <div class="details">
                                            143 Castle Road 517 District, Port of Kiev, Southern Canada
                                        </div>
                                    </li>
                                    <li class="single-info-item">
                                        <div class="icon">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        <div class="details">
                                            230362603
                                        </div>
                                    </li>
                                    <li class="single-info-item">
                                        <div class="icon">
                                            <i class="fas fa-envelope-open"></i>
                                        </div>
                                        <div class="details">
                                            example@example.com
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-area copyright-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-item">
                            <div class="copyright-area-inner">
                                © 2024 All right reserved by <a href="https://xgenious.com">xgenious</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <div class="back-to-top">
        <span class="back-top">
            <i class="fas fa-angle-up"></i>
        </span>
    </div>

    <!-- load all script -->
    <script src="{{ asset('assets/common/vendor/jquery-2.2.4.min.js') }}"></script>

    <script src="http://localhost:8888/nexelit/assets/frontend/js/bootstrap.bundle.min.js"></script>
    <script src="http://localhost:8888/nexelit/assets/frontend/js/dynamic-script.js"></script>
    <script src="http://localhost:8888/nexelit/assets/frontend/js/jquery.magnific-popup.js"></script>
    <script src="http://localhost:8888/nexelit/assets/frontend/js/imagesloaded.pkgd.min.js"></script>
    <script src="http://localhost:8888/nexelit/assets/frontend/js/isotope.pkgd.min.js"></script>
    <script src="http://localhost:8888/nexelit/assets/frontend/js/jquery.waypoints.js"></script>
    <script src="http://localhost:8888/nexelit/assets/frontend/js/jquery.counterup.min.js"></script>
    <script src="http://localhost:8888/nexelit/assets/frontend/js/owl.carousel.min.js"></script>
    <script src="http://localhost:8888/nexelit/assets/frontend/js/wow.min.js"></script>
    <script src="http://localhost:8888/nexelit/assets/frontend/js/jQuery.rProgressbar.min.js"></script>
    <script src="http://localhost:8888/nexelit/assets/frontend/js/jquery.mb.YTPlayer.js"></script>
    <script src="http://localhost:8888/nexelit/assets/frontend/js/jquery.nicescroll.min.js"></script>
    <script src="http://localhost:8888/nexelit/assets/frontend/js/slick.js"></script>
    <script src="http://localhost:8888/nexelit/assets/frontend/js/main.js"></script>
    <script src="http://localhost:8888/nexelit/assets/frontend/js/toastr.min.js"></script>

    <script>
        //Home Addvertisement Click Store
        $(document).on('click', '.home_advertisement', function() {
            let id = $('#add_id').val();
            $.ajax({
                url: "http://localhost:8888/nexelit/home/advertisement/click/store",
                type: "GET",
                data: {
                    'id': id
                },
                success: function(data) {
                    console.log(data);
                }
            })
        });

        //Home Addvertisement Click Store
        $(document).on('mouseover', '.home_advertisement', function() {
            let id = $('#add_id').val();
            $.ajax({
                url: "http://localhost:8888/nexelit/home/advertisement/impression/store",
                type: "GET",
                data: {
                    'id': id
                },
                success: function(data) {
                    console.log(data);
                }
            })
        });
    </script>
    <script>
        $(document).ready(function() {

            var delayTime = "10000";
            var popupBackdrop = $('.nx-popup-backdrop');
            var popupWrapper = $('.nx-popup-wrapper');

            delayTime = delayTime ? delayTime : 4000;


            if (getCookie('nx_popup_show') == '') {
                setTimeout(function() {
                    popupBackdrop.addClass('show');
                    popupWrapper.addClass('show');

                }, parseInt(delayTime));
            }

            $(document).on('click', '.nx-popup-close,.nx-popup-backdrop', function(e) {
                e.preventDefault();
                $('.nx-modal-content').html('');
                popupBackdrop.removeClass('show');
                popupWrapper.removeClass('show');
                setCookie('nx_popup_show', 'no', 1);
            });

            var offerTime = "2020-09-26";
            var year = offerTime.substr(0, 4);
            var month = offerTime.substr(5, 2);
            var day = offerTime.substr(8, 2);
            if (offerTime && $('#countdown').length > 0) {
                $('#countdown').countdown({
                    year: year,
                    month: month,
                    day: day,
                    labels: true,
                    labelText: {
                        'days': "days",
                        'hours': "hours",
                        'minutes': "min",
                        'seconds': "sec",
                    }
                });
            }
        });
    </script>
    <script src="http://localhost:8888/nexelit/assets/frontend/js/jquery.ihavecookies.min.js"></script>
    <script>
        $(document).ready(function() {
            var delayTime = "5000";
            delayTime = delayTime ? delayTime : 4000;
            $('body').ihavecookies({
                title: "Cookies &amp; Privacy",
                message: `Is education residence conveying so so. Suppose shyness say ten behaved morning had. Any unsatiable assistance compliment occasional too reasonably advantages.`,
                expires: "30",
                link: "http://localhost:8888/nexelit/p/privacy-policy",
                delay: delayTime,
                moreInfoLabel: "More information",
                acceptBtnLabel: "Accept",
                advancedBtnLabel: "Decline",
                cookieTypes: [{
                    "type": "Site Preferences",
                    "value": "Site Preferences",
                    "description": "These are cookies that are related to your site preferences, e.g. remembering your username, site colours, etc."
                }, {
                    "type": "Analytics",
                    "value": "Analytics",
                    "description": "Cookies related to site visits, browser types, etc."
                }, {
                    "type": "Marketing",
                    "value": "Marketing",
                    "description": "Cookies related to marketing, e.g. newsletters, social media, etc"
                }],
                moreBtnLabel: "Manage",
                cookieTypesTitle: "Manage Cookie",
            });
            $('body').on('click', '#gdpr-cookie-close', function(e) {
                e.preventDefault();
                $(this).parent().remove();
            });
        });
    </script>

    <script>
        function getCookie(cname) {
            var name = cname + "=";
            var decodedCookie = decodeURIComponent(document.cookie);
            var ca = decodedCookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }

        function setCookie(cname, cvalue, exdays) {
            var d = new Date();
            d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
            var expires = "expires=" + d.toUTCString();
            document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
        }

        (function($) {
            "use strict";

            var allProgress = $('.donation-progress');
            $.each(allProgress, function(index, value) {
                $(this).rProgressbar({
                    percentage: $(this).data('percent'),
                    fillBackgroundColor: "#ff8a73"
                });
            })

            $(document).on('change', '.search-form-warp', function(e) {
                e.preventDefault();
                var el = $(this);
                var searchType = $('#search_popup_search_type').val();
                if (searchType == 'blog') {
                    el.attr('action', "http://localhost:8888/nexelit/blog-search");
                    el.find('.search-field').attr('name', 'search');
                } else if (searchType == 'event') {
                    el.attr('action', "http://localhost:8888/nexelit/events-search");
                    el.find('.search-field').attr('name', 'search');
                } else if (searchType == 'knowledgebase') {
                    el.attr('action', "http://localhost:8888/nexelit/knowledgebase-search");
                    el.find('.search-field').attr('name', 'search');
                } else if (searchType == 'product') {
                    el.attr('action', "http://localhost:8888/nexelit/products");
                    el.find('.search-field').attr('name', 'q');
                }

            });
            $(document).on('change', '#langchange', function(e) {
                $.ajax({
                    url: "http://localhost:8888/nexelit/lang",
                    type: "GET",
                    data: {
                        'lang': $(this).val()
                    },
                    success: function(data) {
                        window.location = "http://localhost:8888/nexelit";
                    }
                })
            });
            $(document).on('click', '.newsletter-form-wrap .submit-btn', function(e) {
                e.preventDefault();
                var email = $('.newsletter-form-wrap input[type="email"]').val();
                $('.newsletter-widget .form-message-show').html('');

                $.ajax({
                    url: "http://localhost:8888/nexelit/subscribe-newsletter",
                    type: "POST",
                    data: {
                        _token: "rdhrOoZyHCmb3r8yW6l7kFKxPbzivR9kM5YmHuaz",
                        email: email
                    },
                    success: function(data) {
                        $('.newsletter-widget .form-message-show').html(
                            '<div class="alert alert-success">' + data + '</div>');
                    },
                    error: function(data) {
                        var errors = data.responseJSON.errors;
                        $('.newsletter-widget .form-message-show').html(
                            '<div class="alert alert-danger">' + errors.email[0] + '</div>');
                    }
                });
            });

            $(document).on('submit', '.custom-form-builder-form', function(e) {
                e.preventDefault();
                var form = $(this);
                var formID = form.attr('id');
                var msgContainer = form.find('.error-message');
                var formSelector = document.getElementById(formID);
                var formData = new FormData(formSelector);
                msgContainer.html('');
                $.ajax({
                    url: "http://localhost:8888/nexelit/submit-custom-form",
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': "rdhrOoZyHCmb3r8yW6l7kFKxPbzivR9kM5YmHuaz",
                    },
                    beforeSend: function() {
                        form.find('.ajax-loading-wrap').addClass('show').removeClass('hide');
                    },
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: function(data) {
                        form.find('.ajax-loading-wrap').removeClass('show').addClass('hide');
                        msgContainer.html('<div class="alert alert-' + data.type + '">' + data.msg +
                            '</div>');
                    },
                    error: function(data) {
                        form.find('.ajax-loading-wrap').removeClass('show').addClass('hide');
                        var errors = data.responseJSON.errors;
                        var markup = '<ul class="alert alert-danger">';
                        $.each(errors, function(index, value) {
                            markup += '<li>' + value + '</li>';
                        })
                        markup += '</ul>';
                        msgContainer.html(markup);
                    }
                });
            });

        }(jQuery));
    </script>





    <script>
        (function() {
            "use strict";

            $(document).on('click', '.ajax_add_to_cart_with_icon_product_slider_addon', function(e) {
                e.preventDefault();
                var allData = $(this).data();
                var el = $(this);
                $.ajax({
                    url: "http://localhost:8888/nexelit/products-item/ajax/add-to-cart",
                    type: "POST",
                    data: {
                        _token: "rdhrOoZyHCmb3r8yW6l7kFKxPbzivR9kM5YmHuaz",
                        'product_id': allData.product_id,
                        'quantity': allData.product_quantity,
                    },
                    beforeSend: function() {
                        el.html('<i class="fas fa-spinner fa-spin mr-1"></i> ');
                    },
                    success: function(data) {
                        el.html('<i class="fa fa-shopping-bag" aria-hidden="true"></i>' +
                            "Add To Cart");
                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "2000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                        toastr.success(data.msg);
                        el.html('<i class="fas fa-shopping-cart"></i>');
                        $('.home-page-21-cart-icon-top').text(data.total_cart_item);
                        $('.cart_global .pcount').text(data.total_cart_item);
                    }
                });
            });


        })(jQuery);
    </script>
    <script>
        (function() {
            "use strict";

            $(document).on('click', '.ajax_add_to_wishlist_with_icon_addon_product_slider', function(e) {

                e.preventDefault();
                var allData = $(this).data();
                var el = $(this);
                $.ajax({
                    url: "http://localhost:8888/nexelit/products-item/ajax/add-to-wishlist",
                    type: "POST",
                    data: {
                        _token: "rdhrOoZyHCmb3r8yW6l7kFKxPbzivR9kM5YmHuaz",
                        'product_id': allData.product_id,
                    },
                    beforeSend: function() {
                        el.html('<i class="fas fa-spinner fa-spin mr-1"></i> ');
                    },
                    success: function(data) {
                        el.html('<i class="fa fa-shopping-bag" aria-hidden="true"></i>' +
                            "Add To Cart");
                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "2000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                        toastr.success(data.msg);
                        el.html('<i class="fas fa-heart"></i>');
                        $('.home-page-21-wishlist-icon-top').text(data.total_wishlist_item);
                    }
                });
            });


        })(jQuery);
    </script>
    <script>
        $(document).on('click', '.addon_product_slider_quick_view', function() {
            let el = $(this);
            quick_view_data(el);
        });

        function quick_view_data(el) {
            let modal = $('.quick_view_modal');

            modal.find('.add_cart_from_quick_view').attr('data-product_id', el.data('id'));
            modal.find('.add_cart_from_quick_view').attr('data-product_title', el.data('title'));

            modal.find('.product-title').text(el.data('title'));
            modal.find('.title').text(el.data('title'));
            modal.find('.availability').text(el.data('in_stock'));
            modal.find('.image_category').text(el.data('category'));
            modal.find('.sale_price').text(el.data('sale_price'));
            modal.find('.regular_price').text(el.data('regular_price'));
            modal.find('.short_description').text(el.data('short_description'));
            modal.find('.product_category').text(el.data('category'));
            modal.find('.product_subcategory').text(el.data('subcategory'));
            modal.find('.img_con').attr('src', el.data('image'));
            modal.find('.ajax_add_to_cart_with_icon').data('src', el.data('image'));
        }

        $(document).on('keyup change', '#quantity_single_quick_view_btn', function() {
            let modal = $('.quick_view_modal');
            let el = $(this).val();
            modal.find('.add_cart_from_quick_view').attr('data-product_quantity', el);
        });
    </script>
    <div class="modal fade home-variant-19 quick_view_modal" id="quick_view" tabindex="-1" role="dialog"
        aria-labelledby="productModal" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content p-5">
                <div class="quick-view-close-btn-wrapper">
                    <button class="quick-view-close-btn close" data-dismiss="modal"><i
                            class="fas fa-times"></i></button>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="product_details">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="product-view-wrap product-img">
                                        <ul class="other-content">
                                            <li>
                                                <span class="badge-tag image_category"></span>
                                            </li>
                                        </ul>
                                        <img src="" alt="" class="img_con">
                                    </div>
                                </div>
                                <div class="col-lg-6">

                                    <div class="product-summery">
                                        <!-- <span class="product-meta pricing">
                                         <span id="unit">1</span> <span id="uom">Piece</span>
                                    </span> -->
                                        <h3 class="product-title title"></h3>
                                        <div>
                                            <span class="availability is_available text-success"></span>
                                        </div>
                                        <div class="price-wrap">
                                            <span class="price sale_price font-weight-bold"></span>
                                            <del class="del-price del_price regular_price"></del>
                                        </div>
                                        <div class="rating-wrap ratings" style="display: none">
                                            <i class="fa fa-star icon"></i>
                                            <i class="fa fa-star icon"></i>
                                            <i class="fa fa-star icon"></i>
                                            <i class="fa fa-star icon"></i>
                                            <i class="fa fa-star icon"></i>
                                        </div>
                                        <div class="short-description">
                                            <p class="info short_description"></p>
                                        </div>
                                        <div class="cart-option">
                                            <div class="user-select-option">
                                            </div>
                                            <div class="d-flex">
                                                <div class="input-group">
                                                    <input class="quantity form-control" type="number"
                                                        min="1" max="10000000" value="1"
                                                        id="quantity_single_quick_view_btn">
                                                </div>
                                                <div class="btn-wrapper">
                                                    <a href="#" data-attributes="[]"
                                                        class="btn-default rounded-btn add-cart-style-02 add_cart_from_quick_view ajax_add_to_cart"
                                                        data-product_id="" data-product_title=""
                                                        data-product_quantity="">
                                                        Add to cart
                                                    </a>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="category">
                                            <p class="name">Category: </p>
                                            <a href="" class="product_category"></a>
                                        </div>
                                        <div class="product-details-tag-and-social-link">
                                            <div class="tag d-flex">
                                                <p class="name">Subcategory: </p>
                                                <div class="subcategory_container">
                                                    <a href="" class="tag-btn product_subcategory"
                                                        rel="tag"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        (function() {
            "use strict";

            $(document).on('click', '.ajax_add_to_cart_with_icon', function(e) {
                e.preventDefault();
                var allData = $(this).data();
                var el = $(this);
                $.ajax({
                    url: "http://localhost:8888/nexelit/products-item/ajax/add-to-cart",
                    type: "POST",
                    data: {
                        _token: "rdhrOoZyHCmb3r8yW6l7kFKxPbzivR9kM5YmHuaz",
                        'product_id': allData.product_id,
                        'quantity': allData.product_quantity,
                    },
                    beforeSend: function() {
                        el.html('<i class="fas fa-spinner fa-spin mr-1"></i> ');
                    },
                    success: function(data) {
                        el.html('<i class="fa fa-shopping-bag" aria-hidden="true"></i>' +
                            "Add To Cart");
                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "2000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                        toastr.success(data.msg);
                        el.html('<i class="fas fa-shopping-cart"></i>');
                        $('.home-page-21-cart-icon-top').text(data.total_cart_item);
                        $('.cart_global .pcount').text(data.total_cart_item);
                    }
                });
            });


        })(jQuery);
    </script>
    <script>
        (function() {
            "use strict";

            $(document).on('click', '.ajax_add_to_wishlist_with_icon', function(e) {

                e.preventDefault();
                var allData = $(this).data();
                var el = $(this);
                $.ajax({
                    url: "http://localhost:8888/nexelit/products-item/ajax/add-to-wishlist",
                    type: "POST",
                    data: {
                        _token: "rdhrOoZyHCmb3r8yW6l7kFKxPbzivR9kM5YmHuaz",
                        'product_id': allData.product_id,
                    },
                    beforeSend: function() {
                        el.html('<i class="fas fa-spinner fa-spin mr-1"></i> ');
                    },
                    success: function(data) {
                        el.html('<i class="fa fa-shopping-bag" aria-hidden="true"></i>' +
                            "Add To Cart");
                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "2000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                        toastr.success(data.msg);
                        el.html('<i class="fas fa-heart"></i>');
                        $('.home-page-21-wishlist-icon-top').text(data.total_wishlist_item);
                    }
                });
            });


        })(jQuery);
    </script>


    <script>
        $(document).on('click', '.product-variant-list li', function() {
            $(this).addClass('selected').siblings().removeClass('selected');
            var price = $(this).data('price');
            var termprice = $(this).data('termprice');
            $('.quick_view_sale_price').text(termprice);
            var allSelectedValue = $('.product-variant-list li.selected');
            var variantVal = [];
            $.each(allSelectedValue, function(index, value) {
                var elData = $(this).data();
                variantVal.push({
                    'variantID': elData.variantid,
                    'variantName': elData.variantname,
                    'term': elData.term,
                    'price': elData.price = !'undefined' ? elData.price : '',
                })
            });

            $(".add_cart_from_quick_view").attr("data-selected-variant", JSON.stringify(variantVal))
            $('input[name="product_variants"]').val(JSON.stringify(variantVal));
        });

        $('.add_cart_from_quick_view').on('click', function(e) {
            e.preventDefault();

            var variants = $('.product-variant-list').length;
            var variantSelected = $('.product-variant-list li.selected').length;

            if (variants != variantSelected) {
                this.parent().parent().append('<br><p class="text-danger">Select Product Variants</p>');
            } else {
                hit_ajax_for_add_to_cart(this);
            }
        });


        function hit_ajax_for_add_to_cart(element) {

            let productId = $(element).attr('data-product_id');
            let productQuantity = $(element).attr('data-product_quantity');

            var el = $(element);
            $.ajax({
                url: "http://localhost:8888/nexelit/products-item/add-to-cart",
                type: "POST",
                data: {
                    _token: "rdhrOoZyHCmb3r8yW6l7kFKxPbzivR9kM5YmHuaz",
                    'product_id': productId,
                    'quantity': productQuantity,
                    'product_variants': $(element).attr("data-selected-variant")
                },
                beforeSend: function() {
                    el.text("Adding");
                },
                success: function(data) {
                    el.html('<i class="fa fa-shopping-bag" aria-hidden="true"></i>' + "Add To Cart");
                    toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "2000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                    toastr.success('Product added to cart');
                    $('.navbar-area .nav-container .nav-right-content ul li.cart .pcount').text(data
                        .total_cart_item);
                }
            });
        }
    </script>
    <script>
        (function() {
            "use strict";

            $(document).on('click', '.ajax_add_to_cart', function(e) {
                e.preventDefault();
                var allData = $(this).data();
                var el = $(this);
                $.ajax({
                    url: "http://localhost:8888/nexelit/products-item/ajax/add-to-cart",
                    type: "POST",
                    data: {
                        _token: "rdhrOoZyHCmb3r8yW6l7kFKxPbzivR9kM5YmHuaz",
                        'product_id': allData.product_id,
                        'quantity': allData.product_quantity,
                    },
                    beforeSend: function() {
                        el.text("Adding");
                    },
                    success: function(data) {
                        el.html('<i class="fa fa-shopping-bag" aria-hidden="true"></i>' +
                            "Add To Cart");
                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "2000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                        toastr.success(data.msg);
                        $('.navbar-area .nav-container .nav-right-content ul li.cart .pcount,.mobile-cart a .pcount')
                            .text(data.total_cart_item);
                        $('.home-page-21-cart-icon-top').text(data.total_cart_item);
                    }
                });
            });


        })(jQuery);
    </script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '#get_in_touch_submit_btn', function(e) {
                e.preventDefault();
                var myForm = document.getElementById('get_in_touch_form');
                var formData = new FormData(myForm);

                $.ajax({
                    type: "POST",
                    url: "http://localhost:8888/nexelit/get-touch",
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function() {
                        $('#get_in_touch_submit_btn').parent().find('.ajax-loading-wrap')
                            .removeClass('hide').addClass('show');
                    },
                    success: function(data) {
                        var errMsgContainer = $('#get_in_touch_form').find('.error-message');
                        $('#get_in_touch_submit_btn').parent().find('.ajax-loading-wrap')
                            .removeClass('show').addClass('hide');
                        errMsgContainer.html('');

                        if (data.status == '400') {
                            errMsgContainer.append('<span class="text-danger">' + data.msg +
                                '</span>');
                        } else {
                            errMsgContainer.append('<span class="text-success">' + data.msg +
                                '</span>');
                        }
                    },
                    error: function(data) {
                        var error = data.responseJSON;
                        var errMsgContainer = $('#get_in_touch_form').find('.error-message');
                        errMsgContainer.html('');
                        $.each(error.errors, function(index, value) {
                            errMsgContainer.append('<span class="text-danger">' +
                                value + '</span>');
                        });
                        $('#get_in_touch_submit_btn').parent().find('.ajax-loading-wrap')
                            .removeClass('show').addClass('hide');
                    }
                });
            });
        });
    </script>



</body>

</html>
