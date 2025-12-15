<?php

namespace VasilGerginski\FilamentLandingPages\Filament\Forms\Components;

use Filament\Forms\Components\Builder;
use VasilGerginski\FilamentLandingPages\Filament\Blocks\BlockRegistry;

class LandingSectionBuilder
{
    public static function make(): Builder
    {
        $blockRegistry = new BlockRegistry;

        return Builder::make('sections')
            ->columnSpanFull()
            ->label('')
            ->blocks($blockRegistry->getForBuilder())
            ->addActionLabel(__('filament-landing-pages::landing-pages.add_section'))
            ->collapsed(true)
            ->collapsible()
            ->reorderable();
    }
}
