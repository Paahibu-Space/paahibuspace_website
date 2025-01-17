<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use App\Models\TeamMemberCategory;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class TeamMemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $all_team_member = TeamMember::all();
        $all_category = TeamMemberCategory::get();
        return view('backend.team.team-member')->with(['all_team_member' => $all_team_member, 'all_category' => $all_category, ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'designation' => 'required|string|max:191',
            'category' => 'required',
            'image' => 'nullable|string|max:191',
            'icon_one' => 'nullable|string|max:191',
            'icon_two' => 'nullable|string|max:191',
            'icon_three' => 'nullable|string|max:191',
            'icon_four' => 'nullable|string|max:191',
            'icon_one_url' => 'nullable|string|max:191',
            'icon_two_url' => 'nullable|string|max:191',
            'icon_three_url' => 'nullable|string|max:191',
            'icon_four_url' => 'nullable|string|max:191'
        ]);
        TeamMember::create([
            'name' => $request->name,
            'designation' => $request->designation,
            'team_category_id' => $request->category,
            'image' => $request->image,
            'icon_one' => $request->icon_one,        
            'icon_two' => $request->icon_two,        
            'icon_three' => $request->icon_three,        
            'icon_four' => $request->icon_four,        
            'icon_one_url' => $request->icon_one_url,        
            'icon_two_url' => $request->icon_two_url,        
            'icon_three_url' => $request->icon_three_url,        
            'icon_four_url' => $request->icon_four_url
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
            'icon_one' => 'nullable|string|max:191',
            'icon_two' => 'nullable|string|max:191',
            'icon_three' => 'nullable|string|max:191',
            'icon_four' => 'nullable|string|max:191',
            'icon_one_url' => 'nullable|string|max:191',
            'icon_two_url' => 'nullable|string|max:191',
            'icon_three_url' => 'nullable|string|max:191',
            'icon_four_url' => 'nullable|string|max:191'
        ]);

        $team_post = TeamMember::find(id: $request->id);


        TeamMember::find($request->id)->update([
            'name' => $request->name,
            'designation' => $request->designation,
            'team_category_id' => $request->category,
            'image' => $request->image,
            'icon_one' => $request->icon_one,        
            'icon_two' => $request->icon_two,        
            'icon_three' => $request->icon_three,        
            'icon_four' => $request->icon_four,        
            'icon_one_url' => $request->icon_one_url,        
            'icon_two_url' => $request->icon_two_url,        
            'icon_three_url' => $request->icon_three_url,        
            'icon_four_url' => $request->icon_four_url
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
        $all_category = TeamMemberCategory::all();
        return view('backend.team.category')->with([
            'all_category' => $all_category,
        ]);
    }
    public function new_category(Request $request){
        $this->validate($request,[
            'name' => 'required|string|max:191|unique:team_members_categories',
        ]);

        TeamMemberCategory::create($request->all());

        return redirect()->back()->with([
            'msg' => __('New Team Category Added...'),
            'type' => 'success'
        ]);
    }

    public function update_category(Request $request){
        $this->validate($request,[
            'name' => 'required|string|max:191',
        ]);

        TeamMemberCategory::find($request->id)->update([
            'name' => $request->name,
        ]);

        return redirect()->back()->with([
            'msg' => __('Team Category Update Success...'),
            'type' => 'success'
        ]);
    }

    public function delete_category(Request $request,$id){
        if (TeamMember::where('team_categories_id',$id)->first()){
            return redirect()->back()->with([
                'msg' => __('You Can Not Delete This Category, It Already Associated With A Post...'),
                'type' => 'danger'
            ]);
        }
        TeamMemberCategory::find($id)->delete();
        return redirect()->back()->with([
            'msg' => __('Category Delete Success...'),
            'type' => 'danger'
        ]);
    }

    public function category_bulk_action(Request $request){
        TeamMemberCategory::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }
}
