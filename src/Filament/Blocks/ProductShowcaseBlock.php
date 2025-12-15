<?php

namespace VasilGerginski\FilamentLandingPages\Filament\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;

class ProductShowcaseBlock
{
    public static function make(): Block
    {
        return Block::make('product_showcase')
            ->label(__('filament-landing-pages::landing-pages.blocks.product_showcase'))
            ->icon('heroicon-o-shopping-bag')
            ->schema([
                BlockRegistry::richTextEditor('title')
                    ->label('Section Title')
                    ->helperText('Main heading text. Leave empty to hide.'),

                BlockRegistry::richTextEditor('subtitle')
                    ->label('Section Subtitle')
                    ->helperText('Supporting text explaining your product offerings. Leave empty to hide.'),

                // Display options
                Select::make('layout')
                    ->label('Layout Style')
                    ->options([
                        'grid' => 'Grid (Multiple Products)',
                        'carousel' => 'Carousel',
                        'featured' => 'Featured Product (Large)',
                        'comparison' => 'Side-by-Side Comparison',
                    ])
                    ->default('grid')
                    ->helperText('Select the layout style for displaying products.'),

                Select::make('productCardStyle')
                    ->label('Product Card Style')
                    ->options([
                        'standard' => 'Standard',
                        'minimal' => 'Minimal',
                        'detailed' => 'Detailed (with Features)',
                        'hover' => 'Interactive Hover',
                    ])
                    ->default('standard')
                    ->helperText('Visual style for product cards.'),

                // Product items
                Repeater::make('products')
                    ->label('Products')
                    ->schema([
                        TextInput::make('name')
                            ->label('Product Name')
                            ->required(),

                        FileUpload::make('image')
                            ->label('Product Image')
                            ->image()
                            ->directory('landing-pages/product-images'),

                        Textarea::make('description')
                            ->label('Product Description'),

                        TextInput::make('price')
                            ->label('Price')
                            ->placeholder('$99'),

                        Toggle::make('showSalePrice')
                            ->label('Show Sale Price'),

                        TextInput::make('salePrice')
                            ->label('Sale Price')
                            ->placeholder('$79')
                            ->visible(fn (callable $get) => $get('showSalePrice')),

                        // Features list
                        Repeater::make('features')
                            ->label('Product Features')
                            ->schema([
                                TextInput::make('feature')
                                    ->label('Feature')
                                    ->required(),
                            ])
                            ->defaultItems(0)
                            ->collapsible()
                            ->collapsed()
                            ->helperText('Add features for this product.'),

                        TextInput::make('buttonText')
                            ->label('Button Text')
                            ->default('Learn More')
                            ->helperText('Text for the CTA button.'),

                        TextInput::make('buttonLink')
                            ->label('Button Link')
                            ->placeholder('/product-details')
                            ->helperText('URL for the product button.'),

                        Toggle::make('featured')
                            ->label('Featured Product')
                            ->helperText('Featured products can be highlighted in certain layouts'),

                        TextInput::make('badge')
                            ->label('Badge Text (e.g., "New", "Best Seller")')
                            ->placeholder('Best Seller'),
                    ])
                    ->defaultItems(0)
                    ->collapsible()
                    ->itemLabel(fn (array $state): ?string => $state['name'] ?? null)
                    ->helperText('Add products to showcase.'),

                // Visual customization
                ColorPicker::make('primaryColor')
                    ->label('Primary Color')
                    ->helperText('Primary color for highlights and CTAs.'),

                ColorPicker::make('accentColor')
                    ->label('Accent Color')
                    ->helperText('Secondary color for backgrounds.'),

                Toggle::make('showBackground')
                    ->label('Show Section Background'),

                FileUpload::make('backgroundImage')
                    ->label('Background Image')
                    ->image()
                    ->directory('landing-pages/showcase-backgrounds')
                    ->visible(fn (callable $get) => $get('showBackground')),

                // Additional options
                Toggle::make('showFilters')
                    ->label('Show Product Filters')
                    ->helperText('Only applicable for Grid layout with multiple products'),

                Toggle::make('showCompareButton')
                    ->label('Show Compare Button'),

                Toggle::make('showQuickView')
                    ->label('Show Quick View Option'),

                // Call-to-action
                Toggle::make('showFooterCTA')
                    ->label('Show Footer Call-to-Action'),

                TextInput::make('ctaText')
                    ->label('CTA Text')
                    ->default('View All Products')
                    ->visible(fn (callable $get) => $get('showFooterCTA')),

                TextInput::make('ctaLink')
                    ->label('CTA Link')
                    ->placeholder('/products')
                    ->visible(fn (callable $get) => $get('showFooterCTA')),
            ]);
    }
}
