<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Actions\SlugChecker;
use App\Models\ProgramRegistration;
use App\Models\Programs;
use App\Facades\EmailTemplate;
use App\Http\Requests\SlugCheckRequest;
use App\Mail\BasicMail;
use App\Mail\RegistrationReply;
use App\Helpers\ProjectHelpers;
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
            'venue_phone' => 'nullable|string',
            'time' => 'required|string',
            'image' => 'nullable|string',
            'date' => 'required|string',
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
            'available_registrations' => $request->available_registrations,
            'image' => $request->image,
            'venue' => $request->venue,
            'venue_location' => $request->venue_location,
            'meta_tags' => $request->meta_tags,
            'meta_description' => $request->meta_description,
        ]);

        return redirect()->back()->with(['msg' => __('New Event Created Success...'),'type'=>'success']);
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
        return redirect()->back()->with(['msg' => __('Event Delete Success...'),'type'=>'danger']);
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
            'available_registrations' => $request->available_registrations,
            'image' => $request->image,
            'venue' => $request->venue,
            'venue_location' => $request->venue_location,
            'meta_tags' => $request->meta_tags,
            'meta_description' => $request->meta_description,
        ]);

        return redirect()->back()->with(['msg' => __('Event Update Success...'),'type'=>'success']);
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
            'available_registrations' => $program_details->available_registrations,
            'image' => $program_details->image,
            'venue' => $program_details->venue,
            'venue_location' => $program_details->venue_location,
        ]);
        return redirect()->back()->with(['msg' => __('Events Clone Success...'),'type' => 'success']);
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
        $registration_details->delete();
        return redirect()->back()->with(['msg' => __('Programs Registration Lob Deleted...'),'type' => 'danger']);
    }

    public function update_program_registration_logs_status(Request $request){
        ProgramRegistration::where('id',$request->registration_id)->update(['status' => $request->registration_status]);
        
         //todo: write code to increase  ticket number if status == cancel
        if($request->registration_status == 'canceled'){
            //update program available tickets
            $registration_details = ProgramRegistration::where('id',$request->registration_id)->first();
            $program_details = Programs::findOrFail($registration_details->program_id);
            $program_details->available_registrations = (int) $program_details->available_registrations + $registration_details->quantity;
            $program_details->save();
        }
        
        return redirect()->back()->with(['msg' => __('Program Registration Status Updated...'),'type' => 'success']);
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
        return redirect()->back()->with(['msg' => __('Attendance Reply Mail Send Success...'),'type' => 'success']);
    }

    public function bulk_action(Request $request){
        Programs::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }

    public function registration_logs_bulk_action(Request $request){
        ProgramRegistration::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }

    public function registration_report(Request  $request){
        $order_data = '';
        $programs = Programs::where(['status' => 'publish'])->get();
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

    public function program_attedance_reminder(Request $request){
        //send order reminder mail
        $registration_details = ProgramRegistration::find($request->id);
        $send_to = ProgramRegistration::where(['registration_id' => $request->id ])->first();
        try {
            Mail::to($send_to->email)->send(new BasicMail(EmailTemplate::programBookingReminderMail($registration_details)));
        }catch (\Exception $e){
            return back()->with(ProjectHelpers::item_delete($e->getMessage()));
        }

        return redirect()->back()->with(['msg' => __('Reminder Mail Send Success'),'type' => 'success']);
    }
    public function slug_check(SlugCheckRequest $request){

        $user_given_slug = $request->slug;
        $query = Programs::where(['slug' => $user_given_slug]);

        return SlugChecker::Check($request,$query);
    }
}
