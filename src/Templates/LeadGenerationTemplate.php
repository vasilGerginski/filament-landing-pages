<?php

namespace VasilGerginski\FilamentLandingPages\Templates;

class LeadGenerationTemplate extends AbstractTemplate
{
    public function getName(): string
    {
        return 'Lead Generation';
    }

    public function getDescription(): string
    {
        return 'Template optimized for capturing leads with hero, challenges, solution, and CTA sections';
    }

    public function getSections(): array
    {
        return [
            [
                'type' => 'hero_section',
                'data' => [
                    'backgroundImage' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab',
                    'badge' => 'LEAD GENERATION',
                    'title' => 'Attract <span class="text-['.$this->getPrimaryColor().']">quality leads</span> with our solutions',
                    'subtitle' => 'Convert visitors into qualified customers with our expertly crafted landing page templates',
                    'primaryButtonText' => 'Get Started',
                    'primaryButtonLink' => '#learn-more',
                    'secondaryButtonText' => 'Contact Us',
                    'secondaryButtonLink' => '#contact',
                    'statistics' => [
                        ['value' => '85%', 'description' => 'increase in qualified leads'],
                        ['value' => '10+', 'description' => 'years of lead generation expertise'],
                        ['value' => '3x', 'description' => 'higher conversions than average'],
                    ],
                ],
            ],
            [
                'type' => 'challenges_section',
                'data' => [
                    'badge' => 'CHALLENGES',
                    'title' => 'What challenges are you facing?',
                    'subtitle' => 'Most businesses struggle with the same lead generation problems. Do you recognize any of these situations?',
                    'challenges' => [
                        [
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />',
                            'title' => 'Low Conversion Rates',
                            'description' => 'Are you attracting traffic but struggling to convert visitors into customers?',
                        ],
                        [
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6" />',
                            'title' => 'Poor Lead Quality',
                            'description' => 'Are you generating leads that rarely convert into customers?',
                        ],
                        [
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />',
                            'title' => 'High Acquisition Costs',
                            'description' => 'Is the cost per lead too high? Are you spending too much on marketing?',
                        ],
                    ],
                ],
            ],
            [
                'type' => 'solution_section',
                'data' => [
                    'badge' => 'SOLUTION',
                    'title' => 'Introducing our lead generation system',
                    'subtitle' => 'Our proven approach is built on years of digital marketing and conversion optimization experience.',
                    'process' => [
                        ['step' => 1, 'title' => 'Attract the Right Audience', 'description' => 'We help you identify and target your ideal customers through precise audience targeting.'],
                        ['step' => 2, 'title' => 'Engage with Valuable Content', 'description' => 'Capture attention with content that addresses your visitors\' specific needs and pain points.'],
                        ['step' => 3, 'title' => 'Convert with Strong CTAs', 'description' => 'Turn interest into action with strategically placed, persuasive calls to action.'],
                        ['step' => 4, 'title' => 'Nurture Leads to Sales', 'description' => 'Build relationships through targeted follow-up that guides leads toward conversion.'],
                    ],
                    'benefits' => [
                        ['benefit' => 'Higher quality leads that convert to customers'],
                        ['benefit' => 'Lower cost per acquisition'],
                        ['benefit' => 'Improved marketing ROI'],
                        ['benefit' => 'Scalable system that grows with your business'],
                    ],
                ],
            ],
            [
                'type' => 'cta_section',
                'data' => [
                    'title' => 'Ready to <span class="text-['.$this->getPrimaryColor().']">transform</span> your lead generation?',
                    'subtitle' => 'Take the first step toward higher quality leads and better conversions. Sign up for a free consultation.',
                    'features' => [
                        ['feature' => '30-minute free strategy session'],
                        ['feature' => 'Personalized assessment of your current approach'],
                        ['feature' => 'No obligations or sales pressure'],
                        ['feature' => 'Flexible meeting options'],
                    ],
                    'buttonText' => 'Book a Free Consultation',
                    'buttonLink' => '/contact',
                    'testimonial' => [
                        'quote' => 'The free consultation alone provided more practical guidance than months of working with our previous agency.',
                        'initials' => 'JD',
                        'name' => 'John Doe',
                        'position' => 'Marketing Director',
                    ],
                ],
            ],
        ];
    }
}
