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
  <h4>Bizi daha yaxından tanıyın</h4>
</div>
<div class="blog-container">
  <div class="img-container">
    <img src="{{ asset('assets/images/blog2.png') }}" alt="">
  </div>
  <div class="date-socials">
    <div class="blog-category-date">
        <div class="blog-category txt1">Программирование</div>
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
  <h4 class="title">Lightspeed Broadband appoints Code as digital partner</h4>
  <div class="content txt1">
    New ISP challenger brand Lightspeed Broadband has partnered with Code to develop a full digital identity and suite of digital products as the business embarks on an ambitious roll out of its full-fibre gigabit broadband services.

    Lightspeed aims to bring full-fibre optic connections directly to 100,000 homes and businesses across the East of England by 2022, and has already deployed over one hundred engineers to start building the network in ten towns across the region, with ambitions to expand and reach 1 million homes by 2025.

    Code’s remit is to create a digital infrastructure and strategy, develop the digital brand and marketing website, as well as create a customer portal design and interface.

    We’ll also work with Lightspeed to devise a customer experience across SalesForce and other connected technologies, creating a unified customer experience and provide ongoing technical and future direction strategy for the internet service provider.

    Steve Haines, CEO of Lightspeed Broadband, said: “Our website and digital capabilities need to be as slick, fast and reliable as the broadband that we are delivering into people’s homes and businesses. We’re happy to be working with Code and are confident that they are the partner to make that happen.

    “Their expertise, insight and understanding of what is required to create an unrivalled digital experience will help support our plans to reach 100,000 homes and businesses across the East of England by 2022.

    “Collaborating with communities and local authorities, we started the roll out of our full fibre broadband to ten towns across South Lincolnshire and West Norfolk in April.”

    Rob Jones, Managing Director at Code said: “High speed, reliable broadband has become even more important to our lives over the past year or so as we appreciate the importance of connectivity – this is only set to grow further. Lightspeed is focused on making a difference in communities that are currently being underserved by the existing infrastructure and have investment and a hugely experienced senior team to help them reach their ambitious targets.

    “We are excited to play a role in this journey. As a new to the market challenger brand, there is huge potential to create a cut-through digital experience that will rival, and exceed, that of the existing big players.

    ”For Lightspeed, we will be implementing a full suite of services – from design and UX through to technical strategy. We will be creating a unified customer experience which will include a customer portal and interface design.”
  </div>
  <div class="recent-posts">
    <h4 class="recent-post-text">Recent Posts</h4>
    <div class="posts">
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
  </div>
</div>
@endsection