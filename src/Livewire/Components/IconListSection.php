<?php

namespace VasilGerginski\FilamentLandingPages\Livewire\Components;

use Livewire\Component;

class IconListSection extends Component
{
    public $badge;

    public $title;

    public $subtitle;

    public $items;

    public $image;

    public $imageAlt;

    public $layout;

    public $iconType;

    public $iconColor;

    public function mount(
        $badge = null,
        $title = null,
        $subtitle = null,
        $items = null,
        $image = null,
        $imageAlt = null,
        $layout = null,
        $iconType = null,
        $iconColor = null
    ) {
        $this->badge = $badge;
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->items = $items ?? [];
        $this->image = $image;
        $this->imageAlt = $imageAlt;
        $this->layout = $layout ?? 'grid';
        $this->iconType = $iconType ?? 'check-circle';
        $this->iconColor = $iconColor ?? 'green';
    }

    public function render()
    {
        return view('filament-landing-pages::livewire.landing-page-components.icon-list-section');
    }
}
