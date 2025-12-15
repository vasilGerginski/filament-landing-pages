<div class="relative overflow-hidden py-24 md:py-16" style="background-color: {{ $backgroundColor }};">
  <div class="absolute top-16 -left-48 h-96 w-96 rounded-full bg-[#1CE088]/10 blur-3xl"></div>
  <div class="absolute -right-48 bottom-16 h-96 w-96 rounded-full bg-[#1D1761]/10 blur-3xl"></div>

  <div class="relative z-10 mx-auto max-w-6xl px-6 md:px-4 lg:px-8">
    @if($title || $subtitle)
    <div class="text-center mb-16 md:mb-12 text-container">
      @if($title)
      <h2 class="mb-6 font-bold" style="color: {{ $textColor }};">{!! $title !!}</h2>
      @endif
      @if($subtitle)
      <p class="mx-auto max-w-3xl text-lg md:text-base md:text-xl text-gray-600">{{ $subtitle }}</p>
      @endif
    </div>
    @endif

    <div class="transform overflow-hidden rounded-3xl border border-gray-100 bg-white shadow-2xl transition-all duration-500 hover:scale-[1.01]">
      <div class="p-6 md:p-8 md:p-12 lg:p-16 text-center">
        <div id="countdown-timer" data-target-date="{{ $targetDate }}" data-show-seconds="{{ $showSeconds ? 'true' : 'false' }}" data-completed-message="{{ $completedMessage }}" data-completed-subtitle="{{ $completedSubtitle }}">
          <div class="countdown-display {{ $layout === 'vertical' ? 'flex flex-col gap-8' : 'grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-8' }}">
            <div class="countdown-item">
              <div class="countdown-number text-4xl md:text-6xl font-bold mb-2" style="color: {{ $primaryColor }};" data-type="days">0</div>
              @if($showLabels)
              <div class="countdown-label text-base md:text-sm font-medium text-gray-600">{{ __('Дни') }}</div>
              @endif
            </div>
            <div class="countdown-item">
              <div class="countdown-number text-4xl md:text-6xl font-bold mb-2" style="color: {{ $primaryColor }};" data-type="hours">0</div>
              @if($showLabels)
              <div class="countdown-label text-base md:text-sm font-medium text-gray-600">{{ __('Часове') }}</div>
              @endif
            </div>
            <div class="countdown-item">
              <div class="countdown-number text-4xl md:text-6xl font-bold mb-2" style="color: {{ $primaryColor }};" data-type="minutes">0</div>
              @if($showLabels)
              <div class="countdown-label text-base md:text-sm font-medium text-gray-600">{{ __('Минути') }}</div>
              @endif
            </div>
            @if($showSeconds)
            <div class="countdown-item">
              <div class="countdown-number text-4xl md:text-6xl font-bold mb-2" style="color: {{ $primaryColor }};" data-type="seconds">0</div>
              @if($showLabels)
              <div class="countdown-label text-base md:text-sm font-medium text-gray-600">{{ __('Секунди') }}</div>
              @endif
            </div>
            @endif
          </div>
          
          <div class="countdown-completed hidden">
            @if($completedMessage)
            <h3 class="text-4xl md:text-3xl font-bold mb-4" style="color: {{ $primaryColor }};">{{ $completedMessage }}</h3>
            @endif
            @if($completedSubtitle)
            <p class="text-xl md:text-lg text-gray-600">{{ $completedSubtitle }}</p>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const countdownElement = document.getElementById('countdown-timer');
  if (!countdownElement) return;
  
  const targetDate = countdownElement.getAttribute('data-target-date');
  const showSeconds = countdownElement.getAttribute('data-show-seconds') === 'true';
  const completedMessage = countdownElement.getAttribute('data-completed-message');
  const completedSubtitle = countdownElement.getAttribute('data-completed-subtitle');
  
  if (!targetDate) return;
  
  const targetTime = new Date(targetDate).getTime();
  
  function updateCountdown() {
    const now = new Date().getTime();
    const distance = targetTime - now;
    
    if (distance < 0) {
      const displayElement = countdownElement.querySelector('.countdown-display');
      const completedElement = countdownElement.querySelector('.countdown-completed');
      
      if (displayElement) displayElement.style.display = 'none';
      if (completedElement) completedElement.classList.remove('hidden');
      
      return;
    }
    
    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    const daysElement = countdownElement.querySelector('[data-type="days"]');
    const hoursElement = countdownElement.querySelector('[data-type="hours"]');
    const minutesElement = countdownElement.querySelector('[data-type="minutes"]');
    const secondsElement = countdownElement.querySelector('[data-type="seconds"]');
    
    if (daysElement) daysElement.textContent = days;
    if (hoursElement) hoursElement.textContent = hours;
    if (minutesElement) minutesElement.textContent = minutes;
    if (secondsElement && showSeconds) secondsElement.textContent = seconds;
  }
  
  updateCountdown();
  setInterval(updateCountdown, 1000);
});
</script>