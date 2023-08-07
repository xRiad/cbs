@extends('front.layouts.app')

@section('links')
  <link rel="stylesheet" href="{{ asset('assets/front/css/services/common.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/front/css/services/media/common.css') }}">
@endsection

@section('content')
  @component('components.front.service', ['header' => $header, 'content' => $content, 'accordions' => $accordions])
    <form class="letter" action="{{ route('services.letter.save') }}" method="POST">
      @csrf
        <h4 class="letter-title">SEO üçün başlıq</h4>
        <input type="hidden" name="service_id" value="1">
        <div class="letter-element">
            <div class="letter-input-name">Ad  / Şirkət</div>
            <input type="text" name="name">
            <div class="text-danger">
              @error('name')
                {{ $message }}
              @enderror
            </div>
        </div>
        <div class="letter-element">
            <div class="letter-input-name">Telefon nömrəsi / E-mail</div>
            <input type="text" name="phone_or_email">
            <div class="text-danger">
              @error('phone_or_email')
                {{ $message }}
              @enderror
            </div>
        </div>
        <div class="letter-element">
            <div class="letter-input-name">Vebsayt URL</div>
            <input type="text" name="website_url">
            <div class="text-danger">
              @error('website_url')
                {{ $message }}
              @enderror
            </div>
        </div>
        <button type="submit" class="btn2" >müracİət et</button>
    </form>
  @endcomponent
@endsection