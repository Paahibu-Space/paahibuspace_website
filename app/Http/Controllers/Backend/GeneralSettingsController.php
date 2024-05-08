<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Helpers\ProjectHelpers;
use App\Mail\BasicMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class GeneralSettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }




    public function smtp_settings()
    {
        return view('backend.general-settings.smtp-settings');
    }

    public function update_smtp_settings(Request $request)
    {
        $this->validate($request, [
            'site_smtp_mail_host' => 'required|string',
            'site_smtp_mail_port' => 'required|string',
            'site_smtp_mail_username' => 'required|string',
            'site_smtp_mail_password' => 'required|string',
            'site_smtp_mail_encryption' => 'required|string'
        ]);

        update_static_option('site_smtp_mail_mailer', $request->site_smtp_mail_mailer);
        update_static_option('site_smtp_mail_host', $request->site_smtp_mail_host);
        update_static_option('site_smtp_mail_port', $request->site_smtp_mail_port);
        update_static_option('site_smtp_mail_username', $request->site_smtp_mail_username);
        update_static_option('site_smtp_mail_password', $request->site_smtp_mail_password);
        update_static_option('site_smtp_mail_encryption', $request->site_smtp_mail_encryption);

        $env_val['MAIL_DRIVER'] =  $request->site_smtp_mail_mailer ?? 'MAIL_DRIVER';
        $env_val['MAIL_HOST'] = $request->site_smtp_mail_host ?? 'YOUR_SMTP_MAIL_HOST';
        $env_val['MAIL_PORT'] =  $request->site_smtp_mail_port ?? 'YOUR_SMTP_MAIL_POST';
        $env_val['MAIL_USERNAME'] = $request->site_smtp_mail_username ?? 'YOUR_SMTP_MAIL_USERNAME';
        $env_val['MAIL_PASSWORD'] =  $request->site_smtp_mail_password ? '"'.$request->site_smtp_mail_password.'"' : 'YOUR_SMTP_MAIL_USERNAME_PASSWORD';
        $env_val['MAIL_ENCRYPTION'] =  $request->site_smtp_mail_encryption ?? 'YOUR_SMTP_MAIL_ENCRYPTION';
        $env_val['MAIL_FROM_ADDRESS'] =  get_static_option('site_global_email') ?? 'null';

        setEnvValue($env_val);

        return redirect()->back()->with(['msg' => __('SMTP Settings Updated...'), 'type' => 'success']);
    }

    public function email_settings()
    {
        return view('backend.general-settings.email-settings');
    }

    public function update_email_settings(Request $request)
    {

            $this->validate($request, [
                'service_query_success_message' => 'nullable|string',
                'case_study_query_success_message' => 'nullable|string',
                'contact_mail_success_message' => 'nullable|string',
                'get_in_touch_mail_success_message' => 'nullable|string',
                'event_attendance_mail_success_message' => 'nullable|string',
            ]);

            $fields = [
                'service_query_success_message',
                'case_study_query_success_message',
                'quote_mail_success_message',
                'contact_mail_success_message',
                'get_in_touch_mail_success_message',
                'apply_job_success_message',
                'order_mail_success_message',
                'event_attendance_mail_success_message',
                'feedback_form_mail_success_message',
                'appointment_form_mail_success_message',
                'estimate_form_mail_success_message',
                'enroll_form_mail_success_message',
            ];
            foreach ($fields as $field) {
                update_static_option($field, $request->$field);
            }
        return redirect()->back()->with(['msg' => __('Email Settings Updated..'), 'type' => 'success']);
    }

    public function basic_settings()
    {
        return view('backend.general-settings.basic');
    }

    public function update_basic_settings(Request $request)
    {
        $this->validate($request, [
            'site_admin_dark_mode' => 'nullable|string',
            'disable_user_email_verify' => 'nullable|string',
            // 'og_meta_image_for_site' => 'nullable|string',
        ]);


            $this->validate($request, [
                'site_title' => 'nullable|string',
                'site_tag_line' => 'nullable|string',
                'site_footer_copyright' => 'nullable|string',
            ]);
            $_title = 'site_title';
            $_tag_line = 'site_tag_line';
            $_footer_copyright = 'site_footer_copyright';

            update_static_option($_title, $request->$_title);
            update_static_option($_tag_line, $request->$_tag_line);
            update_static_option($_footer_copyright, $request->$_footer_copyright);

        $all_fields = [
            'site_admin_dark_mode',
            'site_maintenance_mode',
        ];

        foreach ($all_fields as $field){
            update_static_option($field,$request->$field);
        }

        return redirect()->back()->with(['msg' => __('Basic Settings Update Success'), 'type' => 'success']);
    }


    public function email_template_settings()
    {
        return view('backend.general-settings.email-template');
    }

    public function update_email_template_settings(Request $request)
    {

        $this->validate($request, [
            'site_global_email' => 'required|string',
            'site_global_email_template' => 'required|string',
        ]);

        update_static_option('site_global_email', $request->site_global_email);
        update_static_option('site_global_email_template', $request->site_global_email_template);

        return redirect()->back()->with(['msg' => __('Email Settings Updated..'), 'type' => 'success']);
    }

    public function site_identity()
    {
        return view('backend.general-settings.site-identity');
    }

    public function update_site_identity(Request $request)
    {
        $this->validate($request, [
            'site_logo' => 'nullable|string|max:191',
            'site_favicon' => 'nullable|string|max:191',
            'site_white_logo' => 'nullable|string|max:191',
        ]);
        update_static_option('site_logo', $request->site_logo);
        update_static_option('site_favicon', $request->site_favicon);
        update_static_option('site_white_logo', $request->site_white_logo);

        return redirect()->back()->with([
            'msg' => __('Site Identity Has Been Updated..'),
            'type' => 'success'
        ]);
    }


    public function test_smtp_settings(Request $request){
        $this->validate($request,[
            'subject' => 'required|string|max:191',
            'email' => 'required|email|max:191',
            'message' => 'required|string',
        ]);

        $res_data = [
            'msg' => __('Mail Send Success'),
            'type' => 'success'
        ];

        try{
            Mail::to($request->email)->send(new BasicMail([
                'subject' => $request->subject,
                'message' => $request->message
            ]));
        }catch (\Exception $e){
            return redirect()->back()->with(ProjectHelpers::item_delete($e->getMessage()));
        }

        return redirect()->back()->with($res_data);
    }

}
