<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Models\Program;
use App\Models\WalansiProgramFellow;
use Illuminate\Http\Request;
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
            'name' => 'required|string|max:191',
            'slug' => 'nullable|string',
            'status' => 'required',
            'application_start_date' => 'nullable|date',
            'application_end_date' => 'nullable|date',
            'application_link' => 'nullable|url'
        ]);

        $slug = null;
        if (!empty($request->slug) && $request->slug !== '[object Object]') {
             $slug = Str::slug($request->slug);
        } else {
             $slug = Str::slug($request->name);
        }
        
        Program::create([
            'name' => $request->name,
            'slug' => $slug,
            'is_active' => $request->status === 'publish',
            'application_start_date' => $request->application_start_date,
            'application_end_date' => $request->application_end_date,
            'application_link' => $request->application_link,
        ]);

        return redirect()->back()->with(['msg' => __('New Program Created Success...'),'type'=>'success']);
    }

    public function all_programs(){
        $all_programs = Program::all();
        return view('backend.programs.all-programs')->with(['all_programs' => $all_programs]);
    }

    public function edit_program($id){
        $program = Program::find($id);
        $fellows = $program->fellows()->orderBy('order')->get();
        $attachedPartners = $program->partners;
        $availablePartners = Partner::where('is_active', true)->orderBy('name')->get();

        return view('backend.programs.edit-program')->with([
            'program' => $program,
            'fellows' => $fellows,
            'attachedPartners' => $attachedPartners,
            'availablePartners' => $availablePartners,
        ]);
    }

    public function delete_program(Request $request,$id){
        Program::find($id)->delete();
        return redirect()->back()->with(['msg' => __('Program Delete Success...'),'type'=>'danger']);
    }

    public function update_program(Request $request){
        $this->validate($request,[
            'name' => 'required|string|max:191',
            'slug' => 'nullable|string',
            'status' => 'required',
            'application_start_date' => 'nullable|date',
            'application_end_date' => 'nullable|date',
            'application_link' => 'nullable|url'
        ]);

        $slug = null;
        if (!empty($request->slug) && $request->slug !== '[object Object]') {
             $slug = Str::slug($request->slug);
        } else {
             $slug = Str::slug($request->name);
        }

        Program::find($request->program_id)->update([
            'name' => $request->name,
            'slug' => $slug,
            'is_active' => $request->status === 'publish',
            'application_start_date' => $request->application_start_date,
            'application_end_date' => $request->application_end_date,
            'application_link' => $request->application_link,
        ]);

        return redirect()->back()->with(['msg' => __('Program Update Success...'),'type'=>'success']);
    }

    public function bulk_action(Request $request){
        Program::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }

    public function slug_check(Request $request){
        $slug = $request->slug;
        $type = $request->type;
        
        // For new items, check if slug exists and modify if needed
        if ($type === 'new') {
            $exists = Program::where('slug', $slug)->exists();
            if ($exists) {
                // Append number to make it unique
                $counter = 1;
                $newSlug = $slug . '-' . $counter;
                while (Program::where('slug', $newSlug)->exists()) {
                    $counter++;
                    $newSlug = $slug . '-' . $counter;
                }
                return response()->json($newSlug);
            }
        }
        
        // Return the slug as-is
        return response()->json($slug);
    }

    // Fellow Functions
    public function store_fellow(Request $request){
        $this->validate($request,[
            'program_id' => 'required|exists:programs,id',
            'name' => 'required|string|max:191',
            'role' => 'nullable|string|max:191',
            'quote' => 'nullable|string',
            'image' => 'nullable|string|max:191',
            'status' => 'required',
        ]);

        WalansiProgramFellow::create([
            'program_id' => $request->program_id,
            'name' => $request->name,
            'role' => $request->role,
            'quote' => $request->quote,
            'image' => $request->image,
            'is_active' => $request->status === 'active',
            'order' => WalansiProgramFellow::where('program_id', $request->program_id)->count(),
        ]);

        return redirect()->back()->with(['msg' => __('Fellow Added...'), 'type' => 'success']);
    }

    public function update_fellow(Request $request){
        $this->validate($request,[
            'id' => 'required|exists:program_fellows,id',
            'name' => 'required|string|max:191',
            'role' => 'nullable|string|max:191',
            'quote' => 'nullable|string',
            'image' => 'nullable|string|max:191',
            'status' => 'required',
        ]);

        WalansiProgramFellow::find($request->id)->update([
            'name' => $request->name,
            'role' => $request->role,
            'quote' => $request->quote,
            'image' => $request->image,
            'is_active' => $request->status === 'active',
        ]);

        return redirect()->back()->with(['msg' => __('Fellow Updated...'), 'type' => 'success']);
    }

    public function delete_fellow($id){
        WalansiProgramFellow::find($id)->delete();
        return redirect()->back()->with(['msg' => __('Fellow Removed...'), 'type' => 'danger']);
    }

    // Partner Link Functions
    public function attach_partner(Request $request){
        $this->validate($request,[
            'program_id' => 'required|exists:programs,id',
            'partner_id' => 'required|exists:partners,id',
            'role_label' => 'nullable|string|max:191',
            'description' => 'nullable|string',
            'order' => 'nullable|integer',
        ]);

        $program = Program::find($request->program_id);

        $program->partners()->syncWithoutDetaching([
            $request->partner_id => [
                'role_label' => $request->role_label,
                'description' => $request->description,
                'order' => $request->order ?? 0,
            ],
        ]);

        return redirect()->back()->with(['msg' => __('Partner Attached...'), 'type' => 'success']);
    }

    public function update_partner_link(Request $request){
        $this->validate($request,[
            'id' => 'required|exists:program_partner,id',
            'role_label' => 'nullable|string|max:191',
            'description' => 'nullable|string',
            'order' => 'nullable|integer',
        ]);

        \Illuminate\Support\Facades\DB::table('program_partner')->where('id', $request->id)->update([
            'role_label' => $request->role_label,
            'description' => $request->description,
            'order' => $request->order ?? 0,
            'updated_at' => now(),
        ]);

        return redirect()->back()->with(['msg' => __('Partner Link Updated...'), 'type' => 'success']);
    }

    public function detach_partner($id){
        \Illuminate\Support\Facades\DB::table('program_partner')->where('id', $id)->delete();
        return redirect()->back()->with(['msg' => __('Partner Detached...'), 'type' => 'danger']);
    }

    // Waitlist Functions
    public function program_waitlist(){
        $all_registration = \App\Models\ProgramRegistration::all();
        return view('backend.programs.program-registration-all')->with(['all_registration' => $all_registration]);
    }

    public function program_waitlist_report(Request $request){
        $order_data = '';
        if ($request->isMethod('post')) {
            $query = \App\Models\ProgramRegistration::query();
            if(!empty($request->start_date)){
                $query->whereDate('created_at','>=',$request->start_date);
            }
            if(!empty($request->end_date)){
                $query->whereDate('created_at','<=',$request->end_date);
            }
            $order_data = $query->paginate(10);
        }
        return view('backend.programs.registration-report')->with(['order_data' => $order_data]);
    }

    public function program_waitlist_delete(Request $request,$id){
        \App\Models\ProgramRegistration::find($id)->delete();
        return redirect()->back()->with(['msg' => __('Delete Success...'),'type'=>'danger']);
    }

    public function program_waitlist_bulk_action(Request $request){
         \App\Models\ProgramRegistration::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }

    public function export_waitlist(){
        $fileName = 'waitlist-export-'.time().'.csv';
        $registrations = \App\Models\ProgramRegistration::all();

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('ID', 'Name', 'Email', 'Phone', 'Location', 'Program', 'Status', 'Date', 'Notes'); 

        $callback = function() use($registrations, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($registrations as $reg) {
                fputcsv($file, array(
                    $reg->id, 
                    $reg->name ?? '',
                    $reg->email ?? '',
                    $reg->phone ?? '',
                    $reg->location ?? '',
                    $reg->program_name ?? '', 
                    $reg->status,
                    $reg->created_at,
                    $reg->notes ?? ''
                ));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
