<!-- ======= Header ======= -->
<header id="header" class="header fixed-top" data-scrollto-offset="0">
    <div class="container-fluid d-flex align-items-center justify-content-between p-0">

        <a href="{{ route('homepage') }}" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
            <img src="{{ asset('assets/frontend/images/white-logo.png') }}" alt="">
        </a>

        <nav id="navbar" class="navbar-nav">

            {!! render_frontend_menu() !!}
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

        <div class="btn-donate">
            <a target="_blank" href="https://paystack.com/pay/donate-to-paahibuspace">Donate</a>
        </div>

    </div>
</header><!-- End Header -->