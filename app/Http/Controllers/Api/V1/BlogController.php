<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\BlogPostResource;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\BlogTag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = BlogPost::with(['author', 'category', 'tags'])
            ->published()
            ->orderByDesc('published_at')
            ->paginate(10);

        return BlogPostResource::collection($posts);
    }

    public function show($slug)
    {
        $post = BlogPost::with(['author', 'category', 'tags'])
            ->where('slug', $slug)
            ->published()
            ->firstOrFail();

        return new BlogPostResource($post);
    }

    public function byCategory($categorySlug)
    {
        $category = BlogCategory::where('slug', $categorySlug)->firstOrFail();

        $posts = BlogPost::with(['author', 'category', 'tags'])
            ->where('blog_category_id', $category->id)
            ->published()
            ->orderByDesc('published_at')
            ->paginate(10);

        return BlogPostResource::collection($posts);
    }

    public function byTag($tagSlug)
    {
        $tag = BlogTag::where('slug', $tagSlug)->firstOrFail();

        $posts = $tag->posts()
            ->with(['author', 'category', 'tags'])
            ->published()
            ->orderByDesc('published_at')
            ->paginate(10);

        return BlogPostResource::collection($posts);
    }
}
