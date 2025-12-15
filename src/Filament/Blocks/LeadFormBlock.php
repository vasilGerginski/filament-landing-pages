<?php

namespace VasilGerginski\FilamentLandingPages\Filament\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;

class LeadFormBlock
{
    public static function make(): Block
    {
        return Block::make('lead_form')
            ->label(__('filament-landing-pages::landing-pages.blocks.lead_form'))
            ->icon('heroicon-o-user-plus')
            ->schema([
                BlockRegistry::richTextEditor('title')
                    ->label('Section Title')
                    ->helperText('Main heading text above the form. Leave empty to hide.'),

                BlockRegistry::richTextEditor('subtitle')
                    ->label('Section Subtitle')
                    ->helperText('Supporting text explaining why users should fill out the form. Leave empty to hide.'),

                // Form customization
                Select::make('formStyle')
                    ->label('Form Style')
                    ->options([
                        'standard' => 'Standard (Vertical)',
                        'inline' => 'Inline (Horizontal)',
                        'card' => 'Card Style',
                        'minimal' => 'Minimal',
                    ])
                    ->default('standard')
                    ->helperText('Visual style for the lead form.'),

                // Form fields configuration
                TextInput::make('nameLabel')
                    ->label('Name Field Label')
                    ->default('Name')
                    ->helperText('Label for the name field.'),

                TextInput::make('namePlaceholder')
                    ->label('Name Field Placeholder')
                    ->default('Your name')
                    ->helperText('Placeholder text for the name field.'),

                TextInput::make('phoneLabel')
                    ->label('Phone Field Label')
                    ->default('Phone')
                    ->helperText('Label for the phone field.'),

                TextInput::make('phonePlaceholder')
                    ->label('Phone Field Placeholder')
                    ->default('Your phone number')
                    ->helperText('Placeholder text for the phone field.'),

                TextInput::make('emailLabel')
                    ->label('Email Field Label')
                    ->default('Email')
                    ->helperText('Label for the email field.'),

                TextInput::make('emailPlaceholder')
                    ->label('Email Field Placeholder')
                    ->default('Your email address')
                    ->helperText('Placeholder text for the email field.'),

                // Button configuration
                TextInput::make('buttonText')
                    ->label('Submit Button Text')
                    ->default('Submit')
                    ->helperText('Text for the submit button.'),

                // Success configuration
                TextInput::make('successTitle')
                    ->label('Success Message Title')
                    ->default('Thank you!')
                    ->helperText('Title shown after successful form submission.'),

                TextInput::make('successMessage')
                    ->label('Success Message')
                    ->default('Your request has been sent successfully. We will contact you soon.')
                    ->helperText('Message shown after successful form submission.'),

                TextInput::make('redirectAfterSubmit')
                    ->label('Redirect After Submit')
                    ->placeholder('/thank-you')
                    ->helperText('URL to redirect users after form submission. Leave empty to show success message on same page.'),

                // Visual customization
                ColorPicker::make('primaryColor')
                    ->label('Primary Color')
                    ->helperText('Primary color for the submit button and accents.'),

                ColorPicker::make('backgroundColor')
                    ->label('Background Color')
                    ->helperText('Background color for the form section.'),

                FileUpload::make('backgroundImage')
                    ->label('Background Image')
                    ->image()
                    ->directory('landing-pages/lead-form-backgrounds')
                    ->helperText('Optional background image for the form section.'),

                // Layout options
                Select::make('layout')
                    ->label('Section Layout')
                    ->options([
                        'full_width' => 'Full Width',
                        'centered' => 'Centered',
                        'split_left' => 'Split (Form Left, Content Right)',
                        'split_right' => 'Split (Content Left, Form Right)',
                    ])
                    ->default('centered')
                    ->helperText('Layout style for the form section.'),

                Toggle::make('showBorder')
                    ->label('Show Form Border')
                    ->default(true),

                Toggle::make('showShadow')
                    ->label('Show Form Shadow')
                    ->default(false),

                // Privacy and compliance
                TextInput::make('privacyText')
                    ->label('Privacy Notice')
                    ->default('Your data is protected and will not be shared with third parties.')
                    ->helperText('Privacy notice shown below the form. Leave empty to hide.'),

                Toggle::make('requireConsent')
                    ->label('Require Privacy Consent')
                    ->default(false)
                    ->helperText('Add a required checkbox for privacy policy consent.'),

                TextInput::make('consentText')
                    ->label('Consent Checkbox Text')
                    ->default('I agree to the processing of my personal data.')
                    ->visible(fn (callable $get) => $get('requireConsent'))
                    ->helperText('Text for the privacy consent checkbox.'),

                TextInput::make('consentLinkUrl')
                    ->label('Privacy Policy Link')
                    ->placeholder('/privacy-policy')
                    ->visible(fn (callable $get) => $get('requireConsent'))
                    ->helperText('Link to privacy policy page.'),

                // Email verification settings
                Toggle::make('sendVerificationEmail')
                    ->label('Send Email Verification')
                    ->default(true)
                    ->helperText('Send email verification to leads after form submission.'),

                TextInput::make('verificationEmailSubject')
                    ->label('Verification Email Subject')
                    ->default('Confirm your email address')
                    ->visible(fn (callable $get) => $get('sendVerificationEmail'))
                    ->helperText('Subject line for the verification email.'),

                // Additional features
                Toggle::make('showFormTitle')
                    ->label('Show Form Title')
                    ->default(true),

                TextInput::make('formTitle')
                    ->label('Form Title')
                    ->default('Contact Us')
                    ->visible(fn (callable $get) => $get('showFormTitle'))
                    ->helperText('Title displayed directly above the form fields.'),

                Toggle::make('enableCaptcha')
                    ->label('Enable Captcha Protection')
                    ->default(false)
                    ->helperText('Add captcha protection to prevent spam submissions.'),

                // Tracking and analytics
                TextInput::make('trackingEventName')
                    ->label('Analytics Event Name')
                    ->placeholder('lead_form_submit')
                    ->helperText('Custom event name for analytics tracking. Leave empty to use default.'),
            ]);
    }
}
