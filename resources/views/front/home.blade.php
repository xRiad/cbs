@extends('front.layouts.app')

@section('links')
  <link rel="stylesheet" href="{{ 'assets/front/css/home.css' }}">
  <link rel="stylesheet" href="{{ asset('assets/front/css/components/portfolio.css') }}">
  <link rel="stylesheet" href="{{ 'assets/front/css/media/home.css' }}">
  <link rel="stylesheet" href="{{ 'assets/front/css/components/team.css' }}">
  <link rel="stylesheet" href="{{ 'assets/front/css/components/contact.css' }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
  {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous"> --}}
@endsection

@section('content')
    <!-- Slider main container -->
    @if($slides)
    <div class="swiper swiper-container">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            @if($slides) 
            @foreach($slides as $slide)
            <div class="swiper-slide">
                <div class="header-slider-elem">
                    <div class="shadow">
                      <img src="{{ asset('storage/' . $slide->image) }}" alt="">
                    </div>
                    <div class="header-slider-content">
                        <h3 class="header-slider-main-text">{{ $slide->title }}</h3>
                        <div class="header-slider-secondary-text txt1">{!! $slide->content !!}</div>
                        <div class="header-slider-buttons">
                            <div id="to-services" class="btn2 slider-top-services">{{__('about-slider-button.services')}}</div>
                            <a href="{{ route('portfolio') }}" class="btn1 slider-top-portfolio">{{__('about-slider-button.portfolio')}}</a>
                        </div>
                    </div>
                    <div class="header-slider-buttons-mob">
                        <div class="btn2">{{__('about-slider-button.services')}}</div>
                        <div class="btn1 slider-top-portfolio">{{__('about-slider-button.portfolio')}}</div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
        <!-- If we need pagination -->
        {{-- <div class="pagination "></div> --}}

    </div>
    @endif

   <div class="services-container">
        <div class="services-anchor part-head">
          <h4 class="h4-bold section-title">{{ __('services.title') }}</h4>
          <div class="services-text-btn">
              <div class="txt1 section-phrase">{{ __('services.description') }}</div>
              <div class="btn1">{{ __('services.contact-us') }}</div>
          </div>
        </div>
        @if($cards)
        <div class="services-cards">
          @foreach($cards as $card)
            @if($card->card_type === 1)
            <div class="service-card">
                <div class="service-icon">
                    {!! $card->icon !!}
                </div>
                <h5 class="service-title">{{ $card->title }}</h5>
                <div class="service-desc txt2">{!! $card->content !!}</div>
            </div>
            @endif
          @endforeach
        </div>
        @endif
   </div>
   <div class="portfolio-container">
      <div class="part-head">
        <h4 class="h4-bold section-title">{{ __('portfolio.title') }}</h4>
        <div class="txt1 section-phrase">{{ __('portfolio.description') }}</div>
      </div>
       @include('front.partials._portfolio', ['projects' => $projects]) 
       <div class="see-all-portfolio">
           <a class="btn1" href="{{ route('portfolio') }}">{{ __('portfolio-see-all.title') }}</a>
       </div>
   </div>
    <div class="choose-us-container">
        <div class="part-head section-title">
          <h4 class="h4-bold">{{ __('choosed-us.title') }}</h4>
          <div class="txt1 section-phrase">{{ __('choosed-us.description') }}</div>
        </div>
        <div class="slider-companies">
            <div class="employe-slider">
                <div class="quote-container">
                    <div class="top-quote">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48" fill="none">
                            <g clip-path="url(#clip0_461_12)">
                                <path d="M36 14H30L26 22V34H38V22H32L36 14ZM20 14H14L10 22V34H22V22H16L20 14Z" fill="white"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_461_12">
                                    <rect width="48" height="48" fill="white" transform="matrix(-1 0 0 -1 48 48)"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </div>
                    <div class="quote-txt txt1">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's</div>
                    <div class="bottom-quote">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48" fill="none">
                            <g clip-path="url(#clip0_461_15)">
                                <path d="M12 34H18L22 26V14H10V26H16L12 34ZM28 34H34L38 26V14H26V26H32L28 34Z" fill="white"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_461_15">
                                    <rect width="48" height="48" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </div>
                    <div class="center-ava-container">
                        <img src="{{ asset('assets/images/guy.png') }}" alt="">
                    </div>
                </div>
                <div class="employe-slider-bottom">
                    <div class="employe-slider-left">
                        <div class="employe-ava">
                            <img src="{{ asset('assets/images/guy.png') }}" alt="">
                        </div>
                        <div class="employe-ava">
                            <img src="{{ asset('assets/images/guy.png') }}" alt="">
                        </div>
                    </div>
                    <div class="employe-slider-center">
                        <div class="employe-name-position">
                            <div class="employe-name subtitle1">Ayxan Rəcəbov</div>
                            <div class="employe-position txt1">CEO of Zenbil</div>
                        </div>
                        <div class="dots">
                            <div class="dot"></div>
                            <div class="dot"></div>
                            <div class="dot"></div>
                            <div class="dot"></div>
                            <div class="dot"></div>
                        </div>
                    </div>
                    <div class="employe-slider-right">
                        <div class="employe-ava">
                            <img src="{{ asset('assets/images/guy.png') }}" alt="">
                        </div>
                        <div class="employe-ava">
                            <img src="{{ asset('assets/images/guy.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="companies">
              @foreach($companiesIcons as $companyIcon)           
              <div class="company-logo">
                {!! $companyIcon->icon !!}
              </div>
              @endforeach
            </div>
        </div>
    </div>
    <div class="process-container">
        <h4 class="section-title">{{ __('working-process.title') }}</h4>
        @if($cards)
        <div class="process-cards">
          @foreach($cards->take(ceil($cards->count() / 2) + 1) as $card)
                @if($card->card_type === 2)
                    <div class="process-card">
                        <div class="process-card-icon">
                            <div class="process-icon">
                                {!! $card->icon !!}
                            </div>
                        </div>
                        <div class="process-title subtitle1">{{ $card->title }}</div>
                        <div class="process-desc txt1">{!! $card->content !!}</div>
                    </div>
                @endif
            @endforeach
        </div>
        @endif
        <div class="dot-line">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
                <g clip-path="url(#clip0_554_34)">
                    <path d="M10.4167 7L15.625 12L10.4167 17V7Z" fill="#323232"/>
                </g>
                <defs>
                    <clipPath id="clip0_554_34">
                        <rect width="25" height="24" fill="white" transform="matrix(-1 0 0 1 25 0)"/>
                    </clipPath>
                </defs>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
                <g clip-path="url(#clip0_554_34)">
                    <path d="M10.4167 7L15.625 12L10.4167 17V7Z" fill="#323232"/>
                </g>
                <defs>
                    <clipPath id="clip0_554_34">
                        <rect width="25" height="24" fill="white" transform="matrix(-1 0 0 1 25 0)"/>
                    </clipPath>
                </defs>
            </svg>
        </div>
        <div class="process-cards">
          @foreach($cards->skip(ceil($cards->count() / 2) + 1) as $card)
          @if($card->card_type === 2)
              <div class="process-card">
                  <div class="process-card-icon">
                      <div class="process-icon">
                          {!! $card->icon !!}
                      </div>
                  </div>
                  <div class="process-title subtitle1">{{ $card->title }}</div>
                  <div class="process-desc txt1">{!! $card->content !!}</div>
              </div>
          @endif
      @endforeach
        </div>
        <div class="dot-line">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
                <g clip-path="url(#clip0_554_34)">
                    <path d="M10.4167 7L15.625 12L10.4167 17V7Z" fill="#323232"/>
                </g>
                <defs>
                    <clipPath id="clip0_554_34">
                        <rect width="25" height="24" fill="white" transform="matrix(-1 0 0 1 25 0)"/>
                    </clipPath>
                </defs>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
                <g clip-path="url(#clip0_554_34)">
                    <path d="M10.4167 7L15.625 12L10.4167 17V7Z" fill="#323232"/>
                </g>
                <defs>
                    <clipPath id="clip0_554_34">
                        <rect width="25" height="24" fill="white" transform="matrix(-1 0 0 1 25 0)"/>
                    </clipPath>
                </defs>
            </svg>
        </div>
    </div>
    <div class="talk-container">
      <h4 class="talk-phrase">{{ __('find.title') }}</h4>
      <div class="talk-desc txt1">{{ __('find.description') }}</div>
      <div>
          <a href="{{ route('contact') }}" class="talk-btn btn2">{{ __('find.talk') }}</a>
      </div>
    </div>
    <x-front.team></x-front.team>
    <x-front.contact></x-front.contact>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 3,
            spaceBetween: 10,
            navigation: {
                nextEl: ".next-member",
                prevEl: ".prev-member"
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 4,
                    spaceBetween: 40,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 50,
                },
            },
        });
        // Initialize Swiper with custom pagination
        var mySwiper = new Swiper('.swiper-container', {
            slidesPerView: 1,
            loop: true,
            pagination: {
                el: '.pagination', // Use '.pagination' as the selector for pagination
                clickable: true,
            },
        });
        
        $(document).ready(function() {
            var btn1 = $("#to-services");
            var element1 = $(".services-anchor");
            
            // Add click event handlers using jQuery
            btn1.click(function() {
                scrollToElement(element1);
            });
            
            function scrollToElement(element) {
                $("html, body").animate({
                    scrollTop: element.offset().top - 200
                }, 800); 
            }
        });
        @if(session('success'))
        $(document).ready(function() {
          Swal.fire({
          position: 'top-end',
          icon: 'success',
          title: {!! json_encode(session('success')) !!},
          showConfirmButton: false,
          timer: 1500
        })
        });
        @endif
    </script>
@endpush
