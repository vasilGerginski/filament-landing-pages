<?php

namespace VasilGerginski\FilamentLandingPages\Filament\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;

class FaqSectionBlock
{
    public static function make(): Block
    {
        return Block::make('faq_section')
            ->label(__('filament-landing-pages::landing-pages.blocks.faq_section'))
            ->icon('heroicon-o-question-mark-circle')
            ->schema([
                TextInput::make('badge')
                    ->label('Badge Text')
                    ->default('FAQ'),

                TextInput::make('title')
                    ->label('Title')
                    ->default('Frequently Asked Questions'),

                Textarea::make('subtitle')
                    ->label('Subtitle'),

                Repeater::make('faqs')
                    ->label('FAQs')
                    ->schema([
                        TextInput::make('question')
                            ->label('Question')
                            ->required(),
                        Textarea::make('answer')
                            ->label('Answer')
                            ->required(),
                    ])
                    ->defaultItems(5)
                    ->collapsible(),
            ]);
    }
}
