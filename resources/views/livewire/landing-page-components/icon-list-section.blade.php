<div class="relative py-24 md:py-16 bg-gray-50">
    <div class="mx-auto max-w-7xl px-6 md:px-4 lg:px-8">
        <div class="flex gap-12 lg:gap-16 items-center {{ $layout === 'image-left' ? 'lg:flex-row-reverse' : '' }}">

            @if($layout === 'image-left' && $image)
            <div class="relative {{ $layout === 'image-left' ? 'lg:order-2' : '' }}">
                <img src="{{ Storage::url($image) }}"
                     alt="{{ $imageAlt ?? '' }}"
                     class="rounded-lg shadow-xl w-full h-auto object-cover">
            </div>
            @endif

            <div class="{{ $layout === 'image-left' ? 'lg:order-1' : '' }} prose">
                @if($title)
                <h2 class="text-4xl md:text-3xl lg:text-5xl font-bold text-gray-900 mb-6">{!! $title !!}</h2>
                @endif

                @if($subtitle)
                <div class="text-lg text-gray-600 mb-8">{!! $subtitle !!}</div>
                @endif

                @if(isset($items) && is_array($items) && count($items) > 0)
                <div class="space-y-4">
                    @foreach($items as $item)
                        @if(isset($item['text']) && $item['text'])
                        <div class="flex items-start">
                            <div class="flex-shrink-0 mt-1">
                                @if($iconType === 'check')
                                    <svg class="h-5 w-5 text-{{ $iconColor }}-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                @elseif($iconType === 'x-mark')
                                    <svg class="h-5 w-5 text-{{ $iconColor }}-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                @elseif($iconType === 'arrow-right')
                                    <svg class="h-5 w-5 text-{{ $iconColor }}-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                    </svg>
                                @elseif($iconType === 'star')
                                    <svg class="h-5 w-5 text-{{ $iconColor }}-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                @elseif($iconType === 'exclamation')
                                    <svg class="h-5 w-5 text-{{ $iconColor }}-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                    </svg>
                                @else
                                    <div class="h-2 w-2 rounded-full bg-{{ $iconColor }}-500"></div>
                                @endif
                            </div>
                            <p class="ml-3 text-base text-gray-700">{{ $item['text'] }}</p>
                        </div>
                        @endif
                    @endforeach
                </div>
                @endif
            </div>

            @if($layout !== 'image-left' && $image)
            <div class="relative">
                <img src="{{ Storage::url($image) }}"
                     alt="{{ $imageAlt ?? '' }}"
                     class="rounded-lg shadow-xl w-full h-auto object-cover">
            </div>
            @endif
        </div>
    </div>
</div>
