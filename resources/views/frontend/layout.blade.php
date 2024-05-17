<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paahibu Space | Home</title>
    @php
        $site_favicon = get_attachment_image_by_id(get_static_option('site_favicon'), 'full', false);
    @endphp
    @if (!empty($site_favicon))
        <link rel="icon" href="{{ $site_favicon['img_url'] }}" type="image/png">
    @endif
    <!-- vendor files -->
    <link rel="stylesheet" href="{{ asset('assets/common/vendor/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/main.css') }}">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/common/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/common/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/common/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/common/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/common/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/common/vendor/bootstrap-icons/bootstrap-icons.css') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap"
        rel="stylesheet">

</head>

<body>

    {{-- Header --}}
    @includeIf('frontend.partials.navbar')

    {{-- page main content --}}
    @yield('content')

    {{-- FOOTER --}}
    @includeIf('frontend.partials.footer')

    <!-- back to top -->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>

    <div id="preloader"></div>

    <script src="{{ asset('assets/frontend/js/main.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/simpleParallax.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/subscribe.js') }}"></script>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/common/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/common/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/common/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/common/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/common/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
</body>

</html>
