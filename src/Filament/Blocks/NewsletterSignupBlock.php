<?php

namespace VasilGerginski\FilamentLandingPages\Filament\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;

class NewsletterSignupBlock
{
    public static function make(): Block
    {
        return Block::make('newsletter_signup')
            ->label(__('filament-landing-pages::landing-pages.blocks.newsletter_signup'))
            ->icon('heroicon-o-envelope-open')
            ->schema([
                BlockRegistry::richTextEditor('title')
                    ->label('Section Title')
                    ->helperText('Main heading text. You can use formatting to style parts of the text. Leave empty to hide.'),

                BlockRegistry::richTextEditor('subtitle')
                    ->label('Section Subtitle')
                    ->helperText('Convincing text about newsletter benefits. Leave empty to hide.'),

                // Form field customization
                TextInput::make('emailLabel')
                    ->label('Email Field Label')
                    ->helperText('Label for email field. Leave empty to hide the label.'),

                TextInput::make('emailPlaceholder')
                    ->label('Email Field Placeholder')
                    ->default('Enter your email')
                    ->helperText('Placeholder text for email field.'),

                Toggle::make('includeNameField')
                    ->label('Include Name Field'),

                TextInput::make('nameLabel')
                    ->label('Name Field Label')
                    ->default('Name')
                    ->visible(fn (callable $get) => $get('includeNameField')),

                TextInput::make('namePlaceholder')
                    ->label('Name Field Placeholder')
                    ->default('Your name')
                    ->visible(fn (callable $get) => $get('includeNameField')),

                Toggle::make('includePhoneField')
                    ->label('Include Phone Field'),

                TextInput::make('phoneLabel')
                    ->label('Phone Field Label')
                    ->default('Phone')
                    ->visible(fn (callable $get) => $get('includePhoneField')),

                TextInput::make('phonePlaceholder')
                    ->label('Phone Field Placeholder')
                    ->default('Your phone number')
                    ->visible(fn (callable $get) => $get('includePhoneField')),

                Toggle::make('includeMessageField')
                    ->label('Include Message Field'),

                TextInput::make('messageLabel')
                    ->label('Message Field Label')
                    ->default('Message')
                    ->visible(fn (callable $get) => $get('includeMessageField')),

                TextInput::make('messagePlaceholder')
                    ->label('Message Field Placeholder')
                    ->default('Your message')
                    ->visible(fn (callable $get) => $get('includeMessageField')),

                // Visual elements
                FileUpload::make('backgroundImage')
                    ->label('Background Image')
                    ->image()
                    ->directory('landing-pages/newsletter-backgrounds'),

                Select::make('layout')
                    ->label('Section Layout')
                    ->options([
                        'centered' => 'Centered',
                        'split' => 'Split (Image + Form)',
                        'fullwidth' => 'Full Width Banner',
                        'card' => 'Card Style',
                    ])
                    ->default('centered')
                    ->helperText('Select the layout style for the newsletter section.'),

                ColorPicker::make('primaryColor')
                    ->label('Primary Color')
                    ->helperText('Primary color for buttons and accents.'),

                // Content features
                Repeater::make('benefits')
                    ->label('Newsletter Benefits')
                    ->schema([
                        TextInput::make('benefit')
                            ->label('Benefit')
                            ->required(),
                    ])
                    ->defaultItems(0)
                    ->itemLabel(fn (array $state): ?string => $state['benefit'] ?? null)
                    ->collapsible()
                    ->helperText('Add benefits to display in the newsletter section.'),

                // Button settings
                TextInput::make('buttonText')
                    ->label('Button Text')
                    ->default('Subscribe')
                    ->helperText('Text for the subscribe button.'),

                TextInput::make('buttonLink')
                    ->label('Button Link (Optional)')
                    ->placeholder('/subscribe')
                    ->helperText('Custom URL for the button. Leave blank to use default subscription form handling.'),

                // Privacy text
                TextInput::make('privacyText')
                    ->label('Privacy Statement')
                    ->default('We respect your privacy.')
                    ->helperText('Privacy policy text shown below the form. Leave empty to hide.'),

                Toggle::make('includeConsent')
                    ->label('Include Explicit Consent Checkbox'),

                TextInput::make('consentText')
                    ->label('Consent Text')
                    ->default('I agree to receive email updates.')
                    ->visible(fn (callable $get) => $get('includeConsent')),

                Toggle::make('showFrequency')
                    ->label('Show Email Frequency'),

                TextInput::make('frequencyText')
                    ->label('Frequency Description')
                    ->default('We send emails once a week.')
                    ->visible(fn (callable $get) => $get('showFrequency')),

                Toggle::make('showResponseTime')
                    ->label('Show Response Time'),

                TextInput::make('responseTimeText')
                    ->label('Response Time Text')
                    ->default('We typically respond within 24 hours.')
                    ->visible(fn (callable $get) => $get('showResponseTime')),

                // Design Elements
                Toggle::make('showImage')
                    ->label('Show Decorative Image'),

                TextInput::make('imageUrl')
                    ->label('Image URL')
                    ->helperText('URL of the decorative image')
                    ->visible(fn (callable $get) => $get('showImage')),

                Toggle::make('addTopDivider')
                    ->label('Add Top Divider'),

                Toggle::make('addBottomDivider')
                    ->label('Add Bottom Divider'),
            ]);
    }
}
