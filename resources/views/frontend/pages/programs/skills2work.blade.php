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
            <div class="col-lg-6 order-1 order-lg-1">
                <img src="{{ asset('assets/frontend/images/program/skills2work.webp') }}" class="img-fluid" alt="">

                <p>
                    <span class="fw-bold">Skills2Work</span> is a 12-month hybrid upskilling initiative designed to equip rural girls and young women 
                    with future-ready digital skills to start their own businesses, connect them with online communities and women-owned MSMEs, 
                    while providing continuous mentorship for economic independence.
                </p>
            </div>
            
            <div class="col-lg-6 order-2 order-lg-2 content">
                <h2 class="title">Skills2Work Program</h2>
                <p class="fst-italic">
                    Equipping young women for tech careers, Skills2Work imparts basic tech skills, making them hireable. 
                    We extend this initiative to rural and marginalized youth and teachers, enhancing digital learning in schools.
                </p>
                <h5 class="fw-bold">What participants gain:</h5>
                <ul class="program-components">
                    <li><i class="bi bi-check2-all"></i> <span>Develop future-ready digital skills to launch and grow their own businesses</span></li>
                    <li><i class="bi bi-check2-all"></i> <span>Explore 21st-century opportunities in technology, entrepreneurship, and the digital workforce</span></li>
                    <li><i class="bi bi-check2-all"></i> <span>Boost employability and confidence to compete effectively in today’s job market</span></li>
                    <li><i class="bi bi-check2-all"></i> <span>Improve and digitize women-led MSMEs for growth</span></li>
                    <li><i class="bi bi-check2-all"></i> <span>Access networks, mentorship, and partnerships for long-term success</span></li>
                </ul>
   
            </div>
        </div>
    </div>
</section>

{{-- The need --}}
<section class="about__area-six">
    <div class="container">
        <div class="row align-items-center justify-content-center">
           
            <div class="col-lg-6">
                <div class="about__content-six">
                    <div class="mb-25 tg-heading-subheading animation-style3">
                        <span class="sub-title">THE NEED</span>
                        <h2 class="title tg-element-title" style="perspective: 400px;">
                            Why We Embark On This Initiative
                        </h2>
                    </div>
                    <p>
                        In today’s fast-paced digital world, millions of rural girls and young women remain excluded from opportunities. 
                        Despite being talented and driven, many lack the digital skills and support necessary to fully participate in the modern economy.
                    </p>
                    <div class="about__content-inner-four">
                        <div class="about__list-box">
                            <ul class="list-wrap">
                                <li><i class="bi bi-arrow-right"></i> Over 90% of jobs worldwide now require digital skills (World Economic Forum)</li>
                                <li><i class="bi bi-arrow-right"></i> In Sub-Saharan Africa, only 15% of women use the internet compared to 24% of men (ITU, 2023)</li>
                                <li><i class="bi bi-arrow-right"></i> Fewer than 20% of women-led MSMEs leverage digital platforms for growth (UN Women)</li>
                                <li><i class="bi bi-arrow-right"></i> Rural girls face higher risks of unemployment, early marriage, and poverty due to lack of training</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
             <div class="col-lg-6 col-md-8">
                <div class="about__img-wrap-six">
                    <img src="{{ asset('assets/frontend/images/program/skills2work2.webp') }}"
                        data-bb-lazy="true" loading="lazy"
                        data-src="{{ asset('assets/frontend/images/program/skills2work2.webp') }}"
                        alt="image" data-ll-status="loaded" class="entered loaded">
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
                        <span class="sub-title">GOAL</span>
                        <h2 class="title">Our Goals For This Program</h2>
                    </div>
                    <p>
                        Skills2Work is designed to create lasting impact by equipping rural girls and young women 
                        with the digital skills, confidence, and support they need to succeed in the digital economy.
                    </p>
                    <div class="choose__box-wrap">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="choose__box">
                                    <div class="content">
                                        <h4 class="title">200+</h4>
                                        <p>Equip 200 rural girls and young women with future-ready digital skills</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="choose__box">
                                    <div class="content">
                                        <h4 class="title">40%</h4>
                                        <p>Ensure at least 40% of participants launch their own businesses</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="choose__box">
                                    <div class="content">
                                        <h4 class="title">60%</h4>
                                        <p>Connect 60% of participants with women-owned MSMEs for jobs & mentorship</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="choose__box">
                                    <div class="content">
                                        <h4 class="title">Impact</h4>
                                        <p>Increase economic independence, digital literacy, and competitiveness of women-led MSMEs</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-9 margin-bottom-30">
                <div class="choose__img-wrap-five">
                    <img src="{{ asset('assets/frontend/images/program/skill2work1.webp') }}"
                        data-bb-lazy="true" loading="lazy"
                        data-src="{{ asset('assets/frontend/images/program/skill2work1.webp') }}"
                        alt="image" data-ll-status="loaded" class="entered loaded">
                </div>
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
                    <p>Join the Stills2Work Program and take the first step toward transforming your future in technology and entrepreneurship.</p>
                </div>
                <div class="col-lg-6 margin-bottom-30">
                    <h3 style="color: #f6871f !important; font-weight: 700">Next Cohort Begins in March</h3>
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
    </section>
    
    <!-- /impact-story Section -->

        <!-- Faq Section -->
<section class="faq-9 faq section light-background" id="faq">
  <div class="container">
    <div class="row">

      <div class="col-lg-5" data-aos="fade-up">
        <h2 class="faq-title">Have a question? Check out the FAQ</h2>
        <p class="faq-description">
          Here are some of the most common questions about the Skills2Work program. 
          If you don’t find your answer, feel free to contact us directly.
        </p>
        <div class="faq-arrow d-none d-lg-block" data-aos="fade-up" data-aos-delay="200">
          <svg class="faq-arrow" width="200" height="211" viewBox="0 0 200 211" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M198.804 194.488C189.279 189.596 179.529 185.52 169.407 182.07L169.384 182.049C169.227 181.994 169.07 181.939 168.912 181.884C166.669 181.139 165.906 184.546 167.669 185.615C174.053 189.473 182.761 191.837 189.146 195.695C156.603 195.912 119.781 196.591 91.266 179.049C62.5221 161.368 48.1094 130.695 56.934 98.891C84.5539 98.7247 112.556 84.0176 129.508 62.667C136.396 53.9724 146.193 35.1448 129.773 30.2717C114.292 25.6624 93.7109 41.8875 83.1971 51.3147C70.1109 63.039 59.63 78.433 54.2039 95.0087C52.1221 94.9842 50.0776 94.8683 48.0703 94.6608C30.1803 92.8027 11.2197 83.6338 5.44902 65.1074C-1.88449 41.5699 14.4994 19.0183 27.9202 1.56641C28.6411 0.625793 27.2862 -0.561638 26.5419 0.358501C13.4588 16.4098 -0.221091 34.5242 0.896608 56.5659C1.8218 74.6941 14.221 87.9401 30.4121 94.2058C37.7076 97.0203 45.3454 98.5003 53.0334 98.8449C47.8679 117.532 49.2961 137.487 60.7729 155.283C87.7615 197.081 139.616 201.147 184.786 201.155L174.332 206.827C172.119 208.033 174.345 211.287 176.537 210.105C182.06 207.125 187.582 204.122 193.084 201.144C193.346 201.147 195.161 199.887 195.423 199.868C197.08 198.548 193.084 201.144 195.528 199.81C196.688 199.192 197.846 198.552 199.006 197.935C200.397 197.167 200.007 195.087 198.804 194.488ZM60.8213 88.0427C67.6894 72.648 78.8538 59.1566 92.1207 49.0388C98.8475 43.9065 106.334 39.2953 114.188 36.1439C117.295 34.8947 120.798 33.6609 124.168 33.635C134.365 33.5511 136.354 42.9911 132.638 51.031C120.47 77.4222 86.8639 93.9837 58.0983 94.9666C58.8971 92.6666 59.783 90.3603 60.8213 88.0427Z" fill="currentColor"></path>
          </svg>
        </div>
      </div>

      <div class="col-lg-7" data-aos="fade-up" data-aos-delay="300">
        <div class="faq-container">

          <div class="faq-item faq-active">
            <h3>Who can apply for the Skills2Work program?</h3>
            <div class="faq-content">
              <p>The program is open to rural girls, young women, and female teachers who are eager to gain digital skills and explore entrepreneurship opportunities.</p>
            </div>
            <i class="faq-toggle bi bi-chevron-right"></i>
          </div><!-- End Faq item-->

          <div class="faq-item">
            <h3>How long does the program last?</h3>
            <div class="faq-content">
              <p>Skills2Work is a 12-month hybrid upskilling program that combines online and in-person sessions for effective learning and mentorship.</p>
            </div>
            <i class="faq-toggle bi bi-chevron-right"></i>
          </div><!-- End Faq item-->

          <div class="faq-item">
            <h3>What skills will participants gain?</h3>
            <div class="faq-content">
              <p>Participants will gain future-ready digital skills, entrepreneurial knowledge, employability skills, and access to mentorship and networks that boost career and business opportunities.</p>
            </div>
            <i class="faq-toggle bi bi-chevron-right"></i>
          </div><!-- End Faq item-->

          <div class="faq-item">
            <h3>Is there a cost to join the program?</h3>
            <div class="faq-content">
              <p>No. Skills2Work is offered at no cost to participants, thanks to the support of our partners and sponsors.</p>
            </div>
            <i class="faq-toggle bi bi-chevron-right"></i>
          </div><!-- End Faq item-->

          <div class="faq-item">
            <h3>How will the program benefit rural communities?</h3>
            <div class="faq-content">
              <p>The program bridges the digital divide, enhances women-led MSMEs, creates jobs, and fosters economic independence, positively impacting families and entire communities.</p>
            </div>
            <i class="faq-toggle bi bi-chevron-right"></i>
          </div><!-- End Faq item-->

          <div class="faq-item">
            <h3>What happens after completing the program?</h3>
            <div class="faq-content">
              <p>Graduates will join a thriving community of women entrepreneurs, access ongoing mentorship, and be connected to networks and opportunities for long-term success.</p>
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
