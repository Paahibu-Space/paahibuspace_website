@extends('frontend.layout')
@section('site-title')
    {{ get_static_option('programs_page_name') }}
@endsection
@section('page-title')
    {{ get_static_option('programs_page_name') }}
@endsection
@section('page-meta-data')
    <meta name="description" content="{{ get_static_option('programs_page_meta_description') }}">
    <meta name="tags" content="{{ get_static_option('programs_page_meta_tags') }}">
    {!! render_og_meta_image_by_attachment_id(get_static_option('programs_page_meta_image')) !!}
@endsection
@section('content')
    <section class="program-overview">
    <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">
            <div class="col-lg-6 order-1 order-lg-2">
                {{-- <img src="{{ asset('assets/frontend/images/program/ndiara.png') }}" class="img-fluid" alt="Ndiara Program"> --}}
            </div>
            <div class="col-lg-6 order-2 order-lg-1 content">
                <h2 class="title">Ndiara Program</h2>
                <p class="fst-italic">
                    Ndiara is a financial inclusion initiative designed for women with disabilities engaged in economic activities. 
                    It raises financial literacy awareness and introduces fintech solutions, making financial services accessible 
                    and opportunities reachable.
                </p>
                <h5 class="fw-bold">What participants gain:</h5>
                <ul class="program-components">
                    <li><i class="bi bi-check2-all"></i> <span>Understand money management, budgeting, savings, and credit</span></li>
                    <li><i class="bi bi-check2-all"></i> <span>Confidence in using mobile money, digital wallets, and inclusive fintech platforms</span></li>
                    <li><i class="bi bi-check2-all"></i> <span>Access financial services tailored to their needs and contexts</span></li>
                    <li><i class="bi bi-check2-all"></i> <span>Learn simple tools to build and manage small businesses</span></li>
                    <li><i class="bi bi-check2-all"></i> <span>Improve economic decision-making and financial independence</span></li>
                    <li><i class="bi bi-check2-all"></i> <span>Connect with networks and inclusive financial institutions</span></li>
                    <li><i class="bi bi-check2-all"></i> <span>Receive toolkits and follow-up support for practical application</span></li>
                    <li><i class="bi bi-check2-all"></i> <span>Strengthen their voice and agency in family, community, and business</span></li>
                </ul>
                <p>
                    <span class="fw-bold">Ndiara</span> is a 6-week blended (in-person + digital) program, developed in collaboration with 
                    disabled persons' organizations, financial institutions, and community leaders to ensure inclusivity, accessibility, 
                    and real economic empowerment for women with disabilities.
                </p>
            </div>
        </div>
    </div>
</section>

{{-- The need --}}
<section class="about__area-six">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 col-md-8">
                {{-- <div class="about__img-wrap-six">
                    <img src="{{ asset('assets/frontend/images/program/ndiara-need.png') }}"
                        data-bb-lazy="true" loading="lazy"
                        data-src="{{ asset('assets/frontend/images/program/ndiara-need.png') }}"
                        alt="Ndiara Need" data-ll-status="loaded" class="entered loaded">
                </div> --}}
            </div>
            <div class="col-lg-6">
                <div class="about__content-six">
                    <div class="mb-25 tg-heading-subheading animation-style3">
                        <span class="sub-title">THE NEED</span>
                        <h2 class="title tg-element-title" style="perspective: 400px;">
                            Why We Embark On This Initiative
                        </h2>
                    </div>
                    <p>
                        Many women with disabilities remain excluded from financial systems and opportunities due to systemic barriers. 
                        Ndiara creates a safe, inclusive, and empowering space to address these challenges and enable access to financial independence.
                    </p>
                    <div class="about__content-inner-four">
                        <div class="about__list-box">
                            <ul class="list-wrap">
                                <li><i class="bi bi-arrow-right"></i> Lack of accessible financial education in rural and underserved areas</li>
                                <li><i class="bi bi-arrow-right"></i> Limited access to banks or mobile money agents due to infrastructure</li>
                                <li><i class="bi bi-arrow-right"></i> Stigma and discrimination from providers and society</li>
                                <li><i class="bi bi-arrow-right"></i> Digital illiteracy limiting use of fintech for autonomy</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Goals --}}
<section class="choose__area-five" style="--background-color: transparent;">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 margin-bottom-30">
                <div class="choose__content-five">
                    <div class="margin-bottom-30">
                        <span class="sub-title">GOALS</span>
                        <h2 class="title">Our Goals For This Program</h2>
                    </div>
                    <p>
                        Ndiara aims to break financial barriers for women with disabilities, strengthening their financial literacy, 
                        confidence, and independence while promoting inclusive policies and services.
                    </p>
                    <div class="choose__box-wrap">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="choose__box">
                                    <div class="content">
                                        <h4 class="title">200+</h4>
                                        <p>Train 200+ women with disabilities in financial literacy & business management</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="choose__box">
                                    <div class="content">
                                        <h4 class="title">60%</h4>
                                        <p>Ensure 60% gain access to inclusive fintech tools</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="choose__box">
                                    <div class="content">
                                        <h4 class="title">50%</h4>
                                        <p>Enable 50% to open and actively use mobile money or bank accounts</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="choose__box">
                                    <div class="content">
                                        <h4 class="title">Impact</h4>
                                        <p>Build peer networks, strengthen voices, and influence inclusive policies</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-9 margin-bottom-30">
                {{-- <div class="choose__img-wrap-five">
                    <img src="{{ asset('assets/frontend/images/program/ndiara-objectives.png') }}"
                        data-bb-lazy="true" loading="lazy"
                        data-src="{{ asset('assets/frontend/images/program/ndiara-objectives.png') }}"
                        alt="Ndiara Goals" data-ll-status="loaded" class="entered loaded">
                </div> --}}
            </div>
        </div>
    </div>
</section>

    {{-- Impact Statistics --}}
    <section class="counter-area">
        <div class="container">
            <div class="counter__wrp gradient-bg">
                <div class="counter__item wow bounceInUp" data-wow-delay="00ms" data-wow-duration="1000ms"
                    style="visibility: visible; animation-duration: 1000ms; animation-delay: 0ms; animation-name: bounceInUp;">
                    <img src="https://gratech.coevs.com/assets/general/images/ETP5udJr7yH1P3J0fAr1.png" alt="icon">
                    <div class="content">
                        <h3><span data-purecounter-start="0" data-purecounter-end="232"
                            data-purecounter-duration="1" class="purecounter"></span>+</h3>
                        <p class="text-white">Women Empowered</p>
                    </div>
                </div>
                <div class="counter__item wow bounceInUp" data-wow-delay="00ms" data-wow-duration="1000ms"
                    style="visibility: visible; animation-duration: 1000ms; animation-delay: 0ms; animation-name: bounceInUp;">
                    <img src="https://gratech.coevs.com/assets/general/images/8MUE9rfNP2etAZJ3WEEw.png" alt="icon">
                    <div class="content">
                        <h3><span data-purecounter-start="0" data-purecounter-end="500"
                            data-purecounter-duration="1" class="purecounter"></span>+</h3>
                        <p class="text-white">Training Sessions Conducted</p>
                    </div>
                </div>
                <div class="counter__item wow bounceInUp" data-wow-delay="00ms" data-wow-duration="1000ms"
                    style="visibility: visible; animation-duration: 1000ms; animation-delay: 0ms; animation-name: bounceInUp;">
                    <img src="https://gratech.coevs.com/assets/general/images/I2wgI8VIUcinhY4aMzPf.png" alt="icon">
                    <div class="content">
                        <h3><span data-purecounter-start="0" data-purecounter-end="100"
                            data-purecounter-duration="1" class="purecounter"></span>+</h3>
                        <p class="text-white">Mentors</p>
                    </div>
                </div>
                <div class="counter__item wow bounceInUp" data-wow-delay="00ms" data-wow-duration="1000ms"
                    style="visibility: visible; animation-duration: 1000ms; animation-delay: 0ms; animation-name: bounceInUp;">
                    <img src="https://gratech.coevs.com/assets/general/images/ZXTeT8rvVoyRWhQginA0.png" alt="icon">
                    <div class="content">
                        <h3><span data-purecounter-start="0" data-purecounter-end="120"
                            data-purecounter-duration="1" class="purecounter"></span>+</h3>
                        <p class="text-white">Community Advocacy Campaigns</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Application process --}}
    <section class="steps__area-seven shortcode-instruction-steps">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 margin-bottom-30">
                    <h3 class="text-capitalize mw-460"> The Application Process</h3>
                    <p>Join the Ndiara and take the first step toward transforming your future in technology and entrepreneurship.</p>
                </div>
                <div class="col-lg-6 margin-bottom-30">
                    <h3 style="color: #f6871f !important; font-weight: 700">Next Cohort Begins Soon</h3>
                    <p> Be part of a vibrant community dedicated to equipping women with digital and entrepreneurial skills. Applications are now open! Seize this opportunity to innovate, grow, and lead in the digital economy.
                    </p>
                </div>
            </div>
            <div class="row margin-top-40">
                <div class="col-lg-4 margin-bottom-40">
                    <div class="card-step">
                        <div class="card-icon"><svg class="icon svg-icon-ti-ti-chart-pie"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path
                                    d="M10 3.2a9 9 0 1 0 10.8 10.8a1 1 0 0 0 -1 -1h-6.8a2 2 0 0 1 -2 -2v-7a.9 .9 0 0 0 -1 -.8">
                                </path>
                                <path d="M15 3.5a9 9 0 0 1 5.5 5.5h-4.5a1 1 0 0 1 -1 -1v-4.5"></path>
                            </svg></div>
                        <div class="card-info">
                            <h5>Step 1: Submit Your Application</h5>
                            <p class="truncate-3-custom">Complete our online application form and share your background, interests, and goals.</p>
                                <a class="about-boxed-btn slider-boxed-btn">Apply Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 margin-bottom-40">
                    <div class="card-step">
                        <div class="card-icon"><svg class="icon svg-icon-ti-ti-bulb" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M3 12h1m8 -9v1m8 8h1m-15.4 -6.4l.7 .7m12.1 -.7l-.7 .7"></path>
                                <path d="M9 16a5 5 0 1 1 6 0a3.5 3.5 0 0 0 -1 3a2 2 0 0 1 -4 0a3.5 3.5 0 0 0 -1 -3"></path>
                                <path d="M9.7 17l4.6 0"></path>
                            </svg></div>
                        <div class="card-info">
                            <h5>Step 2: Screening & Shortlisting</h5>
                            <p class="truncate-3-custom">Our team carefully reviews all applications to select candidates who align with our mission and vision. Shortlisted applicants will be contacted for the next steps.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 margin-bottom-40">
                    <div class="card-step">
                        <div class="card-icon"><svg class="icon svg-icon-ti-ti-rocket" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path
                                    d="M4 13a8 8 0 0 1 7 7a6 6 0 0 0 3 -5a9 9 0 0 0 6 -8a3 3 0 0 0 -3 -3a9 9 0 0 0 -8 6a6 6 0 0 0 -5 3">
                                </path>
                                <path d="M7 14a6 6 0 0 0 -3 6a6 6 0 0 0 6 -3"></path>
                                <path d="M15 9m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                            </svg></div>
                        <div class="card-info">
                            <h5>Step 3: Onboarding & Orientation
                            </h5>
                            <p class="truncate-3-custom">Successful candidates will receive onboarding details, program guidelines, and resources to kickstart their journey with us.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Highlighted Story --}}
    {{-- <section class="program-highlighted-story">
        <div class="container">
            <div class="row align-items-center">
                <div class="text-section col-lg-6">
                    <h1>Patricia Naah Story:<br>Project Management for Female Entrepreneurs</span></h1>
                </div>

                <div class="video-section col-lg-6">
                    <iframe width="650" height="400"
                        src="https://www.youtube.com/embed/FPcD75pIb_I?si=E6QmyO7gmy1E9ypd" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            </div>

        </div>
    </section> --}}


    <section id="impact-story" class="impact-story section">

        <div class="site-section slider-impact-story-wrap">
            <div class="container">
                <h2 class="title">Some Young Impact Stories</h2>

                <div class="slider-nav d-flex justify-content-end margin-bottom-30">
                    <a href="#" class="js-prev js-custom-prev"><i class="bi bi-arrow-left-short"></i></a>
                    <a href="#" class="js-next js-custom-next"><i class="bi bi-arrow-right-short"></i></a>
                </div>

                <div class="swiper init-swiper" data-aos="fade-up" data-aos-delay="100">
                    <script type="application/json" class="swiper-config">
                {
                  "loop": true,
                  "speed": 600,
                  "autoplay": {
                    "delay": 5000
                  },
                  "slidesPerView": "1",
                  "pagination": {
                    "el": ".swiper-pagination",
                    "type": "bullets",
                    "clickable": true
                  },
                  "navigation": {
                    "nextEl": ".js-custom-next",
                    "prevEl": ".js-custom-prev"
                  },
                  "breakpoints": {
                    "640": {
                      "slidesPerView": 2,
                      "spaceBetween": 30
                    },
                    "768": {
                      "slidesPerView": 3,
                      "spaceBetween": 30
                    },
                    "1200": {
                      "slidesPerView": 4,
                      "spaceBetween": 30
                    }
                  }
                }
              </script>
                    <div class="swiper-wrapper">
                        @foreach ($all_stories as $story)
                            <div class="swiper-slide">
                                <div class="impact-story">
                                    <div class="pic">
                                        @if (!empty($story->image))
                                            {!! render_image_markup_by_attachment_id($story->image, 'testimonial-img') !!}
                                        @else
                                            <img src="{{ asset('assets/frontend/images/no-image.webp') }}" alt="No image"
                                                class="testimonial-img">
                                        @endif
                                    </div>
                                    <h3 clas="">
                                        <a href="#"><span class="">{{ $story->title }}</a>
                                    </h3>
                                    <span class="d-block position">{{ $story->tags }}</span>
                                    <p>
                                        {!! iFrameFilterInSummernoteAndRender($story->excerpt) !!}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                        <!-- <div class="swiper-slide"></div> -->
                    </div>
                </div>
            </div>
            <!-- /.container -->
        </div>
    </section><!-- /impact-story Section -->

        <!-- Faq Section -->
        <section class="faq-9 faq section light-background" id="faq">

            <div class="container">
              <div class="row">
      
                <div class="col-lg-5" data-aos="fade-up">
                  <h2 class="faq-title">Have a question? Check out the FAQ</h2>
                  <p class="faq-description">Maecenas tempus tellus eget condimentum rhoncus sem quam semper libero sit amet adipiscing sem neque sed ipsum.</p>
                  <div class="faq-arrow d-none d-lg-block" data-aos="fade-up" data-aos-delay="200">
                    <svg class="faq-arrow" width="200" height="211" viewBox="0 0 200 211" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M198.804 194.488C189.279 189.596 179.529 185.52 169.407 182.07L169.384 182.049C169.227 181.994 169.07 181.939 168.912 181.884C166.669 181.139 165.906 184.546 167.669 185.615C174.053 189.473 182.761 191.837 189.146 195.695C156.603 195.912 119.781 196.591 91.266 179.049C62.5221 161.368 48.1094 130.695 56.934 98.891C84.5539 98.7247 112.556 84.0176 129.508 62.667C136.396 53.9724 146.193 35.1448 129.773 30.2717C114.292 25.6624 93.7109 41.8875 83.1971 51.3147C70.1109 63.039 59.63 78.433 54.2039 95.0087C52.1221 94.9842 50.0776 94.8683 48.0703 94.6608C30.1803 92.8027 11.2197 83.6338 5.44902 65.1074C-1.88449 41.5699 14.4994 19.0183 27.9202 1.56641C28.6411 0.625793 27.2862 -0.561638 26.5419 0.358501C13.4588 16.4098 -0.221091 34.5242 0.896608 56.5659C1.8218 74.6941 14.221 87.9401 30.4121 94.2058C37.7076 97.0203 45.3454 98.5003 53.0334 98.8449C47.8679 117.532 49.2961 137.487 60.7729 155.283C87.7615 197.081 139.616 201.147 184.786 201.155L174.332 206.827C172.119 208.033 174.345 211.287 176.537 210.105C182.06 207.125 187.582 204.122 193.084 201.144C193.346 201.147 195.161 199.887 195.423 199.868C197.08 198.548 193.084 201.144 195.528 199.81C196.688 199.192 197.846 198.552 199.006 197.935C200.397 197.167 200.007 195.087 198.804 194.488ZM60.8213 88.0427C67.6894 72.648 78.8538 59.1566 92.1207 49.0388C98.8475 43.9065 106.334 39.2953 114.188 36.1439C117.295 34.8947 120.798 33.6609 124.168 33.635C134.365 33.5511 136.354 42.9911 132.638 51.031C120.47 77.4222 86.8639 93.9837 58.0983 94.9666C58.8971 92.6666 59.783 90.3603 60.8213 88.0427Z" fill="currentColor"></path>
                    </svg>
                  </div>
                </div>
      
                <div class="col-lg-7" data-aos="fade-up" data-aos-delay="300">
                  <div class="faq-container">
      
                    <div class="faq-item faq-active">
                      <h3>Non consectetur a erat nam at lectus urna duis?</h3>
                      <div class="faq-content">
                        <p>Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.</p>
                      </div>
                      <i class="faq-toggle bi bi-chevron-right"></i>
                    </div><!-- End Faq item-->
      
                    <div class="faq-item">
                      <h3>Feugiat scelerisque varius morbi enim nunc faucibus?</h3>
                      <div class="faq-content">
                        <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.</p>
                      </div>
                      <i class="faq-toggle bi bi-chevron-right"></i>
                    </div><!-- End Faq item-->
      
                    <div class="faq-item">
                      <h3>Dolor sit amet consectetur adipiscing elit pellentesque?</h3>
                      <div class="faq-content">
                        <p>Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis</p>
                      </div>
                      <i class="faq-toggle bi bi-chevron-right"></i>
                    </div><!-- End Faq item-->
      
                    <div class="faq-item">
                      <h3>Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla?</h3>
                      <div class="faq-content">
                        <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.</p>
                      </div>
                      <i class="faq-toggle bi bi-chevron-right"></i>
                    </div><!-- End Faq item-->
      
                    <div class="faq-item">
                      <h3>Tempus quam pellentesque nec nam aliquam sem et tortor?</h3>
                      <div class="faq-content">
                        <p>Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in</p>
                      </div>
                      <i class="faq-toggle bi bi-chevron-right"></i>
                    </div><!-- End Faq item-->
      
                    <div class="faq-item">
                      <h3>Perspiciatis quod quo quos nulla quo illum ullam?</h3>
                      <div class="faq-content">
                        <p>Enim ea facilis quaerat voluptas quidem et dolorem. Quis et consequatur non sed in suscipit sequi. Distinctio ipsam dolore et.</p>
                      </div>
                      <i class="faq-toggle bi bi-chevron-right"></i>
                    </div><!-- End Faq item-->
      
                  </div>
                </div>
      
              </div>
            </div>
          </section><!-- /Faq Section -->


    {{-- Cohort dates --}}
    {{-- <sectioin class="cohorts-dates">
        <div class="container">
            <div class="title">
                <h1>Additional Information</h1>
                <p>Available Cohorts for 2025</p>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="cohort">
                        <h3>March to May</h3>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cohort">
                        <h3>June to July</h3>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cohort">
                        <h3>September to November</h3>
                    </div>
                </div>
            </div>
        </div>
    </sectioin> --}}
@endsection
