@extends('front.layouts.app')
@section('content')
  <div class="dynamic-header">
    <h6>{{ __('portfolio-header.title') }}</h6>
    <h4>{{ __('portfolio-header.content') }}</h4>
  </div>
  <div class="portfolio-container">
    @include('front.partials._portfolio', ['projects' => $projects]) 
         {{ $projects->links('front.layouts.pagination') }}
  </div>
@endsection