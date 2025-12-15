<?php

namespace VasilGerginski\FilamentLandingPages\Filament\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;

class PricingTableBlock
{
    public static function make(): Block
    {
        return Block::make('pricing_table')
            ->label(__('filament-landing-pages::landing-pages.blocks.pricing_table'))
            ->icon('heroicon-o-currency-dollar')
            ->schema([
                BlockRegistry::richTextEditor('title')
                    ->label('Section Title')
                    ->helperText('Main heading text. Leave empty to hide.'),

                BlockRegistry::richTextEditor('subtitle')
                    ->label('Section Subtitle')
                    ->helperText('Supporting text explaining your pricing model. Leave empty to hide.'),

                // Display settings
                Select::make('pricingStyle')
                    ->label('Pricing Table Style')
                    ->options([
                        'horizontal' => 'Horizontal (Side by Side)',
                        'vertical' => 'Vertical (Stacked)',
                        'toggle' => 'With Toggle (Monthly/Annual)',
                        'tabs' => 'Tabbed Pricing',
                    ])
                    ->default('horizontal')
                    ->helperText('Select the layout style for the pricing table.'),

                Toggle::make('showAnnualPricing')
                    ->label('Show Annual Pricing Option'),

                TextInput::make('annualDiscountPercent')
                    ->label('Annual Discount Percentage')
                    ->suffix('%')
                    ->numeric()
                    ->default(20)
                    ->visible(fn (callable $get) => $get('showAnnualPricing')),

                TextInput::make('annualSavingsText')
                    ->label('Annual Savings Text')
                    ->default('Save {discount}% with annual billing')
                    ->helperText('Use {discount} as placeholder for the discount percentage.')
                    ->visible(fn (callable $get) => $get('showAnnualPricing')),

                Toggle::make('showComparisonHeader')
                    ->label('Show Comparison Header')
                    ->helperText('Display feature names in the header row for easier comparison'),

                // Pricing plans
                Repeater::make('plans')
                    ->label('Pricing Plans')
                    ->schema([
                        TextInput::make('name')
                            ->label('Plan Name')
                            ->required(),

                        Textarea::make('description')
                            ->label('Plan Description'),

                        TextInput::make('price')
                            ->label('Monthly Price')
                            ->prefix('$')
                            ->required(),

                        TextInput::make('annualPrice')
                            ->label('Annual Price (per month)')
                            ->prefix('$'),

                        Toggle::make('isPopular')
                            ->label('Mark as Popular/Recommended')
                            ->default(false),

                        TextInput::make('popularLabel')
                            ->label('Popular Badge Text')
                            ->default('Most Popular')
                            ->visible(fn (callable $get) => $get('isPopular')),

                        // Plan features
                        Repeater::make('features')
                            ->label('Plan Features')
                            ->schema([
                                TextInput::make('feature')
                                    ->label('Feature Description')
                                    ->required(),

                                Toggle::make('isIncluded')
                                    ->label('Included in Plan')
                                    ->default(true),

                                Toggle::make('isHighlighted')
                                    ->label('Highlight This Feature'),
                            ])
                            ->defaultItems(0)
                            ->itemLabel(fn (array $state): ?string => $state['feature'] ?? null)
                            ->collapsible()
                            ->helperText('Add features for this plan.'),

                        // Call to action
                        TextInput::make('buttonText')
                            ->label('Button Text')
                            ->default('Get Started')
                            ->helperText('Text for the CTA button.'),

                        TextInput::make('buttonLink')
                            ->label('Button Link')
                            ->placeholder('/signup')
                            ->helperText('URL for the signup button.'),
                    ])
                    ->defaultItems(0)
                    ->itemLabel(fn (array $state): ?string => $state['name'] ?? null)
                    ->collapsible()
                    ->helperText('Add pricing plans to display.'),

                // Visual customization
                ColorPicker::make('primaryColor')
                    ->label('Primary Color')
                    ->helperText('Primary color for highlights and CTAs.'),

                ColorPicker::make('accentColor')
                    ->label('Accent/Highlight Color')
                    ->helperText('Color for popular plan highlight.'),

                Select::make('planCardStyle')
                    ->label('Plan Card Style')
                    ->options([
                        'simple' => 'Simple (Flat)',
                        'bordered' => 'Bordered',
                        'elevated' => 'Elevated (Shadow)',
                        'minimal' => 'Minimal',
                    ])
                    ->default('bordered')
                    ->helperText('Visual style for the pricing cards.'),

                // Additional options
                Toggle::make('showCurrencySelector')
                    ->label('Show Currency Selector'),

                Toggle::make('showRefundPolicy')
                    ->label('Show Refund Policy'),

                TextInput::make('refundPolicyText')
                    ->label('Refund Policy Text')
                    ->default('30-day money-back guarantee')
                    ->visible(fn (callable $get) => $get('showRefundPolicy')),

                Toggle::make('showFAQLink')
                    ->label('Show FAQ Link'),

                TextInput::make('faqLinkText')
                    ->label('FAQ Link Text')
                    ->default('Have questions? Check our FAQ')
                    ->visible(fn (callable $get) => $get('showFAQLink')),

                TextInput::make('faqLinkUrl')
                    ->label('FAQ Link URL')
                    ->placeholder('/faq')
                    ->visible(fn (callable $get) => $get('showFAQLink')),
            ]);
    }
}
