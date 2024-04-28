@extends('frontend.layout')

@includeIf('frontend.partials.breadcrumps')

@section('content')
        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">
    
                <div class="row g-5">
    
                    <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
    
                        <div class="row gy-5 posts-list">
    
                            <div class="col-lg-6">
                                <article class="d-flex flex-column">
    
                                    <div class="post-img">
                                        <img src="./assets/images/cap.jpeg" alt="" class="img-fluid">
                                    </div>
    
                                    <h2 class="title">
                                        <a href="#">Community Ambassadors Program. Call for volunteers</a>
                                    </h2>
    
                                    <div class="meta-top">
                                        <ul>
                                           
                                            <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                                    href="#"><time datetime="2022-01-01">Jan 20,
                                                        2024</time></a></li>
                                           
                                        </ul>
                                    </div>
    
                                    <div class="content">
                                        <p>
                                            Passionate about tech and entrepreneurship?
                                            Join PAAHIBU SPACE in fostering a culture of creativity and collaboration! If you're ready to ignite visions, innovate ideas, and empower girls and women, we want YOU!
                                            Volunteer with us in the Paahibu Community Ambassador Program. <br><br>
                                            Apply now: <a target="_blank" href="https://bit.ly/3RJAhvO">https://bit.ly/3RJAhvO</a>
                                        </p>
                                    </div>
    
                                    <div class="read-more mt-auto align-self-end">
                                        <a href="#">Read More <i class="bi bi-arrow-right"></i></a>
                                    </div>
    
                                </article>
                            </div><!-- End post list item -->
    
                        </div><!-- End blog posts list -->
    
                    </div>
    
                </div>
    
            </div>
        </section><!-- End Blog Section -->
@endsection