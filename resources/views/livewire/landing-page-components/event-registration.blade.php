<div id="register" class="relative overflow-hidden py-24 md:py-16">
  <div class="absolute top-16 -left-48 h-96 w-96 rounded-full bg-[#1CE088]/10 blur-3xl"></div>
  <div class="absolute -right-48 bottom-16 h-96 w-96 rounded-full bg-[#1D1761]/10 blur-3xl"></div>

  <div class="relative z-10 mx-auto max-w-6xl px-6 md:px-4 lg:px-8">
    @if($title || $subtitle)
    <div class="text-center mb-16 md:mb-12 text-container">
      @if($title)
      <h2 class="mb-6 font-bold text-[#0F0D1B]">{!! $title !!}</h2>
      @endif
      @if($subtitle)
      <div class="mx-auto max-w-3xl text-lg md:text-base md:text-xl text-gray-600">{!! $subtitle !!}</div>
      @endif
    </div>
    @endif

    <div class="transform overflow-hidden rounded-3xl border border-gray-100 bg-white shadow-2xl transition-all duration-500 hover:scale-[1.01]">
      <div class="grid {{ ($layout === 'split' || $layout === 'reversed') ? 'md:grid-cols-2' : 'grid-cols-1' }}">
        <div class="p-8 md:p-6 md:p-12 lg:p-16 text-container {{ $layout === 'reversed' ? 'md:order-2' : '' }}">
          <form class="space-y-6">
            @if($collectName)
            <div>
              <label for="name" class="block text-sm font-medium text-gray-700">Име и фамилия</label>
              <div class="mt-1">
                <input type="text" name="name" id="name" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('name') border-red-500 @enderror" placeholder="Въведете вашето име и фамилия">
              </div>
            </div>
            @endif

            @if($collectEmail)
            <div>
              <label for="email" class="text-sm font-medium text-gray-700">Имейл адрес</label>
              <div class="mt-1">
                <input type="email" name="email" id="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('name') border-red-500 @enderror" placeholder="Въведете вашия имейл адрес">
              </div>
            </div>
            @endif

            @if($collectPhone)
            <div>
              <label for="phone" class="text-sm font-medium text-gray-700">Телефон</label>
              <div class="mt-1">
                <input type="tel" name="phone" id="phone" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('name') border-red-500 @enderror" placeholder="Въведете вашия телефон">
              </div>
            </div>
            @endif

            @if($collectCompany)
            <div>
              <label for="company" class="block text-sm font-medium text-gray-700">Компания</label>
              <div class="mt-1">
                <input type="text" name="company" id="company" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('name') border-red-500 @enderror" placeholder="Въведете името на вашата компания">
              </div>
            </div>
            @endif

            @if($collectJobTitle)
            <div>
              <label for="jobTitle" class="block text-sm font-medium text-gray-700">Длъжност</label>
              <div class="mt-1">
                <input type="text" name="jobTitle" id="jobTitle" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('name') border-red-500 @enderror" placeholder="Въведете вашата длъжност">
              </div>
            </div>
            @endif

            @if($buttonText)
            <div class="mt-8">
              <button type="submit"
                 aria-label="{{ $buttonText }}"
                 class="hover:bg-opacity-90 group relative inline-block transform overflow-hidden rounded-full bg-[{{ $primaryColor ?: '#1CE088' }}] px-6 py-3 md:px-10 md:py-4 text-base md:text-sm font-bold text-black shadow-xl transition-all hover:-translate-y-1 hover:shadow-2xl w-full text-center" style="background-color: {{ $primaryColor ?: '#1CE088' }};">
                <span class="relative z-10">{{ $buttonText }}</span>
                <div class="absolute inset-0 bg-white opacity-0 transition-opacity duration-300 group-hover:opacity-20"></div>
              </button>
            </div>
            @endif

            @if($showAvailableSpots && $totalSpots)
            <div class="text-xs text-center text-gray-500 mt-4">
              Останали места: <span class="font-medium">{{ $totalSpots }}</span>
            </div>
            @endif

            @if($showCountdown && $registrationDeadline)
            <div class="text-xs text-center text-gray-500 mt-2">
              Крайна дата за регистрация: <span class="font-medium">{{ date('d.m.Y', strtotime($registrationDeadline)) }}</span>
            </div>
            @endif
          </form>
        </div>

        <div class="relative flex flex-col justify-center overflow-hidden bg-gradient-to-br from-[#1D1761] to-[#102648] p-8 md:p-6 md:p-12 lg:p-16 text-white {{ $layout === 'reversed' ? 'md:order-1' : '' }}">
          <div class="absolute top-0 right-0 -mt-32 -mr-32 h-64 w-64 rounded-full bg-[#1CE088]/10 blur-3xl"></div>
          <div class="absolute bottom-0 left-0 -mb-32 -ml-32 h-64 w-64 rounded-full bg-[#1CE088]/10 blur-3xl"></div>

          @if($showEventDetails && $eventName)
          <div class="relative z-10 mb-8">
            <h3 class="text-2xl font-bold mb-6">{{ $eventName }}</h3>
            <div class="space-y-4">
              @if($eventDate)
              <div class="group flex items-center">
                <div class="mr-3 md:mr-4 flex h-6 w-6 md:h-8 md:w-8 items-center justify-center rounded-full bg-[#1CE088]/20 transition-colors group-hover:bg-[#1CE088]/40">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 md:h-5 md:w-5 text-[#1CE088]" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                  </svg>
                </div>
                <span class="text-sm md:text-lg md:text-base">{{ date('d.m.Y', strtotime($eventDate)) }}</span>
              </div>
              @endif

              @if($eventStartTime || $eventEndTime)
              <div class="group flex items-center">
                <div class="mr-3 md:mr-4 flex h-6 w-6 md:h-8 md:w-8 items-center justify-center rounded-full bg-[#1CE088]/20 transition-colors group-hover:bg-[#1CE088]/40">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 md:h-5 md:w-5 text-[#1CE088]" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                </div>
                <span class="text-sm md:text-lg md:text-base">{{ $eventStartTime ?: '' }}{{ $eventStartTime && $eventEndTime ? ' - ' : '' }}{{ $eventEndTime ?: '' }}</span>
              </div>
              @endif

              @if($eventLocation)
              <div class="group flex items-center">
                <div class="mr-3 md:mr-4 flex h-6 w-6 md:h-8 md:w-8 items-center justify-center rounded-full bg-[#1CE088]/20 transition-colors group-hover:bg-[#1CE088]/40">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 md:h-5 md:w-5 text-[#1CE088]" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                  </svg>
                </div>
                <span class="text-sm md:text-lg md:text-base">{{ $eventLocation }}</span>
              </div>
              @endif

              @if($eventPrice)
              <div class="group flex items-start">
                <div class="mr-3 md:mr-4 flex h-6 w-6 md:h-8 md:w-8 items-center justify-center rounded-full bg-[#1CE088]/20 transition-colors group-hover:bg-[#1CE088]/40 mt-0.5">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 md:h-5 md:w-5 text-[#1CE088]" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                </div>
                <div>
                  <span class="block text-sm md:text-lg md:text-base">{{ $eventPrice }}</span>
                  @if($earlyBirdPrice && $earlyBirdDeadline)
                  <span class="text-sm text-[#1CE088]">
                    {{ $earlyBirdPrice }} (до {{ date('d.m.Y', strtotime($earlyBirdDeadline)) }})
                  </span>
                  @endif
                </div>
              </div>
              @endif
            </div>
          </div>
          @endif

          @if(is_array($eventFeatures) && count($eventFeatures) > 0)
          <div class="relative z-10 mb-8">
            <h4 class="font-bold text-xl mb-6">Какво включва регистрацията:</h4>
            <div class="space-y-3 md:space-y-5">
              @foreach($eventFeatures as $feature)
              <div class="group flex items-center">
                <div class="mr-3 md:mr-4 flex h-6 w-6 md:h-8 md:w-8 items-center justify-center rounded-full bg-[#1CE088]/20 transition-colors group-hover:bg-[#1CE088]/40">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 md:h-5 md:w-5 text-[#1CE088]" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                </div>
                <span class="text-sm md:text-lg md:text-base">
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

          @if($showScheduleOutline && is_array($scheduleItems) && count($scheduleItems) > 0)
          <div class="relative z-10">
            <h4 class="font-bold text-xl mb-6">Програма:</h4>
            <div class="space-y-4">
              @foreach($scheduleItems as $item)
              @if(isset($item['time']) && isset($item['activity']))
              <div class="grid grid-cols-5 gap-2 items-start">
                <div class="col-span-2 font-medium">{{ $item['time'] }}</div>
                <div class="col-span-3">{{ $item['activity'] }}</div>
              </div>
              @endif
              @endforeach
            </div>
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
