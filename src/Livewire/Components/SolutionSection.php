<?php

namespace VasilGerginski\FilamentLandingPages\Livewire\Components;

use Livewire\Component;

class SolutionSection extends Component
{
    public $badge;

    public $title;

    public $subtitle;

    public $processTitle;

    public $benefitsTitle;

    public $process = [];

    public $benefits = [];

    public function mount(
        $badge = null,
        $title = null,
        $subtitle = null,
        $processTitle = null,
        $benefitsTitle = null,
        $process = null,
        $benefits = null
    ) {
        $this->badge = $badge;
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->processTitle = $processTitle;
        $this->benefitsTitle = $benefitsTitle;
        $this->process = $process ?? [];
        $this->benefits = $benefits ?? [];
    }

    public function render()
    {
        return view('filament-landing-pages::livewire.landing-page-components.solution-section');
    }
}
