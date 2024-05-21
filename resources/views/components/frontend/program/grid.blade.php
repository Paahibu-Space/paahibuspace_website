<div class="single-programs-list-item">
    <div class="thumb">
        {!! render_image_markup_by_attachment_id($program->image, '', 'grid') !!}
    </div>
    <div class="content-area">
        <div class="top-part">
            <div class="time-wrap 
            @if (time() >= strtotime($program->date)) d-none @endif
            ">
                <span class="date">{{ date('d', strtotime($program->date)) }}</span>
                <span class="month">{{ date('M', strtotime($program->date)) }}</span>
            </div>
            <div class="title-wrap">
                <a href="{{ route('frontend.programs.single', $program->slug) }}">
                    <h4 class="title">{{ $program->title }}</h4>
                </a>
                <span
                    class="location
                @if (time() >= strtotime($program->date)) d-none @endif
                "><i
                        class="fas fa-map-marker-alt"></i> {{ $program->venue_location }}</span>
            </div>
        </div>
        <p>{{ htmlspecialchars_decode(strip_tags(Str::words(strip_tags($program->content), 20))) }}</p>
    </div>
</div>
