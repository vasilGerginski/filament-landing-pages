<?php

namespace VasilGerginski\FilamentLandingPages\Livewire\Components;

use Livewire\Component;

class ChallengesSection extends Component
{
    public ?string $badge = null;

    public ?string $title = null;

    public ?string $subtitle = null;

    public array $challenges = [];

    public function mount(
        ?string $badge = null,
        ?string $title = null,
        ?string $subtitle = null,
        array $challenges = []
    ) {
        $this->badge = $badge;
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->challenges = $challenges;
    }

    public function render()
    {
        return view('filament-landing-pages::livewire.landing-page-components.challenges-section');
    }
}
