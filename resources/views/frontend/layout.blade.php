<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @php
        $site_favicon = get_attachment_image_by_id(get_static_option('site_favicon'), 'full', false);
    @endphp
    @if (!empty($site_favicon))
        <link rel="icon" href="{{ $site_favicon['img_url'] }}" type="image/png">
    @endif
    <link rel=preload href="{{asset('assets/frontend/css/fontawesome.min.css')}}" as="style">
    <link rel=preload href="{{asset('assets/frontend/css/flaticon.css')}}" as="style">
    <link rel=preload href="{{asset('assets/frontend/css/nexicon.css')}}" as="style">
    <link rel=stylesheet href="{{asset('assets/frontend/css/animate.css')}}">

    <link rel="stylesheet" href="{{asset('assets/frontend/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/nexicon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/fontawesome.min.css')}}">
    <!-- vendor files -->
    <link rel="stylesheet" href="{{ asset('assets/common/vendor/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/common/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/slick.css') }}">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/common/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/common/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/common/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/common/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/owl.carousel.min.css')}}">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/common/vendor/bootstrap/css/bootstrap.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/common/vendor/bootstrap-icons/bootstrap-icons.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/program.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/update.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/test.css') }}">


    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    @include('frontend.partials.og-meta')
</head>

<body>

    {{-- Header --}}
    @include('frontend.partials.navbar')

    @include('frontend.partials.breadcrumps')

    {{-- page main content --}}
    @yield('content')

    {{-- FOOTER --}}
    @include('frontend.partials.footer')

    <div class="scroll-up active-scroll">
        <svg class="scroll-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
                style="transition: stroke-dashoffset 10ms linear; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 29.694;">
            </path>
        </svg>
    </div>
    
    <div id="preloader"></div>

    <script src="{{ asset('assets/frontend/js/main.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/simpleParallax.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/frontend/js/subscribe.js') }}"></script> --}}

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/common/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/common/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/common/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/common/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/common/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/common/vendor/jquery-2.2.4.min.js') }}"></script>
    <script src="{{asset('assets/frontend/js/jquery.magnific-popup.js')}}"></script>
    <script src="{{ asset('assets/frontend/js/slick.js') }}"></script>
    <script src="{{asset('assets/frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('assets/frontend/js/custom.js') }}"></script>
    <script src="{{ asset('assets/common/vendor/purecounter/purecounter_vanilla.js') }}"></script>


    @include('frontend.partials.inline-script')



</body>

</html>
