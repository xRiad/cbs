@extends('front.layouts.app')

@section('links')
  <link rel="stylesheet" href="assets/front/css/about-us.css">
  <link rel="stylesheet" href="{{ 'assets/front/css/components/team.css' }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
@endsection

@section('content')
  <div class="dynamic-header">
    <h6>{{ $blogTitleContent->title }}</h6>
    <h4>{{ $blogTitleContent->content }}</h4>
  </div>
  <div class="video-info">
    <div class="video-container">
      <video src="{{ asset('assets/'.$aboutUsContent->video) }}"></video>
    </div>
    <div class="info">
      <div class="subtitle1 info-txt1">{{ $aboutUsContent->blue_text }}</div>
      <h4 class="info-txt2">{{ $aboutUsContent->black_header }}</h4>
      <div class="info-txt3">
        {{ $aboutUsContent->main_content }} 
      </div>
      <div class="btn1">BİZDƏN GÖRÜŞ AL</div>
    </div>
  </div>
  <x-front.team></x-front.team>
@endsection

@push('scripts')


    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 3,
            spaceBetween: 10,
            navigation: {
                nextEl: ".next-member",
                prevEl: ".prev-member"
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 4,
                    spaceBetween: 40,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 50,
                },
            },
        });
    </script>
@endpush
    