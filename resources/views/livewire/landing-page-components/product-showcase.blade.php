<div id="products" class="relative overflow-hidden py-24 md:py-16 {{ $showBackground ? 'bg-gray-50' : '' }}">
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
    </div>
    @endif

    @if(!empty($products))
    <div class="{{ $layout === 'featured' ? 'space-y-12' : 'grid gap-8 md:grid-cols-2 lg:grid-cols-3' }}">
      @foreach($products as $index => $product)
        <div class="{{ $layout === 'featured' && isset($product['featured']) && $product['featured'] ? 'max-w-4xl mx-auto' : '' }}">
          <div class="h-full transform overflow-hidden rounded-3xl border border-gray-100 shadow-2xl bg-white transition-all duration-500 hover:scale-[1.01]">
            <div class="p-6 md:p-8 md:px-8 md:pt-8 {{ $productCardStyle === 'detailed' ? 'md:pb-6' : '' }}">
              @if(isset($product['badge']) && $product['badge'])
                <div class="mb-4">
                  <span class="inline-block rounded-full bg-{{ str_replace('#', '', $primaryColor) }}/10 px-3 py-1 text-xs font-semibold text-{{ str_replace('#', '', $primaryColor) }}" style="background-color: {{ $primaryColor }}20; color: {{ $primaryColor }};">
                    {{ $product['badge'] }}
                  </span>
                </div>
              @endif

              @if(isset($product['name']))
              <h3 class="mb-2 text-2xl md:text-xl font-bold text-[#0F0D1B]">{{ $product['name'] }}</h3>
              @endif
              @if(isset($product['description']))
              <p class="mb-4 text-base text-gray-600">{{ $product['description'] }}</p>
              @endif

              @if(isset($product['price']) && $product['price'])
                <div class="mb-6">
                  @if(isset($product['showSalePrice']) && $product['showSalePrice'] && isset($product['salePrice']))
                    <div class="flex items-center">
                      <span class="text-3xl md:text-2xl font-bold text-{{ str_replace('#', '', $primaryColor) }}" style="color: {{ $primaryColor }};">
                        {{ $product['salePrice'] }}
                      </span>
                      <span class="ml-2 text-lg text-gray-500 line-through">{{ $product['price'] }}</span>
                    </div>
                  @else
                    <span class="text-3xl md:text-2xl font-bold text-{{ str_replace('#', '', $primaryColor) }}" style="color: {{ $primaryColor }};">
                      {{ $product['price'] }}
                    </span>
                  @endif
                </div>
              @endif

              @if($productCardStyle === 'detailed' && isset($product['features']) && !empty($product['features']))
                <div class="mb-6">
                  <h4 class="mb-3 text-sm font-semibold uppercase text-gray-700">{{ __('Features') }}</h4>
                  <div class="space-y-3 md:space-y-5">
                    @foreach($product['features'] as $feature)
                      <div class="group flex items-center">
                        <div class="mr-3 md:mr-4 flex h-6 w-6 md:h-8 md:w-8 items-center justify-center rounded-full bg-[{{ $primaryColor }}]/20 transition-colors group-hover:bg-[{{ $primaryColor }}]/40" style="background-color: {{ $primaryColor }}20;">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 md:h-5 md:w-5 text-[{{ $primaryColor }}]" style="color: {{ $primaryColor }};" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                          </svg>
                        </div>
                        <span class="text-base md:text-sm text-gray-700">
                          @if (is_array($feature) && isset($feature['text']))
                              {{ $feature['text'] }}
                          @elseif (is_array($feature) && isset($feature['feature']))
                              {{ $feature['feature'] }}
                          @elseif (is_string($feature))
                              {{ $feature }}
                          @endif
                        </span>
                      </div>
                    @endforeach
                  </div>
                </div>
              @endif

              @if(isset($product['buttonText']) && $product['buttonText'])
                <div class="{{ $productCardStyle === 'detailed' ? 'border-t border-gray-100 pt-6 mt-auto' : '' }}">
                  <a href="{{ $product['buttonLink'] ?? '#' }}" 
                     aria-label="{{ $product['buttonText'] }} - {{ $product['name'] ?? '' }}"
                     class="hover:bg-opacity-90 group relative inline-block transform overflow-hidden rounded-full {{ $productCardStyle === 'detailed' ? 'bg-[' . $primaryColor . '] text-black' : 'bg-gray-100 text-gray-800 hover:bg-gray-200' }} px-6 py-3 md:px-8 md:py-3 text-base md:text-sm font-bold shadow-xl transition-all hover:-translate-y-1 hover:shadow-2xl w-full text-center" style="{{ $productCardStyle === 'detailed' ? 'background-color: ' . $primaryColor . ';' : '' }}">
                    <span class="relative z-10">{{ $product['buttonText'] }}</span>
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

    @if($showFooterCTA && $ctaText && $ctaLink)
      <div class="mt-12 text-center">
        <a href="{{ $ctaLink }}" 
           aria-label="{{ $ctaText }}"
           class="inline-flex items-center text-{{ str_replace('#', '', $primaryColor) }} hover:underline font-medium" style="color: {{ $primaryColor }};">
          {{ $ctaText }}
          <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
          </svg>
        </a>
      </div>
    @endif
  </div>
</div>