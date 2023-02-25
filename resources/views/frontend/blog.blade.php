@extends('layouts.frontend')
@section('content')
  <div class="page-banner overlay-dark bg-image" style="background-image: url(../assets/img/bg_image_1.jpg);">
    <div class="banner-section">
      <div class="container text-center wow fadeInUp">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Blog</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal">News</h1>
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div>

  <div class="page-section">
    <div class="container">
      <div class="col-lg-12">
        <div class="row">
          @foreach ($blogs as $blog)
            <div class="col-lg-6">
              <div class="card-blog">
                <div class="header">
                  <a href="#" class="post-thumb">
                    <img src="../storage/blog/bPhoto/{{ $blog->bPhoto }}" height="300px" alt="">
                  </a>
                </div>
                <div class="body">
                  <h3 class="post-title"><a href="blog-details.html">{{ $blog->title }}</a></h3>
                  <p>{{ $blog->description }}</p>
                  <div class="site-info">
                    <div class="avatar mr-2">
                      <div class="avatar-img">
                        <img src="../storage/blog/aPhoto/{{ $blog->aPhoto }}" alt="">
                      </div>
                      <span>{{ $blog->auther }}</span>
                    </div>
                    <span class="mai-time"></span> {{ $blog->created_at }}
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div> <!-- .row -->
    </div> <!-- .container -->
  </div>
@endsection
