@extends('frontend.layout')
@section('site-title')
    {{ get_static_option('team_page_name') }}
@endsection
@section('page-title')
    {{ get_static_option('team_page_name') }}
@endsection
@section('page-meta-data')
    <meta name="description" content="{{ get_static_option('team_page_meta_description') }}">
    <meta name="tags" content="{{ get_static_option('team_page_meta_tags') }}">
    {!! render_og_meta_image_by_attachment_id(get_static_option('team_page_meta_image')) !!}
@endsection
@section('content')
    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Our Team In A Glance</h2>
                <p>At Paahibu Space, our Leadership Team is a dynamic ensemble of skilled and passionate young individuals.
                    We are not just a team; we are the driving force behind the technological and entrepreneurial
                    empowerment of girls and women-led businesses.</p>
            </div>

            <div class="row">

                @foreach ($all_team_members as $member)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="member">
                            <div class="pic">
                                {!! render_image_markup_by_attachment_id($member->image, 'img-fluid') !!}
                            </div>
                            <div class="member-info">
                                <h4>{{ $member->name }}</h4>
                                <span>{{ $member->designation }}</span>
                                <div class="social">
                                    @if (!empty($member->icon_one) && !empty($member->icon_one_url))
                                        <a href="{{ $member->icon_one_url }}" target="_blank"><i class="{{ $member->icon_one }}"></i></a>
                                    @endif
                                    @if (!empty($member->icon_two) && !empty($member->icon_two_url))
                                        <a href="{{ $member->icon_two_url }}" target="_blank"><i class="{{ $member->icon_two }}"></i></a>
                                    @endif
                                    @if (!empty($member->icon_three) && !empty($member->icon_three_url))
                                        <a href="{{ $member->icon_three_url }}target="_blank" "><i
                                                class="{{ $member->icon_three }}"></i></a>
                                    @endif
                                    @if (!empty($member->icon_four) && !empty($member->icon_four_url))
                                        <a href="{{ $member->icon_four_url }}target="_blank" "><i
                                                class="{{ $member->icon_three }}"></i></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>

        </div>
    </section><!-- End Team Section -->
@endsection
