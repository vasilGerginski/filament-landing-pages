<?php

namespace VasilGerginski\FilamentLandingPages;

use Illuminate\Support\Facades\Gate;
use Livewire\Livewire;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
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
use VasilGerginski\FilamentLandingPages\Livewire\VerifyLeadEmail;
use VasilGerginski\FilamentLandingPages\Models\LandingPage as LandingPageModel;
use VasilGerginski\FilamentLandingPages\Policies\LandingPagePolicy;
use VasilGerginski\FilamentLandingPages\Services\ConversionTracker;

class FilamentLandingPagesServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-landing-pages';

    public static string $viewNamespace = 'filament-landing-pages';

    public function configurePackage(Package $package): void
    {
        $package->name(static::$name)
            ->hasConfigFile()
            ->hasViews(static::$viewNamespace)
            ->hasTranslations()
            ->hasRoute('web')
            ->hasMigrations($this->getMigrations())
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->publishConfigFile()
                    ->publishMigrations()
                    ->askToRunMigrations()
                    ->askToStarRepoOnGitHub('vasilgerginski/filament-landing-pages');
            });
    }

    public function packageRegistered(): void
    {
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

    public function packageBooted(): void
    {
        // Register policy
        $modelClass = config('filament-landing-pages.models.landing_page', LandingPageModel::class);
        Gate::policy($modelClass, LandingPagePolicy::class);

        // Register Livewire components
        $this->registerLivewireComponents();
    }

    protected function getMigrations(): array
    {
        return [
            'create_landing_pages_table',
            'create_leads_table',
        ];
    }

    protected function registerLivewireComponents(): void
    {
        // Main components
        Livewire::component('filament-landing-pages::landing-page', LandingPage::class);
        Livewire::component('filament-landing-pages::preview-landing-page', PreviewLandingPage::class);
        Livewire::component('filament-landing-pages::verify-lead-email', VerifyLeadEmail::class);

        // Section components
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
            // Register with package prefix
            Livewire::component("filament-landing-pages::landing-page-components.{$name}", $class);
            // Register without prefix (for stored section types)
            Livewire::component("landing-page-components.{$name}", $class);
        }
    }
}
