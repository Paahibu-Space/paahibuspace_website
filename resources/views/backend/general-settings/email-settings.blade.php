@extends('backend.admin-master')
@section('site-title')
    {{ __('Email Message Settings') }}
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{ __('Email Message Settings') }}</h4>
                        <x-error-msg />
                        <x-flash-msg />
                        <form action="{{ route('admin.general.email.settings') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="tab-content margin-top-30" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                    aria-labelledby="nav-home-tab">
                                    <div class="form-group">
                                        <label
                                            for="service_query_success_message">{{ __('Service Query Mail Success Message') }}</label>
                                        <input type="text" name="service_query_success_message" class="form-control"
                                            value="{{ get_static_option('service_query_success_message') }}"
                                            id="service_query_success_message">
                                        <small
                                            class="form-text text-muted">{{ __('this message will show when anyone contact your from service query form.') }}</small>
                                    </div>
                                    <div class="form-group">
                                        <label
                                            for="case_study_query_success_message">{{ __('Case Study Query Mail Success Message') }}</label>
                                        <input type="text" name="case_study_query_success_message" class="form-control"
                                            value="{{ get_static_option('case_study_query_success_message') }}"
                                            id="case_study_query_success_message">
                                        <small
                                            class="form-text text-muted">{{ __('this message will show when anyone contact your from case study query form.') }}</small>
                                    </div>
                                    <div class="form-group">
                                        <label
                                            for="contact_mail_success_message">{{ __('Contact Mail Success Message') }}</label>
                                        <input type="text" name="contact_mail_success_message" class="form-control"
                                            value="{{ get_static_option('contact_mail_success_message') }}"
                                            id="contact_mail_success_message">
                                        <small
                                            class="form-text text-muted">{{ __('this message will show when any one contact you via contact page form.') }}</small>
                                    </div>
                                    <div class="form-group">
                                        <label
                                            for="get_in_touch_mail_success_message">{{ __('Get In Touch Form Success Message') }}</label>
                                        <input type="text" name="get_in_touch_mail_success_message" class="form-control"
                                            value="{{ get_static_option('get_in_touch_mail_success_message') }}"
                                            id="get_in_touch_mail_success_message">
                                        <small
                                            class="form-text text-muted">{{ __('this message will show when any one contact you via get in touch form.') }}</small>
                                    </div>
                                    <div class="form-group">
                                        <label
                                            for="program_registration_mail_success_message">{{ __('Program Registration Form Success Message') }}</label>
                                        <input type="text" name="program_registration_mail_success_message"
                                            class="form-control"
                                            value="{{ get_static_option('program_registration_mail_success_message') }}"
                                            id="program_registration_mail_success_message">
                                        <small
                                            class="form-text text-muted">{{ __('this message will show when any submit program registration form') }}</small>
                                    </div>

                                </div>
                            </div>
                            <button type="submit"
                                class="btn btn-primary mt-4 pr-4 pl-4">{{ __('Update Changes') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
