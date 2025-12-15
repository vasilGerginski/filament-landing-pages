<div id="faq" class="relative overflow-hidden bg-gray-50 py-24 md:py-16">
  <div class="absolute top-0 left-0 h-64 w-full bg-gradient-to-b from-white to-transparent"></div>
  <div class="absolute bottom-0 left-0 h-64 w-full bg-gradient-to-t from-white to-transparent"></div>

  <div class="relative z-10 mx-auto max-w-4xl px-6 md:px-4 lg:px-8">
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

    @if(!empty($faqs))
    <div class="space-y-6 md:space-y-4">
      @foreach($faqs as $faq)
        @if(isset($faq['question']) && isset($faq['answer']))
        <div class="group rounded-xl border border-gray-100 bg-white p-6 md:p-4 shadow-lg transition-all duration-300 mobile-hover-fix text-container relative" style="--hover-border-color: rgba(29, 23, 97, 0.2); --hover-shadow-size: xl;">
          <div class="absolute inset-0 hover-border hover-shadow rounded-xl"></div>
          <h3 class="relative z-10 mb-4 md:mb-3 flex cursor-pointer items-center justify-between text-xl md:text-lg font-bold text-[#0F0D1B]">
            <span>{{ $faq['question'] }}</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 md:h-5 md:w-5 text-[#1D1761] transition-transform duration-300 hover-rotate" style="--hover-rotate-deg: 180deg;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </h3>
          <p class="relative z-10 text-sm md:text-lg md:text-base text-gray-600">{!! $faq['answer'] !!}</p>
        </div>
        @endif
      @endforeach
    </div>
    @endif

    @if($ctaText && $ctaLink)
    <div class="mt-8 md:mt-12 text-center">
      <a href="{{ $ctaLink }}" class="hover:bg-opacity-90 inline-block transform rounded-full bg-[#1D1761] px-6 py-2 md:px-8 md:py-3 text-base md:text-sm font-medium text-white transition-all mobile-hover-fix relative" style="--hover-translate-y: -0.25rem; --hover-shadow-size: lg;">
        <div class="absolute inset-0 hover-transform hover-shadow rounded-full"></div>
        <span class="relative z-10">{{ $ctaText }} <span class="ml-1">→</span></span>
      </a>
    </div>
    @endif
  </div>
</div>
