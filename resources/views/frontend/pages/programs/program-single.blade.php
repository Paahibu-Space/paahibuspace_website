@extends('frontend.layout')
@php
    $post_img = null;
    $blog_image = get_attachment_image_by_id($program->image, 'full', false);
    $post_img = !empty($blog_image) ? $blog_image['img_url'] : '';
@endphp
@section('og-meta')
    <meta property="og:url" content="{{ route('frontend.programs.single', $program->slug) }}" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ $program->title }}" />
    <meta property="og:image" content="{{ $post_img }}" />
@endsection
@section('site-title')
    {{ $program->title }}
@endsection
@section('page-title')
    {{ $program->title }}
@endsection
@section('page-meta-data')
    <meta name="description" content="{{ $program->meta_tags }}">
    <meta name="tags" content="{{ $program->meta_description }}">
@endsection
@section('content')
    <section class="blog-content-area padding-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="single-program-details">
                        <div class="thumb">
                            {!! render_image_markup_by_attachment_id($program->image, '', 'large') !!}
                        </div>
                        <div class="content">
                            <div class="details-content-area">
                                {!! iFrameFilterInSummernoteAndRender($program->content) !!}
                            </div>
                            <div
                                class="program-venue-details-information margin-top-40
                            @if (time() >= strtotime($program->date)) d-none @endif
                        ">
                                <h4 class="venue-title">Program Venue</h4>
                                <div class="bottom-content">
                                    <div class="venue-details">
                                        @if (!empty($program->venue))
                                            <div class="venue-details-block">
                                                <h4 class="title">Name</h4>
                                                <span class="details">{{ $program->venue }}</span>
                                            </div>
                                        @endif
                                        @if (!empty($program->venue_location))
                                            <div class="venue-details-block">
                                                <h4 class="title">Location</h4>
                                                <span class="details">{{ $program->venue_location }}</span>
                                            </div>
                                        @endif
                                    </div>
                                    @if (!empty($program->venue_location))
                                        <div class="map-location">
                                            {!! render_embed_google_map($program->venue_location) !!}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            @if (time() >= strtotime($program->date))
                                <p class="alert alert-danger  margin-top-30">No upcoming program, kindly check back later
                                </p>
                            @elseif($program->available_registrations < 1)
                                <p class="alert alert-danger  margin-top-30">{{ __('No registrations available') }}</p>
                            @else
                                <div class="reserve-program-seat margin-top-30">
                                    <a class="slider-boxed-btn about-boxed-btn"
                                        href="{{ route('frontend.program.registration', $program->id) }}"
                                        class="btn-boxed style-01">Register</a>
                                    <p class="info-text py-2">Available Registrations:
                                        {{ $program->available_registrations }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div
                        class="widget-area
                    @if (time() >= strtotime($program->date)) d-none @endif
                    ">
                        @if (time() >= strtotime($program->date))
                            <p class="alert alert-danger">Sorry, registrations closed</p>
                        @else
                            <div class="counterdown-wrap program-page">
                                <div id="program_countdown"></div>
                            </div>
                        @endif
                        <div class="widget program-info">
                            <h4 class="widget-title">Upcoming Program Info</h4>
                            <ul class="icon-with-title-description">
                                <li>
                                    <div class="icon"><i class="far fa-calendar-plus"></i></div>
                                    <div class="content">
                                        <h4 class="title">Program Start Date</h4>
                                        <span class="details">{{ date('d M Y', strtotime($program->date)) }}</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon"><i class="fas fa-clock"></i></div>
                                    <div class="content">
                                        <h4 class="title">Time</h4>
                                        <span class="details">{{ $program->time }}</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon"><i class="fas fa-dollar-sign"></i></div>
                                    <div class="content">
                                        <h4 class="title">Cost</h4>
                                        @if ($program->cost > 0)
                                            <span class="details">{{ $program->cost }}</span>
                                        @else
                                            <span class="details">Free</span>
                                        @endif
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script src="{{ asset('assets/common/js/countdown.jquery.js') }}"></script>
    <script>
        var ev_offerTime = "{{ $program->date }}";
        var ev_year = ev_offerTime.substr(0, 4);
        var ev_month = ev_offerTime.substr(5, 2);
        var ev_day = ev_offerTime.substr(8, 2);

        if (ev_offerTime) {
            $('#program_countdown').countdown({
                year: ev_year,
                month: ev_month,
                day: ev_day,
                labels: true,
                labelText: {
                    'days': "{{ __('days') }}",
                    'hours': "{{ __('hours') }}",
                    'minutes': "{{ __('min') }}",
                    'seconds': "{{ __('sec') }}",
                }
            });
        }
    </script>
@endsection
