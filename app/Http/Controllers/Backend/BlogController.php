<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\BlogCategory;
use App\Models\BlogTag;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $all_blog = BlogPost::with('category')->get();
        return view('backend.blog.index')->with([
            'all_blog' => $all_blog
        ]);
    }

    public function new_blog(){
        $all_category = BlogCategory::all();
        $all_team_members = TeamMember::select('id', 'name')->get(); // For Author selection
        return view('backend.blog.new')->with([
            'all_category' => $all_category,
            'all_team_members' => $all_team_members
        ]);
    }

    public function store_new_blog(Request $request){
        $this->validate($request,[
           'category' => 'required',
           'blog_content' => 'required',
           'tags' => 'nullable|string',
           'excerpt' => 'required',
           'title' => 'required',
           'status' => 'required',
           'author_id' => 'required', // Changed from author string to ID
           'slug' => 'nullable',
           'image' => 'nullable|string',
           'seo_title' => 'nullable|string',
           'seo_description' => 'nullable|string',
        ]);

        $slug = !empty($request->slug) ? $request->slug : Str::slug($request->title);

        $blog = BlogPost::create([
            'blog_category_id' => $request->category,
            'slug' => $slug,
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'content' => $request->blog_content,
            'featured_image' => $request->image,
            'author_id' => $request->author_id,
            'is_published' => $request->status === 'publish',
            'published_at' => $request->status === 'publish' ? now() : null,
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
        ]);

        // Handle Tags
        if ($request->tags) {
            $tagNames = explode(',', $request->tags);
            $tagIds = [];
            foreach ($tagNames as $tagName) {
                $tagName = trim($tagName);
                if($tagName) {
                    $tag = BlogTag::firstOrCreate(['name' => $tagName], ['slug' => Str::slug($tagName)]);
                    $tagIds[] = $tag->id;
                }
            }
            $blog->tags()->sync($tagIds);
        }

        return redirect()->back()->with([
            'msg' => __('New Blog Post Added...'),
            'type' => 'success'
        ]);
    }

    public function clone_blog(Request $request)
    {
        $blog_details = BlogPost::with('tags')->find($request->item_id);
        
        $newBlog = BlogPost::create([
            'blog_category_id' => $blog_details->blog_category_id,
            'slug' => $blog_details->slug.'-clone-' . time(),
            'title' => $blog_details->title,
            'excerpt' => $blog_details->excerpt,
            'content' => $blog_details->content,
            'featured_image' => $blog_details->featured_image,
            'author_id' => $blog_details->author_id,
            'is_published' => false,
            'seo_title' => $blog_details->seo_title,
            'seo_description' => $blog_details->seo_description,
        ]);

        // Clone Tags
        if ($blog_details->tags) {
            $newBlog->tags()->sync($blog_details->tags->pluck('id')->toArray());
        }

        return redirect()->back()->with([
            'msg' => __('Blog Post cloned success...'),
            'type' => 'success'
        ]);
    }

    public function edit_blog($id){
        $blog_post = BlogPost::with('tags')->find($id);
        $all_category = BlogCategory::all();
        $all_team_members = TeamMember::select('id', 'name')->get();

        // Convert tags to string for input
        $tags = $blog_post->tags->pluck('name')->implode(',');
        // Inject strictly for view
        $blog_post->tag_list = $tags; 

        return view('backend.blog.edit')->with([
            'all_category' => $all_category,
            'all_team_members' => $all_team_members,
            'blog_post' => $blog_post,
        ]);
    }

    public function update_blog(Request $request,$id){
        $this->validate($request,[
           'category' => 'required',
           'blog_content' => 'required',
           'tags' => 'nullable|string',
           'excerpt' => 'required',
           'title' => 'required',
           'status' => 'required',
           'author_id' => 'required',
           'slug' => 'nullable',
           'image' => 'nullable|string',
           'seo_title' => 'nullable|string',
           'seo_description' => 'nullable|string',
        ]);

        $slug = !empty($request->slug) ? $request->slug : Str::slug($request->title);
        
        $blog = BlogPost::find($id);
        $blog->update([
            'blog_category_id' => $request->category,
            'slug' => $slug,
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'content' => $request->blog_content,
            'featured_image' => $request->image,
            'author_id' => $request->author_id,
            'is_published' => $request->status === 'publish',
            // 'published_at' => ... // logic to keeping orig date or update
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
        ]);

        // Handle Tags
        if ($request->tags) {
            $tagNames = explode(',', $request->tags);
            $tagIds = [];
            foreach ($tagNames as $tagName) {
                $tagName = trim($tagName);
                if($tagName) {
                    $tag = BlogTag::firstOrCreate(['name' => $tagName], ['slug' => Str::slug($tagName)]);
                    $tagIds[] = $tag->id;
                }
            }
            $blog->tags()->sync($tagIds);
        } else {
            $blog->tags()->detach();
        }

        return redirect()->back()->with([
            'msg' => __('Blog Post updated...'),
            'type' => 'success'
        ]);
    }

    public function delete_blog(Request $request,$id){
        BlogPost::find($id)->delete();

        return redirect()->back()->with([
            'msg' => __('Blog Post Delete Success...'),
            'type' => 'danger'
        ]);
    }

    public function category(){
        $all_category = BlogCategory::all();
        return view('backend.blog.category')->with([
            'all_category' => $all_category,
        ]);
    }

    public function new_category(Request $request){
        $this->validate($request,[
            'name' => 'required|string|max:191|unique:blog_categories',
            'status' => 'required',
        ]);

        BlogCategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'is_active' => $request->status === 'publish',
        ]);

        return redirect()->back()->with([
            'msg' => __('New Category Added...'),
            'type' => 'success'
        ]);
    }

    public function update_category(Request $request){
        $this->validate($request,[
            'name' => 'required|string|max:191',
            'status' => 'required',
        ]);

        BlogCategory::find($request->id)->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'is_active' => $request->status === 'publish',
        ]);

        return redirect()->back()->with([
            'msg' => __('Category Update Success...'),
            'type' => 'success'
        ]);
    }

    public function delete_category(Request $request,$id){
        if (BlogPost::where('blog_category_id',$id)->first()){
            return redirect()->back()->with([
                'msg' => __('You Can Not Delete This Category, It Already Associated With A Post...'),
                'type' => 'danger'
            ]);
        }
        BlogCategory::find($id)->delete();
        return redirect()->back()->with([
            'msg' => __('Category Delete Success...'),
            'type' => 'danger'
        ]);
    }

    public function bulk_action(Request $request){
        BlogPost::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }

    public function category_bulk_action(Request $request){
        BlogCategory::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }

    // Retaining simplified slug check
    public function slug_check(Request $request){
        $slug = $request->slug;
        // Simple check implementation instead of using the service which might depend on old models
        $exists = BlogPost::where('slug', $slug)->exists();
        return response()->json(['status' => $exists ? 'failed' : 'ok']);
    }
}
