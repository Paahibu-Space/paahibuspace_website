<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use App\Models\TeamCategory;
use Illuminate\Http\Request;

class TeamMemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $all_team_member = TeamMember::with('category')->get();
        $all_category = TeamCategory::all();
        return view('backend.team.team-member')->with([
            'all_team_member' => $all_team_member, 
            'all_category' => $all_category, 
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'designation' => 'required|string|max:191', // Mapped to role
            'category' => 'required', // Mapped to team_category_id
            'image' => 'nullable|string|max:191',
            'linkedin_url' => 'nullable|string|max:191',
            'email' => 'nullable|email|max:191',
            'status' => 'required'
        ]);
        
        // Note: Legacy view sends 'designation', new model uses 'role'.
        // Legacy view sends 'category', new model uses 'team_category_id'.

        TeamMember::create([
            'name' => $request->name,
            'role' => $request->designation,
            'team_category_id' => $request->category,
            'image' => $request->image,
            'linkedin_url' => $request->icon_one_url ?? $request->linkedin_url, // Fallback if view still sends icon_one_url
            'email' => $request->email,
            'is_active' => $request->status === 'publish',
            'order' => 0
        ]);

        return redirect()->back()->with(['msg' => __('New Team Member Added...'), 'type' => 'success']);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'designation' => 'required|string|max:191',
            'category' => 'required',
            'image' => 'nullable|string|max:191',
            'linkedin_url' => 'nullable|string|max:191',
            'email' => 'nullable|email|max:191',
            'status' => 'required'
        ]);

        TeamMember::find($request->id)->update([
            'name' => $request->name,
            'role' => $request->designation,
            'team_category_id' => $request->category,
            'image' => $request->image,
            'linkedin_url' => $request->icon_one_url ?? $request->linkedin_url,
            'email' => $request->email,
            'is_active' => $request->status === 'publish',
        ]);

        return redirect()->back()->with(['msg' => __('Team Member Details Updated...'), 'type' => 'success']);
    }

    public function delete($id)
    {
       TeamMember::find($id)->delete();
        return redirect()->back()->with(['msg' => __('Delete Success...'), 'type' => 'danger']);
    }

    public function bulk_action(Request $request){
        TeamMember::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }

    public function category(){
        $all_category = TeamCategory::orderBy('order')->get();
        return view('backend.team.category')->with([
            'all_category' => $all_category,
        ]);
    }
    public function new_category(Request $request){
        $this->validate($request,[
            'name' => 'required|string|max:191',
            'order' => 'nullable|integer',
        ]);

        // Slug generation
        $slug = \Illuminate\Support\Str::slug($request->name);

        TeamCategory::create([
            'name' => $request->name,
            'slug' => $slug,
            'order' => $request->order ?? 0
        ]);

        return redirect()->back()->with([
            'msg' => __('New Team Category Added...'),
            'type' => 'success'
        ]);
    }

    public function update_category(Request $request){
        $this->validate($request,[
            'name' => 'required|string|max:191',
            'order' => 'nullable|integer',
        ]);

        TeamCategory::find($request->id)->update([
            'name' => $request->name,
            'slug' => \Illuminate\Support\Str::slug($request->name),
            'order' => $request->order ?? 0,
        ]);

        return redirect()->back()->with([
            'msg' => __('Team Category Update Success...'),
            'type' => 'success'
        ]);
    }

    public function delete_category(Request $request,$id){
        if (TeamMember::where('team_category_id',$id)->first()){
            return redirect()->back()->with([
                'msg' => __('You Can Not Delete This Category, It Already Associated With A Post...'),
                'type' => 'danger'
            ]);
        }
        TeamCategory::find($id)->delete();
        return redirect()->back()->with([
            'msg' => __('Category Delete Success...'),
            'type' => 'danger'
        ]);
    }

    public function category_bulk_action(Request $request){
        TeamCategory::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }
}
