@extends('front.layouts.app')

@section('links')
   <link rel="stylesheet" href=" {{ asset('/assets/front/css/portfolio-detail.css') }} "> 
   <link rel="stylesheet" href="{{ asset('/assets/front/css/components/portfolio.css') }}">
@endsection

@section('content')
<div class="dynamic-header">
  <div>
    <h6>{{ __('portfolio-detail.portfolio') }}</h6>
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
      <img src="{{ asset('storage/'.$project->image_detail) }}" alt="">
    </div>
    <div class="about-roles">
      <div class="about">
        <div class="about-text">{{ __('portfolio-detail.about') }}</div>
        <div class="about txt1">{!! $project->description !!}</div>
      </div>
      @if(count($project->roles) > 0)
      <div class="roles">
        <div class="role-text">{{ __('portfolio-detail.roles') }}</div>
        <div class="roles-container txt1">
          @foreach($project->roles as $role)
          <div class="role">{{ $role->name }}</div>
          @endforeach
        </div>
      </div>
      @endif
    </div>
  </div>
</div>
  <div class="full-img">
    <img src="{{ asset('storage/'.$project->image_detail) }}" alt="">
  </div>

  @if(count($otherProjects) > 0)
  <div class="other-projects-container">
    <h4 class="other-projects-text">{{ __('portfolio-detail.other_projects') }}</h4>
    <div class="other-projects">
      @foreach($otherProjects as $anotherProject)
      <a href="{{ route('portfolio.detail', $anotherProject->slug) }}">
        <div class="portfolio-card">
            <div class="portfolio-image">
                <img src="{{ asset('storage/'.$anotherProject->image)  }}" alt="">
            </div>
            <div class="portfolio-card-category">{{ $anotherProject->category?->name }}</div>
            <div class="portfolio-title">{{ $anotherProject->name }}</div>
        </div>
      </a>
      @endforeach
    </div>
  </div>
  @endif
@endsection