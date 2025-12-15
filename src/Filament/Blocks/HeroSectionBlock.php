<?php

namespace VasilGerginski\FilamentLandingPages\Filament\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class HeroSectionBlock
{
    public static function make(): Block
    {
        return Block::make('hero_section')
            ->label(__('filament-landing-pages::landing-pages.blocks.hero_section'))
            ->icon('heroicon-o-photo')
            ->schema([
                FileUpload::make('backgroundImage')
                    ->label('Background Image')
                    ->image()
                    ->directory(config('filament-landing-pages.upload_directories.hero', 'landing-pages/hero'))
                    ->default('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab'),

                TextInput::make('badge')
                    ->label('Badge Text')
                    ->default('EXPERT CONSULTING'),

                BlockRegistry::richTextEditor('title')
                    ->label('Title')
                    ->default('Discover the power of <span class="text-[#1CE088]">expert consulting</span>'),

                BlockRegistry::richTextEditor('subtitle')
                    ->label('Subtitle')
                    ->default('Expert advice and strategies for maximum returns'),

                TextInput::make('primaryButtonText')
                    ->label('Primary Button Text')
                    ->default('Learn More'),

                TextInput::make('primaryButtonLink')
                    ->label('Primary Button Link')
                    ->default('#learn-more'),

                TextInput::make('secondaryButtonText')
                    ->label('Secondary Button Text')
                    ->default('Contact Us'),

                TextInput::make('secondaryButtonLink')
                    ->label('Secondary Button Link')
                    ->default('#contact'),

                Repeater::make('statistics')
                    ->label('Statistics')
                    ->schema([
                        TextInput::make('value')->label('Value')->required(),
                        TextInput::make('description')->label('Description')->required(),
                    ])
                    ->defaultItems(3)
                    ->columns(2)
                    ->collapsible(),
            ]);
    }
}
