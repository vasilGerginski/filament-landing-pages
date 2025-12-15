<div id="pricing" class="relative overflow-hidden py-24 md:py-16">
  <div class="absolute top-16 -left-48 h-96 w-96 rounded-full bg-[#1CE088]/10 blur-3xl"></div>
  <div class="absolute -right-48 bottom-16 h-96 w-96 rounded-full bg-[#1D1761]/10 blur-3xl"></div>

  <div class="relative z-10 mx-auto max-w-6xl px-6 md:px-4 lg:px-8">
    @if($title || $subtitle)
    <div class="text-center mb-16 md:mb-12 text-container">
      @if($title)
      <h2 class="mb-6 font-bold text-[#0F0D1B]">{!! $title !!}</h2>
      @endif
      @if($subtitle)
      <p class="mx-auto max-w-3xl text-lg md:text-base md:text-xl text-gray-600">{{ $subtitle }}</p>
      @endif
      
      @if($showAnnualPricing)
        <div class="mt-8 mb-10 md:mb-6 flex justify-center">
          <div class="relative bg-{{ str_replace('#', '', $accentColor) }} rounded-full p-1 flex" style="background-color: {{ $accentColor }};">
            <button type="button" class="relative py-2 px-6 rounded-full text-sm font-medium whitespace-nowrap focus:outline-none bg-white shadow-sm text-gray-800">
              {{ __('Monthly') }}
            </button>
            <button type="button" class="ml-0.5 py-2 px-6 rounded-full text-sm font-medium whitespace-nowrap focus:outline-none text-gray-600">
              {{ __('Annually') }}
            </button>
          </div>
        </div>
        
        @if($annualSavingsText)
          <p class="text-sm text-gray-500">
            {{ str_replace('{discount}', $annualDiscountPercent, $annualSavingsText) }}
          </p>
        @endif
      @endif
    </div>
    @endif

    @if(!empty($plans))
    <div class="{{ $pricingStyle === 'vertical' ? 'space-y-8' : 'grid gap-8 md:grid-cols-3' }}">
      @foreach($plans as $index => $plan)
        <div class="{{ isset($plan['isPopular']) && $plan['isPopular'] ? 'relative z-10 transform scale-105 md:-mt-4 md:-mb-4 transition-all' : 'transform transition-all' }}">
          <div class="h-full transform overflow-hidden rounded-3xl {{ $planCardStyle === 'elevated' ? ((isset($plan['isPopular']) && $plan['isPopular']) ? 'border-' . str_replace('#', '', $primaryColor) . ' border-2 shadow-2xl' : 'border border-gray-100 shadow-xl') : 'border border-gray-200' }} transition-all duration-500 {{ (isset($plan['isPopular']) && $plan['isPopular']) ? 'hover:scale-[1.03]' : 'hover:scale-[1.05]' }}" style="{{ (isset($plan['isPopular']) && $plan['isPopular']) ? 'border-color: ' . $primaryColor . ';' : '' }}">
            @if(isset($plan['isPopular']) && $plan['isPopular'] && isset($plan['popularLabel']))
              <div class="bg-{{ str_replace('#', '', $primaryColor) }} text-white text-xs font-bold uppercase tracking-wider py-1.5 text-center" style="background-color: {{ $primaryColor }};">
                {{ $plan['popularLabel'] }}
              </div>
            @endif
            
            <div class="p-6 md:p-8 bg-white">
              @if(isset($plan['name']))
              <h3 class="text-xl font-bold text-[#0F0D1B]">{{ $plan['name'] }}</h3>
              @endif
              @if(isset($plan['description']))
              <p class="mt-2 text-gray-600">{{ $plan['description'] }}</p>
              @endif
              
              <div class="mt-6">
                <div class="flex items-end">
                  @if(isset($plan['price']))
                  <span class="text-4xl md:text-3xl font-bold text-{{ str_replace('#', '', $primaryColor) }}" style="color: {{ $primaryColor }};">€{{ $plan['price'] }}</span>
                  <span class="ml-1 text-lg md:text-base text-gray-500">{{ __('/month') }}</span>
                  @endif
                </div>
                
                @if($showAnnualPricing && isset($plan['annualPrice']))
                  <div class="mt-1 text-sm text-gray-500">
                    €{{ $plan['annualPrice'] }}{{ __('/month when billed annually') }}
                  </div>
                @endif
              </div>
              
              @if(isset($plan['features']) && is_array($plan['features']))
              <div class="mt-8 space-y-3 md:space-y-5">
                @foreach($plan['features'] as $feature)
                  @if(isset($feature['feature']))
                  <div class="group flex items-center">
                    @if(isset($feature['isIncluded']) && $feature['isIncluded'])
                      <div class="mr-3 md:mr-4 flex h-6 w-6 md:h-7 md:w-7 items-center justify-center rounded-full {{ (isset($feature['isHighlighted']) && $feature['isHighlighted']) ? 'bg-[' . $primaryColor . ']/20' : 'bg-gray-100' }} transition-colors group-hover:{{ (isset($feature['isHighlighted']) && $feature['isHighlighted']) ? 'bg-[' . $primaryColor . ']/40' : 'bg-gray-200' }}" style="{{ (isset($feature['isHighlighted']) && $feature['isHighlighted']) ? 'background-color: ' . $primaryColor . '20;' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 md:h-5 md:w-5 {{ (isset($feature['isHighlighted']) && $feature['isHighlighted']) ? 'text-[' . $primaryColor . ']' : 'text-gray-700' }}" style="{{ (isset($feature['isHighlighted']) && $feature['isHighlighted']) ? 'color: ' . $primaryColor . ';' : '' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                      </div>
                    @else
                      <div class="mr-3 md:mr-4 flex h-6 w-6 md:h-7 md:w-7 items-center justify-center rounded-full bg-gray-100 transition-colors group-hover:bg-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 md:h-5 md:w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                      </div>
                    @endif
                    <span class="text-base md:text-sm {{ (isset($feature['isHighlighted']) && $feature['isHighlighted']) ? 'font-medium ' . ((isset($feature['isIncluded']) && $feature['isIncluded']) ? 'text-' . str_replace('#', '', $primaryColor) : 'text-gray-400') : ((isset($feature['isIncluded']) && $feature['isIncluded']) ? 'text-gray-700' : 'text-gray-400') }}" style="{{ (isset($feature['isHighlighted']) && $feature['isHighlighted'] && isset($feature['isIncluded']) && $feature['isIncluded']) ? 'color: ' . $primaryColor . ';' : '' }}">
                      {{ $feature['feature'] }}
                    </span>
                  </div>
                  @endif
                @endforeach
              </div>
              @endif
              
              @if(isset($plan['buttonText']) || isset($plan['buttonLink']))
              <div class="mt-8">
                <a href="{{ $plan['buttonLink'] ?? '#' }}" 
                   aria-label="{{ $plan['buttonText'] ?? __('Choose plan') }} - {{ $plan['name'] ?? '' }}"
                   class="hover:bg-opacity-90 group relative inline-block transform overflow-hidden rounded-full {{ (isset($plan['isPopular']) && $plan['isPopular']) ? 'bg-[' . $primaryColor . '] text-black' : 'bg-gray-100 text-gray-800 hover:bg-gray-200' }} px-8 py-3 md:px-6 md:py-3 text-base md:text-sm font-bold shadow-xl transition-all hover:-translate-y-1 hover:shadow-2xl w-full text-center" style="{{ (isset($plan['isPopular']) && $plan['isPopular']) ? 'background-color: ' . $primaryColor . ';' : '' }}">
                  <span class="relative z-10">{{ $plan['buttonText'] ?? __('Choose plan') }}</span>
                  <div class="absolute inset-0 bg-white opacity-0 transition-opacity duration-300 group-hover:opacity-20"></div>
                </a>
              </div>
              @endif
            </div>
          </div>
        </div>
      @endforeach
    </div>
    @endif
    
    <div class="mt-12 text-center space-y-3">
      @if($showRefundPolicy && $refundPolicyText)
        <div class="flex items-center justify-center text-sm text-gray-600">
          <svg class="h-5 w-5 mr-2 text-{{ str_replace('#', '', $primaryColor) }}" style="color: {{ $primaryColor }};" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
          </svg>
          {{ $refundPolicyText }}
        </div>
      @endif
      
      @if($showFAQLink && $faqLinkText && $faqLinkUrl)
        <div>
          <a href="{{ $faqLinkUrl }}" 
             aria-label="{{ $faqLinkText }}"
             class="inline-flex items-center text-{{ str_replace('#', '', $primaryColor) }} hover:underline font-medium" style="color: {{ $primaryColor }};">
            {{ $faqLinkText }}
            <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
          </a>
        </div>
      @endif
    </div>
  </div>
</div>