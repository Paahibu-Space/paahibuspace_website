@extends('frontend.layout')

@section('content')
<main id="main">
    <!-- ======= about-page Section ======= -->
    <section id="about-page" class="about-page">
      <div class="container">

        <div class="about-page-section-header section-title">
          <h2>About Us</h2>
          <p>Paahibu Space is a non-profit tech and entrepreneurship development organization focusing providing digital
            solutions to small businesses and nonprofits led by women, while educating, inspiring, empowering, and
            shaping the personal and professional development of the next generation of African female leaders in
            technology, innovation, entrepreneurship, and business by equipping them with knowledge and skills they will
            need to turn their communities’ problems and challenges into solutions and opportunities in an evolving
            digital world.
          </p>
        </div>

      </div>
    </section>
    <section id="about-page" class="about-page">
      <div class="container" data-aos="fade-up">
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
              <li><a class="nav-link" data-bs-toggle="pill" href="#tab2">Our Essence: The Paahibu Story</a></li>
              <li><a class="nav-link" data-bs-toggle="pill" href="#tab3">Inclusivity and Access to Knowledge</a></li>
            </ul><!-- End Tabs -->

            <!-- Tab Content -->
            <div class="tab-content">

              <div class="tab-pane fade show active" id="tab1">

                <p>Paahibu Space is a safe and inclusive space committed to fostering a culture of creativity,
                  collaboration, and strives to empower its community with the tools and resources necessary to succeed
                  in today's fast-paced digital landscape, while giving <b>access</b> to its diverse community for
                  girls, women and youth to ignite their big visions, foster and <b>innovate</b> great ideas, unleash
                  their ingenious creativity and <b>transform</b> themselves and the society.</p>

                <p>We are a tech and entrepeneurship development organization that endeavours to equip, empower and
                  endow girls and women-led businesses with the competencies to leverage technology, to lead and venture
                  into the real world and to transform themselves and their communities, building a better world for
                  themselves and future generations.
                </p>

                <!-- <p>We need the female perspective in technology. - Regina Honu</p> -->

              </div><!-- End Tab 1 Content -->

              <div class="tab-pane fade show" id="tab2">

                <p><b>Paahibu</b> originates from a Waali-speaking word among the Wala people of Wa, found in the Upper
                  West Region of Ghana, West Africa. Paahibu means inclusion, access, equality and
                  community/unity/togetherness.</p>

                <p>At Paahibu Space, we are more than a tech and entrepreneurship development organization; we are a
                  movement with purpose. Like a compass, we believe movement is crucial for girls' development and
                  women-led businesses in an evolving digital world. However, without direction, this movement becomes
                  inefficient. Paahibu acts as a guide, a resource hub for girl's development and women-led businesses
                  growth in the digital age.</p>

                <p>Our understanding of community, togetherness, and unity shapes our mission. Paahibu Space is not just
                  a place; it's a direction towards transformation. In our name, PAAHIBU, we celebrate unity, diversity,
                  inclusivity and completeness.</p>

                <p>Our main goals are to break stereotypes, grow more informed, and encourage the active participation
                  of girls and women in the digital economy.
                  Out of a powerful sense that inability to access opportunities, discrimination, and social constraints
                  are characteristics of women’s and girls’ experiences, especially, in disproportionate societies that
                  are still in the process of advancing gender equality, Paahibu Space therefore, aims at uniting women,
                  girls and young people into an organized techn, innovation and entrepreneurship environment as an
                  expression of their potential and distinct contribution to their communities.</p>

              </div><!-- End Tab 2 Content -->

              <div class="tab-pane fade show" id="tab3">

                <p>We open our doors to every girl, woman-led business, and anyone ready to join our community. At
                  Paahibu Space, we empower you to access knowledge, turning it into ideas, solutions, and opportunities
                  that transform not just yourself but your business and community.
                </p>

                <p>The Paahibu Space’s brand symbolises energy, strength, equality, and a world free of injustice
                  against women and girls. Our organization signifies innovation, love, and respect, and we stand
                  committed to continue to showcase our openness to ideas, uniqueness, and diverse perspectives and
                  lived experiences.</p>

              </div><!-- End Tab 3 Content -->

            </div>

          </div>

        </div>

      </div>
    </section><!-- End about-page Section -->

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
  </main>
@endsection