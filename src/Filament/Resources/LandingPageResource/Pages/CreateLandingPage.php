<?php

namespace VasilGerginski\FilamentLandingPages\Filament\Resources\LandingPageResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use VasilGerginski\FilamentLandingPages\Filament\Resources\LandingPageResource;

class CreateLandingPage extends CreateRecord
{
    protected static string $resource = LandingPageResource::class;

    public function getMaxContentWidth(): ?string
    {
        return 'full';
    }
}
