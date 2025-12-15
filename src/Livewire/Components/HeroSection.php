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
        $this->buttons = $buttons ?? [];
        $this->statistics = $statistics ?? [];
        $this->primaryButtonText = $primaryButtonText;
        $this->primaryButtonLink = $primaryButtonLink;
        $this->secondaryButtonText = $secondaryButtonText;
        $this->secondaryButtonLink = $secondaryButtonLink;
    }

    public function render()
    {
        return view('filament-landing-pages::livewire.landing-page-components.hero-section');
    }
}
