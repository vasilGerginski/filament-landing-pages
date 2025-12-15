<!-- Landing Page Template for FilamentPHP/Laravel/Livewire -->
<div class="min-h-screen bg-white font-sans relative overflow-x-hidden">
    @if($preview)
    <div class="fixed top-0 left-0 w-full bg-yellow-400 text-black text-center py-1 z-50 text-sm font-bold">
        {{ __('filament-landing-pages::landing-pages.preview_mode') }}
    </div>
    <div class="h-7"></div> <!-- Spacer to offset the fixed notice -->
    @endif

    @if (count($sections) > 0)
        @foreach ($sections as $section)
            @livewire($section['type'], $section['data'])
        @endforeach
    @else
        <div class="text-center py-20 h-[500px] text-container">
            <h1 class="text-4xl md:text-3xl md:text-5xl">{{ __('filament-landing-pages::landing-pages.coming_soon') }}</h1>
        </div>
    @endif
</div>
