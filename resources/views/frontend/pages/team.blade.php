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
        <!-- ======= about_page-team Section ======= -->
        <section id="about_page-team" class="about_page-team">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <span>Team</span>
                    <h2>Our Team in a Glance</h2>
                    <p>At Paahibu Space, our Leadership Team is a dynamic ensemble of skilled and passionate young
                        individuals. We are not just a team; we are the driving force behind the technological and
                        entrepreneurial empowerment of girls and women-led businesses.</p>

                </div>

                <div class="wrapper">
                    <div class="container">
                        @foreach ($all_team_members->groupBy('team_category_id') as $categoryId => $teamMembers)
                            @php
                                // Fetch the category name based on the category ID
                                $categoryName = $all_categories->find($categoryId)->name ?? 'Uncategorized';
                            @endphp
                            <div class="category-section">
                                <div class="category-title">
                                    <h2>{{ $categoryName }}</h2>
                                </div>
                                <div class="row gy-4">
                                    @foreach ($teamMembers as $data)
                                        <div class="col-lg-3 col-md-6 d-flex align-items-stretch aos-init aos-animate"
                                            data-aos="fade-up" data-aos-delay="100">
                                            <div class="team-member">
                                                <div class="member-img">
                                                    {!! render_image_markup_by_attachment_id($data->image, 'img-fluid') !!}
                                                    <div class="social">
                                                        @php
                                                            $social_fields = [
                                                                'icon_one' => 'icon_one_url',
                                                                'icon_two' => 'icon_two_url',
                                                                'icon_three' => 'icon_three_url',
                                                            ];
                                                        @endphp
                                                        @foreach ($social_fields as $key => $value)
                                                            <a href="{{ $data->$value }}"><i class="{{ $data->$key }}"></i></a>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="member-info">
                                                    <h4>{{ $data->name }}</h4>
                                                    <span>{{ $data->designation }}</span>
                                                </div>
                                            </div>
                                        </div><!-- End Team Member -->
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                

            </div>
        </section><!-- End about_page-team Section -->
@endsection
