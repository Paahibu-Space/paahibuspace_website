<!-- ======= Header ======= -->
<header id="header" class="header fixed-top" data-scrollto-offset="0">
    <div class="container-fluid d-flex align-items-center justify-content-between p-0">

        <a href="{{ route('homepage') }}" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <img src="{{ asset('assets/frontend/images/white-logo.png') }}" alt="">
        </a>

        <nav id="navbar" class="navbar-nav">

            <ul>
                <li class="dropdown megamenu"><a href="{{ route('frontend.about') }}"><span>About Us</span> <i
                            class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul class="mega-dropdown-content">
                        <div class="justify-content-between d-flex dropdown-content">
                            <div class="nav-list-container">
                                <li>
                                    <a href="{{ route('frontend.about') }}">Who we are</a>
                                    <a href="{{ route('frontend.stories') }}">Stories</a>
                                    <a href="{{ route('frontend.team') }}">Team</a>
                                    {{-- <a href="{{ route('frontend.volunteers') }}">Volunteers</a> --}}
                                </li>
                            </div>

                            <div class="right-content">
                                <div class="right-img">
                                    <img src="{{ asset('assets/frontend/images/img2.jpeg') }}" alt="" width="400">
                                </div>
                            </div>
                        </div>

                        <div class="mega-dropdown-title">
                            <h2>Contact Us</h2>
                        </div>



                    </ul>
                </li>
                <li class="dropdown megamenu"><a href="{{ route('frontend.programs') }}"><span>Programs</span> <i
                            class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul class="mega-dropdown-content">
                        <div class="justify-content-between d-flex">
                            <div class="nav-list-container">
                                <li>
                                    <a href="programs.html">Women in Digital Business (WiDiB)</a>
                                    <a href="programs.html">Women in Digital Economy Initiative (WiDEI)</a>
                                    <a href="programs.html">Ndiara</a>
                                    <a href="programs.html">Skills2Work Initiative</a>
                                    <a href="programs.html">CybersiStars Initiative</a>
                                </li>
                            </div>

                            <div class="right-content">
                                <div class="right-img">
                                    <img src="{{ asset('assets/frontend/images/shot2.png') }}" alt="" width="400">
                                </div>
                            </div>
                        </div>

                        <div class="mega-dropdown-title">
                            <h2>Programs</h2>
                        </div>

                    </ul>
                </li>
                <li class="dropdown megamenu"><a href="#"><span>Get Involved</span> <i
                            class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul class="mega-dropdown-content">
                        <div class="justify-content-between d-flex">
                            <div class="nav-list-container">
                                <li>
                                    <a href="#">Volunteer</a>
                                    <a href="#">Be a mentor</a>
                                </li>
                            </div>

                            <div class="right-content">
                                <div class="right-img">
                                    <img src="{{ asset('assets/frontend/images/img3.jpeg') }}" alt="" width="400">
                                </div>
                            </div>
                        </div>

                        <div class="mega-dropdown-title">
                            <h2>Get Involved</h2>
                        </div>

                    </ul>
                </li>
                <li class="dropdown megamenu"><a href="{{ route('frontend.service') }}"><span>Services</span> <i
                            class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul class="mega-dropdown-content">
                        <div class="justify-content-between d-flex">
                            <div class="nav-list-container">
                                <li>
                                    <a href="services.html">Website Development and Design</a>
                                    <a href="services.html">E-commerce Platforms</a>
                                    <a href="services.html">Content Marketing</a>
                                    <a href="services.html">Graphic Design and Branding
                                    </a>
                                </li>
                            </div>

                            <div class="right-content">
                                <div class="right-img">
                                    <img src="{{ asset('assets/frontend/images/customers-love.jpeg') }}" alt="" width="400">
                                </div>
                            </div>
                        </div>

                        <div class="mega-dropdown-title">
                            <h2>Services</h2>
                        </div>

                    </ul>
                </li>
                <li><a href="{{ route('frontend.blog') }}">Blog</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

        <div class="btn-donate">
            <a target="_blank" href="https://paystack.com/pay/donate-to-paahibuspace">Donate</a>
        </div>

    </div>
</header><!-- End Header -->