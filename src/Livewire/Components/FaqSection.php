<?php

namespace VasilGerginski\FilamentLandingPages\Livewire\Components;

use Livewire\Component;

class FaqSection extends Component
{
    public $badge;

    public $title;

    public $subtitle;

    public $ctaText;

    public $ctaLink;

    public $faqs = [];

    public function mount(
        $badge = null,
        $title = null,
        $subtitle = null,
        $ctaText = null,
        $ctaLink = null,
        $faqs = null
    ) {
        $this->badge = $badge;
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->ctaText = $ctaText;
        $this->ctaLink = $ctaLink;
        $this->faqs = $faqs ?? [];
    }

    public function render()
    {
        return view('filament-landing-pages::livewire.landing-page-components.faq-section');
    }
}
