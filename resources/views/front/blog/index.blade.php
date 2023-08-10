
@extends('front.layouts.app')

@section('links')
  <link rel="stylesheet" href="{{ asset('assets/front/css/blog/index.css') }} "> 
@endsection

@section('content')
<div class="dynamic-header">
    <h6>{{ $blogTitleContent->title }}</h6>
    <h4>{{ $blogTitleContent->content }}</h4>
</div>
<div class="blog-container">
    <div class="blog-cards">
        @foreach($blogs as $blog)
        <div class="blog-card">
            <div class="blog-img">
                <img src="{{ asset('assets/'.$blog->image) }}" alt="">
            </div>
            <div class="blog-info">
                <div class="blog-category-date">
                    <div class="blog-category txt2">{{ $blog->category->name }}</div>
                    <div class="ellipse"></div> 
                    <div class="blog-date txt2">{{ $blog->custom_formatted_created_at }}</div>
                </div>
                <h6 class="blog-title">{{ $blog->title }}</h6>
            </div>
        </div>
        @endforeach
    </div>
    {{ $blogs->links('front.layouts.pagination') }}
</div>    
@endsection