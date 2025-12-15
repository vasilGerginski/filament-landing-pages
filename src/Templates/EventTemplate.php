<?php

namespace VasilGerginski\FilamentLandingPages\Templates;

class EventTemplate extends AbstractTemplate
{
    public function getName(): string
    {
        return 'Event';
    }

    public function getDescription(): string
    {
        return 'Template for event registration pages with countdown and schedule';
    }

    public function getSections(): array
    {
        return [
            [
                'type' => 'hero_section',
                'data' => [
                    'backgroundImage' => 'https://images.unsplash.com/photo-1540575467063-178a50c2df87',
                    'badge' => 'EXCLUSIVE EVENT',
                    'title' => 'Join us for an <span class="text-['.$this->getPrimaryColor().']">unforgettable</span> experience',
                    'subtitle' => 'A unique opportunity to connect, learn, and grow with industry leaders',
                    'primaryButtonText' => 'Register Now',
                    'primaryButtonLink' => '#registration',
                    'secondaryButtonText' => 'View Schedule',
                    'secondaryButtonLink' => '#schedule',
                    'statistics' => [
                        ['value' => '25+', 'description' => 'expert speakers'],
                        ['value' => '10+', 'description' => 'interactive workshops'],
                        ['value' => '500+', 'description' => 'expected attendees'],
                    ],
                ],
            ],
            [
                'type' => 'solution_section',
                'data' => [
                    'badge' => 'HIGHLIGHTS',
                    'title' => 'What to expect from our event',
                    'subtitle' => 'An immersive experience designed to inspire, educate, and connect.',
                    'process' => [
                        ['step' => 1, 'title' => 'Inspiring Keynotes', 'description' => 'Hear from industry visionaries who are shaping the future.'],
                        ['step' => 2, 'title' => 'Hands-on Workshops', 'description' => 'Develop new skills through interactive, practical sessions.'],
                        ['step' => 3, 'title' => 'Networking Opportunities', 'description' => 'Connect with peers and industry leaders.'],
                        ['step' => 4, 'title' => 'Exclusive Content', 'description' => 'Access insights and information not available elsewhere.'],
                    ],
                    'benefits' => [
                        ['benefit' => 'Learn from industry leaders and experts'],
                        ['benefit' => 'Network with like-minded professionals'],
                        ['benefit' => 'Discover latest trends and innovations'],
                        ['benefit' => 'Gain practical skills and knowledge'],
                    ],
                ],
            ],
            [
                'type' => 'event_registration',
                'data' => [
                    'title' => 'Register for our <span class="text-['.$this->getPrimaryColor().']">exclusive event</span>',
                    'subtitle' => 'Secure your spot for this exclusive event. Spaces are limited!',
                    'showEventDetails' => true,
                    'eventName' => 'Annual Conference 2025',
                    'eventDate' => '2025-06-15',
                    'eventStartTime' => '09:00',
                    'eventEndTime' => '17:00',
                    'eventLocation' => 'Grand Hotel, Conference Hall',
                    'eventPrice' => '$299',
                    'earlyBirdPrice' => '$199',
                    'earlyBirdDeadline' => '2025-05-15',
                    'collectName' => true,
                    'collectEmail' => true,
                    'collectPhone' => true,
                    'collectCompany' => true,
                    'collectJobTitle' => true,
                    'layout' => 'standard',
                    'primaryColor' => $this->getPrimaryColor(),
                    'buttonText' => 'Register Now',
                    'showCountdown' => true,
                ],
            ],
            [
                'type' => 'cta_section',
                'data' => [
                    'title' => 'Secure your <span class="text-['.$this->getPrimaryColor().']">spot</span> today',
                    'subtitle' => 'Limited spaces available. Register now to avoid disappointment.',
                    'features' => [
                        ['feature' => 'Early bird discount available'],
                        ['feature' => 'Group discounts available'],
                        ['feature' => 'Full access to all sessions'],
                        ['feature' => 'Recordings and materials included'],
                    ],
                    'buttonText' => 'Register Now',
                    'buttonLink' => '/registration',
                    'testimonial' => [
                        'quote' => 'Registering for this event was one of the best professional decisions I made.',
                        'initials' => 'MS',
                        'name' => 'Maria Smith',
                        'position' => 'Previous Attendee',
                    ],
                ],
            ],
        ];
    }
}
