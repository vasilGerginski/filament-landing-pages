<div id="about" class="relative overflow-hidden py-24 md:py-16">
  <div class="absolute top-0 right-0 left-0 h-1/2 bg-gradient-to-b from-[#EDE4CD]/20 to-white"></div>
  <div class="absolute right-0 bottom-0 left-0 h-1/2 bg-gradient-to-t from-[#EDE4CD]/20 to-white"></div>
  <div class="relative z-10 mx-auto max-w-7xl px-6 md:px-4 lg:px-16">
    <div class="mb-16 md:mb-12 text-center text-container">
      @if(isset($badge))
        <span class="mb-3 inline-block rounded-full bg-[#1D17611A] px-4 py-1 text-xs font-semibold text-[#1D1761]">{{ $badge }}</span>
      @endif
      @if(isset($title))
      <h2 class="mb-6 font-bold text-[#0F0D1B]">{!! $title !!}</h2>
      @endif
      @if(isset($subtitle))
      <p class="mx-auto max-w-3xl text-lg md:text-base md:text-xl text-gray-600">{!! $subtitle !!}</p>
      @endif
    </div>

    <div class="overflow-hidden rounded-3xl border border-gray-100 bg-white shadow-2xl">
      <div class="grid md:grid-cols-2">
        <div class="p-6 md:p-8 md:p-12 lg:p-16 text-container">
          @if(isset($processTitle))
          <h3 class="mb-8 md:mb-6 flex items-center text-2xl md:text-xl font-bold text-[#0F0D1B]">
            {{ $processTitle }}
          </h3>
          @endif
          @if(isset($process) && is_array($process) && count($process) > 0)
          <div class="space-y-8 md:space-y-6">
            @foreach($process as $step)
            <div class="group flex mobile-hover-fix" style="--hover-bg-color: #1CE088; --hover-text-color: #1D1761;">
              <div class="flex-shrink-0">
                <div class="flex h-8 w-8 md:h-10 md:w-10 items-center justify-center rounded-full bg-[#1D1761] text-lg md:text-base font-semibold text-white transition-colors duration-300 hover-bg">{!! $step['step'] !!}</div>
              </div>
              <div class="ml-4 md:ml-6">
                <h4 class="text-xl md:text-lg font-semibold text-[#0F0D1B] transition-colors hover-text">{!! $step['title'] !!}</h4>
                <p class="mt-2 text-base md:text-sm text-gray-600">{!! $step['description'] !!}</p>
              </div>
            </div>
            @endforeach
          </div>
          @endif
        </div>

        <div class="relative flex flex-col justify-center overflow-hidden bg-gradient-to-br from-[#1D1761] to-[#102648] p-6 md:p-8 md:p-12 lg:p-16 text-white">
          <div class="absolute top-0 right-0 -mt-32 -mr-32 h-64 w-64 rounded-full bg-[#1CE088]/10 blur-3xl"></div>
          <div class="absolute bottom-0 left-0 -mb-32 -ml-32 h-64 w-64 rounded-full bg-[#1CE088]/10 blur-3xl"></div>

          @if(isset($benefitsTitle))
          <h3 class="relative z-10 mb-8 md:mb-6 flex items-center text-2xl md:text-xl font-bold">
            {{ $benefitsTitle }}
          </h3>
          @endif
          @if(isset($benefits) && is_array($benefits) && count($benefits) > 0)
          <ul class="relative z-10 space-y-4 md:space-y-5 text-container">
            @foreach($benefits as $benefit)
            <li class="group flex items-start mobile-hover-fix">
              <svg xmlns="http://www.w3.org/2000/svg" class="mt-0.5 mr-2 md:mr-3 h-5 w-5 md:h-6 md:w-6 text-[#1CE088] transition-transform hover-scale flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
              </svg>
              <span class="text-lg md:text-base">
                @if (is_array($benefit) && isset($benefit['text']))
                    {{ $benefit['text'] }}
                @elseif (is_array($benefit) && isset($benefit['benefit']))
                    {{ $benefit['benefit'] }}
                @elseif (is_string($benefit))
                    {{ $benefit }}
                @endif
              </span>
            </li>
            @endforeach
          </ul>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
