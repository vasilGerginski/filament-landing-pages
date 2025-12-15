<?php

namespace VasilGerginski\FilamentLandingPages\Services;

use Illuminate\Support\Facades\Log;
use VasilGerginski\FilamentLandingPages\Contracts\ConversionTrackerContract;

class ConversionTracker implements ConversionTrackerContract
{
    /**
     * Track a lead form submission
     */
    public function trackLead($lead)
    {
        Log::info('Lead conversion tracked', [
            'lead_id' => $lead->id ?? null,
            'name' => $lead->name ?? null,
            'email' => $lead->email ?? null,
            'session_id' => session()->getId(),
            'utm_source' => session('utm_source'),
            'utm_medium' => session('utm_medium'),
            'utm_campaign' => session('utm_campaign'),
        ]);

        return true;
    }

    /**
     * Track a newsletter signup
     */
    public function trackNewsletterSignup($email)
    {
        Log::info('Newsletter signup tracked', [
            'email' => $email,
            'session_id' => session()->getId(),
            'utm_source' => session('utm_source'),
            'utm_medium' => session('utm_medium'),
            'utm_campaign' => session('utm_campaign'),
        ]);

        return true;
    }

    /**
     * Track a custom conversion
     */
    public function trackCustom($type, $value = null, $metadata = [])
    {
        Log::info('Custom conversion tracked', [
            'type' => $type,
            'value' => $value,
            'metadata' => $metadata,
            'session_id' => session()->getId(),
            'utm_source' => session('utm_source'),
            'utm_medium' => session('utm_medium'),
            'utm_campaign' => session('utm_campaign'),
        ]);

        return true;
    }

    /**
     * Store UTM parameters in session for later use
     */
    public function storeTrackingParameters()
    {
        $request = request();
        $trackingParams = [
            'utm_source',
            'utm_campaign',
            'utm_medium',
            'utm_term',
            'utm_content',
            'gclid',
            'fbclid',
            'click_id',
        ];

        foreach ($trackingParams as $param) {
            if ($request->has($param)) {
                session([$param => $request->get($param)]);
            }
        }
    }
}
