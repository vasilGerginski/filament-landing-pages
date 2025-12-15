<?php

namespace VasilGerginski\FilamentLandingPages\Templates;

class DemoTemplate extends AbstractTemplate
{
    public function getName(): string
    {
        return 'Demo Request';
    }

    public function getDescription(): string
    {
        return 'Template for product demo request pages with challenges and solutions';
    }

    public function getSections(): array
    {
        return [
            [
                'type' => 'hero_section',
                'data' => [
                    'backgroundImage' => 'https://images.unsplash.com/photo-1551434678-e076c223a692',
                    'badge' => 'SERVICE DEMO',
                    'title' => 'Experience the <span class="text-['.$this->getPrimaryColor().']">future</span> of our industry',
                    'subtitle' => 'Request a personalized demo and see how our solutions can transform your business',
                    'primaryButtonText' => 'Request Demo',
                    'primaryButtonLink' => '#demo-form',
                    'secondaryButtonText' => 'Watch Video',
                    'secondaryButtonLink' => '#video',
                    'statistics' => [
                        ['value' => '98%', 'description' => 'of clients gain valuable insights'],
                        ['value' => '30min', 'description' => 'average demo duration'],
                        ['value' => '24h', 'description' => 'response time to requests'],
                    ],
                ],
            ],
            [
                'type' => 'challenges_section',
                'data' => [
                    'badge' => 'PAIN POINTS',
                    'title' => 'Common challenges our solutions address',
                    'subtitle' => 'Is your business struggling with any of these problems?',
                    'challenges' => [
                        [
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />',
                            'title' => 'Inefficient Processes',
                            'description' => 'Are your processes generating low returns? Do you lack the right tools?',
                        ],
                        [
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6" />',
                            'title' => 'Fragmented Information',
                            'description' => 'Is important information scattered across different systems?',
                        ],
                        [
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />',
                            'title' => 'Scaling Problems',
                            'description' => 'Is your current approach unable to adapt to business growth?',
                        ],
                    ],
                ],
            ],
            [
                'type' => 'solution_section',
                'data' => [
                    'badge' => 'OUR SOLUTION',
                    'title' => 'How our services solve these challenges',
                    'subtitle' => 'Our comprehensive platform is designed to address your specific problems.',
                    'process' => [
                        ['step' => 1, 'title' => 'Personalized Strategies', 'description' => 'We create individual strategies based on your specific goals.'],
                        ['step' => 2, 'title' => 'Centralized Information', 'description' => 'We eliminate fragmentation through an integrated system.'],
                        ['step' => 3, 'title' => 'Advanced Analytics', 'description' => 'Get real-time information with reports and dashboards.'],
                        ['step' => 4, 'title' => 'Scalable Architecture', 'description' => 'Our solution grows with your business.'],
                    ],
                    'benefits' => [
                        ['benefit' => 'Improve efficiency by up to 35%'],
                        ['benefit' => 'Implementation in weeks, not months'],
                        ['benefit' => 'Intuitive interface requiring minimal training'],
                        ['benefit' => '24/7 expert support'],
                    ],
                ],
            ],
            [
                'type' => 'newsletter_signup',
                'data' => [
                    'title' => 'Request a <span class="text-['.$this->getPrimaryColor().']">personalized</span> demo',
                    'subtitle' => 'Sign up for a free demo tailored to your specific needs and challenges',
                    'emailLabel' => 'Email Address',
                    'emailPlaceholder' => 'Enter your email address',
                    'includeNameField' => true,
                    'nameLabel' => 'Your Name',
                    'namePlaceholder' => 'Enter your name',
                    'includePhoneField' => true,
                    'phoneLabel' => 'Phone Number',
                    'phonePlaceholder' => 'Enter your phone number',
                    'layout' => 'split',
                    'primaryColor' => $this->getPrimaryColor(),
                    'benefits' => [
                        ['benefit' => 'Personalized demo for your needs'],
                        ['benefit' => 'Interactive session with experts'],
                        ['benefit' => 'Opportunity to ask specific questions'],
                    ],
                    'buttonText' => 'Request Demo Now',
                    'privacyText' => 'By submitting you agree to our Privacy Policy and Terms of Service',
                    'showResponseTime' => true,
                    'responseTimeText' => 'We will contact you within 24 hours',
                ],
            ],
        ];
    }
}
