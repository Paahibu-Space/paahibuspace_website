<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Stories;
use App\Models\TeamMember;
use App\Models\Services;
use App\Models\ServiceCategory;
use App\Models\Programs;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index() {
        $all_services = Services::where(['status' => 'publish'])->orderBy('sr_order', 'asc')->get();
        return view('frontend.pages.index')->with([
            'all_services' => $all_services
        ]);
    }

    public function showAboutPage() {
        $all_team_members = TeamMember::orderBy('id', 'desc')->paginate(12);
        return view('frontend.pages.about')->with([
            'all_team_members' => $all_team_members
        ]);
    }

    public function showProgramsPage() {
        return view('frontend.pages.programs.programs');
    }
    
    public function service_page()
    {
        $all_services = Services::orderBy('sr_order', 'asc')->paginate(get_static_option('service_page_service_items'));
        return view('frontend.pages.service.services')->with(['all_services' => $all_services]);
    }

    public function services_single_page($slug)
    {
        $service_item = Services::where('slug', $slug)->first();
        if (empty($service_item)){
            abort(404);
        }
        $service_category = ServiceCategory::where(['status' => 'publish'])->get();
        return view('frontend.pages.service.service-single')->with(['service_item' => $service_item, 'service_category' => $service_category]);
    }

    public function category_wise_services_page($id, $any)
    {
        $category_name = ServiceCategory::find($id)->name;
        if(empty($category_name)){
            abort('404');
        }
        $service_item = Services::where(['categories_id' => $id])->paginate(6);
        return view('frontend.pages.service.service-category')->with(['service_items' => $service_item, 'category_name' => $category_name]);
    }
    
    public function showTeamPage() {
        $all_team_members = TeamMember::orderBy('id', 'desc')->paginate(12);

        return view('frontend.pages.team')->with(['all_team_members' => $all_team_members]);
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

    public function programs()
    {

        $all_programs = Programs::where(['status' => 'publish'])->orderBy('id', 'desc')->paginate(get_static_option('site_programs_post_items'));
        return view('frontend.pages.programs.program')->with([
            'all_programs' => $all_programs,
        ]);
    }

    public function programs_single($slug)
    {

        $program = Programs::where('slug', $slug)->first();
        if (empty($program)) {
            return redirect_404_page();
        }
        return view('frontend.pages.programs.program-single')->with([
            'program' => $program,
        ]);
    }

    public function program_registration($id)
    {
        $program = Programs::find($id);
        return view('frontend.pages.programs.program-registration')->with([
            'program' => $program
        ]);
    }
    
}
