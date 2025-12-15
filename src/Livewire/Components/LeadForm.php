<?php

namespace VasilGerginski\FilamentLandingPages\Livewire\Components;

use Livewire\Component;
use VasilGerginski\FilamentLandingPages\Contracts\ConversionTrackerContract;
use VasilGerginski\FilamentLandingPages\Models\Lead;
use VasilGerginski\FilamentLandingPages\Notifications\LeadEmailVerification;

class LeadForm extends Component
{
    // Form data
    public $name = '';

    public $phone = '';

    public $email = '';

    public $consent = false;

    // Block configuration data
    public $title;

    public $subtitle;

    public $formStyle;

    public $nameLabel;

    public $namePlaceholder;

    public $phoneLabel;

    public $phonePlaceholder;

    public $emailLabel;

    public $emailPlaceholder;

    public $buttonText;

    public $successTitle;

    public $successMessage;

    public $redirectAfterSubmit;

    public $primaryColor;

    public $backgroundColor;

    public $backgroundImage;

    public $layout;

    public $showBorder;

    public $showShadow;

    public $privacyText;

    public $requireConsent;

    public $consentText;

    public $consentLinkUrl;

    public $sendVerificationEmail;

    public $verificationEmailSubject;

    public $showFormTitle;

    public $formTitle;

    public $enableCaptcha;

    public $trackingEventName;

    // Component state
    public $submitted = false;

    public function mount(
        $title = null,
        $subtitle = null,
        $formStyle = 'standard',
        $nameLabel = 'Name',
        $namePlaceholder = 'Your name',
        $phoneLabel = 'Phone',
        $phonePlaceholder = 'Your phone number',
        $emailLabel = 'Email',
        $emailPlaceholder = 'Your email address',
        $buttonText = 'Submit',
        $successTitle = 'Thank you!',
        $successMessage = 'Your request has been sent successfully. We will contact you soon.',
        $redirectAfterSubmit = null,
        $primaryColor = null,
        $backgroundColor = null,
        $backgroundImage = null,
        $layout = 'centered',
        $showBorder = true,
        $showShadow = false,
        $privacyText = 'Your data is protected and will not be shared with third parties.',
        $requireConsent = false,
        $consentText = 'I agree to the processing of my personal data.',
        $consentLinkUrl = null,
        $sendVerificationEmail = true,
        $verificationEmailSubject = 'Confirm your email address',
        $showFormTitle = true,
        $formTitle = 'Contact Us',
        $enableCaptcha = false,
        $trackingEventName = 'lead_form_submit'
    ) {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->formStyle = $formStyle;
        $this->nameLabel = $nameLabel;
        $this->namePlaceholder = $namePlaceholder;
        $this->phoneLabel = $phoneLabel;
        $this->phonePlaceholder = $phonePlaceholder;
        $this->emailLabel = $emailLabel;
        $this->emailPlaceholder = $emailPlaceholder;
        $this->buttonText = $buttonText;
        $this->successTitle = $successTitle;
        $this->successMessage = $successMessage;
        $this->redirectAfterSubmit = $redirectAfterSubmit;
        $this->primaryColor = $primaryColor;
        $this->backgroundColor = $backgroundColor;
        $this->backgroundImage = $backgroundImage;
        $this->layout = $layout;
        $this->showBorder = $showBorder;
        $this->showShadow = $showShadow;
        $this->privacyText = $privacyText;
        $this->requireConsent = $requireConsent;
        $this->consentText = $consentText;
        $this->consentLinkUrl = $consentLinkUrl;
        $this->sendVerificationEmail = $sendVerificationEmail;
        $this->verificationEmailSubject = $verificationEmailSubject;
        $this->showFormTitle = $showFormTitle;
        $this->formTitle = $formTitle;
        $this->enableCaptcha = $enableCaptcha;
        $this->trackingEventName = $trackingEventName;
    }

    public function submit()
    {
        $this->validate();

        $leadModel = config('filament-landing-pages.models.lead', Lead::class);
        $lead = $leadModel::create([
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
        ]);

        // Send verification email if enabled
        if ($this->sendVerificationEmail && config('filament-landing-pages.lead_tracking.send_verification_email', true)) {
            $lead->notify(new LeadEmailVerification($this->verificationEmailSubject));
        }

        // Track conversion
        if (config('filament-landing-pages.lead_tracking.enabled', true)) {
            $trackerClass = config('filament-landing-pages.services.conversion_tracker');
            if ($trackerClass && class_exists($trackerClass)) {
                $tracker = app($trackerClass);
                if ($tracker instanceof ConversionTrackerContract) {
                    $tracker->trackLead($lead);
                }
            }
        }

        // Handle redirect or show success message
        if ($this->redirectAfterSubmit) {
            $locale = app()->getLocale();
            $url = $this->redirectAfterSubmit;

            session()->put('lead_id', $lead->id);

            // Handle relative URLs
            if (strpos($url, '/') === 0 && strpos($url, '/'.$locale) !== 0) {
                $url = '/'.$locale.$url;
            }

            return $this->redirect($url, navigate: true);
        }

        $this->submitted = true;
    }

    protected function rules()
    {
        $rules = [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:50',
            'email' => 'required|email|max:255',
        ];

        if ($this->requireConsent) {
            $rules['consent'] = 'required|accepted';
        }

        return $rules;
    }

    protected function messages()
    {
        return [
            'name.required' => __('filament-landing-pages::landing-pages.validation.name_required'),
            'name.max' => __('filament-landing-pages::landing-pages.validation.name_max'),
            'phone.required' => __('filament-landing-pages::landing-pages.validation.phone_required'),
            'phone.max' => __('filament-landing-pages::landing-pages.validation.phone_max'),
            'email.required' => __('filament-landing-pages::landing-pages.validation.email_required'),
            'email.email' => __('filament-landing-pages::landing-pages.validation.email_invalid'),
            'email.max' => __('filament-landing-pages::landing-pages.validation.email_max'),
            'consent.required' => __('filament-landing-pages::landing-pages.validation.consent_required'),
            'consent.accepted' => __('filament-landing-pages::landing-pages.validation.consent_required'),
        ];
    }

    public function render()
    {
        return view('filament-landing-pages::livewire.landing-page-components.lead-form');
    }
}
