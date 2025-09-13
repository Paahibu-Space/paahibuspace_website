@extends('frontend.layout')
@section('site-title')
    {{ get_static_option('about_page_name') }}
@endsection
@section('page-title')
    {{ get_static_option('about_page_name') }}
@endsection
@section('page-meta-data')
    <meta name="description" content="{{ get_static_option('about_page_meta_description') }}">
    <meta name="tags" content="{{ get_static_option('about_page_meta_tags') }}">
    {!! render_og_meta_image_by_attachment_id(get_static_option('about_page_meta_image')) !!}
@endsection
@section('content')
    <main id="main">
        <!-- ======= about-page Section ======= -->
        <section id="about-page" class="about-page">
            <div class="container">

                <div class="about-page-section-header section-title">
                    <p>Paahibu Space is a tech and entrepeneurship development organization focusing providing
                        digital
                        solutions to small businesses and nonprofits led by women, while educating, inspiring, empowering,
                        and
                        shaping the personal and professional development of the next generation of African female leaders
                        in
                        technology, innovation, entrepreneurship, and business by equipping them with knowledge and skills
                        they will
                        need to turn their communities’ problems and challenges into solutions and opportunities in an
                        evolving
                        digital world.
                    </p>
                </div>

                <div class="row g-4 g-lg-5" data-aos="fade-up" data-aos-delay="200">

                    <div class="col-lg-5">
                        <div class="about-page-img">
                            <img src="{{ asset('assets/frontend/images/img5.jpeg') }}" class="img-fluid" alt="">
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <h3 class="pt-0 pt-lg-5">Access . Innovate . Transform
                        </h3>

                        <!-- Tabs -->
                        <ul class="nav nav-pills mb-3">
                            <li><a class="nav-link active" data-bs-toggle="pill" href="#tab1">Our Mission</a></li>
                            <li><a class="nav-link" data-bs-toggle="pill" href="#tab2">Our Essence: The Paahibu Story</a>
                            </li>
                            <li><a class="nav-link" data-bs-toggle="pill" href="#tab3">Access and Inclusivity</a></li>
                        </ul><!-- End Tabs -->

                        <!-- Tab Content -->
                        <div class="tab-content">

                            <div class="tab-pane fade show active" id="tab1">

                                <p><b>Paahibu Space</b> is a safe and inclusive space committed to fostering a culture of
                                    creativity,
                                    collaboration, and strives to empower its community with the tools and resources
                                    necessary to succeed
                                    in today's fast-paced digital landscape, while giving <b>access</b> to its diverse
                                    community for
                                    girls, women and youth to ignite their big visions, foster and <b>innovate</b> great
                                    ideas, unleash
                                    their ingenious creativity and <b>transform</b> themselves and the society.</p>

                                <p>We are a tech and entrepeneurship development organization that endeavours to equip,
                                    empower and
                                    endow girls and women-led businesses with the competencies to leverage technology, to
                                    lead and venture
                                    into the real world and to transform themselves and their communities, building a better
                                    world for
                                    themselves and future generations.
                                </p>

                                <!-- <p>We need the female perspective in technology. - Regina Honu</p> -->

                            </div><!-- End Tab 1 Content -->

                            <div class="tab-pane fade show" id="tab2">

                                <p><b>Paahibu</b> originates from a Waali-speaking word among the Wala people of Wa, found
                                    in the Upper
                                    West Region of Ghana, West Africa. Paahibu means <b>inclusion, access, equality</b> and
                                    <b>community/unity/togetherness</b>.
                                </p>

                                <p>At Paahibu Space, we are more than a tech and entrepreneurship development organization,
                                    we are a
                                    movement with purpose. Like a compass, we believe movement is crucial for girls'
                                    development and
                                    women-led businesses in an evolving digital world. However, without direction, this
                                    movement becomes
                                    inefficient. Paahibu acts as a guide, a resource hub for girl's development and
                                    women-led businesses
                                    growth in the digital age.</p>

                                <p>Our understanding of community, togetherness, and unity shapes our mission. Paahibu Space
                                    is not just
                                    a place; it's a direction towards transformation. In our name, PAAHIBU, we celebrate
                                    unity, diversity,
                                    inclusivity and completeness.</p>

                                <p>Our main goals are to <b>break stereotypes</b>, grow more informed, and encourage the
                                    active
                                    participation
                                    of girls and women in the digital economy.
                                    Out of a powerful sense that inability to access opportunities, discrimination, and
                                    social constraints
                                    are characteristics of women’s and girls’ experiences, especially, in disproportionate
                                    societies that
                                    are still in the process of advancing gender equality, Paahibu Space therefore, aims at
                                    uniting women,
                                    girls and young people into an organized techn, innovation and entrepreneurship
                                    environment as an
                                    expression of their potential and distinct contribution to their communities.</p>

                            </div><!-- End Tab 2 Content -->

                            <div class="tab-pane fade show" id="tab3">

                                <p><b>Inclusivity and Access to Knowlege: </b>We open our doors to every girl, woman-led
                                    business, and anyone ready to join our
                                    community. At
                                    Paahibu Space, we empower you to access knowledge, turning it into ideas, solutions, and
                                    opportunities
                                    that transform not just yourself but your business and community.
                                </p>

                                <p><b>The Paahibu Space’s</b> brand symbolises <b>energy</b>, strength<br>, <b>equality</b>,
                                    and a world free
                                    of
                                    injustice
                                    against women and girls. Our organization signifies innovation, love, and respect, and
                                    we stand
                                    committed to continue to showcase our openness to ideas, uniqueness, and diverse
                                    perspectives and
                                    lived experiences.</p>

                            </div><!-- End Tab 3 Content -->

                        </div>

                    </div>

                </div>

            </div>

        </section><!-- End about-page Section -->

        {{-- <section class="top-experience-area padding-top-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="experience-author padding-bottom-100">
                            <div class="thumb-1">
                                <img src="{{ asset('assets/frontend/images/about_page-right.jpeg') }}" alt="">
                            </div>
                            <div class="thumb-2">
                                <img src="{{ asset('assets/frontend/images/about_page-left.jpeg') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 offset-lg-1 p-0">
                        <div class="experience-content-03">
                            <div class="content">
                                <h2 class="title">Translating Innovation Into Value Creation</h2>
                                <p>Integrating leading-edge digital solutions that deliver measurable results in an always-connected digital landscape, Paahibu Space Digital Solutions enables businesses to optimize how they serve their customers, adapt to new market realities, and embrace digital transformation.
                                </p>
                                <div class="icon-area">
                                    <div class="icon">
                                        <i class="flaticon-right-quote-1"></i>
                                    </div>
                                    <p>Whatever your business may be whether you run a creative agency, a digital studio.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="header-bottom-area padding-bottom-80 padding-top-80">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-header-bottom-item-02">
                            <div class="icon style-01">
                                <i class="flaticon-network"></i>
                            </div>
                            <div class="content">
                                <h4 class="title">Your trusted IT partner</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-header-bottom-item-02">
                            <div class="icon style-02">
                                <i class="flaticon-safe"></i>
                            </div>
                            <div class="content">
                                <h4 class="title">We secure your digital world</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-header-bottom-item-02">
                            <div class="icon style-03">
                                <i class="flaticon-group"></i>
                            </div>
                            <div class="content">
                                <h4 class="title">Most expert team</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-header-bottom-item-02">
                            <div class="icon style-04">
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

        <div class="global-network-area bg-liteblue padding-bottom-120 padding-top-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="global-content">
                            <h2 class="title">
                                We Have Global Network Of Clients
                            </h2>
                            <p>
                              Renowned for its pan-African presence and with a reputation for delivering world-class customer experience and technology services, Paahibu Space is an internationally acclaimed digital solutions service provider with a legacy of 15 years of customer experience excellence.
                            </p>
                            <div class="btn-wrapper padding-top-25">
                                <a href="#testimonial-area" class="boxed-btn reverse-color">Learn More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="map-img">
                            <img src="{{ asset('assets/frontend/images/about-map-img.png') }}" alt="google map">
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}


        <div>
            <section class="about-area about-bg" data-background="https://gerow.botble.com/storage/backgrounds/about-bg.jpg"
                style="background-image: url(&quot;https://gerow.botble.com/storage/backgrounds/about-bg.jpg&quot;);">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-5">
                            <div class="about-img-wrap"><img src="{{ asset('assets/frontend/images/female-in-tech.png') }}"
                                    data-bb-lazy="true" class="main-img entered loaded" loading="lazy"
                                    data-src="{{ asset('assets/frontend/images/female-in-tech.png') }}" alt="Female in Tech"
                                    data-ll-status="loaded">
                                <img src="{{ asset('assets/frontend/images/about-shape1.png') }}" data-bb-lazy="true"
                                    loading="lazy" data-src="{{ asset('assets/frontend/images/about-shape1.png') }}"
                                    alt="Female in Tech" data-ll-status="loaded" class="entered loaded"><img
                                    src="{{ asset('assets/frontend/images/about-shape-2.png') }}" data-bb-lazy="true"
                                    loading="lazy" data-src="{{ asset('assets/frontend/images/about-shape-2.png') }}"
                                    alt="Female in Tech" data-ll-status="loaded" class="entered loaded">
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="about-content">
                                <div class="about-section-title mb-25">
                                    <span class="sub-title">
                                        <h5>Why we need female perspective in tech</h5>
                                    </span>
                                    {{-- <h2 class="title tg-element-title">
                                        The need for female perspective in tech
                                    </h2> --}}
                                </div>
                                <p style="margin:0 0 1.25rem; font-size:1rem; color:#374151;">
                                    Technology shapes how we live, work, and connect, yet <b>women are still
                                        underrepresented</b>
                                    in building the tools that shape our future. Including female perspectives leads to
                                    <b>better products, fairer outcomes, and more resilient innovation.</b> <br><br>

                                    Women remain underrepresented in technology, making up only <b>28% of the global tech
                                        workforce.</b>
                                    Their absence limits innovation, as female perspectives bring <b>empathy-driven design,
                                        diverse problem-solving, and inclusive solutions.</b>
                                    Research shows that companies with gender-diverse leadership are <b>21% more likely to
                                        outperform competitors.</b><br>
                                    At Paahibu Space, we believe <b>empowering women in tech is not just about fairness —
                                        it’s essential</b>
                                    for creating technology that truly serves everyone.
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <div>
            <section class="features-area">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6">
                            <div class="features-item">
                                <div class="features-content">
                                    <div class="content-top">
                                        <div class="icon"><i class="bi bi-lightbulb"></i></div>
                                        <h2 class="title">Increased Innovation</h2>
                                    </div>
                                    <p class="truncate-2-custom">
                                        Diverse perspectives fuel creativity. Including women in tech leads to solutions that are more inclusive, practical, and impactful.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="features-item">
                                <div class="features-content">
                                    <div class="content-top">
                                        <div class="icon"><i class="bi bi-person-lines-fill"></i></div>
                                        <h2 class="title">Effective Leadership</h2>
                                    </div>
                                    <p class="truncate-2-custom">
                                        Women bring collaboration, empathy, and resilience to leadership qualities that drive stronger teams and better outcomes.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="features-item">
                                <div class="features-content">
                                    <div class="content-top">
                                        <div class="icon"><i class="bi bi-bar-chart-line"></i></div>
                                        <h2 class="title">Entrepreneurship Growth</h2>
                                    </div>
                                    <p class="truncate-2-custom">
                                        Women bring collaboration, empathy, and resilience to leadership — qualities that drive stronger teams and better outcomes.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>


        {{-- Why we do what we do
        <section class="choose-area shortcode-about-us-information-style-8"
            style="background: url('https://gerow.botble.com/storage/backgrounds/services-bg.jpg')">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 order-0 order-lg-2">
                        <div class="choose-img-wrap">
                            <img src="https://apexa-insurance.archielite.com/storage/general/about-us-information-8-1.jpg"
                                data-bb-lazy="true" loading="lazy"
                                data-src="https://apexa-insurance.archielite.com/storage/general/about-us-information-8-1.jpg"
                                alt="image" data-ll-status="loaded" class="entered loaded">

                            <img src="https://apexa-insurance.archielite.com/storage/general/about-us-information-8-2.jpg"
                                data-bb-lazy="true" data-parallax="{&quot;x&quot; : 50 }" loading="lazy"
                                data-src="https://apexa-insurance.archielite.com/storage/general/about-us-information-8-2.jpg"
                                alt="image" data-ll-status="loaded" class="entered loaded"
                                style="transform:translate3d(22.835px, 0px, 0px) rotateX(0deg) rotateY(0deg) rotateZ(0deg) scaleX(1) scaleY(1) scaleZ(1); -webkit-transform:translate3d(22.835px, 0px, 0px) rotateX(0deg) rotateY(0deg) rotateZ(0deg) scaleX(1) scaleY(1) scaleZ(1); ">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="choose-content">
                            <div class="about-section-title">
                                <span class="sub-title">WHY WE ARE THE BEST</span>

                                <h2 class="title tg-element-title">
                                    We Offer Business Insight
                                    World Class Consulting
                                </h2>
                            </div>

                            <p>We successfully cope with tasks of varying complexity provide area longerty guarantees and
                                regularly master new Practice Following gies heur portfolio includes dozen.</p>

                            <div class="choose-list">
                                <ul class="list-wrap">
                                    <li class="">
                                        <div class="icon ">
                                            <svg class="icon  svg-icon-ti-ti-chart-pie-2"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M12 3v9h9"></path>
                                                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                                            </svg>
                                        </div>
                                        <div class="content ">
                                            <h4 class="title">Business Solutions</h4>

                                            <p>Semper egetuis kelly for tellus urna area condition.</p>
                                        </div>
                                    </li>
                                    <li class="">
                                        <div class="icon ">
                                            <svg class="icon  svg-icon-ti-ti-broadcast" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M18.364 19.364a9 9 0 1 0 -12.728 0"></path>
                                                <path d="M15.536 16.536a5 5 0 1 0 -7.072 0"></path>
                                                <path d="M12 13m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                            </svg>
                                        </div>
                                        <div class="content ">
                                            <h4 class="title">Market Analysis</h4>

                                            <p>Semper egetuis kelly for tellus urna area condition.</p>
                                        </div>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}

        <section class="choose-area-two page_speed_199137594">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-6 col-md-8">
                        <div class="choose-img-two"><img src="{{ asset('assets/frontend/images/gender-gap-r.png') }}"
                                data-bb-lazy="true" loading="lazy"
                                data-src="{{ asset('assets/frontend/images/gender-gap-r.png') }}" alt="Gender Gap"
                                data-ll-status="loaded" class="entered loaded">
                            <img src="{{ asset('assets/frontend/images/shape3.png') }}" data-bb-lazy="true"
                                loading="lazy" data-src="{{ asset('assets/frontend/images/shape3.png') }}"
                                alt="Gender Gap" data-ll-status="loaded" class="entered loaded"><img
                                src="{{ asset('assets/frontend/images/shape4.png') }}" data-bb-lazy="true"
                                loading="lazy" data-src="{{ asset('assets/frontend/images/shape4.png') }}"
                                alt="Gender Gap" data-ll-status="loaded" class="entered loaded">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="choose-content-two">
                            <div class="section-title-two white-title mb-30 tg-heading-subheading animation-style2"><span
                                    class="tg-element-title" style="perspective: 400px;">
                                    Why we do what we do
                                </span>
                                <h2 class="title tg-element-title" style="perspective: 400px;">
                                    Gender Gap Statistics
                                </h2>
                            </div>
                            <p>Despite progress, the gender gap in technology and entrepreneurship remains wide. Women represent less than <b>30%</b> of the global tech workforce and own fewer than <b>1 in 3</b> businesses worldwide. In many African countries, the gap is even greater, with women facing limited access to resources, mentorship, and digital opportunities.</p>
                            <div class="choose-circle-wrap">
                                <div class="circle-item" data-color="#0055FF">
                                    <div class="chart" data-percent="25">
                                        <div class="circle-content"><span class="percentage">25%</span>
                                            <p>Workforce Representation</p>
                                        </div><canvas height="320" width="320"
                                            style="height: 160px; width: 160px;"></canvas>
                                    </div>
                                </div>
                                <div class="circle-item" data-color="#0055FF">
                                    <div class="chart" data-percent="11">
                                        <div class="circle-content"><span class="percentage">11%</span>
                                            <p>Leading Positions</p>
                                        </div><canvas height="320" width="320"
                                            style="height: 160px; width: 160px;"></canvas>
                                    </div>
                                </div>
                                <div class="circle-item" data-color="#0055FF">
                                    <div class="chart" data-percent="35">
                                        <div class="circle-content"><span class="percentage">35%</span>
                                            <p>The Gender Pay Gap</p>
                                        </div><canvas height="320" width="320"
                                            style="height: 160px; width: 160px;"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="choose-shape"><img src="https://gerow.botble.com/storage/backgrounds/choose-shape.png"
                    data-bb-lazy="true" data-aos="fade-right" data-aos-delay="200" loading="lazy"
                    data-src="https://gerow.botble.com/storage/backgrounds/choose-shape.png" alt="Gender Gap"
                    class="aos-init entered loaded aos-animate" data-ll-status="loaded"></div>
        </section>

        {{-- Why women --}}

        <section class="about-area about-three-area sub-bg">
            <div class="about__shape wow slideInLeft" data-wow-delay="400ms" data-wow-duration="1500ms"
                style="visibility: visible; animation-duration: 1500ms; animation-delay: 400ms; animation-name: slideInLeft;">
                <img src="https://gratech.coevs.com/assets/general/images/WoIdnnO6Sdvh2iPcQ1Gr.png" alt="shape">
            </div>
            <div class="about-three__box-up wow slideInRight" data-wow-delay="00ms" data-wow-duration="1500ms"
                style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: slideInRight;">
                <img class="sway_Y__animationY"
                    src="https://gratech.coevs.com/assets/general/images/r1eiyh7VshM5NU2OdN2u.png" alt="shape">
            </div>
            <div class="about-three__box-down wow slideInRight" data-wow-delay="200ms" data-wow-duration="1500ms"
                style="visibility: visible; animation-duration: 1500ms; animation-delay: 200ms; animation-name: slideInRight;">
                <img class="sway_Y__animation"
                    src="https://gratech.coevs.com/assets/general/images/E6LLzSPcbuBhZBBLD8zm.png" alt="shape">
            </div>
            <div class="container">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-5 order-2 order-lg-1">
                        <div class="about-three__left-item">
                            <div class="about-section-title mb-25">
                                <span class="sub-title">GROW Community</span>
                                <h2 class="title tg-element-title">
                                    We (Women Excel) are GROWers!
                                </h2>
                                <p><span style="color: #f6871f; font-weight: 700">GROW (Girls and Women Rising on the Web)</span>
                                    provides a network,
                                    support system, personal and professional development
                                    opportunities to amplify the success of self-identifying women
                                    who are interested in tech, leadership, entrepreneurship or
                                    are already starting businesses in Africa.

                                </p>
                                <p><span style="color: #f6871f; font-weight: 700">GROW</span> mission is to give <span
                                        style="color: #f6871f; font-weight: 700">YOU</span> the network, resources, and
                                    accountability to develop both personally and professionally to succeed in whatever
                                    career path you chose.</p>
                            </div>
                            <div class="about-three__info margin-bottom-40">
                                <div class="row g-4 wow fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms"
                                    style="visibility: visible; animation-duration: 1500ms; animation-delay: 200ms; animation-name: fadeInDown;">
                                    <div class="col-md-6">
                                        <div class="about__right-item">
                                            <div class="icon">
                                                <img src="https://gratech.coevs.com/assets/general/images/IQyJTXkyL1D5GD445Fiy.png"
                                                    alt="icon">
                                            </div>
                                            <div class="content">
                                                <h4 class="mb-1">Confidence building</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="about__right-item">
                                            <div class="icon">
                                                <img src="https://gratech.coevs.com/assets/general/images/QLZfs81HZY4ciXxZFUuO.png"
                                                    alt="icon">
                                            </div>
                                            <div class="content">
                                                <h4 class="mb-1">Business Growth</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="about-three__info ">
                                <div class="row g-4 wow fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms"
                                    style="visibility: visible; animation-duration: 1500ms; animation-delay: 200ms; animation-name: fadeInDown;">
                                    <div class="col-md-6">
                                        <div class="about__right-item">
                                            <div class="icon">
                                                <img src="https://gratech.coevs.com/assets/general/images/IQyJTXkyL1D5GD445Fiy.png"
                                                    alt="icon">
                                            </div>
                                            <div class="content">
                                                <h4 class="mb-1">Capacity Strenthening</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="about__right-item">
                                            <div class="icon">
                                                <img src="https://gratech.coevs.com/assets/general/images/QLZfs81HZY4ciXxZFUuO.png"
                                                    alt="icon">
                                            </div>
                                            <div class="content">
                                                <h4 class="mb-1">Koffee Konnections</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="https://bit.ly/GROWKommunity" class="about-boxed-btn slider-boxed-btn">Join
                                    Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 order-1 order-lg-2">
                        <div class="faq__image about-three__image image wow fadeInRight">
                            <div class="about-three-dot">
                                <img class="sway__animationX"
                                    src="https://gratech.coevs.com/assets/general/images/jlk9SbvrzRdSnaROyQgl.png"
                                    alt="shape">
                            </div>
                            {{-- <div class="about-three-count p-4 d-flex align-items-center gap-3">
                                <img class="icon"
                                    src="https://gratech.coevs.com/assets/general/images/yzBJyIcquJ1ZTyQGKKQI.png"
                                    alt="icon">
                                <div class="con">
                                    <h3><span class="count">500</span>+</h3>
                                    <span class="span">Community Members</span>
                                </div>
                            </div> --}}
                            <div class="faq__line sway__animation">
                                <img src="https://gratech.coevs.com/assets/general/images/AR4qBRWmgCOWHac7I0BQ.png"
                                    alt="image">
                            </div>
                            <img src="{{ asset('assets/frontend/images/grow-network.webp') }}" alt="image">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Count down --}}

        <section class="counter-area shortcode-site-statistics"
            style="--background-color: rgb(255, 251, 243); --background-image: url(https://apexa-insurance.archielite.com/storage/backgrounds/site-statistics-bg.png);">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="counter-item">
                            <div class="icon">
                                <img src="https://apexa-insurance.archielite.com/storage/icons/trophy.png"
                                    data-bb-lazy="true" loading="lazy"
                                    data-src="https://apexa-insurance.archielite.com/storage/icons/trophy.png"
                                    alt="Successfully Completed Projects" data-ll-status="loaded" class="entered loaded">
                            </div>

                            <div class="content">
                                <h2 class="count"> <span data-purecounter-start="0" data-purecounter-end="232"
                                        data-purecounter-duration="1" class="purecounter"></span>
                                    +</h2> Successfully Completed Programs
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="counter-item">
                            <div class="icon">
                                <img src="https://apexa-insurance.archielite.com/storage/icons/star.png"
                                    data-bb-lazy="true" loading="lazy"
                                    data-src="https://apexa-insurance.archielite.com/storage/icons/star.png"
                                    alt="Satisfied 100% Our Clients" data-ll-status="loaded" class="entered loaded">
                            </div>

                            <div class="content">
                                <h2 class="count"> <span data-purecounter-start="0" data-purecounter-end="232"
                                        data-purecounter-duration="1" class="purecounter"></span>
                                    +</h2>
                                Girls/Women Trained
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="counter-item">
                            <div class="icon">
                                <img src="https://apexa-insurance.archielite.com/storage/icons/popularity.png"
                                    data-bb-lazy="true" loading="lazy"
                                    data-src="https://apexa-insurance.archielite.com/storage/icons/popularity.png"
                                    alt="All Over The World We Are Available" data-ll-status="loaded"
                                    class="entered loaded">
                            </div>

                            <div class="content">
                                <h2 class="count"> <span data-purecounter-start="0" data-purecounter-end="232"
                                        data-purecounter-duration="1" class="purecounter"></span>
                                    +</h2>
                                Girls/Women Inspired
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="counter-item">
                            <div class="icon">
                                <img src="https://apexa-insurance.archielite.com/storage/icons/time.png"
                                    data-bb-lazy="true" loading="lazy"
                                    data-src="https://apexa-insurance.archielite.com/storage/icons/time.png"
                                    alt="Years of Experiences To Run This Company" data-ll-status="loaded"
                                    class="entered loaded">
                            </div>

                            <div class="content">
                                <h2 class="count"><span class="odometer" data-count="25">25</span>+</h2>
                                Girls/Women Transformed
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- ======= about_page-team Section ======= -->
        <section id="about_page-team" class="about_page-team">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <span>Team</span>
                    <h2>Our Team in a Glance</h2>
                    <p>At Paahibu Space, our Leadership Team is a dynamic ensemble of skilled and passionate young
                        individuals. We are not just a team, we are the driving force behind the technological and
                        entrepreneurial empowerment of girls and women-led businesses.</p>

                </div>

                <div class="wrapper">
                    <div class="container">
                        @foreach ($all_team_members->groupBy('team_category_id') as $categoryId => $teamMembers)
                            @php
                                // Fetch the category name based on the category ID
                                $categoryName = $all_categories->find($categoryId)->name ?? 'Uncategorized';
                            @endphp
                            <div class="category-section">
                                <div class="category-title">
                                    <h2>{{ $categoryName }}</h2>
                                </div>
                                <div class="row gy-4">
                                    @foreach ($teamMembers as $data)
                                        <div class="col-lg-3 col-md-6 d-flex align-items-stretch aos-init aos-animate"
                                            data-aos="fade-up" data-aos-delay="100">
                                            <div class="team-member">
                                                <div class="member-img">
                                                    {!! render_image_markup_by_attachment_id($data->image, 'img-fluid') !!}
                                                    <div class="social">
                                                        @php
                                                            $social_fields = [
                                                                'icon_one' => 'icon_one_url',
                                                                'icon_two' => 'icon_two_url',
                                                                'icon_three' => 'icon_three_url',
                                                            ];
                                                        @endphp
                                                        @foreach ($social_fields as $key => $value)
                                                            <a href="{{ $data->$value }}"><i
                                                                    class="{{ $data->$key }}"></i></a>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="member-info">
                                                    <h4>{{ $data->name }}</h4>
                                                    <span>{{ $data->designation }}</span>
                                                </div>
                                            </div>
                                        </div><!-- End Team Member -->
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>


            </div>
        </section><!-- End about_page-team Section -->

        {{-- <section id="testimonial-area" class="testimonial-area bg-image-01 padding-top-110 padding-bottom-115 margin-bottom-100"
            style="background-image: url({{ asset('assets/frontend/images/img3.jpeg') }})">
            <div class=" container ">
                <div class="row justify-content-center ">
                    <div class="col-lg-8 ">
                        <div class="section-title white text-center padding-bottom-20">
                            <h1 class="title ">
                                Clients Testimonials</h1>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-lg-12 ">
                        <div class="testimonial-carousel-area margin-top-10 ">
                            <div class="testimonial-carousel global-carousel-init" data-loop="true" data-desktopitem="1"
                                data-mobileitem="1" data-tabletitem="1" data-autoplay="true" data-margin="0">
                                @foreach ($all_testimonial as $data)
                                    <div class="single-testimonial-item ">
                                        <div class="content style-01">
                                            <div class="thumb ">
                                                {!! render_image_markup_by_attachment_id($data->image) !!}
                                            </div>
                                            <p class="description ">{{ $data->description }}</p>
                                            <div class="author-details ">
                                                <div class="author-meta ">
                                                    <h4 class="title ">{{ $data->name }}</h4>
                                                    <span class="designation ">{{ $data->designation }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}

    </main>
@endsection
