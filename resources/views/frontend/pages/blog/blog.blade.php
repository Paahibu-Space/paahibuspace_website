@extends('frontend.layout')

{{-- Breadcrumps --}}
@includeIf('frontend.partials.breadcrumps')

@section('content')
<section class="blog-content-area padding-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                @foreach($all_blogs as $data)
                    <x-frontend.blog.grid :blog="$data" :margin="true"/>
                @endforeach
                <nav class="pagination-wrapper" aria-label="Page navigation ">
                   {{$all_blogs->links()}}
                </nav>
            </div>
            <div class="col-lg-4">
               @include('frontend.pages.blog.sidebar')
            </div>
        </div>
    </div>
</section>
@endsection
