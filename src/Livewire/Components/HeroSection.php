<?php

namespace VasilGerginski\FilamentLandingPages\Livewire\Components;

use Livewire\Component;

class HeroSection extends Component
{
    public $backgroundImage;

    public $badge;

    public $title;

    public $subtitle;

    public $buttons = [];

    public $statistics = [];

    public $primaryButtonText;

    public $primaryButtonLink;

    public $secondaryButtonText;

    public $secondaryButtonLink;

    public function mount(
        $backgroundImage = null,
        $badge = null,
        $title = null,
        $subtitle = null,
        $buttons = [],
        $statistics = [],
        $primaryButtonText = null,
        $primaryButtonLink = null,
        $secondaryButtonText = null,
        $secondaryButtonLink = null,
    ) {
        $this->backgroundImage = $backgroundImage;
        $this->badge = $badge;
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->buttons = $this->processButtons($buttons ?? []);
        $this->statistics = $statistics ?? [];
        $this->primaryButtonText = $primaryButtonText;
        $this->primaryButtonLink = $primaryButtonLink;
        $this->secondaryButtonText = $secondaryButtonText;
        $this->secondaryButtonLink = $secondaryButtonLink;
    }

    protected function processButtons(array $buttons): array
    {
        return array_map(function ($button) {
            $button['href'] = $this->buildUrl($button['link'] ?? null);

            return $button;
        }, $buttons);
    }

    protected function buildUrl(?string $link): string
    {
        if (! $link) {
            return '#';
        }

        if (str_starts_with($link, '#') || str_starts_with($link, 'http')) {
            return $link;
        }

        $normalizedLink = str_starts_with($link, '/') ? $link : '/'.$link;

        if (config('filament-landing-pages.routes.locale_prefix', false)) {
            return '/'.app()->getLocale().$normalizedLink;
        }

        return $normalizedLink;
    }

    public function render()
    {
        return view('filament-landing-pages::livewire.landing-page-components.hero-section');
    }
}
