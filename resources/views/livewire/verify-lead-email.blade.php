<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        @if($invalid)
            <div class="text-center">
                <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-red-100">
                    <svg class="h-8 w-8 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </div>
                <h2 class="mt-6 text-3xl font-extrabold text-gray-900">
                    {{ __('filament-landing-pages::landing-pages.verification_invalid_title') }}
                </h2>
                <p class="mt-2 text-sm text-gray-600">
                    {{ __('filament-landing-pages::landing-pages.verification_invalid_message') }}
                </p>
            </div>
        @elseif($alreadyVerified)
            <div class="text-center">
                <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-blue-100">
                    <svg class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h2 class="mt-6 text-3xl font-extrabold text-gray-900">
                    {{ __('filament-landing-pages::landing-pages.verification_already_title') }}
                </h2>
                <p class="mt-2 text-sm text-gray-600">
                    {{ __('filament-landing-pages::landing-pages.verification_already_message', ['name' => $leadName]) }}
                </p>
            </div>
        @elseif($verified)
            <div class="text-center">
                <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-green-100">
                    <svg class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <h2 class="mt-6 text-3xl font-extrabold text-gray-900">
                    {{ __('filament-landing-pages::landing-pages.verification_success_title') }}
                </h2>
                <p class="mt-2 text-sm text-gray-600">
                    {{ __('filament-landing-pages::landing-pages.verification_success_message', ['name' => $leadName]) }}
                </p>
            </div>
        @endif
    </div>
</div>