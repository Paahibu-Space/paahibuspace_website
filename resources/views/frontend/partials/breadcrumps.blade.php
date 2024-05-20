<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs d-flex align-items-center  @if(
    (in_array(request()->route()->getName(),['homepage', 'frontend.service'])
    && empty($page_post->breadcrumb_status) )
    )
        d-none
   @endif"
    style="background-image: url('{{ asset('assets/frontend/images/img1.jpeg') }}');">
    <div class="container position-relative d-flex flex-column align-items-center text-center">

        <h2>@yield('page-title')</h2>
        <ol>
            <li><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
            @php
                $pages_list = ['about', 'stories', 'team', 'volunteers', 'programs', 'services', 'blog', 'work'];
            @endphp

            @foreach ($pages_list as $page)
                @if (request()->is($page . '/*'))
                    @if (request()->is(get_static_option($page . '_page_slug') . '/*'))
                        <li><a
                                href="{{ url('/') . '/' . get_static_option($page . '_page_slug') }}">{{ get_static_option($page . '_page_name') }}</a>
                        </li>
                    @endif
                @endif
            @endforeach
            <li>@yield('page-title')</li>
        </ol>

    </div>
</section><!-- End Breadcrumbs -->
