<?php

use Illuminate\Support\Facades\Route;
use VasilGerginski\FilamentLandingPages\Livewire\LandingPage;
use VasilGerginski\FilamentLandingPages\Livewire\PreviewLandingPage;

$prefix = config('filament-landing-pages.routes.prefix', 'landing');
$middleware = config('filament-landing-pages.routes.middleware', ['web']);
$localePrefix = config('filament-landing-pages.routes.locale_prefix', true);

// Preview state route (outside locale prefix)
Route::post('/landing-preview-state', PreviewLandingPage::class)
    ->name('filament-landing-pages.preview-state')
    ->middleware($middleware);

if ($localePrefix) {
    Route::prefix('{locale?}')
        ->middleware($middleware)
        ->group(function () use ($prefix) {
            // Public landing page route
            Route::get("/{$prefix}/{slug}", LandingPage::class)
                ->name('filament-landing-pages.show');

            // Preview route
            Route::get("/{$prefix}-preview/{slug}", LandingPage::class)
                ->defaults('preview', true)
                ->name('filament-landing-pages.preview');
        });
} else {
    Route::middleware($middleware)->group(function () use ($prefix) {
        Route::get("/{$prefix}/{slug}", LandingPage::class)
            ->name('filament-landing-pages.show');

        Route::get("/{$prefix}-preview/{slug}", LandingPage::class)
            ->defaults('preview', true)
            ->name('filament-landing-pages.preview');
    });
}
