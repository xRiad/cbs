<div class="team-container">
    <div class="part-head">
        <h4 class="h4-bold">{{ $teamContent->title }}</h4>
        <div class="txt1">{{ $teamContent->content }}</div>
    </div>
  @if($teamMembers)
  <div class="team-slider">
      <div class="prev-member">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
              <g clip-path="url(#clip0_236_25)">
                  <path d="M23.3467 26.84L20.9867 29.2L7.78668 16L20.9867 2.80005L23.3467 5.16005L12.5067 16L23.3467 26.84Z" fill="#2F353D"/>
              </g>
              <defs>
                  <clipPath id="clip0_236_25">
                      <rect width="32" height="32" fill="white" transform="matrix(-1 0 0 1 32 0)"/>
                  </clipPath>
              </defs>
          </svg>
      </div>
      <div class="swiper mySwiper">
          <div class="swiper-wrapper">
            @foreach($teamMembers as $teamMember)
              <div class="swiper-slide">
                  <div class="team-card">
                      <div class="member-avatar">
                          <img src="{{ asset('assets/'.$teamMember->image)  }}" alt="">
                      </div>
                      <div class="member-name">{{ $teamMember->name }}</div>
                      <div class="member-position txt2">{{ $teamMember->position }}</div>
                  </div>
              </div>
            @endforeach
          </div>
      </div>
      <div class="next-member">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
              <g clip-path="url(#clip0_236_22)">
                  <path d="M8.65332 26.84L11.0133 29.2L24.2133 16L11.0133 2.80005L8.65332 5.16005L19.4933 16L8.65332 26.84Z" fill="#2F353D"/>
              </g>
              <defs>
                  <clipPath id="clip0_236_22">
                      <rect width="32" height="32" fill="white"/>
                  </clipPath>
              </defs>
          </svg>
      </div>
  </div>
  <div class="team-mob">
    @foreach($teamMembers as $teamMember) 
    <div class="member-card">
      <div class="member-avatar-mob">
        <img src="{{ asset('assets/'.$teamMember->image)  }}" alt="">
      </div>
      <div class="member-name-mob">
        <h6>{{ $teamMember->name }}</h6> 
      </div>
      <div class="member-position-mob txt2">{{ $teamMember->position }}</div>
    </div>
    @endforeach
  </div>
  @endif
</div>