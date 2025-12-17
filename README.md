# Filament Landing Pages

A Filament plugin for creating and managing landing pages with lead tracking.

## Features

- Visual section builder with drag-and-drop reordering
- Pre-built landing page templates (Lead Generation, Sales, Event, Newsletter, etc.)
- Lead capture forms with email verification
- SEO metadata management
- Analytics and UTM tracking support
- Fully customizable blocks and templates

## Requirements

- PHP 8.2+
- Laravel 10, 11, or 12
- Filament 3.2+ or 4.0+
- Livewire 3

## Installation

```bash
composer require vasilgerginski/filament-landing-pages
```

Run the install command:

```bash
php artisan filament-landing-pages:install
```

This will publish the config file and migrations. Then run:

```bash
php artisan migrate
```

## Usage

Register the plugin in your Filament panel provider:

```php
use VasilGerginski\FilamentLandingPages\FilamentLandingPagesPlugin;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->plugin(FilamentLandingPagesPlugin::make());
}
```

### Configuration Options

```php
FilamentLandingPagesPlugin::make()
    ->landingPages(true)      // Enable/disable landing pages resource
    ->leads(true)             // Enable/disable leads resource
    ->navigationGroup('Marketing')
    ->navigationIcon('heroicon-o-rectangle-stack')
    ->navigationSort(3)
```

## Available Blocks

### Core Blocks
- Hero Section
- Challenges Section
- Solution Section
- Icon List Section
- Testimonials Section
- FAQ Section
- CTA Section
- Trust Indicators Section

### Goal-Specific Blocks
- Lead Form
- Newsletter Signup
- Event Registration
- Product Showcase
- Pricing Table
- Countdown Timer

## Custom Blocks

Create a custom block class:

```php
namespace App\Filament\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\TextInput;

class MyCustomBlock
{
    public static function make(): Block
    {
        return Block::make('my_custom_block')
            ->label('My Custom Block')
            ->schema([
                TextInput::make('title')->required(),
            ]);
    }
}
```

Register in config:

```php
// config/filament-landing-pages.php
'blocks' => [
    'custom_blocks' => [
        'my_custom_block' => \App\Filament\Blocks\MyCustomBlock::class,
    ],
],
```

Create a corresponding Livewire component and Blade view for frontend rendering.

## Custom Templates

Extend `AbstractTemplate`:

```php
namespace App\LandingPageTemplates;

use VasilGerginski\FilamentLandingPages\Templates\AbstractTemplate;

class MyTemplate extends AbstractTemplate
{
    public function getName(): string
    {
        return 'My Template';
    }

    public function getSections(): array
    {
        return [
            [
                'type' => 'hero_section',
                'data' => [
                    'title' => 'Welcome',
                    'subtitle' => 'Your subtitle here',
                ],
            ],
            // Add more sections...
        ];
    }
}
```

Register in config:

```php
'templates' => [
    'custom_templates' => [
        'my_template' => \App\LandingPageTemplates\MyTemplate::class,
    ],
],
```

## Custom Models

Override the default models:

```php
// config/filament-landing-pages.php
'models' => [
    'landing_page' => \App\Models\LandingPage::class,
    'lead' => \App\Models\Lead::class,
],
```

## Routes

Landing pages are accessible at:
- Public: `/{prefix}/{slug}` (default prefix: `landing`)
- Preview: `/{prefix}-preview/{slug}`

Configure in `config/filament-landing-pages.php`:

```php
'routes' => [
    'prefix' => 'landing',
    'middleware' => ['web'],
    'locale_prefix' => false,  // Set true for /{locale}/landing/{slug}
],
```

## SEO Integration

The package supports optional integration with [artesaos/seotools](https://github.com/artesaos/seotools):

```php
// config/filament-landing-pages.php
'seo' => [
    'enabled' => true,
    'seo_tools_facade' => \Artesaos\SEOTools\Facades\SEOTools::class,
],
```

## Testing

```bash
composer test
```

## Changelog

See [CHANGELOG.md](CHANGELOG.md) for recent changes.

## License

MIT License. See [LICENSE](LICENSE) for details.
