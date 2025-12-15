<?php

namespace VasilGerginski\FilamentLandingPages\Contracts;

interface ConversionTrackerContract
{
    /**
     * Track a lead form submission
     */
    public function trackLead($lead);

    /**
     * Track a newsletter signup
     */
    public function trackNewsletterSignup($email);

    /**
     * Track a custom conversion
     */
    public function trackCustom($type, $value = null, $metadata = []);

    /**
     * Store UTM parameters in session for later use
     */
    public function storeTrackingParameters();
}
