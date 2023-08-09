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
    <h6>{{ $project->name }}</h6>
  </div>
  <h4>{{ $project->phrase }}</h4>
</div>
<div class="portfolio-container">
  <div class="main-info">
    <div class="project-name-text">{{ $project->name }}</div>
    <h4 class="project-name">{{ $project->phrase }}</h4>
    <div class="min-img">
      <img src="{{ asset('assets/'.$project->image_detail) }}" alt="">
    </div>
    <div class="about-roles">
      <div class="about">
        <div class="about-text">Haqqında</div>
        <div class="about txt1">{{ $project->description }}</div>
      </div>
      <div class="roles">
        <div class="role-text">Rollarımız</div>
        <div class="roles-container txt1">
          @foreach($project->roles as $role)
          <div class="role">{{ $role->name }}</div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
  <div class="full-img">
    <img src="{{ asset('assets/'.$project->image_detail) }}" alt="">
  </div>

  @if($otherProjects)
  <div class="other-projects-container">
    <h4 class="other-projects-text">Digər layihələr</h4>
    <div class="other-projects">
      @foreach($otherProjects as $anotherProject)
      <a href="{{ route('portfolio.detail', $anotherProject->slug) }}">
        <div class="portfolio-card">
            <div class="portfolio-image">
                <img src="{{ asset('assets/'.$anotherProject->image)  }}" alt="">
            </div>
            <div class="portfolio-card-category">{{ $anotherProject->category->name }}</div>
            <div class="portfolio-title">{{ $anotherProject->name }}</div>
        </div>
      </a>
      @endforeach
    </div>
  </div>
  @endif
@endsection