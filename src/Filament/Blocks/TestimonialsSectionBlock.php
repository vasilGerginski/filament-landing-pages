<?php

namespace VasilGerginski\FilamentLandingPages\Filament\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;

class TestimonialsSectionBlock
{
    public static function make(): Block
    {
        return Block::make('testimonials_section')
            ->label(__('filament-landing-pages::landing-pages.blocks.testimonials_section'))
            ->icon('heroicon-o-chat-bubble-left-right')
            ->schema([
                TextInput::make('badge')
                    ->label('Badge Text')
                    ->default('TESTIMONIALS'),

                TextInput::make('title')
                    ->label('Title')
                    ->default('What Our Customers Say'),

                Textarea::make('subtitle')
                    ->label('Subtitle'),

                Repeater::make('testimonials')
                    ->label('Testimonials')
                    ->schema([
                        Textarea::make('quote')
                            ->label('Quote')
                            ->required(),
                        TextInput::make('initials')
                            ->label('Initials')
                            ->maxLength(3),
                        TextInput::make('name')
                            ->label('Name')
                            ->required(),
                        TextInput::make('position')
                            ->label('Position/Company'),
                    ])
                    ->defaultItems(3)
                    ->collapsible(),
            ]);
    }
}
