@if ($paginator->hasPages())
        <ul class="pagination-container">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                  <svg aria-hidden="true" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g clip-path="url(#clip0_717_405)">
                      <path d="M17.5098 3.87003L15.7398 2.10003L5.83977 12L15.7398 21.9L17.5098 20.13L9.37977 12L17.5098 3.87003Z" fill="#323232"/>
                      </g>
                      <defs>
                      <clipPath id="clip0_717_405">
                      <rect width="24" height="24" fill="white" transform="translate(24 24) rotate(-180)"/>
                      </clipPath>
                      </defs>
                  </svg>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                      <svg aria-hidden="true" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <g clip-path="url(#clip0_717_405)">
                          <path d="M17.5098 3.87003L15.7398 2.10003L5.83977 12L15.7398 21.9L17.5098 20.13L9.37977 12L17.5098 3.87003Z" fill="#323232"/>
                          </g>
                          <defs>
                          <clipPath id="clip0_717_405">
                          <rect width="24" height="24" fill="white" transform="translate(24 24) rotate(-180)"/>
                          </clipPath>
                          </defs>
                      </svg>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                {{-- @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif --}}

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page active-page" aria-current="page"><span>{{ $page }}</span></li>
                        @else
                            <li class="page"><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <g clip-path="url(#clip0_717_402)">
                          <path d="M6.49023 20.13L8.26023 21.9L18.1602 12L8.26023 2.09998L6.49023 3.86998L14.6202 12L6.49023 20.13Z" fill="#323232"/>
                          </g>
                          <defs>
                          <clipPath id="clip0_717_402">
                          <rect width="24" height="24" fill="white"/>
                          </clipPath>
                          </defs>
                      </svg>
                    </a>
                </li>
            @else
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_717_402)">
                        <path d="M6.49023 20.13L8.26023 21.9L18.1602 12L8.26023 2.09998L6.49023 3.86998L14.6202 12L6.49023 20.13Z" fill="#323232"/>
                        </g>
                        <defs>
                        <clipPath id="clip0_717_402">
                        <rect width="24" height="24" fill="white"/>
                        </clipPath>
                        </defs>
                    </svg>
                </li>
            @endif
        </ul>
@endif




    {{-- <div class="pagination-container">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_717_405)">
            <path d="M17.5098 3.87003L15.7398 2.10003L5.83977 12L15.7398 21.9L17.5098 20.13L9.37977 12L17.5098 3.87003Z" fill="#323232"/>
            </g>
            <defs>
            <clipPath id="clip0_717_405">
            <rect width="24" height="24" fill="white" transform="translate(24 24) rotate(-180)"/>
            </clipPath>
            </defs>
        </svg>
        <ul class="pages">
            <li class="page active-page">1</li>
            <li class="page">2</li>
            <li class="page">3</li>
            <li class="page">4</li>
            <li class="page">5</li>
        </ul>
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_717_402)">
            <path d="M6.49023 20.13L8.26023 21.9L18.1602 12L8.26023 2.09998L6.49023 3.86998L14.6202 12L6.49023 20.13Z" fill="#323232"/>
            </g>
            <defs>
            <clipPath id="clip0_717_402">
            <rect width="24" height="24" fill="white"/>
            </clipPath>
            </defs>
        </svg>
            
    </div> --}}