@extends('front.layouts.app')

@section('content')
  <div class="dynamic-header">
    <h6>{{ __('portfolio-header.title') }}</h6>
    <h4>{{ __('portfolio-header.content') }}</h4>
  </div>
  <div class="portfolio-container">
    @component('components.front.portfolio', ['projects' => $projects, 'pagination' => true]) @endcomponent
  </div>
@endsection