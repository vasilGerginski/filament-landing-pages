<?php

namespace VasilGerginski\FilamentLandingPages\Livewire\Components;

use Livewire\Component;

class CountdownTimer extends Component
{
    public $title;

    public $subtitle;

    public $targetDate;

    public $showLabels = true;

    public $showSeconds = true;

    public $layout = 'horizontal';

    public $primaryColor = '#1CE088';

    public $backgroundColor = '#FFFFFF';

    public $textColor = '#0F0D1B';

    public $completedMessage;

    public $completedSubtitle;

    public function mount(
        $title = null,
        $subtitle = null,
        $targetDate = null,
        $showLabels = null,
        $showSeconds = null,
        $layout = null,
        $primaryColor = null,
        $backgroundColor = null,
        $textColor = null,
        $completedMessage = null,
        $completedSubtitle = null
    ) {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->targetDate = $targetDate;
        $this->showLabels = $showLabels ?? true;
        $this->showSeconds = $showSeconds ?? true;
        $this->layout = $layout ?? 'horizontal';
        $this->primaryColor = $primaryColor ?? '#1CE088';
        $this->backgroundColor = $backgroundColor ?? '#FFFFFF';
        $this->textColor = $textColor ?? '#0F0D1B';
        $this->completedMessage = $completedMessage ?? 'The event has started!';
        $this->completedSubtitle = $completedSubtitle ?? 'Thank you for your interest.';
    }

    public function render()
    {
        return view('filament-landing-pages::livewire.landing-page-components.countdown-timer');
    }
}
