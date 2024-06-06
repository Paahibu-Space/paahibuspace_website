<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Actions\SlugChecker;
use App\Models\Stories;
use App\Models\Programs;
use App\Http\Requests\SlugCheckRequest;
use App\Services;
use App\Volunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;
use Illuminate\Support\Str;


class StoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
        $all_stories = Stories::all();
        return view('backend.stories.index')->with([
            'all_stories' => $all_stories
        ]);
    }

    public function new_story(){
        return view('backend.stories.new');
    }

    public function store_new_story(Request $request){
        $this->validate($request,[
           'stories_content' => 'required',
           'title' => 'required',
           'excerpt' => 'required',
           'tags' => 'required',
           'status' => 'required',
           'author' => 'required',
           'slug' => 'nullable',
           'image' => 'nullable|string|max:191',
           'video_url' => 'nullable|string',
           'meta_tags' => 'nullable|string',
           'meta_description' => 'nullable|string',
        ]);
        $slug = !empty($request->slug) ? $request->slug : Str::slug($request->title);

        Stories::create([
            'slug' => $slug ,
            'content' => $request->stories_content,
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'tags' => $request->tags,
            'status' => $request->status,
            'image' => $request->image,
            'user_id' => Auth::user()->id,
            'author' => $request->author,
            'video_url' => $request->video_url,
            'meta_tags' => $request->meta_tags,
            'meta_description' => $request->meta_description,
        ]);
        return redirect()->back()->with([
            'msg' => __('New Story Post Added...'),
            'type' => 'success'
        ]);
    }
    public function clone_story(Request $request)
    {
        $story_details = Stories::find($request->item_id);
        Stories::create([
            'slug' => $story_details->slug.'33',
            'content' => $story_details->content,
            'title' => $story_details->title,
            'excerpt' => $story_details->excerpt,
            'tags' => $story_details->tags,
            'status' => 'draft',
            'image' => $story_details->image,
            'user_id' => null,
            'author' => $story_details->author,
            'video_url' => $story_details->video_url,
        ]);

        return redirect()->back()->with([
            'msg' => __('Story Post cloned success...'),
            'type' => 'success'
        ]);
    }

    public function edit_story($id){
        $story_post = Stories::find($id);
        return view('backend.stories.edit')->with([
            'story_post' => $story_post,
        ]);
    }
    public function update_story(Request $request,$id){
        $this->validate($request,[
            'stories_content' => 'required',
            'title' => 'required',
            'excerpt' => 'required',
            'tags' => 'required',
            'status' => 'required',
            'author' => 'required',
            'slug' => 'nullable',
            'image' => 'nullable|string|max:191',
            'video_url' => 'nullable|string',
            'meta_tags' => 'nullable|string',
            'meta_description' => 'nullable|string',

        ]);
        $slug = !empty($request->slug) ? $request->slug : Str::slug($request->title);
        Stories::where('id',$id)->update([
            'slug' => $slug,
            'content' => $request->stories_content,
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'tags' => $request->tags,
            'status' => $request->status,
            'image' => $request->image,
            'user_id' => Auth::user()->id,
            'author' => $request->author,
            'video_url' => $request->video_url,
            'meta_tags' => $request->meta_tags,
            'meta_description' => $request->meta_description,
        ]);

        return redirect()->back()->with([
            'msg' => __('Story Post updated...'),
            'type' => 'success'
        ]);
    }
    public function delete_story(Request $request,$id){
        Stories::find($id)->delete();

        return redirect()->back()->with([
            'msg' => __('Story Post Delete Success...'),
            'type' => 'danger'
        ]);
    }

    public function bulk_action(Request $request){
        Stories::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }


    public function slug_check(SlugCheckRequest $request){
        $user_given_slug = $request->slug;
        $query = Programs::Stories(['slug' => $user_given_slug]);

        return SlugChecker::Check($request,$query);
    }
}
