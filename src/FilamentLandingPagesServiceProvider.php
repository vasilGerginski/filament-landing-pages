<?php

namespace VasilGerginski\FilamentLandingPages;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use VasilGerginski\FilamentLandingPages\Contracts\ConversionTrackerContract;
use VasilGerginski\FilamentLandingPages\Contracts\LeadModelContract;
use VasilGerginski\FilamentLandingPages\Livewire\Components\ChallengesSection;
use VasilGerginski\FilamentLandingPages\Livewire\Components\CountdownTimer;
use VasilGerginski\FilamentLandingPages\Livewire\Components\CtaSection;
use VasilGerginski\FilamentLandingPages\Livewire\Components\EventRegistration;
use VasilGerginski\FilamentLandingPages\Livewire\Components\FaqSection;
use VasilGerginski\FilamentLandingPages\Livewire\Components\HeroSection;
use VasilGerginski\FilamentLandingPages\Livewire\Components\IconListSection;
use VasilGerginski\FilamentLandingPages\Livewire\Components\LeadForm;
use VasilGerginski\FilamentLandingPages\Livewire\Components\NewsletterSignup;
use VasilGerginski\FilamentLandingPages\Livewire\Components\PricingTable;
use VasilGerginski\FilamentLandingPages\Livewire\Components\ProductShowcase;
use VasilGerginski\FilamentLandingPages\Livewire\Components\SolutionSection;
use VasilGerginski\FilamentLandingPages\Livewire\Components\TestimonialsSection;
use VasilGerginski\FilamentLandingPages\Livewire\Components\TrustIndicatorsSection;
use VasilGerginski\FilamentLandingPages\Livewire\LandingPage;
use VasilGerginski\FilamentLandingPages\Livewire\PreviewLandingPage;
use VasilGerginski\FilamentLandingPages\Services\ConversionTracker;
use VasilGerginski\FilamentLandingPages\Commands\InstallCommand;
use VasilGerginski\FilamentLandingPages\Policies\LandingPagePolicy;

class FilamentLandingPagesServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/filament-landing-pages.php',
            'filament-landing-pages'
        );

        // Bind Lead model contract
        $this->app->bind(LeadModelContract::class, function ($app) {
            $modelClass = config('filament-landing-pages.models.lead');

            return new $modelClass;
        });

        // Bind Conversion Tracker contract
        $this->app->singleton(ConversionTrackerContract::class, function ($app) {
            $trackerClass = config('filament-landing-pages.services.conversion_tracker');

            if ($trackerClass && class_exists($trackerClass)) {
                return $app->make($trackerClass);
            }

            return $app->make(ConversionTracker::class);
        });
    }

    public function boot(): void
    {
        // Register policy
        $modelClass = config('filament-landing-pages.models.landing_page', \VasilGerginski\FilamentLandingPages\Models\LandingPage::class);
        Gate::policy($modelClass, LandingPagePolicy::class);

        // Load routes
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        // Load views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'filament-landing-pages');

        // Load translations
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'filament-landing-pages');

        // Register Livewire components
        $this->registerLivewireComponents();

        if ($this->app->runningInConsole()) {
            // Register commands
            $this->commands([
                InstallCommand::class,
            ]);

            // Publish config
            $this->publishes([
                __DIR__.'/../config/filament-landing-pages.php' => config_path('filament-landing-pages.php'),
            ], 'filament-landing-pages-config');

            // Publish migrations
            $this->publishesMigrations([
                __DIR__.'/../database/migrations' => database_path('migrations'),
            ], 'filament-landing-pages-migrations');

            // Publish views
            $this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/filament-landing-pages'),
            ], 'filament-landing-pages-views');

            // Publish translations
            $this->publishes([
                __DIR__.'/../resources/lang' => $this->app->langPath('vendor/filament-landing-pages'),
            ], 'filament-landing-pages-translations');
        }
    }

    protected function registerLivewireComponents(): void
    {
        // Main components
        Livewire::component('filament-landing-pages::landing-page', LandingPage::class);
        Livewire::component('filament-landing-pages::preview-landing-page', PreviewLandingPage::class);

        // Section components - registered with the prefix for rendering
        $components = [
            'challenges-section' => ChallengesSection::class,
            'countdown-timer' => CountdownTimer::class,
            'cta-section' => CtaSection::class,
            'event-registration' => EventRegistration::class,
            'faq-section' => FaqSection::class,
            'hero-section' => HeroSection::class,
            'icon-list-section' => IconListSection::class,
            'lead-form' => LeadForm::class,
            'newsletter-signup' => NewsletterSignup::class,
            'pricing-table' => PricingTable::class,
            'product-showcase' => ProductShowcase::class,
            'solution-section' => SolutionSection::class,
            'testimonials-section' => TestimonialsSection::class,
            'trust-indicators-section' => TrustIndicatorsSection::class,
        ];

        foreach ($components as $name => $class) {
            Livewire::component("filament-landing-pages::landing-page-components.{$name}", $class);
        }
    }
}
