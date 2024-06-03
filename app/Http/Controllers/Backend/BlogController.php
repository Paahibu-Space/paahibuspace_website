<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Actions\SlugChecker;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Programs;
use App\Http\Requests\SlugCheckRequest;
use App\Services;
use App\Volunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;
use Illuminate\Support\Str;


class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
        $all_blog = Blog::all();
        return view('backend.blog.index')->with([
            'all_blog' => $all_blog
        ]);
    }
    public function new_blog(){
        $all_category = BlogCategory::get();
        return view('backend.blog.new')->with([
            'all_category' => $all_category,
        ]);
    }
    public function store_new_blog(Request $request){
        $this->validate($request,[
           'category' => 'required',
           'blog_content' => 'required',
           'tags' => 'required',
           'excerpt' => 'required',
           'title' => 'required',
           'status' => 'required',
           'author' => 'required',
           'slug' => 'nullable',
           'video_url' => 'nullable|string',
           'breaking_news' => 'nullable|string',
           'meta_tags' => 'nullable|string',
           'meta_description' => 'nullable|string',
           'image' => 'nullable|string|max:191',
        ]);
        $slug = !empty($request->slug) ? $request->slug : Str::slug($request->title);

        Blog::create([
            'blog_categories_id' => $request->category,
            'slug' => $slug ,
            'content' => $request->blog_content,
            'tags' => $request->tags,
            'title' => $request->title,
            'status' => $request->status,
            'meta_tags' => $request->meta_tags,
            'meta_description' => $request->meta_description,
            'excerpt' => $request->excerpt,
            'image' => $request->image,
            'user_id' => Auth::user()->id,
            'author' => $request->author,
            'video_url' => $request->video_url,
            'breaking_news' => !empty($request->breaking_news) ? 1 : 0,
        ]);
        return redirect()->back()->with([
            'msg' => __('New Blog Post Added...'),
            'type' => 'success'
        ]);
    }
    public function clone_blog(Request $request)
    {
        $blog_details = Blog::find($request->item_id);
        Blog::create([
            'blog_categories_id' => $blog_details->blog_categories_id,
            'slug' => $blog_details->slug.'33',
            'content' => $blog_details->content,
            'tags' => $blog_details->tags,
            'title' => $blog_details->title,
            'status' => 'draft',
            'meta_tags' => $blog_details->meta_tags,
            'meta_description' => $blog_details->meta_description,
            'excerpt' => $blog_details->excerpt,
            'image' => $blog_details->image,
            'video_url' => $blog_details->video_url,
            'user_id' => null,
            'author' => $blog_details->author,
            'breaking_news' => $blog_details->breaking_news,
        ]);

        return redirect()->back()->with([
            'msg' => __('Blog Post cloned success...'),
            'type' => 'success'
        ]);
    }

    public function edit_blog($id){
        $blog_post = Blog::find($id);
        $all_category = BlogCategory::get();
        return view('backend.blog.edit')->with([
            'all_category' => $all_category,
            'blog_post' => $blog_post,
        ]);
    }
    public function update_blog(Request $request,$id){
        $this->validate($request,[
            'category' => 'required',
            'blog_content' => 'required',
            'tags' => 'required',
            'excerpt' => 'required',
            'title' => 'required',
            'status' => 'required',
            'author' => 'required',
            'slug' => 'nullable',
            'meta_tags' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'image' => 'nullable|string|max:191',

        ]);
        $slug = !empty($request->slug) ? $request->slug : Str::slug($request->title);
        Blog::where('id',$id)->update([
            'blog_categories_id' => $request->category,
            'slug' => $slug,
            'content' => $request->blog_content,
            'tags' => $request->tags,
            'title' => $request->title,
            'status' => $request->status,
            'meta_tags' => $request->meta_tags,
            'meta_description' => $request->meta_description,
            'excerpt' => $request->excerpt,
            'video_url' => $request->video_url,
            'image' => $request->image,
            'user_id' => Auth::user()->id,
            'author' => $request->author,
            'breaking_news' => !empty($request->breaking_news) ? 1 : 0,
        ]);

        return redirect()->back()->with([
            'msg' => __('Blog Post updated...'),
            'type' => 'success'
        ]);
    }
    public function delete_blog(Request $request,$id){
        Blog::find($id)->delete();

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
            'status' => 'required|string|max:191',
            'image' => 'nullable|string|max:191'
        ]);

        BlogCategory::create($request->all());

        return redirect()->back()->with([
            'msg' => __('New Category Added...'),
            'type' => 'success'
        ]);
    }

    public function update_category(Request $request){
        $this->validate($request,[
            'name' => 'required|string|max:191',
            'status' => 'required|string|max:191',
            'image' => 'nullable|string|max:191'
        ]);

        BlogCategory::find($request->id)->update([
            'name' => $request->name,
            'status' => $request->status,
            'image' => $request->image,
        ]);

        return redirect()->back()->with([
            'msg' => __('Category Update Success...'),
            'type' => 'success'
        ]);
    }

    public function delete_category(Request $request,$id){
        if (Blog::where('blog_categories_id',$id)->first()){
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
        Blog::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }

    public function category_bulk_action(Request $request){
        BlogCategory::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }


    public function slug_check(SlugCheckRequest $request){
        $user_given_slug = $request->slug;
        $query = Programs::Blog(['slug' => $user_given_slug]);

        return SlugChecker::Check($request,$query);
    }
}
