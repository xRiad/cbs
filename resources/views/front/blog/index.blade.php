
@extends('front.layouts.app')

@section('links')
  <link rel="stylesheet" href="{{ asset('assets/front/css/blog/index.css') }} "> 
@endsection

@section('content')
<div class="dynamic-header">
    <h6>{{ __('blog-header.title') }}</h6>
    <h4>{{ __('blog-header.content') }}</h4>
</div>
<div class="blog-container">
    <div class="blog-cards">
        @foreach($blogs as $blog)
        <a class="blog-card" href="{{ route('blog.detail', $blog->slug) }}">
              <div class="blog-img">
                  <img src="{{ asset('storage/'.$blog->image) }}" alt="">
              </div>
              <div class="blog-info">
                  <div class="blog-category-date">
                      <div class="blog-category txt2">{{ $blog->category?->name }}</div>
                      @if($blog->category)
                        <div class="ellipse"></div> 
                      @endif
                      <div class="blog-date txt2">{{ $blog->custom_formatted_created_at }}</div>
                  </div>
                  <h6 class="blog-title">{{ $blog->title }}</h6>
              </div>
        </a>
        @endforeach
    </div>
    {{ $blogs->links('front.layouts.pagination') }}
</div>    
@endsection