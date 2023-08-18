<div class="dynamic-header">
  <div>
    <h6>{{ __('service-header.services') }}</h6>
    <div>></div>
    <div>{{ $service->name }}</div>
  </div>
  <h4>{{ $service->title }}</h4>
</div>
<div class="service-container">
  <div class="service-name subtitle1">{{ $service->question }}</div>
  <h4 class="title">{{ $service->title }}</h4>
  <div class="content txt1">
    <div>{!! $service->content !!}</div>
    <img src="{{ asset('storage/'.$service->image) }}" alt="">
  </div>
  <div class="accordions-letter">
    <div class="accordions-container">
      @foreach($accordions as $accordion)
      <details class="accordion">
        <summary>
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_421_266)">
            <path d="M7.41 8.58997L12 13.17L16.59 8.58997L18 9.99997L12 16L6 9.99997L7.41 8.58997Z" fill="#323232"/>
            </g>
            <defs>
            <clipPath id="clip0_421_266">
            <rect width="24" height="24" fill="white"/>
            </clipPath>
            </defs>
          </svg>            
          {{ $accordion->name }}
        </summary>
        <p class="txt1" class="accordion-content">{!! $accordion->content !!}</p>
      </details>
      @endforeach
    </div>
    {{ $slot }}
  </div>
</div>