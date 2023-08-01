@extends('front.layouts.app')

@section('links')
  <link rel="stylesheet" href="assets/front/css/about-us.css">
@endsection

@section('content')
  <div class="dynamic-header">
    <h6>HAQQIMIZDA</h6>
    <h4>Bizi daha yaxından tanıyın</h4>
  </div>
  <div class="video-info">
    <div class="video-container">
      <video src="{{ asset('assets/videos/countdown.mp4') }}"></video>
    </div>
    <div class="info">
      <div class="subtitle1 info-txt1">BİZİ DAHA YAXINDAN TANIYIN</div>
      <div class="info-txt2">Rəqəmsal həllər ilə hər zaman yanınızdayıq</div>
      <div class="info-txt3">
        <p>
          Kreativ(bacarıqlı) komandamız və strateji həllərimiz 6 illik fəaliyyət müddətində onlarla tərəfdaşımızın inkişafına, satışlarının artımına və tanınmasına səbəbdir! 
        </p>
       <p>
          Tərəfdaşlarımızın inkişafını növbəti səviyyəyə qaldırmaq üçün uzunmüddətli təcrübəmizə əsaslanaraq dizayn, marketinq və biznes problemlərinin öhdəsindən gəlməyi sevirik!
        </p> 
      </div>
      <div class="btn1">BİZDƏN GÖRÜŞ AL</div>
    </div>
  </div>
  <x-front.team></x-front.team>
@endsection