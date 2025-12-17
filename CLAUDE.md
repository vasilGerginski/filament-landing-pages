# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is a Filament plugin for Laravel that enables creating and managing landing pages with lead tracking. It provides a visual section builder, pre-built templates, and lead capture functionality.

**Namespace**: `VasilGerginski\FilamentLandingPages`
**Compatibility**: Filament 3.2+/4.0+, Laravel 10/11/12, Livewire 3

## Development Commands

```bash
# Run tests
composer test

# Run tests with coverage
composer test-coverage

# Static analysis (PHPStan level 5)
composer analyse

# Code formatting (Laravel Pint)
composer format

# Run a single test file
./vendor/bin/pest tests/ExampleTest.php

# Run a single test method
./vendor/bin/pest --filter="test_name"
```

## Architecture

### Plugin Registration
- `FilamentLandingPagesPlugin` - Filament panel plugin (implements `Filament\Contracts\Plugin`)
- `FilamentLandingPagesServiceProvider` - Laravel service provider using spatie/laravel-package-tools

Register in Filament panel:
```php
->plugin(FilamentLandingPagesPlugin::make())
```

### Core Components

**Models** (`src/Models/`)
- `LandingPage` - Stores page content, SEO metadata, sections (JSON), and analytics settings
- `Lead` - Captured leads with email verification support

**Filament Resources** (`src/Filament/Resources/`)
- `LandingPageResource` - CRUD for landing pages with section builder
- `LeadResource` - View/manage captured leads

**Blocks System** (`src/Filament/Blocks/`)
- `BlockRegistry` - Registers and provides Filament Builder blocks
- Individual blocks (e.g., `HeroSectionBlock`, `LeadFormBlock`) create `Filament\Forms\Components\Builder\Block` instances
- Each block has a corresponding Livewire component for frontend rendering

**Templates System** (`src/Templates/`)
- `TemplateRegistry` - Manages landing page templates
- `AbstractTemplate` - Base class; extend and implement `getSections()` and `getName()`
- Pre-built templates: LeadGeneration, Sales, Awareness, Event, Newsletter, Demo, Custom

**Livewire Components** (`src/Livewire/`)
- `LandingPage` - Main public-facing component, renders sections dynamically
- `PreviewLandingPage` - Admin preview component
- `Components/` - Individual section renderers (HeroSection, LeadForm, etc.)

### Data Flow

1. Admin creates page → `LandingPageResource` form with `LandingSectionBuilder`
2. Sections stored as JSON in `landing_pages.sections` column
3. Public access → `LandingPage` Livewire component loads sections
4. Sections rendered via dynamic Livewire components based on `type` field

### Extensibility Points

**Custom Blocks**: Add to config `filament-landing-pages.blocks.custom_blocks`
```php
'custom_blocks' => [
    'my_block' => \App\Filament\Blocks\MyCustomBlock::class,
]
```

**Custom Templates**: Add to config `filament-landing-pages.templates.custom_templates`
```php
'custom_templates' => [
    'my_template' => \App\LandingPageTemplates\MyTemplate::class,
]
```

**Custom Models**: Override via config `filament-landing-pages.models`

**Custom Services**: Implement `ConversionTrackerContract` and configure via `filament-landing-pages.services.conversion_tracker`

### Routes

Routes defined in `routes/web.php`:
- `/{prefix}/{slug}` - Public landing page (default prefix: `landing`)
- `/{prefix}-preview/{slug}` - Preview mode
- `/verify-lead-email/{id}/{token}` - Lead email verification

Locale prefix support configurable via `routes.locale_prefix`.

### Testing

Uses Orchestra Testbench with in-memory SQLite. Test case at `tests/TestCase.php` sets up migrations automatically.

### Code Style

- Laravel Pint with custom rules in `pint.json`
- PHPStan level 5 with Larastan
- Views use `filament-landing-pages::` namespace
- Translations in `resources/lang/{locale}/landing-pages.php`