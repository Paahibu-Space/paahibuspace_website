<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo" style="max-height: 50px;">
            <a href="{{ route('admin.home') }}">
                {{-- TODO @php
                    $logo_type = 'site_logo';
                    if (!empty(get_static_option('site_admin_dark_mode'))) {
                        $logo_type = 'site_white_logo';
                    }
                @endphp
                {!! render_image_markup_by_attachment_id(get_static_option($logo_type)) !!} --}}
            </a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav id="main_menu_wrap">
                <ul class="metismenu" id="menu">
                    <li class="{{ active_menu('admin-home') }}">
                        <a href="{{ route('admin.home') }}" aria-expanded="true">
                            <i class="ti-dashboard"></i>
                            <span>@lang('dashboard')</span>
                        </a>
                    </li>
                    {{-- @if (check_page_permission('admin_manage')) --}}
                    <li
                        class="main_dropdown
                        @if (request()->is(['admin-home/admin/*'])) active @endif
                        ">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-user"></i>
                            <span>{{ __('Admin Manage') }}</span></a>
                        <ul class="collapse">
                            <li class="{{ active_menu('admin-home/admin/all') }}"><a
                                    href="{{ route('admin.all.user') }}">{{ __('All Admin') }}</a></li>
                            <li class="{{ active_menu('admin-home/admin/new') }}"><a
                                    href="{{ route('admin.new.user') }}">{{ __('Add New Admin') }}</a></li>
                            <li class="{{ active_menu('admin-home/admin/all/role') }}"><a
                                    href="{{ route('admin.all.user.role') }}">{{ __('All Admin Role') }}</a></li>
                        </ul>
                    </li>
                    {{-- @endif --}}
                    {{-- @if (check_page_permission_by_string('Users Manage')) --}}
                    <li
                        class="main_dropdown
                        @if (request()->is(['admin-home/frontend/user/*'])) active @endif
                        ">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-user"></i>
                            <span>{{ __('Users Manage') }}</span></a>
                        <ul class="collapse">
                            <li class="{{ active_menu('admin-home/frontend/user/all') }}"><a
                                    href="{{ route('admin.all.frontend.user') }}">{{ __('All Users') }}</a></li>
                            <li class="{{ active_menu('admin-home/frontend/user/new') }}"><a
                                    href="{{ route('admin.frontend.new.user') }}">{{ __('Add New User') }}</a>
                            </li>
                        </ul>
                    </li>
                    {{-- @endif
                    @if (check_page_permission_by_string('Newsletter Manage')) --}}
                    <li class="main_dropdown @if (request()->is(['admin-home/newsletter/*', 'admin-home/newsletter'])) active @endif
                     ">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-email"></i>
                            <span>{{ __('Newsletter Manage') }}</span></a>
                        <ul class="collapse">
                            <li class="{{ active_menu('admin-home/newsletter') }}"><a
                                    href="{{ route('admin.newsletter') }}">{{ __('All Subscriber') }}</a></li>
                            <li class="{{ active_menu('admin-home/newsletter/all') }}"><a
                                    href="{{ route('admin.newsletter.mail') }}">{{ __('Send Mail To All') }}</a>
                            </li>
                        </ul>
                    </li>
                    {{-- @endif

                    @if (check_page_permission_by_string('Blogs Manage')) --}}
                    <li
                        class="main_dropdown
                        @if (request()->is(['admin-home/blog/*', 'admin-home/blog'])) active @endif
                        ">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-write"></i>
                            <span>{{ __('Blogs') }}</span></a>
                        <ul class="collapse">
                            <li class="{{ active_menu('admin-home/blog') }}"><a
                                    href="{{ route('admin.blog') }}">{{ __('All Blog') }}</a></li>
                            <li class="{{ active_menu('admin-home/blog/category') }}"><a
                                    href="{{ route('admin.blog.category') }}">{{ __('Category') }}</a></li>
                            <li class="{{ active_menu('admin-home/blog/new') }}"><a
                                    href="{{ route('admin.blog.new') }}">{{ __('Add New Post') }}</a></li>
                        </ul>
                    </li>
                    {{-- @endif

                    @if (check_page_permission_by_string('Services')) --}}
                    <li
                        class="main_dropdown
                    @if (request()->is(['admin-home/services/*', 'admin-home/services'])) active @endif
                    ">
                        <a href="javascript:void(0)" aria-expanded="true">
                            <i class="ti-layout"></i>
                            <span>{{ __('Services') }}</span>
                        </a>
                        <ul class="collapse">
                            <li class="{{ active_menu('admin-home/services') }}"><a
                                    href="{{ route('admin.services') }}">{{ __('All Services') }}</a></li>
                            <li class="{{ active_menu('admin-home/services/new') }}"><a
                                    href="{{ route('admin.services.new') }}">{{ __('New Service') }}</a></li>
                            <li class="{{ active_menu('admin-home/services/category') }}"><a
                                    href="{{ route('admin.service.category') }}">{{ __('Category') }}</a></li>
                        </ul>
                    </li>
                    {{-- @endif
                    @if (check_page_permission_by_string('Portfolio')) --}}
                    <li class="main_dropdown
                    @if (request()->is(['admin-home/works/*', 'admin-home/works'])) active @endif ">
                        <a href="javascript:void(0)" aria-expanded="true">
                            <i class="ti-layout"></i>
                            <span>{{ __('Portfolio') }}</span>
                        </a>
                        <ul class="collapse">
                            <li class="{{ active_menu('admin-home/works') }}"><a
                                    href="{{ route('admin.work') }}">{{ __('All Portfolios') }}</a></li>
                            <li class="{{ active_menu('admin-home/works/new') }}"><a
                                    href="{{ route('admin.work.new') }}">{{ __('New Portfolio') }}</a></li>
                            <li class="{{ active_menu('admin-home/works/category') }}"><a
                                    href="{{ route('admin.work.category') }}">{{ __('Category') }}</a></li>
                        </ul>
                    </li>
                    {{-- @endif
                    @if (check_page_permission_by_string('Gallery Page')) --}}
                    <li
                        class="main_dropdown
                        {{ active_menu('admin-home/gallery-page') }}
                        @if (request()->is('admin-home/gallery-page/*')) active @endif
                                ">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-write"></i>
                            <span>{{ __('Image Gallery') }}</span></a>
                        <ul class="collapse">
                            <li class="{{ active_menu('admin-home/gallery-page') }}">
                                <a href="{{ route('admin.gallery.all') }}">{{ __('Image Gallery') }}</a>
                            </li>
                            <li class="{{ active_menu('admin-home/gallery-page/category') }}">
                                <a href="{{ route('admin.gallery.category') }}">{{ __('Category') }}</a>
                            </li>
                        </ul>
                    </li>
                    {{-- @endif
                    @if (check_page_permission_by_string('Video Gallery')) --}}
                    <li
                        class="main_dropdown
                        {{ active_menu('admin-home/video-gallery') }}
                        @if (request()->is('admin-home/video-gallery/*')) active @endif
                                ">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-write"></i>
                            <span>{{ __('Video Gallery') }}</span></a>
                        <ul class="collapse">
                            <li class="{{ active_menu('admin-home/video-gallery') }}">
                                <a href="{{ route('admin.video.gallery.all') }}">{{ __('Video Gallery') }}</a>
                            </li>
                        </ul>
                    </li>
                    {{-- @endif


                    @if (check_page_permission_by_string('Team Members')) --}}
                    <li class="main_dropdown {{ active_menu('admin-home/team-member') }}">
                        <a href="{{ route('admin.team.member') }}" aria-expanded="true"><i
                                class="ti-control-forward"></i>
                            <span>{{ __('Team Members') }}</span></a>
                    </li>
                    {{-- @endif
                    @if (check_page_permission_by_string('Testimonial')) --}}
                    <li class="main_dropdown {{ active_menu('admin-home/testimonial') }}">
                        <a href="{{ route('admin.testimonial') }}" aria-expanded="true"><i
                                class="ti-control-forward"></i>
                            <span>{{ __('Testimonial') }}</span></a>
                    </li>
                    {{-- @endif


                    @if (check_page_permission_by_string('Email Templates')) --}}
                    <li class="main_dropdown @if (request()->is('admin-home/email-template/*')) active @endif">
                        <a href="{{ route('admin.email.template.all') }}" aria-expanded="true">
                            {{ __('Email Templates') }}
                        </a>
                    </li>
                    {{-- @endif --}}
                    <li class="main_dropdown {{ active_menu('admin-home/media-upload/page') }}">
                        <a href="{{ route('admin.upload.media.images.page') }}" aria-expanded="true">
                            {{ __('Media Images Manage') }}
                        </a>
                    </li>


                    {{-- @if (check_page_permission_by_string('General Settings')) --}}
                    <li class="main_dropdown @if (request()->is('admin-home/general-settings/*')) active @endif">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-settings"></i>
                            <span>{{ __('General Settings') }}</span></a>
                        <ul class="collapse ">
                            <li class="{{ active_menu('admin-home/general-settings/site-identity') }}"><a
                                    href="{{ route('admin.general.site.identity') }}">{{ __('Site Identity') }}</a>
                            </li>
                            <li class="{{ active_menu('admin-home/general-settings/basic-settings') }}"><a
                                    href="{{ route('admin.general.basic.settings') }}">{{ __('Basic Settings') }}</a>
                            </li>

                            <li class="{{ active_menu('admin-home/general-settings/email-template') }}"><a
                                    href="{{ route('admin.general.email.template') }}">{{ __('Email Template') }}</a>
                            </li>
                            <li class="{{ active_menu('admin-home/general-settings/email-settings') }}"><a
                                    href="{{ route('admin.general.email.settings') }}">{{ __('Email Messages Settings') }}</a>
                            </li>
                            <li class="{{ active_menu('admin-home/general-settings/smtp-settings') }}"><a
                                    href="{{ route('admin.general.smtp.settings') }}">{{ __('SMTP Settings') }}</a>
                            </li>
                            {{--                            <li class="{{active_menu('admin-home/general-settings/regenerate-image')}}"><a --}}
                            {{--                                        href="{{route('admin.general.regenerate.thumbnail')}}">{{__('Regenerate Media Image')}}</a> --}}
                            {{--                            </li> --}}

                        </ul>
                    </li>
                    {{-- @endif --}}
                </ul>
            </nav>
        </div>
    </div>
</div>
