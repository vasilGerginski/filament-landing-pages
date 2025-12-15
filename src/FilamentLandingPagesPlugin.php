<?php

namespace VasilGerginski\FilamentLandingPages;

use Filament\Contracts\Plugin;
use Filament\Panel;
use VasilGerginski\FilamentLandingPages\Filament\Resources\LandingPageResource;

class FilamentLandingPagesPlugin implements Plugin
{
    protected bool $hasLandingPages = true;

    protected ?string $navigationGroup = null;

    protected ?string $navigationIcon = null;

    protected ?int $navigationSort = null;

    public function getId(): string
    {
        return 'filament-landing-pages';
    }

    public function register(Panel $panel): void
    {
        $resources = [];

        if ($this->hasLandingPages && config('filament-landing-pages.resources.landing_pages', true)) {
            $resources[] = LandingPageResource::class;
        }

        $panel->resources($resources);
    }

    public function boot(Panel $panel): void
    {
        //
    }

    public static function make(): static
    {
        return app(static::class);
    }

    public static function get(): static
    {
        /** @var static $plugin */
        $plugin = filament(app(static::class)->getId());

        return $plugin;
    }

    public function landingPages(bool $condition = true): static
    {
        $this->hasLandingPages = $condition;

        return $this;
    }

    public function navigationGroup(?string $group): static
    {
        $this->navigationGroup = $group;

        return $this;
    }

    public function navigationIcon(?string $icon): static
    {
        $this->navigationIcon = $icon;

        return $this;
    }

    public function navigationSort(?int $sort): static
    {
        $this->navigationSort = $sort;

        return $this;
    }

    public function getNavigationGroup(): ?string
    {
        return $this->navigationGroup ?? config('filament-landing-pages.navigation.group', 'Marketing');
    }

    public function getNavigationIcon(): ?string
    {
        return $this->navigationIcon ?? config('filament-landing-pages.navigation.icon', 'heroicon-o-rectangle-stack');
    }

    public function getNavigationSort(): ?int
    {
        return $this->navigationSort ?? config('filament-landing-pages.navigation.sort', 3);
    }
}
