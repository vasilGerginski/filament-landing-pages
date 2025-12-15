<?php

namespace VasilGerginski\FilamentLandingPages\Filament\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;

class SolutionSectionBlock
{
    public static function make(): Block
    {
        return Block::make('solution_section')
            ->label(__('filament-landing-pages::landing-pages.blocks.solution_section'))
            ->icon('heroicon-o-light-bulb')
            ->schema([
                TextInput::make('badge')
                    ->label('Badge Text'),

                TextInput::make('title')
                    ->label('Title'),

                Textarea::make('subtitle')
                    ->label('Subtitle'),

                Repeater::make('process')
                    ->label('Process Steps')
                    ->schema([
                        TextInput::make('step')
                            ->label('Step Number')
                            ->numeric()
                            ->required(),
                        TextInput::make('title')
                            ->label('Title')
                            ->required(),
                        Textarea::make('description')
                            ->label('Description'),
                    ])
                    ->defaultItems(4)
                    ->collapsible(),

                Repeater::make('benefits')
                    ->label('Benefits')
                    ->schema([
                        TextInput::make('benefit')
                            ->label('Benefit')
                            ->required(),
                    ])
                    ->defaultItems(4)
                    ->collapsible(),
            ]);
    }
}
