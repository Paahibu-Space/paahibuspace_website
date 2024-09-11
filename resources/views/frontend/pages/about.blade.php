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
                        <h3 class="pt-0 pt-lg-5">Paahibu Space. Innovate, Access, Transform
                        </h3>

                        <!-- Tabs -->
                        <ul class="nav nav-pills mb-3">
                            <li><a class="nav-link active" data-bs-toggle="pill" href="#tab1">Our Mission</a></li>
                            <li><a class="nav-link" data-bs-toggle="pill" href="#tab2">Our Essence: The Paahibu Story</a>
                            </li>
                            <li><a class="nav-link" data-bs-toggle="pill" href="#tab3">Inclusivity and Access to
                                    Knowledge</a></li>
                        </ul><!-- End Tabs -->

                        <!-- Tab Content -->
                        <div class="tab-content">

                            <div class="tab-pane fade show active" id="tab1">

                                <p>Paahibu Space is a safe and inclusive space committed to fostering a culture of
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
                                    West Region of Ghana, West Africa. Paahibu means inclusion, access, equality and
                                    community/unity/togetherness.</p>

                                <p>At Paahibu Space, we are more than a tech and entrepreneurship development organization;
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

                                <p>Our main goals are to break stereotypes, grow more informed, and encourage the active
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

                                <p>We open our doors to every girl, woman-led business, and anyone ready to join our
                                    community. At
                                    Paahibu Space, we empower you to access knowledge, turning it into ideas, solutions, and
                                    opportunities
                                    that transform not just yourself but your business and community.
                                </p>

                                <p>The Paahibu Space’s brand symbolises energy, strength, equality, and a world free of
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

        <section class="top-experience-area padding-top-120">
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
        </div>

        <!-- ======= about_page-team Section ======= -->
        <section id="about_page-team" class="about_page-team">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Our Team in a Glance</h2>
                    <p>At Paahibu Space, our Leadership Team is a dynamic ensemble of skilled and passionate young
                        individuals. We are not just a team; we are the driving force behind the technological and
                        entrepreneurial empowerment of girls and women-led businesses.</p>
                </div>

                <div class="row">

                    <div class="col-lg-12">
                        <div class="team-carousel global-carousel-init" data-loop="true" data-desktopitem="4"
                            data-mobileitem="1" data-tabletitem="2" data-autoplay="true" data-margin="30">
                            @foreach ($all_team_members as $data)
                                <div class="member" data-aos="zoom-in" data-aos-delay="100">
                                    {!! render_image_markup_by_attachment_id($data->image, 'img-fluid') !!}

                                    <div class="member-info">
                                        <div class="member-info-content">
                                            <h4>{{ $data->name }}</h4>
                                            <span>{{ $data->designation }}</span>
                                        </div>
                                        <div class="social">
                                            @php
                                                $social_fields = [
                                                    'icon_one' => 'icon_one_url',
                                                    'icon_two' => 'icon_two_url',
                                                    'icon_three' => 'icon_three_url',
                                                    'icon_four' => 'icon_four_url',
                                                ];
                                            @endphp
                                            @foreach ($social_fields as $key => $value)
                                                <a href="{{ $data->$value }}"><i class="{{ $data->$key }}"></i></a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                    </div>

                </div>

            </div>
        </section><!-- End about_page-team Section -->

        <section id="testimonial-area" class="testimonial-area bg-image-01 padding-top-110 padding-bottom-115 margin-bottom-100"
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
        </section>

    </main>
@endsection
