<div class="mx-auto max-w-7xl px-4 py-16 md:py-12 md:px-6 lg:px-16">
  @if($title)
  <div class="mb-10 md:mb-8 text-center text-container">
    {!! $title !!}
  </div>
  @endif

  @if(!empty($partners))
    <div class="flex items-center justify-center space-x-4 overflow-x-auto">
      @foreach($partners as $partner)
        <div class="flex h-20 md:h-16 w-40 md:w-32 transform cursor-pointer items-center justify-center rounded-lg border border-gray-200 bg-gray-100 shadow-md transition-all duration-300 hover:-translate-y-1 hover:bg-gray-50 hover:shadow-lg">
          @if(!empty($partner['logo']))
            <img src="/storage/{{ $partner['logo']t }}" alt="{{ $partner['name'] }}" class="h-auto w-full object-contain">
          @else
            <div class="h-12 md:h-10 w-32 md:w-28 rounded bg-gray-300"></div>
          @endif
        </div>
      @endforeach
    </div>
  @endif
</div>
