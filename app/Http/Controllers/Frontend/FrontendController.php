<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Stories;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index() {
        return view('frontend.pages.index');
    }

    public function showAboutPage() {
        return view('frontend.pages.about');
    }

    public function showProgramsPage() {
        return view('frontend.pages.programs.programs');
    }
    
    public function showServicesPage() {
        return view('frontend.pages.services.services');
    }
    
    public function showTeamPage() {
        return view('frontend.pages.team');
    }
    
    public function showVolunteersPage() {
        return view('frontend.pages.volunteers');;
    }

    // Blog Controllers
    public function blog_page()
    {
        $all_blogs = Blog::where(['status' => 'publish'])->orderBy('id', 'desc')->paginate(get_static_option('blog_page_item'));
        $all_categories = BlogCategory::where(['status' => 'publish'])->orderBy('id','desc')->get();
        if (!empty($post_items)){
            $all_categories = $all_categories->take($post_items);
        }
        return view('frontend.pages.blog.blog')->with([
            'all_blogs' => $all_blogs,
            'all_categories' => $all_categories,
            'all_recent_blogs' => $all_blogs
        ]);
    }

    public function category_wise_blog_page($id)
    {

        $all_blogs = Blog::where(['blog_categories_id' => $id,'status' => 'publish'])->orderBy('id', 'desc')->paginate(get_static_option('blog_page_item'));
        if (empty($all_blogs)){
            abort(404);
        }
        $all_recent_blogs = Blog::where(['status' => 'publish'])->orderBy('id', 'desc')->take(get_static_option('blog_page_recent_post_widget_item'))->get();
        $all_category = BlogCategory::where(['status' => 'publish'])->orderBy('id', 'desc')->get();
        $category_name = BlogCategory::where(['id' => $id, 'status' => 'publish'])->first()->name;
        return view('frontend.pages.blog.blog-category')->with([
            'all_blogs' => $all_blogs,
            'all_categories' => $all_category,
            'category_name' => $category_name,
            'all_recent_blogs' => $all_recent_blogs,
            'all_related_blog' => $all_recent_blogs,
        ]);
    }

    public function tags_wise_blog_page($tag)
    {
        $all_blogs = Blog::where(['status' => 'publish'])->Where('tags', 'LIKE', '%' . $tag . '%')
            ->orderBy('id', 'desc')->paginate(get_static_option('blog_page_item'));
        if (empty($all_blogs)){
            abort(404);
        }
        $all_recent_blogs = Blog::where(['status' => 'publish'])->orderBy('id', 'desc')->take(get_static_option('blog_page_recent_post_widget_item'))->get();
        $all_category = BlogCategory::where(['status' => 'publish'])->orderBy('id', 'desc')->get();
        return view('frontend.pages.blog.blog-tags')->with([
            'all_blogs' => $all_blogs,
            'all_categories' => $all_category,
            'tag_name' => $tag,
            'all_recent_blogs' => $all_recent_blogs,
            'all_related_blog' => $all_recent_blogs,
        ]);
    }

    public function blog_search_page(Request $request)
    {

        $all_recent_blogs = Blog::where(['status' => 'publish'])->orderBy('id', 'desc')->take(get_static_option('blog_page_recent_post_widget_item'))->get();
        $all_category = BlogCategory::where(['status' => 'publish'])->orderBy('id', 'desc')->get();
        $all_blogs = Blog::where(['status' => 'publish'])->Where('title', 'LIKE', '%' . $request->search . '%')
            ->orderBy('id', 'desc')->paginate(get_static_option('blog_page_item'));

        return view('frontend.pages.blog.blog-search')->with([
            'all_blogs' => $all_blogs,
            'all_categories' => $all_category,
            'search_term' => $request->search,
            'all_recent_blogs' => $all_recent_blogs,
            'all_related_blogs' => $all_recent_blogs,
        ]);
    }

    public function blog_single_page($slug)
    {

        $blog_post = Blog::where('slug', $slug)->first();
        if (empty($blog_post)){
            abort(404);
        }
        $all_recent_blogs = Blog::where(['status' => 'publish'])->orderBy('id', 'desc')->paginate(get_static_option('blog_page_recent_post_widget_item'));
        $all_category = BlogCategory::where(['status' => 'publish'])->orderBy('id', 'desc')->get();

        $all_related_blog = Blog::where(['status' => 'publish'])->Where('blog_categories_id', $blog_post->blog_categories_id)->orderBy('id', 'desc')->take(6)->get();

        return view('frontend.pages.blog.blog-single')->with([
            'blog_post' => $blog_post,
            'all_categories' => $all_category,
            'all_recent_blogs' => $all_recent_blogs,
            'all_related_blog' => $all_related_blog,
        ]);
    }

    public function story_page()
    {
        $all_stories = Stories::where(['status' => 'publish'])->orderBy('id', 'desc')->get();
        return view('frontend.pages.stories.stories')->with([
            'all_stories' => $all_stories,
        ]);
    }

    public function story_single_page($slug) {
        $story = Stories::where('slug', $slug)->first();
        return view('frontend.pages.stories.single-story')->with([
            'story' => $story,
        ]);
    }
    
}
