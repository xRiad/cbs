@extends('front.layouts.app')

@section('links')
  <link rel="stylesheet" href="{{ asset('assets/front/css/blog/index.css') }} "> 
  <link rel="stylesheet" href="{{ asset('assets/front/css/blog/detail.css') }} "> 
@endsection

@section('content')
<div class="dynamic-header">
  <div>
    <h6>BLOG</h6>
  </div>
  <h4>{{ $blog->title }}</h4>
</div>
<div class="blog-container">
  <div class="img-container">
    <img src="{{ asset('assets/images/blog2.png') }}" alt="">
  </div>
  <div class="date-socials">
    <div class="blog-category-date">
        <div class="blog-category txt1">{{ $blog->category->name }}</div>
        <div class="ellipse"></div> 
        <div class="blog-date txt2">11 iyul 2021</div>
    </div>
    <div class="socials">
      <ul class="socials">
          <li class="social-icon-wrapper">
              <i class="fab fa-instagram fa-xs"></i>
          </li>
          <li class="social-icon-wrapper">
              <i class="fa-brands fa-twitter"></i>
          </li>
          <li class="social-icon-wrapper">
              <i class="fab fa-linkedin-in fa-xs"></i>
          </li>
          <li class="social-icon-wrapper">
              <i class="fab fa-facebook-f fa-xs"></i>
          </li>
      </ul>
    </div>
  </div>
  <h4 class="title">{{ $blog->title }}</h4>
  <div class="content txt1">
    {{ $blog->content }}
  </div>
  <div class="recent-posts">
    <h4 class="recent-post-text">Recent Posts</h4>
    <div class="posts">
      @foreach($recentBlogs as $recentBlog)
      <a href="{{ route('blog.detail', $recentBlog->id) }}">
        <div class="blog-card">
            <div class="blog-img">
                <img src="{{ asset('assets/'.$recentBlog->image) }}" alt="">
            </div>
            <div class="blog-info">
                <div class="blog-category-date">
                    <div class="blog-category txt2">{{ $recentBlog->category->name }}</div>
                    <div class="ellipse"></div> 
                    <div class="blog-date txt2">11 iyul 2021</div>
                </div>
                <h6 class="blog-title">{{ $recentBlog->title }}</h6>
            </div>
        </div>
      </a>
      @endforeach
    </div>
  </div>
</div>
@endsection