<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Models\PartnerCategory;
use Illuminate\Http\Request;

class PartnersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $all_partners = Partner::with('category')->get();
        $all_category = PartnerCategory::all();
        return view('backend.partners.partners')->with([
            'all_partners' => $all_partners,
            'all_category' => $all_category,
        ]);
    }

    public function store(Request $request){

        $this->validate($request,[
            'name' => 'required|string|max:191',
            'image' => 'required|string|max:191',
            'url' => 'nullable|string|max:191',
            'category' => 'nullable|exists:partner_categories,id',
            'relationship' => 'nullable|string|max:191',
            'programme_initiative' => 'nullable|string|max:191',
            'period' => 'nullable|string|max:191',
            'contribution' => 'nullable|string',
            'attribution_requirements' => 'nullable|string',
            'status' => 'required'
        ]);

        Partner::create([
            'name' => $request->name,
            'logo' => $request->image,
            'website_url' => $request->url,
            'partner_category_id' => $request->category,
            'relationship' => $request->relationship,
            'programme_initiative' => $request->programme_initiative,
            'period' => $request->period,
            'contribution' => $request->contribution,
            'attribution_requirements' => $request->attribution_requirements,
            'is_active' => $request->status === 'publish',
            'order' => 0
        ]);

        return redirect()->back()->with(['msg' => __('New Partner Added...'),'type' => 'success']);
    }

    public function update(Request $request){

        $this->validate($request,[
            'name' => 'required|string|max:191',
            'image' => 'nullable|string|max:191',
            'url' => 'nullable|string|max:191',
            'category' => 'nullable|exists:partner_categories,id',
            'relationship' => 'nullable|string|max:191',
            'programme_initiative' => 'nullable|string|max:191',
            'period' => 'nullable|string|max:191',
            'contribution' => 'nullable|string',
            'attribution_requirements' => 'nullable|string',
            'status' => 'required'
        ]);

        Partner::find($request->id)->update([
            'name' => $request->name,
            'logo' => $request->image,
            'website_url' => $request->url,
            'partner_category_id' => $request->category,
            'relationship' => $request->relationship,
            'programme_initiative' => $request->programme_initiative,
            'period' => $request->period,
            'contribution' => $request->contribution,
            'attribution_requirements' => $request->attribution_requirements,
            'is_active' => $request->status === 'publish',
        ]);

        return redirect()->back()->with(['msg' => __('Partners Updated...'),'type' => 'success']);
    }

    public function delete($id){

        Partner::find($id)->delete();
        return redirect()->back()->with(['msg' =>__( 'Delete Success...'),'type' => 'danger']);
    }

    public function bulk_action(Request $request){
        Partner::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }

    public function category(){
        $all_category = PartnerCategory::orderBy('id')->get();
        return view('backend.partners.category')->with([
            'all_category' => $all_category,
        ]);
    }

    public function new_category(Request $request){
        $this->validate($request,[
            'name' => 'required|string|max:191',
            'description' => 'nullable|string',
        ]);

        PartnerCategory::create([
            'name' => $request->name,
            'slug' => \Illuminate\Support\Str::slug($request->name),
            'description' => $request->description,
        ]);

        return redirect()->back()->with([
            'msg' => __('New Partner Category Added...'),
            'type' => 'success'
        ]);
    }

    public function update_category(Request $request){
        $this->validate($request,[
            'name' => 'required|string|max:191',
            'description' => 'nullable|string',
        ]);

        PartnerCategory::find($request->id)->update([
            'name' => $request->name,
            'slug' => \Illuminate\Support\Str::slug($request->name),
            'description' => $request->description,
        ]);

        return redirect()->back()->with([
            'msg' => __('Partner Category Update Success...'),
            'type' => 'success'
        ]);
    }

    public function delete_category(Request $request,$id){
        if (Partner::where('partner_category_id',$id)->first()){
            return redirect()->back()->with([
                'msg' => __('You Can Not Delete This Category, It Is Already Associated With A Partner...'),
                'type' => 'danger'
            ]);
        }
        PartnerCategory::find($id)->delete();
        return redirect()->back()->with([
            'msg' => __('Category Delete Success...'),
            'type' => 'danger'
        ]);
    }

    public function category_bulk_action(Request $request){
        PartnerCategory::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }
}
