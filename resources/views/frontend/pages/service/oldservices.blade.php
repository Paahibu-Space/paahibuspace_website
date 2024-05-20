@extends('frontend.layout')

@includeIf('frontend.partials.breadcrumps')

@section('content')
      <!-- ======= Hero Section ======= -->
  <section id="services-hero" class="services-hero d-flex align-items-center" style="  background: url('{{ asset('assets/frontend/images/girlcode2.webp') }}') top center;">
    <div class="container">
      <div class="row">
        <div class="col-xl-4">
          <h2 data-aos="fade-up">Paahibu Digital Solutions</h2>
          <blockquote data-aos="fade-up" data-aos-delay="100">
            <p>More Than Business, It's Family. At Paahibu Digital Solutions, we go beyond the conventional client-vendor relationship. For us, it's not merely about the deals inked; it's about the transformative impact those deals have on your business. When you choose us, you become a valued member of our community.</p>
          </blockquote>
          <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
            <a href="" target="_self" class="slider-boxed-btn"><span>Get Started</span></a>
        </div>

        </div>
      </div>
    </div>
  </section><!-- End Services Hero Section -->

  <!-- ======= Services Section ======= -->
  <section id="services" class="services">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Paahibu Digital Solutions: Elevating Your Business to New Heights</h2>
        <p>Welcome to Paahibu Digital Solutions, where we're not just creating solutions; we're crafting success stories for your business.</p>
      </div>

      <div class="row gy-5">

        <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
          <div class="service-item">
            <div class="img">
              <img src="{{ asset('assets/frontend/images/web.jpeg') }}" class="img-fluid" alt="">
            </div>
            <div class="details position-relative">
              <div class="icon">
                <i class="bi bi-activity"></i>
              </div>
                <h3>Website Development and Design</h3>
              <p>Step into the digital realm with a website that speaks volumes. Our expert team ensures your online presence mirrors the essence of your business.</p>
            </div>
          </div>
        </div><!-- End Service Item -->

        <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="300">
          <div class="service-item">
            <div class="img">
              <img src="{{ asset('assets/frontend/images/ecommerce.png') }}" class="img-fluid" alt="">
            </div>
            <div class="details position-relative">
              <div class="icon">
                <i class="bi bi-broadcast"></i>
              </div>
                <h3>E-commerce Platforms</h3>
              <p>Transform your business into an online powerhouse. Our e-commerce solutions provide a seamless shopping experience for your customers.
            </p>
            </div>
          </div>
        </div><!-- End Service Item -->

        <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="400">
          <div class="service-item">
            <div class="img">
              <img src="{{ asset('assets/images/content-marketing.jpeg') }}" class="img-fluid" alt="">
            </div>
            <div class="details position-relative">
              <div class="icon">
                <i class="bi bi-easel"></i>
              </div>
                <h3>Content Marketing</h3>
              <p>Crafting compelling narratives that resonate. Our content strategies will elevate your brand, engage your audience, and drive growth.</p>
            </div>
          </div>
        </div><!-- End Service Item -->

        <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="500">
          <div class="service-item">
            <div class="img">
              <img src="{{ asset('assets/images/graphic-de.jpeg') }}" class="img-fluid" alt="">
            </div>
            <div class="details position-relative">
              <div class="icon">
                <i class="bi bi-bounding-box-circles"></i>
              </div>
                <h3>Graphic Design and Branding</h3>
              <p>Stand out with visually stunning designs. From logos to comprehensive branding, we give your business a unique and memorable identity.          
            </p>
              <a href="#" class="stretched-link"></a>
            </div>
          </div>
        </div><!-- End Service Item -->
        <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="500">
          <div class="service-item">
            <div class="img">
              <img src="./assets/images/digi-print.webp" class="img-fluid" alt="">
            </div>
            <div class="details position-relative">
              <div class="icon">
                <i class="bi bi-bounding-box-circles"></i>
              </div>
                <h3>Customized Digital and Offline Print Materials
                    </h3>
              <p>Tangible materials that leave a lasting impression. Our print solutions, both digital and offline, ensure your brand reaches far and wide.             
            </p>
              <a href="#" class="stretched-link"></a>
            </div>
          </div>
        </div><!-- End Service Item -->

      </div>

    </div>
  </section><!-- End Services Section -->

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container">

      <div class="section-title">
        <h2>Contact Us</h2>
        <p>Contact us, not as a client, but as an esteemed member of our close-knit family.</p>
      </div>

    </div>
    <div class="container">

      <div class="row gy-5 gx-lg-5">

        <div class="col-lg-4">

          <div class="info">
            <h3>Get in touch</h3>
            <p>Contact us, let's craft success stories for your business.</p>

            <div class="info-item d-flex">
              <i class="bi bi-geo-alt flex-shrink-0"></i>
              <div>
                <h4>Location:</h4>
                <p>Insurance Road, Wa-UWR</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex">
              <i class="bi bi-envelope flex-shrink-0"></i>
              <div>
                <h4>Email:</h4>
                <p>info@paahibuspace.org</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex">
              <i class="bi bi-phone flex-shrink-0"></i>
              <div>
                <h4>Call:</h4>
                <p>+233 24 725 4326</p>
              </div>
            </div><!-- End Info Item -->

          </div>

        </div>

        <div class="col-lg-8">
          <form action="./forms/contact.php" method="post" role="form" class="php-email-form">
            <div class="row">
              <div class="col-md-6 form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
              </div>
            </div>
            <div class="form-group mt-3">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
            </div>
            <div class="form-group mt-3">
              <textarea class="form-control" name="message" placeholder="Message" required></textarea>
            </div>
            <div class="my-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>
        </div><!-- End Contact Form -->

      </div>

    </div>
  </section><!-- End Contact Section -->
@endsection