@extends('front.layouts.app')

@section('content')
  <div class="dynamic-header">
    {{-- @dd($portfolioPageHeader) --}}
    <h6>{{ $portfolioPageHeader->title }}</h6>
    <h4>{{ $portfolioPageHeader->content }}</h4>
  </div>
  <div class="portfolio-container">
    @component('components.front.portfolio', ['projects' => $projects, 'pagination' => true]) @endcomponent
  </div>
@endsection