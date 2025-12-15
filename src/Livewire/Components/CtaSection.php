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
        $this->testimonial = $testimonial ?? [];
    }

    public function render()
    {
        return view('filament-landing-pages::livewire.landing-page-components.cta-section');
    }
}
