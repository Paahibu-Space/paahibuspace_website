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

    <link rel="stylesheet" href="{{asset('assets/frontend/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/nexicon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/fontawesome.min.css')}}">
    <!-- vendor files -->
    <link rel="stylesheet" href="{{ asset('assets/common/vendor/fontawesome.min.css') }}">
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
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/responsive.css') }}">


    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    @include('frontend.partials.og-meta')

</head>

<body
    class="{{ request()->path() }} home_variant_{{ $home_page_variant }} nexelit_version_{{ getenv('XGENIOUS_NEXELIT_VERSION') }} {{ filter_static_option_value('item_license_status', $global_static_field_data) }} apps_key_{{ filter_static_option_value('site_script_unique_key', $global_static_field_data) }} ">

    {!! filter_static_option_value('site_third_party_tracking_body_code', $global_static_field_data) !!}

    @include('frontend.partials.preloader')
    @include('frontend.partials.search-popup')


    @if (!empty(get_static_option('navbar_variant')) && !in_array(get_static_option('navbar_variant'), ['03', '05']))
        @include('frontend.partials.supportbar', ['home_page_variant' => $home_page_variant])
    @endif
