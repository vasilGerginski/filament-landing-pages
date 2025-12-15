@php
    $sectionStyle = 'background-color: ' . ($this->backgroundColor ?? 'transparent') . ';';
    if ($this->backgroundImage) {
        $sectionStyle .= ' background-image: url(' . Storage::url($this->backgroundImage) . '); background-size: cover; background-position: center;';
    }
    
    $formClasses = 'bg-white rounded-lg p-6 md:p-8';
    if ($this->showBorder ?? true) $formClasses .= ' border border-gray-200';
    if ($this->showShadow ?? false) $formClasses .= ' shadow-lg';
    else $formClasses .= ' shadow-md';
    
    $containerClasses = 'space-y-4 p-4 md:p-8 py-16';
    
    switch ($this->layout ?? 'centered') {
        case 'full_width':
            $containerClasses .= ' w-full';
            break;
        case 'split_left':
        case 'split_right':
            $containerClasses .= ' max-w-6xl mx-auto grid md:grid-cols-2 gap-8 items-center';
            break;
        default:
            $containerClasses .= ' max-w-3xl mx-auto';
    }
    
    $buttonStyle = '';
    if ($this->primaryColor) {
        $buttonStyle = 'background-color: ' . $this->primaryColor . '; border-color: ' . $this->primaryColor . ';';
    }
@endphp

<div class="{{ $containerClasses }}" style="{{ $sectionStyle }}">
    @if($this->submitted)
        <!-- Success message -->
        <div class="text-center py-16">
            <div class="max-w-md mx-auto">
                <div class="bg-green-50 border border-green-200 rounded-lg p-6">
                    <div class="flex items-center justify-center mb-4">
                        <svg class="w-12 h-12 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 48 48">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $this->successTitle }}</h3>
                    <p class="text-gray-600">{{ $this->successMessage }}</p>
                </div>
            </div>
        </div>
    @else
        @if(($this->layout ?? 'centered') === 'split_left')
            <!-- Form first, then content -->
            <div class="order-1">
        @elseif(($this->layout ?? 'centered') === 'split_right') 
            <!-- Content first, then form -->
            <div class="order-2">
        @endif
        
        @if($this->title || $this->subtitle)
        <div class="text-center mb-8">
            @if($this->title)
                <h2 class="text-3xl font-bold text-gray-900 mb-4">{!! $this->title !!}</h2>
            @endif
            @if($this->subtitle) 
                <p class="text-lg text-gray-600">{!! $this->subtitle !!}</p>
            @endif
        </div>
        @endif

        <div class="{{ $formClasses }}">
            @if(($this->showFormTitle ?? true) && $this->formTitle)
            <div class="text-center mb-6">
                <h3 class="text-xl font-semibold text-gray-900">{{ $this->formTitle }}</h3>
            </div>
            @endif
            
            <form wire:submit="submit" class="space-y-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                        {{ $this->nameLabel ?? __('Full Name') }} <span class="text-red-500">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="name" 
                        wire:model="name" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('name') border-red-500 @enderror"
                        placeholder="{{ $this->namePlaceholder ?? __('Enter your full name') }}"
                        aria-label="{{ $this->nameLabel ?? __('Full Name') }}"
                        aria-describedby="@error('name') name-error @enderror"
                        autocomplete="name"
                    >
                    @error('name')
                        <p id="name-error" class="mt-2 text-sm text-red-600" role="alert">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                        {{ $this->phoneLabel ?? __('Phone Number') }} <span class="text-red-500">*</span>
                    </label>
                    <input 
                        type="tel" 
                        id="phone" 
                        wire:model="phone" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('phone') border-red-500 @enderror"
                        placeholder="{{ $this->phonePlaceholder ?? __('Enter your phone number') }}"
                        aria-label="{{ $this->phoneLabel ?? __('Phone Number') }}"
                        aria-describedby="@error('phone') phone-error @enderror"
                        autocomplete="tel"
                    >
                    @error('phone')
                        <p id="phone-error" class="mt-2 text-sm text-red-600" role="alert">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                        {{ $this->emailLabel ?? __('Email Address') }} <span class="text-red-500">*</span>
                    </label>
                    <input 
                        type="email" 
                        id="email" 
                        wire:model="email" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('email') border-red-500 @enderror"
                        placeholder="{{ $this->emailPlaceholder ?? __('Enter your email address') }}"
                        aria-label="{{ $this->emailLabel ?? __('Email Address') }}"
                        aria-describedby="@error('email') email-error @enderror"
                        autocomplete="email"
                    >
                    @error('email')
                        <p id="email-error" class="mt-2 text-sm text-red-600" role="alert">{{ $message }}</p>
                    @enderror
                </div>

                @if($this->requireConsent ?? false)
                <div class="flex items-start">
                    <input 
                        type="checkbox" 
                        id="consent" 
                        wire:model="consent" 
                        class="mt-1 h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 @error('consent') border-red-500 @enderror"
                        required
                    >
                    <label for="consent" class="ml-2 text-sm text-gray-700">
                        {{ $this->consentText ?? __('I agree to the processing of my personal data.') }}
                        @if($this->consentLinkUrl)
                            <a href="{{ $this->consentLinkUrl }}" 
                               class="text-blue-600 hover:text-blue-800 underline" 
                               target="_blank"
                               data-umami-event="Privacy Policy Link Click"
                               data-umami-event-source="Lead Form"
                               data-umami-event-type="Privacy Link">{{ __('Privacy Policy') }}</a>
                        @endif
                    </label>
                    @error('consent')
                        <p class="mt-1 text-sm text-red-600" role="alert">{{ $message }}</p>
                    @enderror
                </div>
                @endif

                <div class="pt-4">
                    <button 
                        type="submit" 
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                        style="{{ $buttonStyle }}"
                        aria-label="{{ $this->buttonText ?? __('Submit contact form') }}"
                        wire:loading.attr="disabled"
                        wire:loading.class="opacity-50 cursor-not-allowed"
                        data-umami-event="Lead Form Submit"
                        data-umami-event-form-title="{{ $this->formTitle ?? 'Lead Form' }}"
                        data-umami-event-section="Lead Form"
                        data-umami-event-type="Form Submission"
                    >
                        <span wire:loading.remove>{{ $this->buttonText ?? __('Submit') }}</span>
                        <span wire:loading>{{ __('Sending...') }}</span>
                    </button>
                </div>

                @if($this->privacyText && !($this->requireConsent ?? false))
                <div class="text-center text-sm text-gray-500">
                    <p>{{ $this->privacyText }}</p>
                </div>
                @endif
            </form>
        </div>
    
        @if(($this->layout ?? 'centered') === 'split_left')
            </div>
            <!-- Content section for split layout -->
            <div class="order-2">
                <div class="pl-8">
                    @if($this->title)
                        <h2 class="text-3xl font-bold text-gray-900 mb-4">{!! $this->title !!}</h2>
                    @endif
                    @if($this->subtitle) 
                        <p class="text-lg text-gray-600 mb-6">{!! $this->subtitle !!}</p>
                    @endif
                    <div class="space-y-4">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span>{{ __('Quick response time') }}</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span>{{ __('Professional consultation') }}</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span>{{ __('No obligation') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        @elseif(($this->layout ?? 'centered') === 'split_right')
            </div>
            <!-- Content section for split layout -->
            <div class="order-1">
                <div class="pr-8">
                    @if($this->title)
                        <h2 class="text-3xl font-bold text-gray-900 mb-4">{!! $this->title !!}</h2>
                    @endif
                    @if($this->subtitle) 
                        <p class="text-lg text-gray-600 mb-6">{!! $this->subtitle !!}</p>
                    @endif
                    <div class="space-y-4">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span>{{ __('Quick response time') }}</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span>{{ __('Professional consultation') }}</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span>{{ __('No obligation') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endif
    
</div>