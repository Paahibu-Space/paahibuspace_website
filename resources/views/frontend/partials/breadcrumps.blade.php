<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs lign-items-center  @if (in_array(request()->route()->getName(), ['homepage', 'frontend.service']) && empty($page_post->breadcrumb_status)) d-none
        @else d-flex @endif"
    style="background-image: url('{{ asset('assets/frontend/images/bg/team-with-grow.webp') }}');">
    <div class="shape3 wow slideInRight" data-wow-delay="200ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 200ms; animation-name: slideInRight;">
		<img class="sway__animationX" src="{{ asset('assets/frontend/images/bg/breadcrump-animated-image.png') }}" alt="shape">
	</div>
    <div class="container position-relative d-flex flex-column  ">

        <h2>@yield('page-title')</h2>
        <ol>
            <li><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
            @php
                $pages_list = ['about', 'stories', 'team', 'volunteers', 'programs', 'services', 'blog', 'work'];
            @endphp

            @foreach ($pages_list as $page)
                @if (request()->is($page . '/*'))
                    @if (request()->is(get_static_option($page . '_page_slug') . '/*'))
                        <li><i class="fa-regular fa-angles-right mx-2"></i><a
                                href="{{ url('/') . '/' . get_static_option($page . '_page_slug') }}">{{ get_static_option($page . '_page_name') }}</a>
                        </li>
                    @endif
                @endif
            @endforeach
            <li>@yield('page-title')</li>
        </ol>

    </div>
</section><!-- End Breadcrumbs -->
