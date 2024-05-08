@extends('backend.admin-master')
@section('style')
    <link rel="stylesheet" href="{{asset('assets/backend/css/dropzone.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/media-uploader.css')}}">
@endsection
@section('site-title')
    {{__('Basic Settings')}}
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-12 mt-5">
                @include('backend.partials.message')
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__("Basic Settings")}}</h4>
                        <form action="{{route('admin.general.basic.settings')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="tab-content margin-top-30" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-home-en" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <div class="form-group">
                                            <label for="site_title">{{__('Site Title')}}</label>
                                            <input type="text" name="site_title"  class="form-control" value="{{get_static_option('site_title')}}" id="site_title">
                                        </div>
                                        <div class="form-group">
                                            <label for="site_tag_line">{{__('Site Tag Line')}}</label>
                                            <input type="text" name="site_tag_line"  class="form-control" value="{{get_static_option('site_tag_line')}}" id="site_tag_line">
                                        </div>
                                        <div class="form-group">
                                            <label for="site_footer_copyright">{{__('Footer Copyright')}}</label>
                                            <input type="text" name="site_footer_copyright"  class="form-control" value="{{get_static_option('site_footer_copyright')}}" id="site_footer_copyright">
                                            <small class="form-text text-muted">{copy} {{__('Will replace by &copy; and {year} will be replaced by current year.')}}</small>
                                        </div>
                                    </div>
                            </div>
                            <x-media-upload :name="'og_meta_image_for_site'" :dimentions="'1200x900'" :title="__('Image')"/>

                            <div class="form-group">
                                <label for="site_admin_dark_mode"><strong>{{__('Dark Mode For Admin Dashboard')}}</strong></label>
                                <label class="switch yes">
                                    <input type="checkbox" name="site_admin_dark_mode"  @if(!empty(get_static_option('site_admin_dark_mode'))) checked @endif id="site_admin_dark_mode">
                                    <span class="slider onff"></span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="site_maintenance_mode"><strong>{{__('Maintenance Mode')}}</strong></label>
                                <label class="switch yes">
                                    <input type="checkbox" name="site_maintenance_mode"  @if(!empty(get_static_option('site_maintenance_mode'))) checked @endif id="site_maintenance_mode">
                                    <span class="slider onff"></span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="disable_user_email_verify"><strong>{{__('Disable User Email Verify')}}</strong></label>
                                <label class="switch">
                                    <input type="checkbox" name="disable_user_email_verify"  @if(!empty(get_static_option('disable_user_email_verify'))) checked @endif id="disable_user_email_verify">
                                    <span class="slider onff"></span>
                                </label>
                                <small class="info-text">{{__('No, means user must have to verify their email account in order access his/her dashboard.')}}</small>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Update Changes')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('backend.partials.media-upload.media-upload-markup')
@endsection
@section('script')
    <script src="{{asset('assets/backend/js/dropzone.js')}}"></script>
    @include('backend.partials.media-upload.media-js')
@endsection
