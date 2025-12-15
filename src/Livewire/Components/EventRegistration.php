<?php

namespace VasilGerginski\FilamentLandingPages\Livewire\Components;

use Livewire\Component;

class EventRegistration extends Component
{
    public $title;

    public $subtitle;

    public $showEventDetails = true;

    public $eventName;

    public $eventDate;

    public $eventStartTime;

    public $eventEndTime;

    public $eventLocation;

    public $eventPrice;

    public $earlyBirdPrice;

    public $earlyBirdDeadline;

    public $collectName = true;

    public $collectEmail = true;

    public $collectPhone = false;

    public $collectCompany = false;

    public $collectJobTitle = false;

    public $collectDietaryRestrictions = false;

    public $collectSpecialRequirements = false;

    public $eventImage;

    public $layout = 'standard';

    public $primaryColor = '#1CE088';

    public $eventFeatures = [];

    public $showScheduleOutline = false;

    public $scheduleItems = [];

    public $buttonText = 'Register Now';

    public $showPrivacyConsent = false;

    public $privacyText;

    public $showCountdown = false;

    public $registrationDeadline;

    public $showAvailableSpots = false;

    public $totalSpots;

    public function mount(
        $title = null,
        $subtitle = null,
        $showEventDetails = null,
        $eventName = null,
        $eventDate = null,
        $eventStartTime = null,
        $eventEndTime = null,
        $eventLocation = null,
        $eventPrice = null,
        $earlyBirdPrice = null,
        $earlyBirdDeadline = null,
        $collectName = null,
        $collectEmail = null,
        $collectPhone = null,
        $collectCompany = null,
        $collectJobTitle = null,
        $collectDietaryRestrictions = null,
        $collectSpecialRequirements = null,
        $eventImage = null,
        $layout = null,
        $primaryColor = null,
        $eventFeatures = null,
        $showScheduleOutline = null,
        $scheduleItems = null,
        $buttonText = null,
        $showPrivacyConsent = null,
        $privacyText = null,
        $showCountdown = null,
        $registrationDeadline = null,
        $showAvailableSpots = null,
        $totalSpots = null
    ) {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->showEventDetails = $showEventDetails ?? true;
        $this->eventName = $eventName;
        $this->eventDate = $eventDate;
        $this->eventStartTime = $eventStartTime;
        $this->eventEndTime = $eventEndTime;
        $this->eventLocation = $eventLocation;
        $this->eventPrice = $eventPrice;
        $this->earlyBirdPrice = $earlyBirdPrice;
        $this->earlyBirdDeadline = $earlyBirdDeadline;
        $this->collectName = $collectName ?? true;
        $this->collectEmail = $collectEmail ?? true;
        $this->collectPhone = $collectPhone ?? false;
        $this->collectCompany = $collectCompany ?? false;
        $this->collectJobTitle = $collectJobTitle ?? false;
        $this->collectDietaryRestrictions = $collectDietaryRestrictions ?? false;
        $this->collectSpecialRequirements = $collectSpecialRequirements ?? false;
        $this->eventImage = $eventImage;
        $this->layout = $layout ?? 'standard';
        $this->primaryColor = $primaryColor ?? '#1CE088';
        $this->eventFeatures = $eventFeatures ?? [];
        $this->showScheduleOutline = $showScheduleOutline ?? false;
        $this->scheduleItems = $scheduleItems ?? [];
        $this->buttonText = $buttonText ?? 'Register Now';
        $this->showPrivacyConsent = $showPrivacyConsent ?? false;
        $this->privacyText = $privacyText;
        $this->showCountdown = $showCountdown ?? false;
        $this->registrationDeadline = $registrationDeadline;
        $this->showAvailableSpots = $showAvailableSpots ?? false;
        $this->totalSpots = $totalSpots;
    }

    public function render()
    {
        return view('filament-landing-pages::livewire.landing-page-components.event-registration');
    }
}
