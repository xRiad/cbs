@extends('front.layouts.app')

@section('links')
   <link rel="stylesheet" href=" {{ asset('/assets/front/css/portfolio-detail.css') }} "> 
   <link rel="stylesheet" href="{{ asset('/assets/front/css/components/portfolio.css') }}">
@endsection

@section('content')
<div class="dynamic-header">
  <div>
    <h6>HAQQIMIZDA</h6>
    <div>></div>
    <h6>SEO</h6>
  </div>
  <h4>Bizi daha yaxından tanıyın</h4>
</div>
<div class="portfolio-container">
  <div class="main-info">
    <div class="project-name-text">LAYİHƏ ADI</div>
    <h4 class="project-name">Some cool name for project</h4>
    <div class="min-img">
      <img src="{{ asset('assets/images/portfolio1.png') }}" alt="">
    </div>
    <div class="about-roles">
      <div class="about">
        <div class="about-text">Haqqında</div>
        <div class="about txt1">The original vision of TextMagic was to help companies connect with clients by sending text messages. But as their vision came true, the company started to expand to support more sophisticated communication capabilities.</div>
      </div>
      <div class="roles">
        <div class="role-text">Rollarımız</div>
        <div class="roles-container txt1">
          <div class="role">Web App Design</div>
        </div>
      </div>
    </div>
  </div>
</div>
  <div class="full-img">
    <img src="{{ asset('assets/images/portfolio1.png') }}" alt="">
  </div>

  <div class="other-projects-container">
    <h4 class="other-projects-text">Digər layihələr</h4>
    <div class="other-projects">
        <div class="portfolio-card">
            <div class="portfolio-image">
                <img src="{{ asset('assets/images/portfolio-card.png')  }}" alt="">
            </div>
            <div class="portfolio-card-category">Dizayn</div>
            <div class="portfolio-title">Mercury ERP Brendbook</div>
        </div>
        <div class="portfolio-card">
            <div class="portfolio-image">
                <img src="{{ asset('assets/images/portfolio-card.png')  }}" alt="">
            </div>
            <div class="portfolio-card-category">Dizayn</div>
            <div class="portfolio-title">Mercury ERP Brendbook</div>
        </div>
        <div class="portfolio-card">
            <div class="portfolio-image">
                <img src="{{ asset('assets/images/portfolio-card.png')  }}" alt="">
            </div>
            <div class="portfolio-card-category">Dizayn</div>
            <div class="portfolio-title">Mercury ERP Brendbook</div>
        </div>
        <div class="portfolio-card">
            <div class="portfolio-image">
                <img src="{{ asset('assets/images/portfolio-card.png')  }}" alt="">
            </div>
            <div class="portfolio-card-category">Dizayn</div>
            <div class="portfolio-title">Mercury ERP Brendbook</div>
        </div>
    </div>
  </div>
@endsection