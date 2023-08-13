@extends('front.layouts.app')

@section('links')
  <link rel="stylesheet" href="{{ asset('assets/front/css/services/common.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/front/css/services/media/common.css') }}">
@endsection

@section('content')
  @component('components.front.service', ['service' => $service, 'accordions' => $accordions])
    @if($service->has_letters)
    <form class="letter" action="{{ route('services.letter.save') }}" method="POST">
      @csrf
        <h4 class="letter-title">{{ __('service-letter.title', ['serviceName' => $service->name]) }}</h4>
        <input type="hidden" name="service_id" value="{{ $service->id }}">
        <div class="letter-element">
            <div class="letter-input-name">{{ __('service-letter.name_company') }}</div>
            <input type="text" name="name">
            <div class="text-danger">
              @error('name')
                {{ $message }}
              @enderror
            </div>
        </div>
        <div class="letter-element">
            <div class="letter-input-name">{{ __('service-letter.phone_email') }}</div>
            <input type="text" name="phone_or_email">
            <div class="text-danger">
              @error('phone_or_email')
                {{ $message }}
              @enderror
            </div>
        </div>
        <div class="letter-element">
            <div class="letter-input-name">{{ __('service-letter.website_url') }}</div>
            <input type="text" name="website_url">
            <div class="text-danger">
              @error('website_url')
                {{ $message }}
              @enderror
            </div>
        </div>
        <button type="submit" class="btn2" >{{ __('service-letter.apply') }}</button>
    </form>
    @endif
  @endcomponent
@endsection