<div id="newsletter" class="relative overflow-hidden py-24 md:py-16 {{ $addTopDivider ? 'border-t border-gray-200' : '' }} {{ $addBottomDivider ? 'border-b border-gray-200' : '' }}">
  <div class="absolute top-16 -left-48 h-96 w-96 rounded-full bg-[#1CE088]/10 blur-3xl"></div>
  <div class="absolute -right-48 bottom-16 h-96 w-96 rounded-full bg-[#1D1761]/10 blur-3xl"></div>

  <div class="relative z-10 mx-auto max-w-6xl px-6 md:px-4 lg:px-8">
    @if($title || $subtitle)
    <div class="text-center mb-16 md:mb-12 text-container">
      @if($title)
      <h2 class="mb-6 font-bold text-[#0F0D1B]">{!! $title !!}</h2>
      @endif
      @if($subtitle)
      <p class="mx-auto max-w-3xl text-lg md:text-base md:text-xl text-gray-600">{!! $subtitle !!}</p>
      @endif
    </div>
    @endif

    <div class="transform overflow-hidden rounded-3xl border border-gray-100 bg-white shadow-2xl transition-all duration-500 hover:scale-[1.01]">
      <div class="grid {{ $layout === 'split' ? 'md:grid-cols-2' : 'grid-cols-1' }}">
        <div class="p-6 md:p-8 md:p-12 lg:p-16 text-container">
          <form class="space-y-6">
            @if($includeNameField)
            <div>
              <label for="name" class="block text-sm font-medium text-gray-700">{{ $nameLabel }}</label>
              <div class="mt-1">
                <input type="text" name="name" id="name" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-{{ str_replace('#', '', $primaryColor) }} focus:ring-{{ str_replace('#', '', $primaryColor) }} md:text-sm" placeholder="{{ $namePlaceholder }}">
              </div>
            </div>
            @endif

            @if($emailLabel || $emailPlaceholder)
            <div>
              @if($emailLabel)
              <label for="email" class="block text-sm font-medium text-gray-700">{{ $emailLabel }}</label>
              @endif
              <div class="mt-1">
                <input type="email" name="email" id="email" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-{{ str_replace('#', '', $primaryColor) }} focus:ring-{{ str_replace('#', '', $primaryColor) }} md:text-sm" @if($emailPlaceholder) placeholder="{{ $emailPlaceholder }}" @endif>
              </div>
            </div>
            @endif

            @if($includePhoneField)
            <div>
              <label for="phone" class="block text-sm font-medium text-gray-700">{{ $phoneLabel }}</label>
              <div class="mt-1">
                <input type="tel" name="phone" id="phone" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-{{ str_replace('#', '', $primaryColor) }} focus:ring-{{ str_replace('#', '', $primaryColor) }} md:text-sm" placeholder="{{ $phonePlaceholder }}">
              </div>
            </div>
            @endif

            @if($includeMessageField)
            <div>
              <label for="message" class="block text-sm font-medium text-gray-700">{{ $messageLabel }}</label>
              <div class="mt-1">
                <textarea id="message" name="message" rows="4" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-{{ str_replace('#', '', $primaryColor) }} focus:ring-{{ str_replace('#', '', $primaryColor) }} md:text-sm" placeholder="{{ $messagePlaceholder }}"></textarea>
              </div>
            </div>
            @endif

            @if($includeConsent)
            <div class="flex items-start">
              <div class="flex h-5 items-center">
                <input id="consent" name="consent" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-{{ str_replace('#', '', $primaryColor) }} focus:ring-{{ str_replace('#', '', $primaryColor) }}">
              </div>
              <div class="ml-3 text-sm">
                <label for="consent" class="font-medium text-gray-700">{{ $consentText }}</label>
              </div>
            </div>
            @endif

            @if($buttonText)
            <div class="mt-8">
              <button type="submit"
                 aria-label="{{ $buttonText }}"
                 class="hover:bg-opacity-90 group relative inline-block transform overflow-hidden rounded-full bg-[{{ $primaryColor }}] px-6 py-3 md:px-10 md:py-4 text-base md:text-sm font-bold text-black shadow-xl transition-all hover:-translate-y-1 hover:shadow-2xl" style="background-color: {{ $primaryColor }};">
                <span class="relative z-10">{{ $buttonText }}</span>
                <div class="absolute inset-0 bg-white opacity-0 transition-opacity duration-300 group-hover:opacity-20"></div>
              </button>
            </div>
            @endif

            @if($privacyText)
            <div class="text-xs text-gray-500 text-center mt-4">
              {{ $privacyText }}
            </div>
            @endif

            @if($showFrequency)
            <div class="text-xs text-gray-500 text-center mt-2">
              {{ $frequencyText }}
            </div>
            @endif

            @if($showResponseTime)
            <div class="text-xs text-gray-500 text-center mt-2">
              {{ $responseTimeText }}
            </div>
            @endif
          </form>
        </div>

        @if($layout === 'split' || !empty($benefits))
        <div class="relative flex flex-col justify-center overflow-hidden bg-gradient-to-br from-[#1D1761] to-[#102648] p-6 md:p-8 md:p-12 lg:p-16 text-white">
          <div class="absolute top-0 right-0 -mt-32 -mr-32 h-64 w-64 rounded-full bg-[#1CE088]/10 blur-3xl"></div>
          <div class="absolute bottom-0 left-0 -mb-32 -ml-32 h-64 w-64 rounded-full bg-[#1CE088]/10 blur-3xl"></div>

          @if($showImage && $imageUrl)
          <div class="relative z-10 mb-8">
            <img src="{{ $imageUrl }}" alt="{{ __('Newsletter image') }}" class="rounded-lg shadow-lg mx-auto">
          </div>
          @endif

          @if(!empty($benefits))
          <h3 class="relative z-10 mb-8 md:mb-6 flex items-center text-2xl md:text-xl font-bold">
            <span class="mr-3 md:mr-4 flex h-6 w-6 md:h-8 md:w-8 items-center justify-center rounded-full bg-white text-[#1D1761]">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 md:h-4 md:w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
              </svg>
            </span>
            {{ __('Subscription Benefits') }}
          </h3>
          <div class="relative z-10 space-y-3 md:space-y-5">
            @foreach($benefits as $benefit)
            <div class="group flex items-center">
              <div class="mr-3 md:mr-4 flex h-6 w-6 md:h-8 md:w-8 items-center justify-center rounded-full bg-[#1CE088]/20 transition-colors group-hover:bg-[#1CE088]/40">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 md:h-5 md:w-5 text-[#1CE088]" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
              </div>
              <span class="text-sm md:text-lg md:text-base">
                @if (is_array($benefit) && isset($benefit['text']))
                    {{ $benefit['text'] }}
                @elseif (is_array($benefit) && isset($benefit['benefit']))
                    {{ $benefit['benefit'] }}
                @elseif (is_string($benefit))
                    {{ $benefit }}
                @endif
              </span>
            </div>
            @endforeach
          </div>
          @endif
        </div>
        @endif
      </div>
    </div>
  </div>
</div>
