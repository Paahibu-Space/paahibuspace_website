@extends('frontend.layout')

@section('content')
     <!--======= Hero Slider Section ======= -->
    <div id="hero-slider" class="hero-slider">
        <div class="hero-container" data-aos="fade-in">
            <div class="col-12">
                <div class="swiper sliderFeaturedPosts">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="img-bg d-flex align-items-end"
                                style="background-image: url('{{ asset('assets/frontend/images/hero-img.webp') }}');">
                                {{-- <div class="img-bg-inner" data-aos="fade-left" data-aos-delay="100">
                                    <h1>Paahibu Space</h1>
                                    <h2>Access | Innovate | Transfrom</h2>
                                    <p>Paahibu Space aims at creating an amazing community of African women who are
                                        passionate about using tech to revolutionize Africa and beyond.</p>
                                    <a href="#about-section" class="slider-boxed-btn">Learn More</a>
                                </div> --}}
                            </div>
                        </div>
                        <div class="swiper-slide bg-blue height-85">
                            <div class="container">
                                <div class="row gy-4">
                                    <div class="col-lg-6 order-2 order-lg-2 d-flex flex-column justify-content-center white-color"
                                        data-aos="fade-in">
                                        <h1>Hey sis, you belong to tech too</h1>
<<<<<<< Updated upstream
                                        <p class="white-color">At Paahibu Space, we’re breaking barriers and creating opportunities for women and girls to thrive in technology, innovation, and entrepreneurship. This is your space to learn, grow, and lead — because the future of tech needs your voice, your ideas, and your brilliance.</p>
=======
                                        <p class="white-color">We endeavours to equip, empower and endow girls and women-led
                                            businesses with the competencies to leverage technology, to lead and
                                            venture into the real world and to transform themselves and their
                                            communities, building a better world for themselves and future
                                            generations.</p>
>>>>>>> Stashed changes
                                        <div class="d-flex">
                                            <a href="#about" class="slider-boxed-btn">Learn more</a>
                                        </div>
                                    </div>
<<<<<<< Updated upstream
                                    <div class="col-lg-6 order-1 order-lg-1 hero-img" data-aos="zoom-out"
                                        data-aos-delay="100" style="padding-top: 12%;">
                                        <img src="{{ asset('assets/frontend/images/hey-sis.webp') }}"
                                            class="img-fluid animated" alt="">
=======
                                    <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out"
                                        data-aos-delay="100">
                                        <img loading="lazy" src="{{ asset('assets/frontend/images/techsistar.webp') }}"
                                            class="img-fluid animated" alt="Tech Sisters">
>>>>>>> Stashed changes
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="swiper-slide bg-blue height-85">
                            <div class="container">
                                <div class="row gy-4">
                                    <div class="col-lg-6 order-1 order-lg-1 hero-img padding-top-80" data-aos="zoom-out"
                                        data-aos-delay="100">
                                        <img loading="lazy" src="{{ asset('assets/frontend/images/program/women-in-bus.webp') }}"
                                            class="img-fluid animated" alt="Women in business">
                                    </div>

                                    <div class="col-lg-6 order-2 order-lg-2 d-flex flex-column justify-content-center white-color"
                                        data-aos="fade-in">
                                        <h1>Women in Digital Business</h1>
                                        <p class="white-color">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                            Perferendis quidem.</p>
                                        <div class="d-flex">
                                            <a href="#about" class="slider-boxed-btn">Learn more</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
<<<<<<< Updated upstream
                        </div> --}}
                        {{-- <div class="swiper-slide">
                            <div class="video-bg">
                                <iframe width="100%" height="100%"
                                    src="{{ asset('assets/frontend/images/pexels-edmond-dantès-8643891 (2160p).mp4') }}"
                                    frameborder="0" allowfullscreen loop></iframe>
                            </div>

                            <div class="content-overlay">
                                <div class="vid-bg d-flex align-items-end">
                                    <div class="vid-bg-inner">
                                        <h1>Paahibu Space</h1>
                                        <h2>Access | Innovate | Transform</h2>
                                        <p>Paahibu Space endeavours to equip, empower and endow girls and women-led
                                            businesses with the competencies to leverage technology, to lead and
                                            venture into the real world and to transform themselves and their
                                            communities, building a better world for themselves and future
                                            generations.</p>
                                        <a href="#about-section" class="slider-boxed-btn">Learn More</a>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        <div class="swiper-slide">
                            <div class="video-bg">
                                <img src="{{ asset('assets/frontend/images/gifty_web.webp') }}" alt="">
                            </div>

                            <div class="content-overlay">
                                <div class="vid-bg d-flex align-items-end">
                                    <div class="vid-bg-inner">
                                        <h1>Paahibu Space</h1>
                                        <h2>Access | Innovate | Transform</h2>
                                        <p>We endeavours to equip, empower and endow girls and women-led
                                            businesses with the competencies to leverage technology, to lead and
                                            venture into the real world and to transform themselves and their
                                            communities, building a better world for themselves and future
                                            generations.</p>
                                        <a href="#about-section" class="slider-boxed-btn">Learn More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
=======
                        </div>
                        <!--<div class="swiper-slide">-->
                        <!--    <div class="video-bg">-->
                        <!--        <iframe width="100%" height="100%"-->
                        <!--            src="{{ asset('assets/frontend/images/pexels-edmond-dantès-8643891 (2160p).mp4') }}"-->
                        <!--            frameborder="0" allowfullscreen loop></iframe>-->
                        <!--    </div>-->

                        <!--    <div class="content-overlay">-->
                        <!--        <div class="vid-bg d-flex align-items-end">-->
                        <!--            <div class="vid-bg-inner">-->
                        <!--                <h1>Paahibu Space</h1>-->
                        <!--                <h2>Access | Innovate | Transform</h2>-->
                        <!--                <p>Paahibu Space endeavours to equip, empower and endow girls and women-led-->
                        <!--                    businesses with the competencies to leverage technology, to lead and-->
                        <!--                    venture into the real world and to transform themselves and their-->
                        <!--                    communities, building a better world for themselves and future-->
                        <!--                    generations.</p>-->
                        <!--                <a href="#about-section" class="slider-boxed-btn">Learn More</a>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
>>>>>>> Stashed changes

                    </div>
                    <div class="custom-swiper-button-next">
                        <span class="bi-chevron-right"></span>
                    </div>
                    <div class="custom-swiper-button-prev">
                        <span class="bi-chevron-left"></span>
                    </div>

                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div><!-- End Hero Slider Section -->

    <section id="about-section" class="about-section">
        <div class="container">
            <div class="row">

                <div class="col-md-7 order-2">

                    <div class="pictures-row">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="item-about">
                                    <div class="imgone big-paral">
                                        <div class="simpleParallax" data-aos="fade-up" data-aos-delay="200"><img
                                                class="lazy thumparallax-down img-fluid"
<<<<<<< Updated upstream
                                                src="{{ asset('assets/frontend/images/about-right-img.jpeg') }}"
=======
                                                src="{{ asset('assets/frontend/images/about-left-img.webp') }}"
>>>>>>> Stashed changes
                                                width="500" height="666" class="lazy thumparallax-down img-fluid"
                                                alt="two-images-1.jpg"></div>
                                    </div>
                                    {{-- <div class="exp-about">
                                        <h5 class="nmb-font-about">2</h5>
                                        <h6 class="service_summary-about">- Years of experience</h6>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="item-about">
                                    <div class="imgtwo big-paral">
                                        <div class="simpleParallax" data-aos="fade-down" data-aos-delay="100"><img
                                                class="lazy thumparallax img-fluid"
<<<<<<< Updated upstream
                                                src="{{ asset('assets/frontend/images/right-img.webp') }}"
=======
                                                src="{{ asset('assets/frontend/images/about-right-img.webp') }}"
>>>>>>> Stashed changes
                                                width="500" height="820" class="lazy thumparallax img-fluid"
                                                alt="two-images-1.jpg"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="col-md-5">

                    <h4 class="about-heading1-home">About Paahibu Space</h4>
                    <h3 class="about-heading2-home">Inclusivity and Access to Knowledge</h3>

                    <p>Paahibu Space is an African tech and entrepreneurship development organization focusing
                        providing digital solutions to small businesses and nonprofits led by women, while educating,
                        inspiring, empowering, and shaping the personal and professional development of the next
                        generation of African female leaders in technology, innovation, entrepreneurship, and business
                        by equipping them with knowledge and skills they will need to turn their communities’ problems
                        and challenges into solutions and opportunities in an evolving digital world.</p>

                    <a href="{{ route('frontend.about') }}" target="_self"
                        class="about-boxed-btn slider-boxed-btn"><span>Read
                            more</span></a>

                </div>


            </div>
        </div>
    </section>


    <!-- ======= Why Choose Us Section ======= -->
    <section id="why-us" class="why-us">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <span>Philosophy</span>
                <h2>Our Philosophy</h2>
                <p></p>

            </div>

            <div class="row g-0" data-aos="fade-up" data-aos-delay="200">

                <div class="col-xl-5 img-bgg"
                    style="background-image: url('{{ asset('assets/frontend/images/three.webp') }}'); background-position: center">
                </div>
                <div class="col-xl-7 slides  position-relative">

                    <div class="slides-1 swiper">
                        <div class="swiper-wrapper">

                            <div class="swiper-slide">
                                <div class="item">
                                    <h3 class="mb-3">Building Relationships</h3>
                                    <h4 class="mb-3">We believe in fostering enduring relationships. It's a commitment to your business's sustained growth.</h4>
                                    <p>Paahibu Space is not just about activities or projects; it is about people. We focus on building deep, meaningful relationships with the communities we serve. By fostering trust, collaboration, and shared vision, we ensure that every woman and business we support feels valued, empowered, and equipped to create transformation that lasts.

                                    </p>
                                </div>
                            </div><!-- End slide item -->

                            <div class="swiper-slide">
                                <div class="item">
                                    <h3 class="mb-3">One Big Family</h3>
                                    {{-- <h4 class="mb-3">Joining hands with Paahibu Digital Solutions isn't just a
                                        business
                                        decision;</h4> --}}
                                    <p>At Paahibu Space, we believe true growth happens in community. Every woman, girl, and business that joins us becomes part of a bigger family — a network of support, encouragement, and shared progress. We celebrate your milestones, stand with you in challenges, and create a safe, inclusive space where everyone belongs and thrives together.
                                    </p>
                                </div>
                            </div><!-- End slide item -->

                            <div class="swiper-slide">
                                <div class="item">
                                    <h3 class="mb-3">Why We Continue to Stand Out</h3>
                                    <!-- <h4 class="mb-3">
                                                    </h4> -->
                                    <p>What makes Paahibu Space unique is our people-first approach. We go beyond providing digital and entrepreneurial skills — we create an ecosystem of inclusivity, innovation, and support. By combining knowledge, mentorship, and community, we empower women, girls, and youth not only to thrive in today’s digital world but to become leaders who shape the future.</p>
                                </div>
                            </div><!-- End slide item -->

                            <div class="swiper-slide">
                                <div class="item">
                                    <h3 class="mb-3">Relationship Commitment</h3>
                                    <h4 class="mb-3">Our dedication extends far beyond the completion of a project,
                                        it's
                                        about standing by you in your journey.</h4>
                                    <p>Our work doesn’t stop at delivering a program or workshop. We are committed to walking alongside women and youth through every stage of their journey — from building skills to scaling businesses. This commitment is rooted in our belief that lasting impact comes from long-term relationships, consistent mentorship, and continuous opportunities for growth
                                    </p>
                                </div>
                            </div><!-- End slide item -->

                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>

            </div>

        </div>
    </section><!-- End Why Choose Us Section -->

    <section id="features" class="features section">

        <div class="container">

            <div class="d-flex justify-content-center">

                <ul class="nav nav-tabs" data-aos="fade-up" data-aos-delay="100">

                    <li class="nav-item">
                        <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#features-tab-1">
                            <h4>Access</h4>
                        </a>
                    </li><!-- End tab nav item -->

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-2">
                            <h4>Innovate</h4>
                        </a><!-- End tab nav item -->

                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-3">
                            <h4>Transform</h4>
                        </a>
                    </li><!-- End tab nav item -->

                </ul>

            </div>

            <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

                <div class="tab-pane fade active show" id="features-tab-1">
                    <div class="row">
                        <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                            <h3>Providing Opportunities for All</h3>
                            <p class="fst-italic">
                                At Paahibu Space, we believe that access is the cornerstone of empowerment. We provide our
                                diverse community of girls, women, and youth with the resources and opportunities they need
                                to thrive in the digital age.
                            </p>
                            <ul>
                                <li><i class="bi bi-person-plus-fill"></i> <span>Our TechSistars Mentorship Program
                                        connects aspiring girls with established female tech experts.</span></li>
                                <li><i class="bi bi-chat-dots-fill"></i> <span>Mentorship and capacity-building
                                        training</span></li>
                                <li><i class="bi bi-people-fill"></i> <span>Our Community Ambassadors Network connects you
                                        with like-minded individuals on campus.</span></li>
                            </ul>
                        </div>
                        <div class="col-lg-6 order-1 order-lg-2 text-center">
                            <img src="{{ asset('assets/frontend/images/grow-helping.webp') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div><!-- End tab content item -->

                <div class="tab-pane fade" id="features-tab-2">
                    <div class="row">
                        <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                            <h3>Fostering a Culture of Creativity</h3>
                            <p class="fst-italic">
                                Innovation is at the heart of what we do at Paahibu Space. We encourage our community to
                                think outside the box, challenge the status quo, and embrace new ideas. Our collaborative
                                environment fosters creativity, allowing individuals to work together, share insights, and
                                develop groundbreaking solutions.
                            </p>
                            <ul>
                                <li><i class="bi bi-check2-all"></i> <span>We provide an annual networking event where
                                        girls bring forth tech solutions to address community challenges.</span></li>
                                <li><i class="bi bi-check2-all"></i> <span>We introduce girls to tech opportunities, our
                                        STEM BY GIRLS FOR GIRLS program includes discussions, mentorship, and workshops in
                                        schools.</span></li>
                                <li><i class="bi bi-check2-all"></i> <span>Our 3-month Student Internship Program develops
                                        young women's skills in tech and entrepreneurship. Real projects, portfolio
                                        building, and potential full-time opportunities await.</span></li>
                            </ul>
                        </div>
                        <div class="col-lg-6 order-1 order-lg-2 text-center">
                            <img src="{{ asset('assets/frontend/images/mentorship.webp') }}" alt=""
                                class="img-fluid">
                        </div>
                    </div>
                </div><!-- End tab content item -->

                <div class="tab-pane fade" id="features-tab-3">
                    <div class="row">
                        <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                            <h3>Creating Lasting Change</h3>
                            <ul>
                                <li><i class="bi bi-check2-all"></i> <span>We equip women and youth with lifelong skills that open doors to opportunities.</span></li>
                                <li><i class="bi bi-check2-all"></i> <span>We foster communities of support, mentorship, and collaboration that endure.</span></li>
                                <li><i class="bi bi-check2-all"></i> <span>We inspire transformation that extends beyond individuals to families, businesses, and societies.</span></li>
                            </ul>
                            <p class="fst-italic">
                               At Paahibu Space, we believe true impact goes beyond the moment. Our work is about building foundations that empower women, girls, and communities to thrive today, tomorrow, and for generations to come.
                            </p>
                        </div>
                        <div class="col-lg-6 order-1 order-lg-2 text-center">
                            <img src="{{ asset('assets/frontend/images/transform.webp') }}" alt=""
                                class="img-fluid">
                        </div>
                    </div>
                </div><!-- End tab content item -->

            </div>

        </div>

    </section>

    <!-- Features Cards Section -->
    <section id="features-cards" class="features-cards section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <span>Programs</span>
            <h2>What we do</h2>
            <p>At Paahibu Space, we empower women, girls, and youth with the tools, skills, and networks they need to transform their lives, businesses, and communities. Through our programs, we create pathways to opportunity, inclusion, and lasting impact.</p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-4">

                <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                    <div class="feature-box orange">
                        <i class="bi bi-laptop"></i>
                        <h4>Entrepreneurship, Digital Business & Digital Skills Training</h4>
                        <p>From digital literacy to advanced business tools, we provide hands-on training that helps entrepreneurs innovate, grow, and compete globally</p>
                    </div>
                </div><!-- End Feature Borx-->

                <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="300">
                    <div class="feature-box green">
                        <i class="bi bi-megaphone"></i>
                        <h4>Advocacy</h4>
                        <p>Through campaigns, partnerships, and dialogues, we champion inclusivity, equality, and access to opportunities in the digital and entrepreneurial space</p>
                    </div>
                </div><!-- End Feature Borx-->

                <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="400">
                    <div class="feature-box red">
                        <i class="bi bi-people"></i>
                        <h4>Community Engagement</h4>
                        <p>By engaging schools, local groups, and women-led initiatives, we build networks of support that inspire collaboration, creativity, and shared growth</p>
                    </div>
                </div><!-- End Feature Borx-->
                <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="400">
                    <div class="feature-box red">
                        <i class="bi bi-person-badge"></i>
                        <h4>Mentorship</h4>
                        <p>Our mentorship programs connect aspiring leaders with experienced professionals, creating a bridge of knowledge, guidance, and empowerment</p>
                    </div>
                </div><!-- End Feature Borx-->

            </div>

        </div>

    </section><!-- /Features Cards Section -->

    <!-- ======= partners Section ======= -->
    <section id="partners" class="partners">
        <div class="container" data-aos="zoom-out">
            <div class="section-title">
                <span>Partners</span>
                <h2>Our Partners And Supporters</h2>
                <p></p>

            </div>
            <div class="partners-slider swiper">

                <div class="swiper-wrapper align-items-center">
                    @foreach ($all_partners as $partner)
                        <div class="swiper-slide">
                            {!! render_image_markup_by_attachment_id($partner->image, 'img-fluid') !!}
                        </div>
                    @endforeach

                </div>
            </div>

        </div>
    </section><!-- End partners Section -->


    <!-- ======= home-stories Section ======= -->
    {{-- <section id="home-stories" class="home-stories section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <span>Impact</span>
                <h2>Impact Stories</h2>
                <!-- <p>home-stories</p> -->
            </div>

            <div class="home-stories-slider swiper" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">
                    @foreach ($all_stories as $story)
                        <div class="swiper-slide">
                            <div class="story-wrap">
                                <div class="story-item">
                                    @if (!empty($story->image))
                                        {!! render_image_markup_by_attachment_id($story->image, 'story-img') !!}
                                    @else
                                        <img src="{{ asset('assets/frontend/images/no-image.webp') }}" alt="No image"
                                            class="story-img">
                                    @endif
                                    <h3>{{ $story->title }}</h3>
                                    <h4>{{ $story->tags }}</h4>
                                    <p>
                                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                        {!! iFrameFilterInSummernoteAndRender($story->excerpt) !!}
                                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                    </p>
                                </div>
                            </div>
                        </div><!-- End story item -->
                    @endforeach


                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section><!-- End home-stories Section --> --}}

    <section class="testimonial-three-area"
        style="background-image: url('{{ asset('assets/frontend/images/bg/stories-bg.png') }}')">
        <div class="testimonial-three__wrp">
            <div class="row g-4">
                <div class="col-md-6 col-lg-5 col-xl-3">
                    <div class="section-header margin-bottom-40">
                        <h5 class="wow fadeInUp" data-wow-delay="00ms" data-wow-duration="1500ms">
                            Our Impact Stories
                        </h5>
                        <h2 class="wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">Hundreds of Female
                            entrepreneurs are changing the world</h2>
                    </div>
                    <div class="testimonial-three__arry-btn d-flex gap-3 wow fadeInDown" data-wow-delay="400ms"
                        data-wow-duration="1500ms">
                        <button class="arry-prev testimonial-three__arry-prev"><i class="bi bi-chevron-left"></i></button>
                        <button class="arry-next testimonial-three__arry-next active"><i
                                class="bi bi-chevron-right"></i></button>
                    </div>
                </div>
                <div class="col-md-6 col-lg-7 col-xl-9">
                    <div class="swiper testimonial-three__slider">
                        <div class="swiper-wrapper">
                            @foreach ($all_stories as $story)
                                <div class="swiper-slide">
                                    <div class="testimonial-three__item">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="testimonial-three__image">
                                                <svg width="24" height="18" viewBox="0 0 24 18" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M0 0V18L9 9V0H0ZM15 0V18L24 9V0H15Z" fill="#3C72FC" />
                                                </svg>
                                                @if (!empty($story->image))
                                                    {!! render_image_markup_by_attachment_id($story->image, 'testimonial-img') !!}
                                                @else
                                                    <img src="{{ asset('assets/frontend/images/no-image.webp') }}"
                                                        alt="No image" class="testimonial-img">
                                                @endif
                                            </div>
                                            <div class="con">
                                                <h4>{{ $story->title }}</h4>
                                                <span>{{ $story->tags }}</span>
                                            </div>
                                        </div>
                                        <div class="story-content">
                                            <p class="mt-30">“ {!! iFrameFilterInSummernoteAndRender($story->excerpt) !!} ”</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="connects-area home-21 padding-top-70 padding-bottom-50">
        <div class="container container-three">
            <div class="row">
                <div class="col-lg-6 margin-top-30">
                    <div class="connects-content-wrapper">
                        <div class="section-title-21">
                            <h1 class="title">
                                Let's <span class="section-shape">Connect</span>
                            </h1>
                        </div>
                        <div class="connect-inner-content">


                            <div class="single-connects">
                                <div class="connect-icon">
                                    <img src="{{ asset('assets/frontend/images/contact-img.png') }}" alt="Contact us">
                                </div>
                                <div class="connect-content">
                                    <h4 class="connect-title"> Contact </h4>
                                    <span class="connect-item"> info@paahibuspace.org
                                    </span>
                                    <span class="connect-item">+233 24 725 4326 </span>
                                </div>
                            </div>


                            <div class="single-connects">
                                <div class="connect-icon">
                                    <img src="{{ asset('assets/frontend/images/office-img.png') }}" alt="">
                                </div>
                                <div class="connect-content">
                                    <h4 class="connect-title"> Our Office </h4>
                                    <span class="connect-item"> Insurance Road
                                    </span>
                                    <span class="connect-item"> Wa-UWR </span>
                                </div>
                            </div>


                            <div class="single-connects">
                                <div class="connect-icon">
                                    <img src="{{ asset('assets/frontend/images/workinghrs-img.png') }}" alt="">
                                </div>
                                <div class="connect-content">
                                    <h4 class="connect-title"> Working Hour </h4>
                                    <span class="connect-item"> Mon-Fri: 9am-5pm </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 margin-top-30">
                    <div class="connect-form-wrapper">

                        <form action="{{ route('frontend.get.touch') }}" id="get_in_touch_form" method="post"
                            class="connect-form" enctype="multipart/form-data">
                            @csrf
                            <div class="error-message"></div>

                            <div class="connect-form-inner">

                                <div class="form-group"> <input type="text" id="your-name" name="your-name"
                                        class="form-control" placeholder="Your Name"></div>
                                <div class="form-group"> <input type="email" id="your-email" name="your-email"
                                        class="form-control" placeholder="Your Email" required="required"></div>
                                <div class="form-group"> <input type="tel" id="your-phone" name="your-phone"
                                        class="form-control" placeholder="Your Phone"></div>
                                <div class="form-group textarea">
                                    <textarea name="your-message" id="your-message" cols="30" rows="10" class="form-control"
                                        placeholder="Your Message" required="required"></textarea>
                                </div>
                                <div class="btn-wrapper">
                                    <button type="submit" id="get_in_touch_submit_btn" class="boxed-btn">Submit
                                        Now</button>
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
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
