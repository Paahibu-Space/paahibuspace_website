<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Actions\SlugChecker;
use App\Models\ProgramRegistration;
use App\Models\ProgramPaymentLogs;
use App\Models\Programs;
use App\Facades\EmailTemplate;
use App\Helpers\ProjectHelpers;
use App\Http\Requests\SlugCheckRequest;
use App\Mail\BasicMail;
use App\Mail\RegistrationReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ProgramsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function new_program(){
        return view('backend.programs.new-program');
    }

    public function store_program(Request $request){
        $this->validate($request,[
            'title' => 'required|string|max:191',
            'program_content' => 'required|string',
            'venue' => 'nullable|string',
            'venue_location' => 'nullable|string',
            'time' => 'required|string',
            'image' => 'nullable|string',
            'date' => 'required|string',
            'cost' => 'required|string',
            'available_registrations' => 'required|string',
            'slug' => 'nullable|string'
        ]);
        $slug = !empty($request->slug) ? $request->slug : Str::slug($request->title);
        $slug_check = Programs::where(['slug' => $slug])->count();
        $slug = $slug_check > 0 ? $slug.'2' : $slug;

        Programs::create([
            'title' => $request->title,
            'slug' => $slug,
            'content' => $request->program_content,
            'status' => $request->status,
            'date' => $request->date,
            'time' => $request->time,
            'cost' => $request->cost,
            'available_registrations' => $request->available_registrations,
            'image' => $request->image,
            'venue' => $request->venue,
            'venue_location' => $request->venue_location,
            'meta_tags' => $request->meta_tags,
            'meta_description' => $request->meta_description,
        ]);

        return redirect()->back()->with(['msg' => __('New Program Created Success...'),'type'=>'success']);
    }

    public function all_programs(){
        $all_programs = Programs::all();
        return view('backend.programs.all-programs')->with(['all_programs' => $all_programs]);
    }

    public function edit_program($id){
        $program = Programs::find($id);
        return view('backend.programs.edit-program')->with(['program' => $program]);
    }

    public function delete_program(Request $request,$id){
        Programs::find($id)->delete();
        return redirect()->back()->with(['msg' => __('Program Delete Success...'),'type'=>'danger']);
    }

    public function update_program(Request $request){
        $this->validate($request,[
            'title' => 'required|string|max:191',
            'program_content' => 'required|string',
            'venue' => 'nullable|string',
            'venue_location' => 'nullable|string',
            'time' => 'required|string',
            'image' => 'nullable|string',
            'date' => 'required|string',
            'cost' => 'required|string',
            'available_registrations' => 'required|string',
            'slug' => 'nullable|string'
        ]);

        $slug = !empty($request->slug) ? $request->slug : Str::slug($request->title);

        Programs::find($request->program_id)->update([
            'title' => $request->title,
            'slug' => $slug,
            'content' => $request->program_content,
            'status' => $request->status,
            'date' => $request->date,
            'time' => $request->time,
            'cost' => $request->cost,
            'available_registrations' => $request->available_registrations,
            'image' => $request->image,
            'venue' => $request->venue,
            'venue_location' => $request->venue_location,
            'meta_tags' => $request->meta_tags,
            'meta_description' => $request->meta_description,
        ]);

        return redirect()->back()->with(['msg' => __('Program Update Success...'),'type'=>'success']);
    }

    public function clone_program(Request $request){
        $program_details = Programs::find($request->item_id);
        Programs::create([
            'title' => $program_details->title,
            'slug' => $program_details->slug,
            'content' => $program_details->content,
            'status' => 'draft',
            'date' => $program_details->date,
            'time' => $program_details->time,
            'cost' => $program_details->cost,
            'available_registrations' => $program_details->available_registrations,
            'image' => $program_details->image,
            'venue' => $program_details->venue,
            'venue_location' => $program_details->venue_location,
        ]);
        return redirect()->back()->with(['msg' => __('Programs Clone Success...'),'type' => 'success']);
    }

    public function program_registration(){
        return view('backend.programs.program-registration-settings');
    }

    public function update_program_registration(Request $request){
        $this->validate($request,[
            'program_registration_receiver_mail' => 'nullable|string|max:191'
        ]);
            $this->validate($request,[
                'program_registration_page_title'  => 'nullable|string',
                'program_registration_page_form_button_title'  => 'nullable|string',
            ]);
            $field_list = [
                'program_registration_page_title',
                'program_registration_page_form_button_title'
            ];
            foreach ($field_list as $field){
                update_static_option($field,$request->$field);
            }

        update_static_option('program_registration_receiver_mail',$request->program_registration_receiver_mail);

        return redirect()->back()->with(['msg' => __('Programs Registration Page Settings Success...'),'type' => 'success']);
    }

    public function program_registration_logs(){
        $all_registration = ProgramRegistration::all();
        return view('backend.programs.program-registration-all')->with(['all_registration' => $all_registration]);
    }

    public function delete_program_registration_logs(Request $request,$id){
        $registration_details = ProgramRegistration::find($id);
        $program_payment_logs = ProgramPaymentLogs::where('registration_id',$registration_details->id)->first();
        if (!empty($program_payment_logs)){
            return redirect()->back()->with(['msg' => __('Your Can not delete this registration, it already associated with a program payment log.'),'type' => 'danger']);
        }
        $registration_details->delete();
        return redirect()->back()->with(['msg' => __('Programs Registration Lob Deleted...'),'type' => 'danger']);
    }

    public function update_program_registration_logs_status(Request $request){
        ProgramRegistration::where('id',$request->registration_id)->update(['status' => $request->registration_status]);
        
         //todo: write code to increase  ticket number if status == cancel
        if($request->registration_status == 'canceled'){
            //update program available registrations
            $registration_details = ProgramRegistration::where('id',$request->registration_id)->first();
            $program_details = Programs::findOrFail($registration_details->program_id);
            $program_details->available_registrations = (int) $program_details->available_registrations + $registration_details->quantity;
            $program_details->save();
        }
        
        return redirect()->back()->with(['msg' => __('Programs Registration Status Updated...'),'type' => 'success']);
    }

    public function send_mail_program_registration_logs(Request $request){
        $this->validate($request,[
            'email' => 'required|string|max:191',
            'name' => 'required|string|max:191',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);
        $subject = str_replace('{site}',get_static_option('site_title'),$request->subject);
        $data = [
            'name' => $request->name,
            'message' => $request->message,
        ];
        try {
            Mail::to($request->email)->send(new RegistrationReply($data,$subject));
        }catch (\Exception $e){
            return redirect()->back()->with(ProjectHelpers::item_delete($e->getMessage()));
        }
        return redirect()->back()->with(['msg' => __('Registration Reply Mail Send Success...'),'type' => 'success']);
    }

    public function program_payment_logs(){
        $paymeng_logs = ProgramPaymentLogs::all();
        return view('backend.programs.program-payment-logs-all')->with(['payment_logs' => $paymeng_logs]);
    }
    public function delete_program_payment_logs(Request $request,$id){
        ProgramPaymentLogs::find($id)->delete();
        return redirect()->back()->with(['msg' => __('Program Payment Log Delete Success...'),'type' => 'danger']);
    }

    public function approve_program_payment(Request $request,$id){

        $payment_logs = ProgramPaymentLogs::find($id);
        $payment_logs->status = 'complete';
        $payment_logs->save();

        $program_registration = ProgramRegistration::find($payment_logs->registration_id);
        $program_registration->payment_status = 'complete';
        $program_registration->status = 'complete';
        $program_registration->save();

        $program_details = Programs::find($program_registration->program_id);
        $program_details->available_registrations -= $program_registration->quantity;
        $program_details->save();

        //update database
        $program_payment_logs = ProgramPaymentLogs::find($id);
        $program_registration = ProgramRegistration::find($program_payment_logs->registration_id);

        $order_mail = get_static_option('program_registration_receiver_mail') ?: get_static_option('site_global_email');
        try {
            Mail::to($order_mail)->send(new BasicMail(EmailTemplate::programRegistrationPaymentAcceptMail($program_registration)));
        }catch (\Exception $e){
            return redirect()->back()->with(['msg' => __('Manual Payment Accept Success, mail send failed').' '.$e->getMessage(),'type' => 'success']);
        }

        return redirect()->back()->with(['msg' => __('Manual Payment Accept Success'),'type' => 'success']);
    }

    public function bulk_action(Request $request){
        Programs::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }

    public function registration_logs_bulk_action(Request $request){
        ProgramRegistration::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }

    public function payment_logs_bulk_action(Request $request){
        ProgramPaymentLogs::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }
    
    public function payment_report(Request  $request){
        $order_data = '';
        $query = ProgramPaymentLogs::query();
        if (!empty($request->start_date)){
            $query->whereDate('created_at','>=',$request->start_date);
        }
        if (!empty($request->end_date)){
            $query->whereDate('created_at','<=',$request->end_date);
        }
        if (!empty($request->payment_status)){
            $query->where(['status' => $request->payment_status ]);
        }
        $error_msg = __('select start & end date to generate program payment report');
        if (!empty($request->start_date) && !empty($request->end_date)){
            $query->orderBy('id','DESC');
            $order_data =  $query->paginate($request->items);
            $error_msg = '';
        }

        return view('backend.programs.payment-report')->with([
            'order_data' => $order_data,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'items' => $request->items,
            'payment_status' => $request->payment_status,
            'error_msg' => $error_msg
        ]);
    }

    public function registration_report(Request  $request){
        $order_data = '';
        $programs = Programs::get();
        $query = ProgramRegistration::query();
        if (!empty($request->start_date)){
            $query->whereDate('created_at','>=',$request->start_date);
        }
        if (!empty($request->end_date)){
            $query->whereDate('created_at','<=',$request->end_date);
        }
        if (!empty($request->program_id)){
            $query->where(['program_id' => $request->program_id ]);
        }
        $error_msg = __('select start & end date to generate program registration report');
        if (!empty($request->start_date) && !empty($request->end_date)){
            $query->orderBy('id','DESC');
            $order_data =  $query->paginate($request->items);
            $error_msg = '';
        }

        return view('backend.programs.registration-report')->with([
            'order_data' => $order_data,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'items' => $request->items,
            'program_id' => $request->program_id,
            'programs' => $programs,
            'error_msg' => $error_msg
        ]);
    }

    public function program_registration_reminder(Request $request){
        //send order reminder mail
        $order_details = ProgramRegistration::find($request->id);
        $payment_log = ProgramPaymentLogs::where(['registration_id' => $request->id])->first();
        try {
            Mail::to($payment_log->email)->send(new BasicMail(EmailTemplate::programRegistrationReminderMail($order_details)));
        }catch (\Exception $e){
            return back()->with(ProjectHelpers::item_delete($e->getMessage()));
        }

        return redirect()->back()->with(['msg' => __('Reminder Mail Send Success'),'type' => 'success']);
    }

    public function settings(){
        return view('backend.programs.settings');
    }

    public function slug_check(SlugCheckRequest $request){

        $user_given_slug = $request->slug;
        $query = Programs::where(['slug' => $user_given_slug]);

        return SlugChecker::Check($request,$query);
    }
}
