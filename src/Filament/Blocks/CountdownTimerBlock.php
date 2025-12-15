<?php

namespace VasilGerginski\FilamentLandingPages\Filament\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;

class CountdownTimerBlock
{
    public static function make(): Block
    {
        return Block::make('countdown_timer')
            ->label(__('filament-landing-pages::landing-pages.blocks.countdown_timer'))
            ->icon('heroicon-o-clock')
            ->schema([
                BlockRegistry::richTextEditor('title')
                    ->label('Section Title')
                    ->helperText('Main heading text. Can be left empty.'),

                BlockRegistry::richTextEditor('subtitle')
                    ->label('Section Subtitle')
                    ->helperText('Additional text below the title. Can be left empty.'),

                DateTimePicker::make('targetDate')
                    ->label('Target Date & Time')
                    ->helperText('The date and time to countdown to.')
                    ->required()
                    ->seconds(false)
                    ->default(now()->addDays(30)),

                // Visual Options
                Toggle::make('showLabels')
                    ->label('Show Time Unit Labels')
                    ->helperText('Show labels (Days, Hours, Minutes, Seconds) under each number.')
                    ->default(true),

                Toggle::make('showSeconds')
                    ->label('Show Seconds')
                    ->helperText('Display seconds in the countdown.')
                    ->default(true),

                Select::make('layout')
                    ->label('Layout')
                    ->options([
                        'horizontal' => 'Horizontal Grid',
                        'vertical' => 'Vertical Stack',
                    ])
                    ->helperText('Choose the layout for the countdown display.')
                    ->default('horizontal'),

                // Color Customization
                ColorPicker::make('primaryColor')
                    ->label('Primary Color')
                    ->helperText('Color for the countdown numbers.')
                    ->default('#1CE088'),

                ColorPicker::make('backgroundColor')
                    ->label('Background Color')
                    ->helperText('Background color for the section.')
                    ->default('#FFFFFF'),

                ColorPicker::make('textColor')
                    ->label('Text Color')
                    ->helperText('Color for the title and subtitle text.')
                    ->default('#0F0D1B'),

                // Completion Messages
                TextInput::make('completedMessage')
                    ->label('Completed Message')
                    ->helperText('Message to display when countdown reaches zero.')
                    ->default('The event has started!'),

                TextInput::make('completedSubtitle')
                    ->label('Completed Subtitle')
                    ->helperText('Subtitle to display when countdown reaches zero.')
                    ->default('Thank you for your interest.'),
            ]);
    }
}
