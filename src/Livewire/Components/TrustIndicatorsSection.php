<?php

namespace VasilGerginski\FilamentLandingPages\Livewire\Components;

use Livewire\Component;

class TrustIndicatorsSection extends Component
{
    public $title;

    public $layout;

    public $indicators = [];

    public $partners = [];

    public function mount(
        $title = null,
        $layout = 'logos',
        $indicators = null,
        $partners = null
    ) {
        $this->title = $title;
        $this->layout = $layout;
        $this->indicators = $indicators ?? [];
        $this->partners = $partners ?? [];
    }

    public function render()
    {
        return view('filament-landing-pages::livewire.landing-page-components.trust-indicators-section');
    }
}
