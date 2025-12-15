<?php

namespace VasilGerginski\FilamentLandingPages\Templates;

class AwarenessTemplate extends AbstractTemplate
{
    public function getName(): string
    {
        return 'Brand Awareness';
    }

    public function getDescription(): string
    {
        return 'Template for brand awareness campaigns with focus on company story and values';
    }

    public function getSections(): array
    {
        return [
            [
                'type' => 'hero_section',
                'data' => [
                    'backgroundImage' => 'https://images.unsplash.com/photo-1557804506-669a67965ba0',
                    'badge' => 'INTRODUCING',
                    'title' => 'Meet the company that is <span class="text-['.$this->getPrimaryColor().']">revolutionizing</span> the industry',
                    'subtitle' => 'Discover how we are changing the rules and setting new standards for quality and innovation',
                    'primaryButtonText' => 'Discover Our Story',
                    'primaryButtonLink' => '#about',
                    'secondaryButtonText' => 'View Our Services',
                    'secondaryButtonLink' => '#services',
                    'statistics' => [
                        ['value' => '20+', 'description' => 'years of innovation'],
                        ['value' => '1500+', 'description' => 'satisfied customers'],
                        ['value' => '15+', 'description' => 'industry awards'],
                    ],
                ],
            ],
            [
                'type' => 'solution_section',
                'data' => [
                    'badge' => 'OUR APPROACH',
                    'title' => 'What makes us different',
                    'subtitle' => 'Our unique approach combines cutting-edge technology with exceptional customer service.',
                    'process' => [
                        ['step' => 1, 'title' => 'Innovation First', 'description' => 'We continuously push the boundaries of what is possible.'],
                        ['step' => 2, 'title' => 'Quality Obsessed', 'description' => 'We never compromise on quality, ensuring results exceed expectations.'],
                        ['step' => 3, 'title' => 'Customer Focus', 'description' => 'Everything we do puts customer needs as the top priority.'],
                        ['step' => 4, 'title' => 'Sustainable Growth', 'description' => 'We are committed to reducing environmental impact at every stage.'],
                    ],
                    'benefits' => [
                        ['benefit' => 'Industry-leading innovations'],
                        ['benefit' => 'High service quality'],
                        ['benefit' => 'Exceptional customer service'],
                        ['benefit' => 'Sustainable business practices'],
                    ],
                ],
            ],
            [
                'type' => 'testimonials_section',
                'data' => [
                    'badge' => 'TESTIMONIALS',
                    'title' => 'What customers say',
                    'subtitle' => 'Hear from those who have experienced the difference our solutions make.',
                    'testimonials' => [
                        ['quote' => 'What sets them apart is their genuine commitment to innovation.', 'initials' => 'MD', 'name' => 'Martin Davis', 'position' => 'Industry Expert'],
                        ['quote' => 'Their focus on sustainable practices makes a difference.', 'initials' => 'YT', 'name' => 'Yolanda Torres', 'position' => 'Long-time Customer'],
                    ],
                ],
            ],
            [
                'type' => 'cta_section',
                'data' => [
                    'title' => 'Join our <span class="text-['.$this->getPrimaryColor().']">community</span>',
                    'subtitle' => 'Stay up to date with our latest products, innovations, and initiatives.',
                    'features' => [
                        ['feature' => 'Exclusive early access to new products'],
                        ['feature' => 'Behind-the-scenes insights'],
                        ['feature' => 'Special offers and promotions'],
                        ['feature' => 'Invites to exclusive events'],
                    ],
                    'buttonText' => 'Subscribe to Our Newsletter',
                    'buttonLink' => '/subscribe',
                    'testimonial' => [
                        'quote' => 'Being part of this community connected me with like-minded people.',
                        'initials' => 'EH',
                        'name' => 'Elena Harris',
                        'position' => 'Community Member',
                    ],
                ],
            ],
        ];
    }
}
