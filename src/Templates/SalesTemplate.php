<?php

namespace VasilGerginski\FilamentLandingPages\Templates;

class SalesTemplate extends AbstractTemplate
{
    public function getName(): string
    {
        return 'Sales';
    }

    public function getDescription(): string
    {
        return 'Template optimized for sales conversions with product showcase and pricing';
    }

    public function getSections(): array
    {
        return [
            [
                'type' => 'hero_section',
                'data' => [
                    'backgroundImage' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f',
                    'badge' => 'EXCLUSIVE OFFER',
                    'title' => 'Increase your <span class="text-['.$this->getPrimaryColor().']">revenue</span> with our premium solution',
                    'subtitle' => 'The all-in-one solution designed to help businesses maximize sales and optimize conversion rates',
                    'primaryButtonText' => 'Buy Now',
                    'primaryButtonLink' => '#pricing',
                    'secondaryButtonText' => 'Learn More',
                    'secondaryButtonLink' => '#features',
                    'statistics' => [
                        ['value' => '37%', 'description' => 'average increase in sales'],
                        ['value' => '14d', 'description' => 'average time to see results'],
                        ['value' => '24/7', 'description' => 'customer support available'],
                    ],
                ],
            ],
            [
                'type' => 'solution_section',
                'data' => [
                    'badge' => 'FEATURES',
                    'title' => 'Everything you need to boost sales',
                    'subtitle' => 'Our comprehensive solution includes all the tools you need to increase conversions.',
                    'process' => [
                        ['step' => 1, 'title' => 'Advanced Analytics', 'description' => 'Gain insights into customer behavior and optimize your sales funnel.'],
                        ['step' => 2, 'title' => 'Personalization Engine', 'description' => 'Deliver customized experiences that drive conversions.'],
                        ['step' => 3, 'title' => 'Conversion Optimization', 'description' => 'Continuously test and improve your sales process.'],
                        ['step' => 4, 'title' => 'Sales Automation', 'description' => 'Streamline your sales process with automated workflows.'],
                    ],
                    'benefits' => [
                        ['benefit' => 'Increase average order value'],
                        ['benefit' => 'Reduce cart abandonment'],
                        ['benefit' => 'Improve customer lifetime value'],
                        ['benefit' => 'Optimize pricing strategies'],
                    ],
                ],
            ],
            [
                'type' => 'testimonials_section',
                'data' => [
                    'badge' => 'TESTIMONIALS',
                    'title' => 'What our customers say',
                    'subtitle' => 'See how we helped others achieve superior results.',
                    'testimonials' => [
                        ['quote' => 'After implementing this solution, our sales increased by 42% in one year.', 'initials' => 'JD', 'name' => 'John Doe', 'position' => 'CEO'],
                        ['quote' => 'The analytics tools transformed our approach to sales optimization.', 'initials' => 'JS', 'name' => 'Jane Smith', 'position' => 'Sales Director'],
                    ],
                ],
            ],
            [
                'type' => 'cta_section',
                'data' => [
                    'title' => 'Ready to <span class="text-['.$this->getPrimaryColor().']">boost</span> your sales?',
                    'subtitle' => 'Join thousands who have transformed their sales performance.',
                    'features' => [
                        ['feature' => '30-day money-back guarantee'],
                        ['feature' => 'Free onboarding and setup assistance'],
                        ['feature' => 'Flexible pricing plans'],
                        ['feature' => 'No long-term commitments'],
                    ],
                    'buttonText' => 'Start Today',
                    'buttonLink' => '/signup',
                    'testimonial' => [
                        'quote' => 'Getting started was the best decision we made last year.',
                        'initials' => 'TD',
                        'name' => 'Tom Davis',
                        'position' => 'CEO',
                    ],
                ],
            ],
        ];
    }
}
