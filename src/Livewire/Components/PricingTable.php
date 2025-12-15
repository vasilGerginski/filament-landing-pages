<?php

namespace VasilGerginski\FilamentLandingPages\Livewire\Components;

use Livewire\Component;

class PricingTable extends Component
{
    public $title;

    public $subtitle;

    public $pricingStyle = 'horizontal';

    public $showAnnualPricing = false;

    public $annualDiscountPercent = '20';

    public $annualSavingsText;

    public $showComparisonHeader = false;

    public $plans = [];

    public $primaryColor = '#1CE088';

    public $accentColor = '#F3F4F6';

    public $planCardStyle = 'bordered';

    public $showCurrencySelector = false;

    public $showRefundPolicy = false;

    public $refundPolicyText;

    public $showFAQLink = false;

    public $faqLinkText;

    public $faqLinkUrl;

    public function mount(
        $title = null,
        $subtitle = null,
        $pricingStyle = null,
        $showAnnualPricing = null,
        $annualDiscountPercent = null,
        $annualSavingsText = null,
        $showComparisonHeader = null,
        $plans = null,
        $primaryColor = null,
        $accentColor = null,
        $planCardStyle = null,
        $showCurrencySelector = null,
        $showRefundPolicy = null,
        $refundPolicyText = null,
        $showFAQLink = null,
        $faqLinkText = null,
        $faqLinkUrl = null
    ) {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->pricingStyle = $pricingStyle ?? 'horizontal';
        $this->showAnnualPricing = $showAnnualPricing ?? false;
        $this->annualDiscountPercent = $annualDiscountPercent ?? '20';
        $this->annualSavingsText = $annualSavingsText;
        $this->showComparisonHeader = $showComparisonHeader ?? false;
        $this->plans = $plans ?? [];
        $this->primaryColor = $primaryColor ?? '#1CE088';
        $this->accentColor = $accentColor ?? '#F3F4F6';
        $this->planCardStyle = $planCardStyle ?? 'bordered';
        $this->showCurrencySelector = $showCurrencySelector ?? false;
        $this->showRefundPolicy = $showRefundPolicy ?? false;
        $this->refundPolicyText = $refundPolicyText;
        $this->showFAQLink = $showFAQLink ?? false;
        $this->faqLinkText = $faqLinkText;
        $this->faqLinkUrl = $faqLinkUrl;
    }

    public function render()
    {
        return view('filament-landing-pages::livewire.landing-page-components.pricing-table');
    }
}
