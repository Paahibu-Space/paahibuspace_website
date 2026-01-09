<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Program;
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
            'status' => 'required'
        ]);

        $slug = !empty($request->slug) ? $request->slug : Str::slug($request->name);
        
        Program::create([
            'name' => $request->name,
            'slug' => $slug,
            'is_active' => $request->status === 'publish',
        ]);

        return redirect()->back()->with(['msg' => __('New Program Created Success...'),'type'=>'success']);
    }

    public function all_programs(){
        $all_programs = Program::all();
        return view('backend.programs.all-programs')->with(['all_programs' => $all_programs]);
    }

    public function edit_program($id){
        $program = Program::find($id);
        return view('backend.programs.edit-program')->with(['program' => $program]);
    }

    public function delete_program(Request $request,$id){
        Program::find($id)->delete();
        return redirect()->back()->with(['msg' => __('Program Delete Success...'),'type'=>'danger']);
    }

    public function update_program(Request $request){
        $this->validate($request,[
            'name' => 'required|string|max:191',
            'slug' => 'nullable|string',
            'status' => 'required'
        ]);

        $slug = !empty($request->slug) ? $request->slug : Str::slug($request->name);

        Program::find($request->program_id)->update([
            'name' => $request->name,
            'slug' => $slug,
            'is_active' => $request->status === 'publish',
        ]);

        return redirect()->back()->with(['msg' => __('Program Update Success...'),'type'=>'success']);
    }

    public function bulk_action(Request $request){
        Program::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }

    public function slug_check(Request $request){
        $slug = $request->slug;
        $exists = Program::where('slug', $slug)->exists();
        return response()->json(['status' => $exists ? 'failed' : 'ok']);
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

        $columns = array('ID', 'Event Name', 'Status', 'Date'); 

        $callback = function() use($registrations, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($registrations as $reg) {
                fputcsv($file, array(
                    $reg->id, 
                    $reg->program_name ?? '', 
                    $reg->status,
                    $reg->created_at
                ));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
