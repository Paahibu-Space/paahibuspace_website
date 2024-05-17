<div class="widget-area">
    <div class=" blog-widget widget">
        <div class="widget_search">
            <form action="{{ route('frontend.blog.search') }}" method="get" class="search-form">
                <div class="form-group">
                    <input type="text" class="form-control" name="search" placeholder="Search...">
                </div>
                <button class="submit-btn" type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
    <div class="widget_archive blog-widget widget">
        <div class="widget_archive style-01">
            <h3 class="widget-title style-01">Blog Categories</h3>
            <ul>

                @foreach ($blog_posts as $post)
                    <li><a href="{{ route('frontend.blog.category', ['id' => $post->id,'any' => Str::slug(purify_html($post->name))]) }}"> <i class="fas fa-chevron-right"></i>{{purify_html($post->name)}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class=" blog-widget widget">
        <h4 class="widget-title style-01">Related Posts</h4>
        <ul class="recent_post_item">
            @foreach ($all_blogs as $blog)
            <li class="single-recent-post-item">
                <div class="thumb">
                    {!! render_image_markup_by_attachment_id($blog->image, '', 'thumb') !!}
                </div>
                <div class="content">
                    <h4 class="title"><a
                            href="{{ route('frontend.blog.single',['slug' => $blog->slug ]) }}">{{ purify_html($blog->title) }}</a></h4>
                    <span class="time"> <i class="far fa-calendar-alt "></i>{{ date_format($blog->created_at, 'd M Y') }}</span>
                </div>
            </li>
            @endforeach
            
        </ul>
    </div>
</div>
