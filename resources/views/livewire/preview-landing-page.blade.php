<!-- Preview Landing Page Template -->
<div class="min-h-screen bg-white font-sans relative overflow-x-hidden">
    <div class="fixed top-0 left-0 w-full bg-yellow-400 text-black text-center py-1 z-50 text-sm font-bold">
        {{ __('filament-landing-pages::landing-pages.live_preview_mode') }}
    </div>
    <div class="h-7"></div> <!-- Spacer to offset the fixed notice -->

    @if (count($sections) > 0)
        @foreach ($sections as $section)
            @if(isset($section['type']))
                <div class="section-container">
                    @livewire($section['type'], $section['data'] ?? [], key('section-' . $loop->index))
                </div>
            @else
                <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 m-4">
                    <p class="font-bold">{{ __('filament-landing-pages::landing-pages.invalid_section') }}</p>
                    <p>{{ __('filament-landing-pages::landing-pages.missing_type') }}</p>
                </div>
            @endif
        @endforeach
    @else
        <div class="text-center py-20 h-[500px] text-container">
            <h1 class="text-4xl md:text-3xl md:text-5xl mb-4">{{ __('filament-landing-pages::landing-pages.coming_soon') }}</h1>
            <p class="text-lg md:text-base text-gray-600">{{ __('filament-landing-pages::landing-pages.no_sections') }}</p>
        </div>
    @endif

    @if(app()->environment('local'))
        <div class="fixed bottom-0 right-0 bg-white border border-gray-300 p-2 text-xs text-gray-700 max-w-sm max-h-48 overflow-auto opacity-50 hover:opacity-100">
            <strong>Debug Info:</strong>
            <div>Sections: {{ count($sections) }}</div>
            <details>
                <summary>Sections Data</summary>
                <pre>{{ json_encode($sections, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre>
            </details>
            <details>
                <summary>State Data</summary>
                <pre>{{ json_encode($state ?? [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre>
            </details>
        </div>
    @endif
</div>
