<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\StoryType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StoryTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $all_story_types = StoryType::all();
        return view('backend.stories.story-types')->with(['all_story_types' => $all_story_types]);
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required|string|max:191|unique:story_types',
            'status' => 'required|string',
        ]);

        StoryType::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'is_active' => $request->status === 'publish',
        ]);

        return redirect()->back()->with([
            'msg' => __('New Story Type Added...'),
            'type' => 'success'
        ]);
    }

    public function update(Request $request){
        $this->validate($request,[
            'name' => 'required|string|max:191',
            'status' => 'required|string',
        ]);

        StoryType::find($request->id)->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'is_active' => $request->status === 'publish',
        ]);

        return redirect()->back()->with([
            'msg' => __('Story Type Updated...'),
            'type' => 'success'
        ]);
    }

    public function delete($id){
        StoryType::find($id)->delete();
        return redirect()->back()->with([
            'msg' => __('Story Type Deleted...'),
            'type' => 'danger'
        ]);
    }

    public function bulk_action(Request $request){
        StoryType::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }
}
