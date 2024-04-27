@extends('frontend.layout')

@section('content')
<!-- ======= Hero Slider Section ======= -->
<div id="hero-slider" class="hero-slider">
    <div class="hero-container" data-aos="fade-in">
        <div class="row">
            <div class="col-12">
                <div class="swiper sliderFeaturedPosts">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="img-bg d-flex align-items-end"
                                style="background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.402) 0%, rgba(0, 0, 0, 0.343) 50%), url('./assets/images/img3.jpeg');">
                                <div class="img-bg-inner" data-aos="fade-left" data-aos-delay="100">
                                    <h1>Paahibu Space</h1>
                                    <h2>Access | Innovate | Transfrom</h2>
                                    <p>Paahibu Space aims at creating an amazing community of African women who are
                                        passionate about using tech to revolutionize Africa and beyond.</p>
                                    <a href="#about-section" class="slider-boxed-btn">Learn More</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="video-bg">
                                <iframe width="100%" height="100%"
                                    src="{{ asset('assets/frontend/images/pexels-edmond-dantès-8643891 (2160p).mp4') }}" frameborder="0"
                                    allowfullscreen loop></iframe>
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
                        </div>

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
    </div>
</div><!-- End Hero Slider Section -->

<section id="about-section" class="about-section">
    <div class="container">
        <div class="row">

            <div class="col-md-7">

                <div class="pictures-row">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="item-about">
                                <div class="imgone big-paral">
                                    <div class="simpleParallax" data-aos="fade-up" data-aos-delay="200"><img
                                            src="{{ asset('assets/frontend/images/about-img1.jpeg') }}" width="500" height="666"
                                            class="lazy thumparallax-down img-fluid" alt="two-images-1.jpg"></div>
                                </div>
                                <div class="exp-about">
                                    <h5 class="nmb-font-about">2</h5>
                                    <h6 class="service_summary-about">- Years of experience</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="item-about">
                                <div class="imgtwo big-paral">
                                    <div class="simpleParallax" data-aos="fade-down" data-aos-delay="100"><img
                                            src="{{ asset('assets/frontend/images/about-img2.jpeg') }}" width="500" height="820"
                                            class="lazy thumparallax img-fluid" alt="two-images-1.jpg"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <div class="col-md-5">

                <h4 class="about-heading1-home">About Paahibu Space</h4>
                <h3 class="about-heading2-home">Inclusivity and Access to Knowledge</h3>

                <p>Paahibu Space is a non-profit tech and entrepreneurship development organization focusing
                    providing digital solutions to small businesses and nonprofits led by women, while educating,
                    inspiring, empowering, and shaping the personal and professional development of the next
                    generation of African female leaders in technology, innovation, entrepreneurship, and business
                    by equipping them with knowledge and skills they will need to turn their communities’ problems
                    and challenges into solutions and opportunities in an evolving digital world.</p>

                <a href="about.html" target="_self" class="about-boxed-btn slider-boxed-btn"><span>Read
                        more</span></a>

            </div>


        </div>
    </div>
</section>


<!-- ======= Why Choose Us Section ======= -->
<section id="why-us" class="why-us">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Our Philosophy</h2>
            <p></p>

        </div>

        <div class="row g-0" data-aos="fade-up" data-aos-delay="200">

            <div class="col-xl-5 img-bgg" style="background-image: url('{{ asset('assets/frontend/images/customers-love.jpeg') }}')">
            </div>
            <div class="col-xl-7 slides  position-relative">

                <div class="slides-1 swiper">
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="item">
                                <h3 class="mb-3">Building Relationships, Not Just Transactions</h3>
                                <h4 class="mb-3">We believe in fostering enduring relationships. It's not a
                                    one-time
                                    deal; it's a commitment to your business's sustained growth.</h4>
                                <p>Beyond Business, We Nurture Connections
                                    Our commitment doesn't end with the project. We're here for the long haul,
                                    nurturing our connections well beyond the scope of the initial engagement.

                                </p>
                            </div>
                        </div><!-- End slide item -->

                        <div class="swiper-slide">
                            <div class="item">
                                <h3 class="mb-3">One Big Family</h3>
                                <h4 class="mb-3">Joining hands with Paahibu Digital Solutions isn't just a
                                    business
                                    decision;</h4>
                                <p>it's becoming a part of our extensive family. Your success is our success, and
                                    your challenges are our challenges.
                                </p>
                            </div>
                        </div><!-- End slide item -->

                        <div class="swiper-slide">
                            <div class="item">
                                <h3 class="mb-3">Why We Continue to Stand Out</h3>
                                <!-- <h4 class="mb-3">
                            </h4> -->
                                <p>Community-Centric Approach: You're not just a client; you're an integral part of
                                    our thriving community.</p>
                            </div>
                        </div><!-- End slide item -->

                        <div class="swiper-slide">
                            <div class="item">
                                <h3 class="mb-3">Relationship Commitment</h3>
                                <h4 class="mb-3">Our dedication extends far beyond the completion of a project;
                                    it's
                                    about standing by you in your journey.</h4>
                                <p>Family Values: At Paahibu Digital Solutions, we operate like a family. Your
                                    victories are our celebrations, and we navigate challenges together.

                                    Join us, not as a client, but as an esteemed member of our close-knit family.
                                    Experience business relationships that go beyond transactions and see how,
                                    together, we can achieve remarkable milestones. Welcome to Paahibu Digital
                                    Soluti3, where we build not just websites and brands but lasting partnerships.
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

<!-- ======= partners Section ======= -->
<section id="partners" class="partners">
    <div class="container" data-aos="zoom-out">
        <div class="section-title">
            <h2>Our Partners And Supporters</h2>
            <p></p>

        </div>
        <div class="partners-slider swiper">

            <div class="swiper-wrapper align-items-center">
                <div class="swiper-slide"><img src="{{ asset('assets/frontend/images/partners/AMN-Transp.png') }}" class="img-fluid"
                        alt=""></div>
                <div class="swiper-slide"><img src="{{ asset('assets/frontend/images/partners/giz (1).png') }}" class="img-fluid"
                        alt="">
                </div>
                <div class="swiper-slide"><img src="{{ asset('assets/frontend/images/partners/mcf-logo.jpg') }}" class="img-fluid"
                        alt="">
                </div>
                <div class="swiper-slide"><img src="{{ asset('assets/frontend/images/partners/afrilabs-logo-1.png') }}" class="img-fluid"
                        alt=""></div>
                <div class="swiper-slide"><img src="{{ asset('assets/frontend/images/partners/AMN-Transp.png') }}" class="img-fluid"
                        alt=""></div>
                <div class="swiper-slide"><img src="{{ asset('assets/frontend/images/partners/giz (1).png') }}" class="img-fluid"
                        alt="">
                </div>
                <div class="swiper-slide"><img src="{{ asset('assets/frontend/images/partners/afrilabs-logo-1.png') }}" class="img-fluid"
                        alt=""></div>
                <div class="swiper-slide"><img src="{{ asset('assets/frontend/images/partners/AMN-Transp.png') }}" class="img-fluid"
                        alt=""></div>
            </div>
        </div>

    </div>
</section><!-- End partners Section -->


<!-- ======= Testimonials Section ======= -->
<section id="testimonials" class="testimonials section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Impact Stories</h2>
            <!-- <p>Testimonials</p> -->
        </div>

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper-wrapper">

                <div class="swiper-slide">
                    <div class="testimonial-wrap">
                        <div class="testimonial-item">
                            <img src="{{ asset('assets/frontend/images/no-image.webp') }}" class="testimonial-img" alt="">
                            <h3>Gifty</h3>
                            <h4>Women in Digital Business (WiDiB) Participant</h4>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                "One of my key takeaways was optimizing social media marketing. I revamped the
                                social media profiles of my business, posted consistently, and crafted engaging
                                content. This resulted in a significant increase in followers and customer
                                engagement."
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                        </div>
                    </div>
                </div><!-- End testimonial item -->

                <div class="swiper-slide">
                    <div class="testimonial-wrap">
                        <div class="testimonial-item">
                            <img src="{{ asset('assets/frontend/images/no-image.webp') }}" class="testimonial-img" alt="">
                            <h3>Rose</h3>
                            <h4>Women in Digital Business (WiDiB) Participant</h4>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                For me, the facilitators/speakers were incredibly inspiring. Hearing from industry
                                experts and successful entrepreneurs provided a unique perspective and motivated me
                                to aim higher in my business endeavours especially in this digital era.
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                        </div>
                    </div>
                </div><!-- End testimonial item -->

                <div class="swiper-slide">
                    <div class="testimonial-wrap">
                        <div class="testimonial-item">
                            <img src="{{ asset('assets/frontend/images/no-image.webp') }}" class="testimonial-img" alt="">
                            <h3>Mckeown</h3>
                            <h4>Digital Skills for MSMEs Participant</h4>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                What truly stood out for me were the practical skillsI gained. The hands-on approach
                                to learning allowed me to immediately apply what I learned to my business. I wish
                                they could be more of such programs like the Digital Skills Training for MSMEs by
                                Paahibu Space.
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                        </div>
                    </div>
                </div><!-- End testimonial item -->
                <div class="swiper-slide">
                    <div class="testimonial-wrap">
                        <div class="testimonial-item">
                            <img src="{{ asset('assets/frontend/images/no-image.webp') }}" class="testimonial-img" alt="">
                            <h3>Anifa</h3>
                            <h4>Digital Skills for MSMEs Participant</h4>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                Through the program, I connected with fellow entrepreneurs and industry experts.
                                These connections are important to build collaborations that can increase my
                                customer base.
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                        </div>
                    </div>
                </div><!-- End testimonial item -->

            </div>
            <div class="swiper-pagination"></div>
        </div>

    </div>
</section><!-- End Testimonials Section -->
@endsection

