<?php

namespace VasilGerginski\FilamentLandingPages\Filament\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;

class CtaSectionBlock
{
    public static function make(): Block
    {
        return Block::make('cta_section')
            ->label(__('filament-landing-pages::landing-pages.blocks.cta_section'))
            ->icon('heroicon-o-megaphone')
            ->schema([
                BlockRegistry::richTextEditor('title')
                    ->label('Title')
                    ->default('Ready to <span class="text-[#1CE088]">get started</span>?'),

                Textarea::make('subtitle')
                    ->label('Subtitle'),

                Repeater::make('features')
                    ->label('Features/Benefits')
                    ->schema([
                        TextInput::make('feature')
                            ->label('Feature')
                            ->required(),
                    ])
                    ->defaultItems(4)
                    ->collapsible(),

                TextInput::make('buttonText')
                    ->label('Button Text')
                    ->default('Get Started'),

                TextInput::make('buttonLink')
                    ->label('Button Link')
                    ->default('/contact'),

                // Testimonial for social proof
                Textarea::make('testimonial.quote')
                    ->label('Testimonial Quote'),
                TextInput::make('testimonial.initials')
                    ->label('Testimonial Initials'),
                TextInput::make('testimonial.name')
                    ->label('Testimonial Name'),
                TextInput::make('testimonial.position')
                    ->label('Testimonial Position'),
            ]);
    }
}
