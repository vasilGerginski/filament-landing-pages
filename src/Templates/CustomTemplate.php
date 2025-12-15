<?php

namespace VasilGerginski\FilamentLandingPages\Templates;

class CustomTemplate extends AbstractTemplate
{
    public function getName(): string
    {
        return 'Custom';
    }

    public function getDescription(): string
    {
        return 'A blank template with minimal sections for custom landing pages';
    }

    public function getSections(): array
    {
        return [
            [
                'type' => 'hero_section',
                'data' => [
                    'backgroundImage' => 'https://images.unsplash.com/photo-1497215842964-222b430dc094',
                    'badge' => 'CUSTOM SOLUTION',
                    'title' => 'Build your <span class="text-['.$this->getPrimaryColor().']">ideal</span> landing page',
                    'subtitle' => 'Start with this blank template and customize it according to your specific goals and needs',
                    'primaryButtonText' => 'Primary Action',
                    'primaryButtonLink' => '#primary',
                    'secondaryButtonText' => 'Secondary Action',
                    'secondaryButtonLink' => '#secondary',
                    'statistics' => [
                        ['value' => 'Stat 1', 'description' => 'Description of the first statistic'],
                        ['value' => 'Stat 2', 'description' => 'Description of the second statistic'],
                        ['value' => 'Stat 3', 'description' => 'Description of the third statistic'],
                    ],
                ],
            ],
            [
                'type' => 'solution_section',
                'data' => [
                    'badge' => 'SECTION TITLE',
                    'title' => 'The main section title goes here',
                    'subtitle' => 'Add a brief explanation or overview of what this section covers.',
                    'process' => [
                        ['step' => 1, 'title' => 'First Step', 'description' => 'Description of the first step or point.'],
                        ['step' => 2, 'title' => 'Second Step', 'description' => 'Description of the second step or point.'],
                        ['step' => 3, 'title' => 'Third Step', 'description' => 'Description of the third step or point.'],
                        ['step' => 4, 'title' => 'Fourth Step', 'description' => 'Description of the fourth step or point.'],
                    ],
                    'benefits' => [
                        ['benefit' => 'First benefit or feature'],
                        ['benefit' => 'Second benefit or feature'],
                        ['benefit' => 'Third benefit or feature'],
                        ['benefit' => 'Fourth benefit or feature'],
                    ],
                ],
            ],
            [
                'type' => 'cta_section',
                'data' => [
                    'title' => 'Call to <span class="text-['.$this->getPrimaryColor().']">action</span>',
                    'subtitle' => 'Add a compelling reason why the visitor should take the desired action now.',
                    'features' => [
                        ['feature' => 'Main benefit of taking action'],
                        ['feature' => 'Another reason to act now'],
                        ['feature' => 'Additional incentive'],
                        ['feature' => 'Final compelling point'],
                    ],
                    'buttonText' => 'Action Button Text',
                    'buttonLink' => '/action-url',
                    'testimonial' => [
                        'quote' => 'Add a testimonial that supports your call to action and builds trust.',
                        'initials' => 'AB',
                        'name' => 'Full Name',
                        'position' => 'Position or Company',
                    ],
                ],
            ],
        ];
    }
}
