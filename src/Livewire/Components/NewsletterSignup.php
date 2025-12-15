<?php

namespace VasilGerginski\FilamentLandingPages\Livewire\Components;

use Livewire\Component;

class NewsletterSignup extends Component
{
    public $title;

    public $subtitle;

    public $emailLabel;

    public $emailPlaceholder;

    public $includeNameField = false;

    public $nameLabel;

    public $namePlaceholder;

    public $includePhoneField = false;

    public $phoneLabel;

    public $phonePlaceholder;

    public $includeMessageField = false;

    public $messageLabel;

    public $messagePlaceholder;

    public $layout = 'centered';

    public $primaryColor = '#1CE088';

    public $benefits = [];

    public $showImage = false;

    public $imageUrl;

    public $addTopDivider = false;

    public $addBottomDivider = false;

    public $buttonText;

    public $buttonLink;

    public $privacyText;

    public $includeConsent = false;

    public $consentText;

    public $showFrequency = false;

    public $frequencyText;

    public $showResponseTime = false;

    public $responseTimeText;

    public function mount(
        $title = null,
        $subtitle = null,
        $emailLabel = null,
        $emailPlaceholder = 'Enter your email',
        $includeNameField = null,
        $nameLabel = 'Name',
        $namePlaceholder = 'Your name',
        $includePhoneField = null,
        $phoneLabel = 'Phone',
        $phonePlaceholder = 'Your phone number',
        $includeMessageField = null,
        $messageLabel = 'Message',
        $messagePlaceholder = 'Your message',
        $layout = null,
        $primaryColor = null,
        $benefits = null,
        $showImage = null,
        $imageUrl = null,
        $addTopDivider = null,
        $addBottomDivider = null,
        $buttonText = 'Subscribe',
        $buttonLink = null,
        $privacyText = 'We respect your privacy.',
        $includeConsent = null,
        $consentText = 'I agree to receive email updates.',
        $showFrequency = null,
        $frequencyText = 'We send emails once a week.',
        $showResponseTime = null,
        $responseTimeText = 'We typically respond within 24 hours.'
    ) {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->emailLabel = $emailLabel;
        $this->emailPlaceholder = $emailPlaceholder;
        $this->includeNameField = $includeNameField ?? false;
        $this->nameLabel = $nameLabel;
        $this->namePlaceholder = $namePlaceholder;
        $this->includePhoneField = $includePhoneField ?? false;
        $this->phoneLabel = $phoneLabel;
        $this->phonePlaceholder = $phonePlaceholder;
        $this->includeMessageField = $includeMessageField ?? false;
        $this->messageLabel = $messageLabel;
        $this->messagePlaceholder = $messagePlaceholder;
        $this->layout = $layout ?? 'centered';
        $this->primaryColor = $primaryColor ?? '#1CE088';
        $this->benefits = $benefits ?? [];
        $this->showImage = $showImage ?? false;
        $this->imageUrl = $imageUrl;
        $this->addTopDivider = $addTopDivider ?? false;
        $this->addBottomDivider = $addBottomDivider ?? false;
        $this->buttonText = $buttonText;
        $this->buttonLink = $buttonLink;
        $this->privacyText = $privacyText;
        $this->includeConsent = $includeConsent ?? false;
        $this->consentText = $consentText;
        $this->showFrequency = $showFrequency ?? false;
        $this->frequencyText = $frequencyText;
        $this->showResponseTime = $showResponseTime ?? false;
        $this->responseTimeText = $responseTimeText;
    }

    public function render()
    {
        return view('filament-landing-pages::livewire.landing-page-components.newsletter-signup');
    }
}
