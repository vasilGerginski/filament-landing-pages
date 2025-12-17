<?php

namespace VasilGerginski\FilamentLandingPages\Livewire\Components;

use Livewire\Component;

class CtaSection extends Component
{
    public $title;

    public $subtitle;

    public $features = [];

    public $buttonText;

    public $buttonLink;

    public $buttonHref;

    public $testimonial = [];

    public function mount(
        $title = null,
        $subtitle = null,
        $features = null,
        $buttonText = null,
        $buttonLink = null,
        $testimonial = null
    ) {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->features = $features ?? [];
        $this->buttonText = $buttonText;
        $this->buttonLink = $buttonLink;
        $this->buttonHref = $this->buildUrl($buttonLink);
        $this->testimonial = $testimonial ?? [];
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
        return view('filament-landing-pages::livewire.landing-page-components.cta-section');
    }
}
