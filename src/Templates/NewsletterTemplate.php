<?php

namespace VasilGerginski\FilamentLandingPages\Templates;

class NewsletterTemplate extends AbstractTemplate
{
    public function getName(): string
    {
        return 'Newsletter';
    }

    public function getDescription(): string
    {
        return 'Template for newsletter signup pages with benefits and testimonials';
    }

    public function getSections(): array
    {
        return [
            [
                'type' => 'hero_section',
                'data' => [
                    'backgroundImage' => 'https://images.unsplash.com/photo-1484480974693-6ca0a78fb36b',
                    'badge' => 'EXCLUSIVE NEWSLETTER',
                    'title' => 'Stay <span class="text-['.$this->getPrimaryColor().']">informed</span> with our expert insights',
                    'subtitle' => 'Join our community and receive the latest trends, tips, and analyses directly to your inbox',
                    'primaryButtonText' => 'Subscribe Now',
                    'primaryButtonLink' => '#subscribe',
                    'secondaryButtonText' => 'View Sample',
                    'secondaryButtonLink' => '#sample',
                    'statistics' => [
                        ['value' => '15k+', 'description' => 'subscribers and growing'],
                        ['value' => 'Weekly', 'description' => 'curated content delivery'],
                        ['value' => '100%', 'description' => 'spam-free guarantee'],
                    ],
                ],
            ],
            [
                'type' => 'solution_section',
                'data' => [
                    'badge' => 'BENEFITS',
                    'title' => 'Why subscribe to our newsletter',
                    'subtitle' => 'Our carefully curated content is designed to keep you ahead in your field.',
                    'process' => [
                        ['step' => 1, 'title' => 'Expert Analyses', 'description' => 'Get analyses and commentary from industry leaders.'],
                        ['step' => 2, 'title' => 'Latest Trends', 'description' => 'Stay current with the latest developments and patterns.'],
                        ['step' => 3, 'title' => 'Practical Tips', 'description' => 'Receive actionable advice you can implement immediately.'],
                        ['step' => 4, 'title' => 'Exclusive Content', 'description' => 'Access resources and tools not available elsewhere.'],
                    ],
                    'benefits' => [
                        ['benefit' => 'Curated content tailored to your interests'],
                        ['benefit' => 'Time-saving overview of important information'],
                        ['benefit' => 'Early access to new resources and tools'],
                        ['benefit' => 'Exclusive offers and discounts'],
                    ],
                ],
            ],
            [
                'type' => 'newsletter_signup',
                'data' => [
                    'title' => 'Subscribe to our <span class="text-['.$this->getPrimaryColor().']">exclusive</span> newsletter',
                    'subtitle' => 'Get weekly analyses and resources directly to your inbox',
                    'emailLabel' => 'Email Address',
                    'emailPlaceholder' => 'Enter your email address',
                    'includeNameField' => true,
                    'nameLabel' => 'Your Name',
                    'namePlaceholder' => 'Enter your name',
                    'layout' => 'centered',
                    'primaryColor' => $this->getPrimaryColor(),
                    'benefits' => [
                        ['benefit' => 'Expert analyses from leading specialists'],
                        ['benefit' => 'Exclusive resources and tools'],
                        ['benefit' => 'Early access to new materials'],
                    ],
                    'buttonText' => 'Subscribe Now',
                    'privacyText' => 'By subscribing you agree to our Privacy Policy and Terms of Service',
                    'includeConsent' => true,
                    'consentText' => 'I agree to receive marketing communications',
                    'showFrequency' => true,
                    'frequencyText' => 'We send newsletters once a week. No spam.',
                ],
            ],
            [
                'type' => 'cta_section',
                'data' => [
                    'title' => 'Join our <span class="text-['.$this->getPrimaryColor().']">community</span> today',
                    'subtitle' => 'Subscribe now to start receiving valuable insights and stay current.',
                    'features' => [
                        ['feature' => 'Free subscription with useful content'],
                        ['feature' => 'Easy to unsubscribe at any time'],
                        ['feature' => 'Your privacy is protected'],
                        ['feature' => 'Customize your preferences'],
                    ],
                    'buttonText' => 'Subscribe Now',
                    'buttonLink' => '/subscribe',
                    'testimonial' => [
                        'quote' => 'Subscribing to this newsletter was one of the best professional decisions I made.',
                        'initials' => 'PM',
                        'name' => 'Peter Miller',
                        'position' => 'Long-time Subscriber',
                    ],
                ],
            ],
        ];
    }
}
