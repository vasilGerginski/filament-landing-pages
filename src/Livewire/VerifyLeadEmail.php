<?php

namespace VasilGerginski\FilamentLandingPages\Livewire;

use Livewire\Component;
use VasilGerginski\FilamentLandingPages\Models\Lead;

class VerifyLeadEmail extends Component
{
    public bool $verified = false;

    public bool $alreadyVerified = false;

    public bool $invalid = false;

    public ?string $leadName = null;

    public function mount(int $id, string $token): void
    {
        $leadModel = config('filament-landing-pages.models.lead', Lead::class);
        $lead = $leadModel::find($id);

        if (! $lead || $lead->email_verification_token !== $token) {
            $this->invalid = true;

            return;
        }

        $this->leadName = $lead->name;

        if ($lead->hasVerifiedEmail()) {
            $this->alreadyVerified = true;

            return;
        }

        $lead->markEmailAsVerified();
        $this->verified = true;
    }

    public function render()
    {
        return view('filament-landing-pages::livewire.verify-lead-email')
            ->layout('filament-landing-pages::layouts.preview');
    }
}
