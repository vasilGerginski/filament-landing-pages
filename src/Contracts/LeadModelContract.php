<?php

namespace VasilGerginski\FilamentLandingPages\Contracts;

interface LeadModelContract
{
    /**
     * Check if lead's email is verified
     */
    public function hasVerifiedEmail(): bool;

    /**
     * Mark the lead's email as verified
     */
    public function markEmailAsVerified(): bool;

    /**
     * Generate a new email verification token
     */
    public function generateEmailVerificationToken(): string;

    /**
     * Route notifications for the mail channel.
     */
    public function routeNotificationForMail(): string;
}
