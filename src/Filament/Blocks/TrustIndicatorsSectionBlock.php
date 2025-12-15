<?php

namespace VasilGerginski\FilamentLandingPages\Filament\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class TrustIndicatorsSectionBlock
{
    public static function make(): Block
    {
        return Block::make('trust_indicators_section')
            ->label(__('filament-landing-pages::landing-pages.blocks.trust_indicators_section'))
            ->icon('heroicon-o-shield-check')
            ->schema([
                TextInput::make('title')
                    ->label('Title')
                    ->default('Trusted By'),

                Select::make('layout')
                    ->label('Layout')
                    ->options([
                        'logos' => 'Logo Grid',
                        'badges' => 'Trust Badges',
                        'stats' => 'Statistics',
                    ])
                    ->default('logos'),

                Repeater::make('indicators')
                    ->label('Trust Indicators')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Logo/Image')
                            ->image()
                            ->directory('landing-pages/trust'),
                        TextInput::make('name')
                            ->label('Name/Alt Text'),
                        TextInput::make('url')
                            ->label('Link URL'),
                    ])
                    ->collapsible(),
            ]);
    }
}
