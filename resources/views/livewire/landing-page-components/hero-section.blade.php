<div class="relative hyphens-none">

    <div @if (isset($backgroundImage)) style="background: url('/storage/{{ $backgroundImage }}');" @endif
        class="absolute inset-0 bg-cover bg-center no-repeat"></div>
    <div @if (!isset($backgroundImage)) style="background: linear-gradient(#1D1761, #102648);" @endif
        class="relative z-10 py-20 md:py-32 text-white">
        <div class="mx-auto max-w-7xl px-4 text-center md:px-6 lg:px-16 text-container">
            @if (isset($badge))
                <div
                    class="mb-6 inline-block rounded-full bg-white/10 px-3 py-1 text-xs font-semibold text-white backdrop-blur-sm">
                    {{ $badge }}</div>
            @endif

            <h1 class="mx-auto mb-6 max-w-4xl leading-tight font-bold">{!! $title !!}</h1>
            <div class="mx-auto  max-w-2xl text-base md:text-xl text-gray-200 mb-4 md:mb-8">{!! $subtitle !!}</div>
            @if (count($buttons) > 0)
                <div class="flex flex-col items-center justify-center space-y-4 md:flex-row md:space-y-0 md:space-x-6 ">
                    @foreach ($buttons as $button)
                        @if ($button['style'] === 'primary')
                            <a href="{{ $button['href'] }}"
                                data-umami-event="Hero Button Click" data-umami-event-text="{{ $button['text'] }}"
                                data-umami-event-type="Primary"
                                class="hover:bg-opacity-90 inline-block transform rounded-full bg-[#1CE088] px-6 py-3 md:px-8 md:py-4 font-bold text-black shadow-lg transition-all text-base md:text-sm mobile-hover-fix relative"
                                style="--hover-translate-y: -0.25rem; --hover-shadow-size: lg;"
                                aria-label="{{ $button['text'] }}">
                                <div class="absolute inset-0 hover-transform hover-shadow rounded-full"></div>
                                <span class="relative z-10">{{ $button['text'] }}</span>
                            </a>
                        @elseif($button['style'] === 'secondary')
                            <a href="{{ $button['href'] }}"
                                data-umami-event="Hero Button Click" data-umami-event-text="{{ $button['text'] }}"
                                data-umami-event-type="Secondary"
                                class="inline-block transform rounded-full border border-white/30 px-6 py-3 md:px-8 md:py-4 font-medium text-white backdrop-blur-sm transition-all text-base md:text-sm mobile-hover-fix relative mt-4"
                                style="--hover-translate-y: -0.25rem; --hover-border-color: rgba(255, 255, 255, 0.5);"
                                aria-label="{{ $button['text'] }}">
                                <div class="absolute inset-0 hover-transform hover-border rounded-full"></div>
                                <span class="relative z-10">{{ $button['text'] }}</span>
                            </a>
                        @endif
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    @if (count($statistics) > 0)
        <div class="relative z-20 mx-auto -mt-16 max-w-6xl rounded-2xl border border-gray-100 bg-white shadow-2xl w-[90%]">
            <div class="grid grid-cols-1 gap-4 md:gap-8 p-4 md:p-8 md:grid-cols-{{ count($statistics) }}">
                @foreach ($statistics as $stat)
                    <div class="rounded-xl p-4 md:p-6 text-center transition-colors mobile-hover-fix relative"
                        style="--hover-bg-color: #f9fafb;">
                        <div class="absolute inset-0 hover-bg rounded-xl"></div>
                        <div class="relative z-10">
                            <div class="mb-3 text-4xl md:text-3xl md:text-5xl font-bold text-[#1D1761] text-container">
                                {{ $stat['value'] }}</div>
                            <p class="text-gray-600 text-base md:text-sm">{{ $stat['description'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

</div>
