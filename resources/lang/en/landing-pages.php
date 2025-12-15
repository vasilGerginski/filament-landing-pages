<?php

return [
    // Resource
    'resource' => [
        'label' => 'Landing Page',
        'plural_label' => 'Landing Pages',
    ],

    // Flat keys used in resource
    'title' => 'Title',
    'slug' => 'Slug',
    'slug_helper' => 'URL-friendly identifier. Use only letters, numbers, and hyphens.',
    'meta_description' => 'Meta Description',
    'goal_type' => 'Goal Type',
    'goal_type_helper' => 'Select a template to get started with pre-configured sections.',
    'goal' => 'Goal',
    'is_active' => 'Active',
    'is_active_helper' => 'Only active landing pages are publicly accessible.',
    'active' => 'Active',
    'enable_analytics' => 'Enable Analytics',
    'tracking_code' => 'Tracking Code',
    'tracking_code_helper' => 'Add custom tracking scripts (Google Analytics, Facebook Pixel, etc.)',
    'utm_source' => 'UTM Source',
    'utm_medium' => 'UTM Medium',
    'utm_campaign' => 'UTM Campaign',

    // Table actions
    'duplicate' => 'Duplicate',
    'preview' => 'Preview',
    'view_live' => 'View Live',
    'add_section' => 'Add Section',
    'show_active_only' => 'Show Active Only',
    'activate_selected' => 'Activate Selected',
    'deactivate_selected' => 'Deactivate Selected',

    // Form fields (nested)
    'fields' => [
        'title' => 'Title',
        'slug' => 'Slug',
        'meta_description' => 'Meta Description',
        'meta_keywords' => 'Meta Keywords',
        'goal_type' => 'Goal Type',
        'is_active' => 'Active',
        'sections' => 'Sections',
    ],

    // Goal types
    'goal_types' => [
        'lead_generation' => 'Lead Generation',
        'sales' => 'Sales',
        'awareness' => 'Brand Awareness',
        'event' => 'Event Registration',
        'newsletter' => 'Newsletter Signup',
        'demo' => 'Demo Request',
        'custom' => 'Custom',
    ],

    // Block labels
    'blocks' => [
        'hero_section' => 'Hero Section',
        'challenges_section' => 'Challenges Section',
        'solution_section' => 'Solution Section',
        'icon_list_section' => 'Icon List Section',
        'testimonials_section' => 'Testimonials Section',
        'faq_section' => 'FAQ Section',
        'cta_section' => 'Call to Action Section',
        'trust_indicators_section' => 'Trust Indicators Section',
        'lead_form' => 'Lead Form',
        'newsletter_signup' => 'Newsletter Signup',
        'event_registration' => 'Event Registration',
        'product_showcase' => 'Product Showcase',
        'pricing_table' => 'Pricing Table',
        'countdown_timer' => 'Countdown Timer',
    ],

    // Preview & display
    'preview_mode' => 'Preview Mode - This is a preview of your landing page',
    'live_preview_mode' => 'Live Preview Mode - Changes are not saved',
    'coming_soon' => 'COMING SOON!',
    'no_sections' => 'No sections found in preview data.',
    'invalid_section' => 'Invalid section format',
    'missing_type' => "Missing 'type' in section data",

    // Validation messages
    'validation' => [
        'name_required' => 'Please enter your name.',
        'name_max' => 'Name is too long.',
        'phone_required' => 'Please enter your phone number.',
        'phone_max' => 'Phone number is too long.',
        'email_required' => 'Please enter your email.',
        'email_invalid' => 'Please enter a valid email address.',
        'email_max' => 'Email is too long.',
        'consent_required' => 'Please accept the terms and conditions.',
    ],

    // Notifications
    'notifications' => [
        'verification_email_subject' => 'Confirm your email address',
        'verification_email_greeting' => 'Hello!',
        'verification_email_line1' => 'Please click the button below to verify your email address.',
        'verification_email_action' => 'Verify Email Address',
        'verification_email_line2' => 'If you did not submit a form on our website, no further action is required.',
    ],

    // Actions
    'actions' => [
        'preview' => 'Preview',
        'edit' => 'Edit',
        'delete' => 'Delete',
        'create' => 'Create Landing Page',
    ],
];
