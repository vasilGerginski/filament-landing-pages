<div id="learn-more" class="mx-auto max-w-7xl px-4 py-24 md:py-16 md:px-6 lg:px-16 @if(!$badge && !$title && !$subtitle && empty($challenges)) hidden @endif">
  @if($badge || $title || $subtitle)
  <div class="mb-16 md:mb-12 text-center text-container">
    @if($badge)
    <span class="mb-3 inline-block rounded-full bg-[#1D17611A] px-4 py-1 text-xs font-semibold text-[#1D1761]">{{ $badge }}</span>
    @endif
    @if($title)
    <h2 class="mb-6 font-bold text-[#0F0D1B]">{{ $title }}</h2>
    @endif
    @if($subtitle)
    <p class="mx-auto max-w-3xl text-lg md:text-base md:text-xl text-gray-600">{{ $subtitle }}</p>
    @endif
  </div>
  @endif

  @if(!empty($challenges))
  <div class="grid gap-4 md:gap-8 md:grid-cols-2 lg:grid-cols-3">
    @foreach($challenges as $challenge)
    <div class="group rounded-xl border border-gray-100 bg-white p-6 md:p-8 shadow-lg transition-all duration-300 mobile-hover-fix card-hover" style="--hover-bg-color: #1D1761; --hover-text-color: #1D1761;">
      @if(!empty($challenge['icon']) || !empty($challenge['iconPath']))
      <div class="mb-6 flex h-12 w-12 md:h-16 md:w-16 items-center justify-center rounded-2xl bg-[#1D17611A] transition-colors duration-300 hover-bg">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 md:h-8 md:w-8 text-[#1D1761] transition-colors duration-300 icon-color" style="--icon-hover-color: white;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          {!! $challenge['iconPath'] ?? $challenge['icon'] ?? '' !!}
        </svg>
      </div>
      @endif
      @if(!empty($challenge['title']))
      <h3 class="mb-3 text-xl md:text-lg font-bold text-[#0F0D1B] transition-colors hover-text">{{ $challenge['title'] }}</h3>
      @endif
      @if(!empty($challenge['description']))
      <p class="text-base md:text-sm text-gray-600">{{ $challenge['description'] }}</p>
      @endif
    </div>
    @endforeach
  </div>
  @endif
</div>