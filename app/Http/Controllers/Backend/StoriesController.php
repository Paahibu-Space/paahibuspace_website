<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Actions\SlugChecker;
use App\Models\Story;
use App\Models\StoryType;
use App\Models\Program;
use App\Models\Programs; // Keeping legacy if needed for other methods, but likely Program replaces it
use App\Http\Requests\SlugCheckRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class StoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $all_stories = Story::all();
        return view('backend.stories.index')->with([
            'all_stories' => $all_stories
        ]);
    }

    public function new_story(){
        $story_types = StoryType::select('id', 'name')->get();
        $programs = Program::select('id', 'name')->get();
        return view('backend.stories.new', compact('story_types', 'programs'));
    }

    public function store_new_story(Request $request){
        $this->validate($request,[
           'name' => 'required',
           'slug' => 'nullable|unique:stories',
           'story_type_id' => 'required',
           'program_id' => 'required',
           'image' => 'required|string',
           'quote' => 'required',
           'short_story' => 'required',
           'full_story_heading' => 'nullable',
           'stories_content' => 'nullable', // Maps to full_story_content
           'status' => 'required', // Maps to is_published
        ]);

        $slug = !empty($request->slug) ? $request->slug : Str::slug($request->name);

        Story::create([
            'name' => $request->name,
            'slug' => $slug,
            'story_type_id' => $request->story_type_id,
            'program_id' => $request->program_id,
            'image' => $request->image,
            'quote' => $request->quote,
            'short_story' => $request->short_story,
            'full_story_heading' => $request->full_story_heading,
            'full_story_content' => $request->stories_content,
            'is_published' => $request->status === 'publish',
            'order' => $request->order ?? 0,
            'role' => $request->role ?? 'N/A', // Assuming role field exists or needs default
        ]);

        return redirect()->back()->with([
            'msg' => __('New Story Post Added...'),
            'type' => 'success'
        ]);
    }

    public function clone_story(Request $request)
    {
        $story_details = Story::find($request->item_id);
        Story::create([
            'name' => $story_details->name . ' (Clone)',
            'slug' => $story_details->slug . '-' . time(),
            'story_type_id' => $story_details->story_type_id,
            'program_id' => $story_details->program_id,
            'image' => $story_details->image,
            'quote' => $story_details->quote,
            'short_story' => $story_details->short_story,
            'full_story_heading' => $story_details->full_story_heading,
            'full_story_content' => $story_details->full_story_content,
            'is_published' => false,
            'role' => $story_details->role,
        ]);

        return redirect()->back()->with([
            'msg' => __('Story Post cloned success...'),
            'type' => 'success'
        ]);
    }

    public function edit_story($id){
        $story_post = Story::find($id);
        $story_types = StoryType::select('id', 'name')->get();
        $programs = Program::select('id', 'name')->get();
        
        return view('backend.stories.edit')->with([
            'story_post' => $story_post,
            'story_types' => $story_types,
            'programs' => $programs,
        ]);
    }

    public function update_story(Request $request,$id){
        $this->validate($request,[
           'name' => 'required',
           'slug' => 'nullable',
           'story_type_id' => 'required',
           'program_id' => 'required',
           'image' => 'nullable|string',
           'quote' => 'required',
           'short_story' => 'required',
           'full_story_heading' => 'nullable',
           'stories_content' => 'nullable',
           'status' => 'required',
        ]);

        $slug = !empty($request->slug) ? $request->slug : Str::slug($request->name);
        
        Story::where('id',$id)->update([
            'name' => $request->name,
            'slug' => $slug,
            'story_type_id' => $request->story_type_id,
            'program_id' => $request->program_id,
            'image' => $request->image,
            'quote' => $request->quote,
            'short_story' => $request->short_story,
            'full_story_heading' => $request->full_story_heading,
            'full_story_content' => $request->stories_content,
            'is_published' => $request->status === 'publish',
            'role' => $request->role ?? 'N/A',
        ]);

        return redirect()->back()->with([
            'msg' => __('Story Post updated...'),
            'type' => 'success'
        ]);
    }

    public function delete_story(Request $request,$id){
        Story::find($id)->delete();

        return redirect()->back()->with([
            'msg' => __('Story Post Delete Success...'),
            'type' => 'danger'
        ]);
    }

    public function bulk_action(Request $request){
        Story::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }

    public function slug_check(SlugCheckRequest $request){
        $user_given_slug = $request->slug;
        $query = Story::where('slug', $user_given_slug)->get(); // Simplified check
        // Assuming SlugChecker expects a query builder or something similar.
        // Reverting to similar behavior as before but with new model
        return SlugChecker::Check($request, Story::where('slug', $user_given_slug));
    }
}
