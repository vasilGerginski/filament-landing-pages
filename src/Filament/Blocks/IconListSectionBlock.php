<?php

namespace VasilGerginski\FilamentLandingPages\Filament\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;

class IconListSectionBlock
{
    public static function make(): Block
    {
        return Block::make('icon_list_section')
            ->label(__('filament-landing-pages::landing-pages.blocks.icon_list_section'))
            ->icon('heroicon-o-list-bullet')
            ->schema([
                TextInput::make('badge')
                    ->label('Badge Text'),

                TextInput::make('title')
                    ->label('Title'),

                Textarea::make('subtitle')
                    ->label('Subtitle'),

                Select::make('layout')
                    ->label('Layout')
                    ->options([
                        'grid' => 'Grid',
                        'list' => 'List',
                        'cards' => 'Cards',
                    ])
                    ->default('grid'),

                Repeater::make('items')
                    ->label('Items')
                    ->schema([
                        TextInput::make('icon')
                            ->label('Icon (Heroicon name)')
                            ->default('heroicon-o-check-circle'),
                        TextInput::make('title')
                            ->label('Title')
                            ->required(),
                        Textarea::make('description')
                            ->label('Description'),
                    ])
                    ->collapsible(),
            ]);
    }
}
