<div class="page-section bg-light">
  <div class="container">
    <h1 class="text-center wow fadeInUp">Latest Blogs</h1>
    <div class="row mt-5">
      @foreach ($activeBlogs as $blog)
        <div class="col-lg-4 py-2 wow zoomIn">
          <div class="card-blog">
            <div class="header">
              <a href="#" class="post-thumb">
                <img src="../storage/blog/bPhoto/{{ $blog->bPhoto }}" height="300px" alt="">
              </a>
            </div>
            <div class="body">
              <h3 class="post-title"><a href="blog-details.html">{{ $blog->title }}</a></h3>
              <p>{{ Str::limit($blog->description, 40, '...') }}</p>
              <div class="site-info">
                <div class="avatar mr-2">
                  <div class="avatar-img">
                    <img src="../storage/blog/aPhoto/{{ $blog->aPhoto }}" alt="">
                  </div>
                  <span>{{ $blog->auther }}</span>
                </div>
                <span class="mai-time"></span>{{ $blog->created_at }}
              </div>
            </div>
          </div>
        </div>
      @endforeach

    </div>
  </div>
</div>
