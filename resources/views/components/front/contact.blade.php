@section('links')
@endsection

<div class="contact-us-container">
    <h4 class="contact-title section-title">{{ __('contact-us.title') }}</h4>
    <div class="info-letter">
      <div class="info">
          <div class="info-text txt1">
            <div>
              {{ __('contact-us.description') }} 
            </div>
          </div>
          <div class="adress-contacts">
              <div class="adress">
                  <div class="subtitle1">{{ __('contact-us.adress') }}</div>
                  <div class="txt2">{{ $contacts->adress }}</div>
              </div>
              <div class="contacts">
                  <div class="subtitle1">{{ __('contact-us.contact') }}</div>
                  <div class="txt2">{{ $contacts->mail }}</div>
                  <div class="txt2">{{ $contacts->phone }}</div>
              </div>
          </div>
          <div class="socials-wrapper">
              <div>{{ __('social.title') }}:</div>
              <ul class="socials">
                    <li class="social-icon-wrapper">
                      <a href="https://api.whatsapp.com/send?phone={{ $contacts->phone }}&amp;text=">
                        <i class="fab fa-whatsapp fa-xs"></i>
                      </a>
                    </li>
                    <li class="social-icon-wrapper">
                      <a href="https://www.instagram.com/{{ $contacts->instagram }}/?hl=tr">
                        <i class="fab fa-instagram fa-xs"></i>
                      </a>
                    </li>
                    <li class="social-icon-wrapper">
                      <a href="https://www.facebook.com/{{ $contacts->facebook }}">
                        <i class="fab fa-facebook-f fa-xs"></i>
                      </a>
                    </li>
                    <li class="social-icon-wrapper">
                      <a href="https://www.linkedin.com/company/{{ $contacts->linkedin }}/mycompany/">
                        <i class="fab fa-linkedin-in fa-xs"></i>
                      </a>
                    </li>
              </ul>
          </div>
      </div>
      <form class="letter" action="{{ route('letter.save') }}" method="POST">
        @csrf
          <div class="letter-element">
              <div class="letter-input-name">{{ __('letter.name') }}*</div>
              <input type="text" name="name">
              <div class="text-danger">
                @error('name')
                  {{ $message }}
                @enderror
              </div>
          </div>
          <div class="letter-element">
              <div class="letter-input-name">{{ __('letter.phone') }}</div>
              <input type="text" name="phone">
              <div class="text-danger">
                @error('phone')
                  {{ $message }}
                @enderror
              </div>
          </div>
          <div class="letter-element">
              <div class="letter-input-name">{{ __('letter.mail') }}</div>
              <input type="text" name="mail">
              <div class="text-danger">
                @error('mail')
                  {{ $message }}
                @enderror
              </div>
          </div>
          <div class="letter-element">
              <div class="letter-input-name">{{ __('letter.message') }}</div>
              <textarea name="message" id="" cols="30" rows="10"></textarea>
              <div class="text-danger">
                @error('message')
                  {{ $message }}
                @enderror
              </div>
          </div>
          <button onclick="" type="submit" id="send-letter" class="btn2">{{ __('letter.send') }}</button>
      </form>
  </div>
</div>
