    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="footer-content">
            <div
                class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">

                <div class="footer-logo col-lg-8">
                    {!! render_image_markup_by_attachment_id(get_static_option('site_white_logo')) !!}
                </div>

                <div class="social-links order-first order-lg-last mb-3 mb-lg-0">
                    <a href="https://twitter.com/paahibuspace" target="_blank" class="twitter"><i
                            class="bi bi-twitter-x"></i></a>
                    <a target="_blank" href="https://web.facebook.com/paahibuspace" class="facebook"><i
                            class="bi bi-facebook"></i></a>
                    <a target="_blank" href="https://www.instagram.com/paahibuspace?igsh=MWZpbWkyaDliajdrNw=="
                        class="instagram"><i class="bi bi-instagram"></i></a>
                    <a href="https://www.linkedin.com/company/questtechnovation/" target="_blank" class="linkedin"><i
                            class="bi bi-linkedin"></i></a>
                </div>
            </div>
            <div class="container" style="padding-bottom: 30px;">
                <hr>
            </div>
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-md-6">
                        <div class="footer-info">
                            <h3>About Paahibu Space</h3>
                            <p>
                                Paahibu Space is a non-profit tech and entrepreneurship development organization
                                focusing providing digital solutions to small businesses and nonprofits led by women,
                                while educating, inspiring, empowering, and shaping the personal and professional
                                development of the next generation of African female leaders in technology, innovation,
                                entrepreneurship, and business. <br><br>
                                Insurance Road <br>
                                Wa-UWR Ghana<br>
                                <strong>Phone:</strong> <a href="tel:+233 24 725 4326">+233 24 725 4326</a><br>
                                <strong>Email:</strong> <a
                                    href="mailto: info@paahibuspace.org">info@paahibuspace.org</a><br>
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Stay in the know</h4>
                        <ul>
                            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('homepage') }}">Home</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('frontend.about') }}">About us</a>
                            </li>
                            <li><i class="bi bi-chevron-right"></i> <a
                                    href="{{ route('frontend.service') }}">Services</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a
                                    href="https://docs.google.com/forms/d/e/1FAIpQLSe18AXaRl79Gbq_RP05CSgY3xbvnNldfISPriy27H0b7hpdIw/viewform">Become
                                    a mentor</a></li>
                            {{-- <li><i class="bi bi-chevron-right"></i> <a href="about.html">Become a volunteer</a></li> --}}

                        </ul>
                    </div>

                    {{-- <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Our Services</h4>
                        {!! render_frontend_footer_services() !!}
                    </div> --}}
                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Our Programs</h4>
                        <ul>
                            <li><i class="bi bi-chevron-right"></i> <a
                                    href="{{ route('frontend.techsistars') }}">TechsiStars</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a
                                    href="{{ route('frontend.widib') }}">WIDIB</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a
                                    href="{{ route('frontend.widei') }}">WiDEI</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a
                                    href="{{ route('frontend.grow-network') }}">GROW</a></li>

                            <li><i class="bi bi-chevron-right"></i> <a
                                    href="https://docs.google.com/forms/d/e/1FAIpQLSe18AXaRl79Gbq_RP05CSgY3xbvnNldfISPriy27H0b7hpdIw/viewform">Become
                                    a mentor</a></li>
                            {{-- <li><i class="bi bi-chevron-right"></i> <a href="about.html">Become a volunteer</a></li> --}}

                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-newsletter subscription-form">
                        <h4>Our Newsletter</h4>
                        <p>Join us, not as a client, but as an esteemed member of our close-knit family.</p>
                        <form action="{{ route('frontend.subscribe.newsletter') }}" class="form-subscribe"
                            method="POST">
                            <input type="email" name="email"><input type="submit" value="Subscribe"
                                class="subscribe-btn">

                        </form>
                        <div class="my-3">
                            <div class="subscribing">Subscribing</div>
                            <div class="form-message-show"></div>
                            {{-- <div class="error-subscription"></div>
                            <div class="subscription-success">Thank you for Subscribing to Our Newsletter!</div> --}}
                        </div>

                    </div>

                </div>
            </div>

            <div class="request-shape-wrap"><img src="{{ asset('assets/frontend/images/bg/footer-left-img.png') }}"><img
                    src="{{ asset('assets/frontend/images/bg/footer-right-img.png') }}" data-bb-lazy="true"
                    alt="Request a call back"></div>


        </div>


        <div class="footer-legal text-center">
            <div
                class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">

                <div class="d-flex flex-column align-items-center align-items-lg-start">
                    <div class="copyright">
                        &copy; Copyright <strong><span>Paahibu Space</span></strong>. All Rights Reserved
                    </div>
                </div>
            </div>
        </div>

    </footer><!-- End Footer -->
