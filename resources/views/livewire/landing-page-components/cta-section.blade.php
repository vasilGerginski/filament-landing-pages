<div id="cta" class="relative overflow-hidden py-24 md:py-16">
  <div class="absolute top-16 -left-48 h-96 w-96 rounded-full bg-[#1CE088]/10 blur-3xl"></div>
  <div class="absolute -right-48 bottom-16 h-96 w-96 rounded-full bg-[#1D1761]/10 blur-3xl"></div>

  <div class="relative z-10 mx-auto max-w-6xl px-6 md:px-4 lg:px-8">
    <div class="transform overflow-hidden rounded-3xl border border-white/10 bg-gradient-to-br from-[#1D1761] to-[#102648] shadow-2xl transition-all duration-500 hover:scale-[1.01]">
      <div class="grid items-center md:grid-cols-2">
        <div class="p-8 md:p-6 md:p-12 lg:p-16 text-white text-container">
          @if($title)
            <h2 class="mb-6 md:mb-4 leading-tight font-bold">{!! $title !!}</h2>
          @endif
          @if($subtitle)
            <div class="mb-8 md:mb-6 text-base md:text-sm md:text-lg text-white/90">{!! $subtitle !!}</div>
          @endif
          @if($features && is_array($features) && count($features) > 0)
          <div class="space-y-5 md:space-y-3">
            @foreach($features as $feature)
            <div class="group flex items-center">
              <div class="mr-4 md:mr-3 flex h-8 w-8 md:h-6 md:w-6 items-center justify-center rounded-full bg-[#1CE088]/20 transition-colors group-hover:bg-[#1CE088]/40">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-4 md:w-4 text-[#1CE088]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
              </div>
              <span class="text-base md:text-sm md:text-lg">
                @if (is_array($feature) && isset($feature['feature']))
                    {{ $feature['feature'] }}
                @elseif (is_string($feature))
                    {{ $feature }}
                @else
                    45-минутна безплатна консултация
                @endif
              </span>
            </div>
            @endforeach
          </div>
          @endif
          @if($buttonText && $buttonLink)
          <div class="mt-8 md:mt-12">
            <a href="{{ strpos($buttonLink, '#') === 0 ? $buttonLink : ('/' . app()->getLocale() . (strpos($buttonLink, '/') === 0 ? $buttonLink : '/' . $buttonLink)) }}"
              data-umami-event="CTA Button Click"
              data-umami-event-section="CTA Section"
              data-umami-event-text="{{ $buttonText }}"
              class="hover:bg-opacity-90 group relative inline-block transform overflow-hidden rounded-full bg-[#1CE088] px-6 py-3 md:px-10 md:py-4 text-base md:text-sm font-bold text-black shadow-xl transition-all hover:-translate-y-1 hover:shadow-2xl"
              aria-label="{{ $buttonText }}">
              <span class="relative z-10">{{ $buttonText }}</span>
              <div class="absolute inset-0 bg-white opacity-0 transition-opacity duration-300 group-hover:opacity-20"></div>
            </a>
          </div>
          @endif
        </div>
        @if($testimonial && is_array($testimonial) && isset($testimonial['quote']))
        <div class="h-full md:block">
          <div class="relative flex h-full items-center justify-center overflow-hidden bg-gradient-to-br from-[#1D1761] to-[#102648] p-8">
            <div class="absolute top-0 right-0 -mt-32 -mr-32 h-64 w-64 rounded-full bg-[#1CE088]/10 blur-3xl"></div>
            <div class="z-10 max-w-md transform rounded-2xl bg-white p-8 md:p-6 shadow-2xl transition-all duration-300 hover:scale-[1.02] text-container">
              <div class="mb-4 flex text-[#DDBA58]">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 md:h-6 md:w-6" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 md:h-6 md:w-6" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 md:h-6 md:w-6" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 md:h-6 md:w-6" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 md:h-6 md:w-6" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
              </div>
              <blockquote class="mb-6 md:mb-4 text-lg md:text-base text-[#0F0D1B] italic">"{{ $testimonial['quote'] }}"</blockquote>
              @if(isset($testimonial['initials']) || isset($testimonial['name']) || isset($testimonial['position']))
              <div class="flex items-center">
                @if(isset($testimonial['initials']))
                <div class="mr-4 md:mr-3 flex h-12 w-12 md:h-14 md:w-14 items-center justify-center rounded-full bg-[#1D1761] text-xl md:text-lg font-bold text-white">{{ $testimonial['initials'] }}</div>
                @endif
                <div>
                  @if(isset($testimonial['name']))
                  <p class="text-lg md:text-base font-semibold text-[#0F0D1B]">{{ $testimonial['name'] }}</p>
                  @endif
                  @if(isset($testimonial['position']))
                  <p class="text-base md:text-sm text-gray-600">{{ $testimonial['position'] }}</p>
                  @endif
                </div>
              </div>
              @endif
            </div>
          </div>
        </div>
        @endif
      </div>
    </div>
  </div>
</div>
