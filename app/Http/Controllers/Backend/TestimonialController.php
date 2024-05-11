<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class TestimonialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
        $all_testimonial = Testimonial::all();
        return view('backend.testimonial.testimonial')->with([
            'all_testimonial' => $all_testimonial,
        ]);
    }
    public function store(Request $request){
        $this->validate($request,[
           'name' => 'required|string|max:191',
           'description' => 'required',
           'designation' => 'string|max:191',
           'status' => 'string|max:191',
           'image' => 'nullable|string|max:191',
        ]);
        Testimonial::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'designation' => $request->designation,
            'image' => $request->image
        ]);
        return redirect()->back()->with(['msg' => __('New Testimonial Added Success'),'type' => 'success']);
    }

    public function update(Request $request){
        $this->validate($request,[
            'name' => 'required|string|max:191',
            'description' => 'required',
            'designation' => 'string|max:191',
            'status' => 'string|max:191',
            'image' => 'nullable|string|max:191',
        ]);
         Testimonial::find($request->id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'designation' => $request->designation,
            'image' => $request->image
        ]);

        return redirect()->back()->with(['msg' => __('Testimonial Update Success'),'type' => 'success']);
    }
    public function clone(Request $request){
        $testimonial = Testimonial::find($request->item_id);

        Testimonial::create([
            'name' => $testimonial->name,
            'description' => $testimonial->description,
            'status' => 'draft',
            'designation' => $testimonial->designation,
            'image' => $testimonial->image
        ]);

        return redirect()->back()->with(['msg' => __('Testimonial Clone Success'),'type' => 'success']);
    }

    public function delete(Request $request,$id){

        $testimonial = Testimonial::find($id)->delete();
        return redirect()->back()->with(['msg' => __('Testimonial Delete Success'),'type' => 'danger']);
    }

    public function bulk_action(Request $request){
        Testimonial::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }
}
