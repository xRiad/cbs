@extends('front.layouts.app')

@section('links')
  <link rel="stylesheet" href="{{ 'assets/front/css/home.css' }}">
  <link rel="stylesheet" href="{{ asset('assets/front/css/components/portfolio.css') }}">
  <link rel="stylesheet" href="{{ 'assets/front/css/media/home.css' }}">
  <link rel="stylesheet" href="{{ 'assets/front/css/components/team.css' }}">
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
                      <img src="{{ asset('assets/' . $slide->image) }}" alt="">
                    </div>
                    <div class="header-slider-content">
                        <h3 class="header-slider-main-text">{{ $slide->title }}</h3>
                        <div class="header-slider-secondary-text txt1">{{ $slide->content }}</div>
                        <div class="header-slider-buttons">
                            <div class="btn2 slider-top-services">XİDMƏTLƏRİMİZ</div>
                            <div class="btn1 slider-top-portfolio">Portfolİo</div>
                        </div>
                    </div>
                    <div class="header-slider-buttons-mob">
                        <div class="btn2">Portfoliomuz</div>
                        <div class="btn1 slider-top-portfolio">Portfolİo</div>
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
        @foreach($titlesContents as $titleContent)
          @if($titleContent->section_id === 1)
          <div class="part-head">
            <h4 class="h4-bold">{{ $titleContent->title }}</h4>
            <div class="services-text-btn">
                <div class="txt1">{{ $titleContent->content }}</div>
                <div class="btn1">Bİzİmlə əlaqə</div>
            </div>
          </div>
          @endif
        @endforeach
        @if($cards)
        <div class="services-cards">
          @foreach($cards as $card)
            @if($card->card_type === 1)
            <div class="service-card">
                <div class="service-icon">
                    {!! $card->icon !!}
                </div>
                <h5 class="service-title">{{ $card->title }}</h5>
                <div class="service-desc txt2">{{ $card->content }}</div>
            </div>
            @endif
          @endforeach
        </div>
        @endif
   </div>
   <div class="portfolio-container">
       @foreach($titlesContents as $titleContent)
        @if($titleContent->section_id === 2)
          <div class="part-head">
              <h4 class="h4-bold">{{ $titleContent->title }}</h4>
              <div class="txt1">{{ $titleContent->content }}</div>
          </div>
        @endif
       @endforeach
       @component('components.front.portfolio', ['projects' => $projects, 'pagination' => false]) @endcomponent
       <div class="see-all-portfolio">
           <div class="btn1">HAMISINA BAX</div>
       </div>
   </div>
    <div class="choose-us-container">
       @foreach($titlesContents as $titleContent)
        @if($titleContent->section_id === 3)
          <div class="part-head">
              <h4 class="h4-bold">{{ $titleContent->title }}</h4>
              <div class="txt1">{{ $titleContent->content }}</div>
          </div>
        @endif
       @endforeach
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
       @foreach($titlesContents as $titleContent)
        @if($titleContent->section_id === 4)
          <h4>{{ $titleContent->title }}</h4>
        @endif
       @endforeach
       @php
        $cards = $cards->toArray();
        $secondHalfCards = array_slice($cards, count($cards) / 2 + 1);
       @endphp
        @if($cards)
        <div class="process-cards">
          @for($i = 0; $i < count($cards) / 2; $i++)
            @if($cards[$i]['card_type'] === 2)
              <div class="process-card">
                  <div class="process-card-icon">
                      <div class="process-icon">
                        {!! $cards[$i]['icon'] !!}
                      </div>
                  </div>
                  <div class="process-title subtitle1">{{ $cards[$i]['title'] }}</div>
                  <div class="process-desc txt1">{{ $cards[$i]['content'] }}</div>
              </div>
            @endif
          @endfor
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
          @for($i = 0; $i < count($secondHalfCards); $i++)
            @if($secondHalfCards[$i]['card_type'] === 2)
              <div class="process-card">
                  <div class="process-card-icon">
                      <div class="process-icon">
                        {!! $secondHalfCards[$i]['icon'] !!}
                      </div>
                  </div>
                  <div class="process-title subtitle1">{{ $secondHalfCards[$i]['title'] }}</div>
                  <div class="process-desc txt1">{{ $secondHalfCards[$i]['content'] }}</div>
              </div>
            @endif
          @endfor
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
        @foreach($titlesContents as $titleContent)
          @if($titleContent->section_id === 5)
            <h4 class="talk-phrase">{{ $titleContent->title }}</h4>
            <div class="talk-desc txt1">{{ $titleContent->content }}</div>
            <div>
                <a href="" class="talk-btn btn2">Let’s Talk</a>
            </div>
          @endif
        @endforeach
    </div>
    <x-front.team></x-front.team>
    <div class="contact-us-container">
        @foreach($titlesContents as $titleContent)
          @if($titleContent->section_id === 7)
        <h4 class="part-head">{{ $titleContent->title }}</h4>
        <div class="info-letter">
            <div class="info">
                <div class="info-text txt1">
                  <div>
                   {{ $titleContent->content }} 
                  </div>
                </div>
          @endif
        @endforeach
                <div class="adress-contacts">
                    <div class="adress">
                        <div class="subtitle1">ADDRESS:</div>
                        <div class="txt2">Əhməd Rəcəbli küç, 56.</div>
                    </div>
                    <div class="contacts">
                        <div class="subtitle1">ƏLAQƏ:</div>
                        <div class="txt2">info@crazyinnovations@gmail.com</div>
                        <div class="txt2">+994-70-777-77-77</div>
                    </div>
                </div>
                <div class="socials-wrapper">
                    <div>SOSİAL:</div>
                    <ul class="socials">
                        <li class="social-icon-wrapper">
                            <i class="fab fa-instagram fa-xs"></i>
                        </li>
                        <li class="social-icon-wrapper">
                            <i class="fa-brands fa-twitter"></i>
                        </li>
                        <li class="social-icon-wrapper">
                            <i class="fab fa-linkedin-in fa-xs"></i>
                        </li>
                        <li class="social-icon-wrapper">
                            <i class="fab fa-facebook-f fa-xs"></i>
                        </li>
                    </ul>
                </div>
            </div>
            <form class="letter" action="{{ route('letter.save') }}" method="POST">
              @csrf
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
                    <div class="letter-input-name">Telefon nömrəsi </div>
                    <input type="text" name="phone">
                    <div class="text-danger">
                      @error('phone')
                        {{ $message }}
                      @enderror
                    </div>
                </div>
                <div class="letter-element">
                    <div class="letter-input-name">E-mail</div>
                    <input type="text" name="mail">
                    <div class="text-danger">
                      @error('mail')
                        {{ $message }}
                      @enderror
                    </div>
                </div>
                <div class="letter-element">
                    <div class="letter-input-name">Mesajınız</div>
                    <textarea name="message" id="" cols="30" rows="10"></textarea>
                    <div class="text-danger">
                      @error('message')
                        {{ $message }}
                      @enderror
                    </div>
                </div>
                <button onclick="" type="submit" id="send-letter" class="btn2">göndər</button>
            </form>
        </div>
    </div>
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

        // $( "#send-letter" ).on( "click", function() {
        //   Swal.fire({
        //   position: 'top-end',
        //   icon: 'success',
        //   title: 'Your work has been saved',
        //   showConfirmButton: false,
        //   timer: 1500
        // })
        // });
    </script>
@endpush
