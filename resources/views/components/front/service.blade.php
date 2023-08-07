<div class="dynamic-header">
  <div>
    <h6>{{ $header->page_name }}</h6>
    <div>></div>
    <div>{{ $header->service_name }}</div>
  </div>
  <h4>{{ $header->content }}</h4>
</div>
<div class="service-container">
  <div class="service-name subtitle1">{{ $content->blue_text }}</div>
  <h4 class="title">{{ $content->black_header }}</h4>
  <div class="content txt1">
    @php
      $mainContent = $content->main_content; 
      $mainContentLength = strlen($mainContent);
      $firstHalf = substr($mainContent, 0, $mainContentLength / 2);
      $secondHalf = substr($mainContent, $mainContentLength / 2, $mainContentLength);
    @endphp
    {{ $firstHalf }} 
    <img src="{{ asset('assets/'.$content->image) }}" alt="">
    {{ $secondHalf }}
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
        <p class="txt1" class="accordion-content">{{ $accordion->content }}</p>
      </details>
      @endforeach
    </div>
    {{ $slot }}
  </div>
</div>