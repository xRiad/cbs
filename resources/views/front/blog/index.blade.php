
@extends('front.layouts.app')

@section('links')
  <link rel="stylesheet" href="{{ asset('assets/front/css/blog/index.css') }} "> 
@endsection

@section('content')
<div class="dynamic-header">
    <h6>HAQQIMIZDA</h6>
    <h4>Bizi daha yaxından tanıyın</h4>
</div>
<div class="blog-container">
    <div class="blog-cards">
        <div class="blog-card">
            <div class="blog-img">
                <img src="{{ asset('assets/images/top-slider.png') }}" alt="">
            </div>
            <div class="blog-info">
                <div class="blog-category-date">
                    <div class="blog-category txt2">Программирование</div>
                    <div class="ellipse"></div> 
                    <div class="blog-date txt2">11 iyul 2021</div>
                </div>
                <h6 class="blog-title">HTML, CSS & JS nedir?</h6>
            </div>
        </div>
        <div class="blog-card">
            <div class="blog-img">
                <img src="{{ asset('assets/images/top-slider.png') }}" alt="">
            </div>
            <div class="blog-info">
                <div class="blog-category-date">
                    <div class="blog-category txt2">Программирование</div>
                    <div class="ellipse"></div> 
                    <div class="blog-date txt2">11 iyul 2021</div>
                </div>
                <h6 class="blog-title">HTML, CSS & JS nedir?</h6>
            </div>
        </div>
        <div class="blog-card">
            <div class="blog-img">
                <img src="{{ asset('assets/images/top-slider.png') }}" alt="">
            </div>
            <div class="blog-info">
                <div class="blog-category-date">
                    <div class="blog-category txt2">Программирование</div>
                    <div class="ellipse"></div> 
                    <div class="blog-date txt2">11 iyul 2021</div>
                </div>
                <h6 class="blog-title">HTML, CSS & JS nedir?</h6>
            </div>
        </div>
        <div class="blog-card">
            <div class="blog-img">
                <img src="{{ asset('assets/images/top-slider.png') }}" alt="">
            </div>
            <div class="blog-info">
                <div class="blog-category-date">
                    <div class="blog-category txt2">Программирование</div>
                    <div class="ellipse"></div> 
                    <div class="blog-date txt2">11 iyul 2021</div>
                </div>
                <h6 class="blog-title">HTML, CSS & JS nedir?</h6>
            </div>
        </div>
        <div class="blog-card">
            <div class="blog-img">
                <img src="{{ asset('assets/images/top-slider.png') }}" alt="">
            </div>
            <div class="blog-info">
                <div class="blog-category-date">
                    <div class="blog-category txt2">Программирование</div>
                    <div class="ellipse"></div> 
                    <div class="blog-date txt2">11 iyul 2021</div>
                </div>
                <h6 class="blog-title">HTML, CSS & JS nedir?</h6>
            </div>
        </div>
        <div class="blog-card">
            <div class="blog-img">
                <img src="{{ asset('assets/images/top-slider.png') }}" alt="">
            </div>
            <div class="blog-info">
                <div class="blog-category-date">
                    <div class="blog-category txt2">Программирование</div>
                    <div class="ellipse"></div> 
                    <div class="blog-date txt2">11 iyul 2021</div>
                </div>
                <h6 class="blog-title">HTML, CSS & JS nedir?</h6>
            </div>
        </div>
        <div class="blog-card">
            <div class="blog-img">
                <img src="{{ asset('assets/images/top-slider.png') }}" alt="">
            </div>
            <div class="blog-info">
                <div class="blog-category-date">
                    <div class="blog-category txt2">Программирование</div>
                    <div class="ellipse"></div> 
                    <div class="blog-date txt2">11 iyul 2021</div>
                </div>
                <h6 class="blog-title">HTML, CSS & JS nedir?</h6>
            </div>
        </div>
    </div>
    <div class="pagination-container">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_717_405)">
            <path d="M17.5098 3.87003L15.7398 2.10003L5.83977 12L15.7398 21.9L17.5098 20.13L9.37977 12L17.5098 3.87003Z" fill="#323232"/>
            </g>
            <defs>
            <clipPath id="clip0_717_405">
            <rect width="24" height="24" fill="white" transform="translate(24 24) rotate(-180)"/>
            </clipPath>
            </defs>
        </svg>
        <ul class="pages">
            <li class="page active-page">1</li>
            <li class="page">2</li>
            <li class="page">3</li>
            <li class="page">4</li>
            <li class="page">5</li>
        </ul>
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_717_402)">
            <path d="M6.49023 20.13L8.26023 21.9L18.1602 12L8.26023 2.09998L6.49023 3.86998L14.6202 12L6.49023 20.13Z" fill="#323232"/>
            </g>
            <defs>
            <clipPath id="clip0_717_402">
            <rect width="24" height="24" fill="white"/>
            </clipPath>
            </defs>
        </svg>
            
    </div>
</div>    
@endsection