<?php

namespace VasilGerginski\FilamentLandingPages\Livewire\Components;

use Livewire\Component;

class TestimonialsSection extends Component
{
    public $badge;

    public $title;

    public $subtitle;

    public $testimonials = [];

    public function mount(
        $badge = null,
        $title = null,
        $subtitle = null,
        $testimonials = null
    ) {
        $this->badge = $badge;
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->testimonials = $testimonials ?? [];
    }

    public function render()
    {
        return view('filament-landing-pages::livewire.landing-page-components.testimonials-section');
    }
}
