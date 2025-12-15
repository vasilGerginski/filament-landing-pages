<?php

namespace VasilGerginski\FilamentLandingPages\Livewire\Components;

use Livewire\Component;

class ProductShowcase extends Component
{
    public $title;

    public $subtitle;

    public $layout = 'grid';

    public $productCardStyle = 'standard';

    public $products = [];

    public $primaryColor = '#1CE088';

    public $accentColor = '#F3F4F6';

    public $showBackground = false;

    public $backgroundImage;

    public $showFilters = false;

    public $showCompareButton = false;

    public $showQuickView = false;

    public $showFooterCTA = false;

    public $ctaText;

    public $ctaLink;

    public function mount(
        $title = null,
        $subtitle = null,
        $layout = null,
        $productCardStyle = null,
        $products = null,
        $primaryColor = null,
        $accentColor = null,
        $showBackground = null,
        $backgroundImage = null,
        $showFilters = null,
        $showCompareButton = null,
        $showQuickView = null,
        $showFooterCTA = null,
        $ctaText = null,
        $ctaLink = null
    ) {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->layout = $layout ?? 'grid';
        $this->productCardStyle = $productCardStyle ?? 'standard';
        $this->products = $products ?? [];
        $this->primaryColor = $primaryColor ?? '#1CE088';
        $this->accentColor = $accentColor ?? '#F3F4F6';
        $this->showBackground = $showBackground ?? false;
        $this->backgroundImage = $backgroundImage;
        $this->showFilters = $showFilters ?? false;
        $this->showCompareButton = $showCompareButton ?? false;
        $this->showQuickView = $showQuickView ?? false;
        $this->showFooterCTA = $showFooterCTA ?? false;
        $this->ctaText = $ctaText;
        $this->ctaLink = $ctaLink;
    }

    public function render()
    {
        return view('filament-landing-pages::livewire.landing-page-components.product-showcase');
    }
}
