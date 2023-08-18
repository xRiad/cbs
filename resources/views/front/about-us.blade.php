@extends('front.layouts.app')

@section('links')
  <link rel="stylesheet" href="assets/front/css/about-us.css">
  <link rel="stylesheet" href="{{ 'assets/front/css/components/team.css' }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
@endsection

@section('content')
  <div class="dynamic-header">
    <h6>{{ __('about-header.about') }}</h6>
    <h4>{{ __('about-header.know_us_close') }}</h4>
  </div>
  <div class="video-info">
    <div class="video-container">

      <img src="{{ asset('storage/'.$aboutUsContent->image) }}">
    </div>
    <div class="info">
      <div class="subtitle1 info-txt1">{{ __('about.know_us_close') }}</div>
      <h4 class="info-txt2">{{ __('about.always_close') }}</h4>
      <div class="info-txt3">
        {{ $aboutUsContent->content }}
      </div>
      <div class="btn1">{{ __('about.meet_us') }}</div>
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
    