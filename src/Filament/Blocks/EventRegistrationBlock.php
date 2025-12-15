<?php

namespace VasilGerginski\FilamentLandingPages\Filament\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Toggle;

class EventRegistrationBlock
{
    public static function make(): Block
    {
        return Block::make('event_registration')
            ->label(__('filament-landing-pages::landing-pages.blocks.event_registration'))
            ->icon('heroicon-o-calendar')
            ->schema([
                BlockRegistry::richTextEditor('title')
                    ->label('Section Title')
                    ->helperText('Main heading text. Can be left empty.'),

                BlockRegistry::richTextEditor('subtitle')
                    ->label('Section Subtitle')
                    ->helperText('Supporting text describing the event registration. Can be left empty.'),

                // Event details
                Toggle::make('showEventDetails')
                    ->label('Show Event Details')
                    ->default(true),

                TextInput::make('eventName')
                    ->label('Event Name')
                    ->helperText('Name of the event.')
                    ->visible(fn (callable $get) => $get('showEventDetails')),

                DatePicker::make('eventDate')
                    ->label('Event Date')
                    ->visible(fn (callable $get) => $get('showEventDetails')),

                TimePicker::make('eventStartTime')
                    ->label('Start Time')
                    ->visible(fn (callable $get) => $get('showEventDetails')),

                TimePicker::make('eventEndTime')
                    ->label('End Time')
                    ->visible(fn (callable $get) => $get('showEventDetails')),

                TextInput::make('eventLocation')
                    ->label('Event Location')
                    ->visible(fn (callable $get) => $get('showEventDetails')),

                TextInput::make('eventPrice')
                    ->label('Event Price')
                    ->placeholder('$99')
                    ->visible(fn (callable $get) => $get('showEventDetails')),

                TextInput::make('earlyBirdPrice')
                    ->label('Early Bird Price')
                    ->placeholder('$79')
                    ->visible(fn (callable $get) => $get('showEventDetails')),

                DatePicker::make('earlyBirdDeadline')
                    ->label('Early Bird Deadline')
                    ->visible(fn (callable $get) => $get('showEventDetails')),

                // Form field configuration
                Toggle::make('collectName')
                    ->label('Collect Name')
                    ->default(true),

                Toggle::make('collectEmail')
                    ->label('Collect Email')
                    ->default(true),

                Toggle::make('collectPhone')
                    ->label('Collect Phone Number')
                    ->default(false),

                Toggle::make('collectCompany')
                    ->label('Collect Company Name')
                    ->default(false),

                Toggle::make('collectJobTitle')
                    ->label('Collect Job Title')
                    ->default(false),

                Toggle::make('collectDietaryRestrictions')
                    ->label('Collect Dietary Restrictions')
                    ->default(false),

                Toggle::make('collectSpecialRequirements')
                    ->label('Collect Special Requirements')
                    ->default(false),

                // Visual elements
                FileUpload::make('eventImage')
                    ->label('Event Image')
                    ->image()
                    ->directory('landing-pages/event-images'),

                Select::make('layout')
                    ->label('Section Layout')
                    ->options([
                        'standard' => 'Standard (Form on Left)',
                        'reversed' => 'Reversed (Form on Right)',
                        'centered' => 'Centered',
                        'fullwidth' => 'Full Width',
                    ])
                    ->default('standard')
                    ->helperText('Choose the layout for the registration form.'),

                ColorPicker::make('primaryColor')
                    ->label('Primary Color')
                    ->helperText('Primary color for the form elements.'),

                // Event features
                Repeater::make('eventFeatures')
                    ->label('Event Features/Highlights')
                    ->schema([
                        TextInput::make('feature')
                            ->label('Feature')
                            ->required(),
                    ])
                    ->defaultItems(0)
                    ->collapsible()
                    ->itemLabel(fn (array $state): ?string => $state['feature'] ?? null)
                    ->helperText('List of features included with event registration.'),

                // Schedule outline
                Toggle::make('showScheduleOutline')
                    ->label('Show Schedule Outline'),

                Repeater::make('scheduleItems')
                    ->label('Schedule Items')
                    ->schema([
                        TextInput::make('time')
                            ->label('Time')
                            ->required(),
                        TextInput::make('activity')
                            ->label('Activity')
                            ->required(),
                    ])
                    ->visible(fn (callable $get) => $get('showScheduleOutline'))
                    ->defaultItems(0)
                    ->collapsible()
                    ->itemLabel(fn (array $state): ?string => ($state['time'] ?? '').': '.($state['activity'] ?? ''))
                    ->helperText('Event schedule items.'),

                // Button settings
                TextInput::make('buttonText')
                    ->label('Button Text')
                    ->default('Register Now')
                    ->helperText('Text for the registration button.'),

                // Privacy and consent
                Toggle::make('showPrivacyConsent')
                    ->label('Show Privacy Consent'),

                TextInput::make('privacyText')
                    ->label('Privacy Text')
                    ->default('Your information will be used only for event-related communication.')
                    ->visible(fn (callable $get) => $get('showPrivacyConsent')),

                // Additional options
                Toggle::make('showCountdown')
                    ->label('Show Registration Countdown'),

                DatePicker::make('registrationDeadline')
                    ->label('Registration Deadline')
                    ->visible(fn (callable $get) => $get('showCountdown')),

                Toggle::make('showAvailableSpots')
                    ->label('Show Available Spots'),

                TextInput::make('totalSpots')
                    ->label('Total Available Spots')
                    ->numeric()
                    ->visible(fn (callable $get) => $get('showAvailableSpots')),
            ]);
    }
}
