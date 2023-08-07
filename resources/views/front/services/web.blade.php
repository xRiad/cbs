@extends('front.layouts.app')

@section('links')
  <link rel="stylesheet" href="{{ asset('assets/front/css/services/common.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/front/css/services/media/common.css') }}">
@endsection

@section('content')
  @component('components.front.service', ['header' => $header, 'content' => $content, 'accordions' => $accordions]@endcomponent
@endsection