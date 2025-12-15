<?php

namespace VasilGerginski\FilamentLandingPages\Filament\Resources\LandingPageResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use VasilGerginski\FilamentLandingPages\Filament\Resources\LandingPageResource;

class ListLandingPages extends ListRecords
{
    protected static string $resource = LandingPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
