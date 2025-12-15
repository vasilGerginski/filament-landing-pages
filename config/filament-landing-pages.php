<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Navigation Settings
    |--------------------------------------------------------------------------
    |
    | Configure how the landing pages resource appears in Filament navigation.
    |
    */
    'navigation' => [
        'group' => 'Marketing',
        'icon' => 'heroicon-o-rectangle-stack',
        'sort' => 3,
    ],

    /*
    |--------------------------------------------------------------------------
    | Route Settings
    |--------------------------------------------------------------------------
    |
    | Configure the routes for public landing page display.
    |
    */
    'routes' => [
        'prefix' => 'landing',
        'middleware' => ['web'],
        'locale_prefix' => false,
    ],

    /*
    |--------------------------------------------------------------------------
    | Models
    |--------------------------------------------------------------------------
    |
    | You can swap out the default models with your own implementations.
    |
    */
    'models' => [
        'landing_page' => \VasilGerginski\FilamentLandingPages\Models\LandingPage::class,
        'lead' => \VasilGerginski\FilamentLandingPages\Models\Lead::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Services
    |--------------------------------------------------------------------------
    |
    | Configure service implementations. Set to null to use built-in defaults.
    |
    */
    'services' => [
        'conversion_tracker' => null,
    ],

    /*
    |--------------------------------------------------------------------------
    | Resources Configuration
    |--------------------------------------------------------------------------
    |
    | Enable or disable Filament resources.
    |
    */
    'resources' => [
        'landing_pages' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Templates Configuration
    |--------------------------------------------------------------------------
    |
    | Configure which templates are available and register custom templates.
    |
    */
    'templates' => [
        'enabled' => [
            'lead_generation' => true,
            'sales' => true,
            'awareness' => true,
            'event' => true,
            'newsletter' => true,
            'demo' => true,
            'custom' => true,
        ],
        'custom_templates' => [
            // 'my_template' => \App\LandingPageTemplates\MyTemplate::class,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Blocks Configuration
    |--------------------------------------------------------------------------
    |
    | Configure which blocks are available in the section builder.
    |
    */
    'blocks' => [
        'core' => [
            'hero_section' => true,
            'challenges_section' => true,
            'solution_section' => true,
            'icon_list_section' => true,
            'testimonials_section' => true,
            'faq_section' => true,
            'cta_section' => true,
            'trust_indicators_section' => true,
        ],
        'goal_specific' => [
            'lead_form' => true,
            'newsletter_signup' => true,
            'event_registration' => true,
            'product_showcase' => true,
            'pricing_table' => true,
            'countdown_timer' => true,
        ],
        'custom_blocks' => [
            // 'my_block' => \App\Filament\Blocks\MyCustomBlock::class,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Theme Configuration
    |--------------------------------------------------------------------------
    |
    | Default theme colors for landing pages.
    |
    */
    'theme' => [
        'primary_color' => '#1CE088',
        'secondary_color' => '#0F0D1B',
        'accent_color' => '#F3F4F6',
    ],

    /*
    |--------------------------------------------------------------------------
    | Lead Tracking
    |--------------------------------------------------------------------------
    |
    | Configure lead tracking and email verification.
    |
    */
    'lead_tracking' => [
        'enabled' => true,
        'send_verification_email' => true,
        'verification_email_notification' => \VasilGerginski\FilamentLandingPages\Notifications\LeadEmailVerification::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | SEO Settings
    |--------------------------------------------------------------------------
    |
    | Configure SEO integration. Set seo_tools_facade to null to disable.
    |
    */
    'seo' => [
        'enabled' => true,
        'seo_tools_facade' => null,
    ],

    /*
    |--------------------------------------------------------------------------
    | Media Settings
    |--------------------------------------------------------------------------
    |
    | Configure file storage for landing page media.
    |
    */
    'media' => [
        'disk' => 'public',
        'directory' => 'landing-pages',
        'use_media_library' => false,
    ],

    /*
    |--------------------------------------------------------------------------
    | Upload Directories
    |--------------------------------------------------------------------------
    |
    | Configure directories for different types of uploads.
    |
    */
    'upload_directories' => [
        'hero' => 'landing-pages/hero',
        'backgrounds' => 'landing-pages/backgrounds',
        'lead_form' => 'landing-pages/lead-form',
    ],

    /*
    |--------------------------------------------------------------------------
    | Policy
    |--------------------------------------------------------------------------
    |
    | Configure authorization policy for landing pages.
    |
    */
    'policy' => [
        'enabled' => true,
        'class' => \VasilGerginski\FilamentLandingPages\Policies\LandingPagePolicy::class,
    ],
];
