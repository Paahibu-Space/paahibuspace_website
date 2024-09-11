@if(request()->routeIs('homepage'))
    <meta property="og:title"  content="{{get_static_option('site_title')}}" />
    {!! render_og_meta_image_by_attachment_id(get_static_option('og_meta_image_for_site')) !!}
    <title>{{get_static_option('site_title')}} - {{get_static_option('site_tag_line')}}</title>
    <meta name="description" content="{{get_static_option('site_meta_description')}}">
    <meta name="tags" content="{{get_static_option('site_meta_tags')}}">
@else
    @yield('page-meta-data')
    <title>
        @yield('site-title')
        @hasSection('site-title') - @else @yield('page-title') -  @endif
        {{get_static_option('site_title')}}
    </title>
    @yield('og-meta')
@endif
