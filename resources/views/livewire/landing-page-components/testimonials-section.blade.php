<div id="testimonials" class="mx-auto max-w-7xl px-4 py-24 md:py-16 md:px-6 lg:px-16">
  @if($badge || $title || $subtitle)
  <div class="mb-16 md:mb-12 text-center text-container">
    @if($badge)
    <span class="mb-3 inline-block rounded-full bg-[#1D17611A] px-4 py-1 text-xs font-semibold text-[#1D1761]">{{ $badge }}</span>
    @endif
    @if($title)
    <h2 class="mb-6 font-bold text-[#0F0D1B]">{!! $title !!}</h2>
    @endif
    @if($subtitle)
    <p class="mx-auto max-w-3xl text-lg md:text-base md:text-xl text-gray-600">{!! $subtitle !!}</p>
    @endif
  </div>
  @endif

  @if(!empty($testimonials))
  <div class="grid gap-8 md:gap-6 md:grid-cols-2 lg:grid-cols-3">
    @foreach($testimonials as $testimonial)
    <div class="group relative overflow-hidden rounded-2xl border border-gray-100 bg-white p-6 md:p-8 shadow-xl transition-all duration-300 hover:border-[#1D1761]/20 hover:shadow-2xl text-container">
      <div class="absolute -top-20 -right-20 h-40 w-40 rounded-full bg-[#1D1761]/5 transition-colors group-hover:bg-[#1D1761]/10"></div>
      <div class="absolute -bottom-20 -left-20 h-40 w-40 rounded-full bg-[#1D1761]/5 transition-colors group-hover:bg-[#1D1761]/10"></div>

      <div class="relative mb-6 md:mb-4 flex text-[#DDBA58]">
        @for($i = 0; $i < 5; $i++)
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6" viewBox="0 0 20 20" fill="currentColor">
          <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
        </svg>
        @endfor
      </div>
      @if(isset($testimonial['quote']))
      <blockquote class="relative mb-8 md:mb-6 text-sm md:text-lg md:text-base text-gray-600 italic">"{{ $testimonial['quote'] }}"</blockquote>
      @endif
      <div class="relative flex items-center">
        @if(isset($testimonial['initials']))
        <div class="mr-3 md:mr-4 flex h-12 w-12 md:h-14 md:w-14 items-center justify-center rounded-full bg-[#1D1761] text-xl md:text-lg font-bold text-white">{{ $testimonial['initials'] }}</div>
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
    </div>
    @endforeach
  </div>
  @endif
</div>
