<?php

namespace VasilGerginski\FilamentLandingPages\Filament\Resources\LeadResource\Pages;

use Filament\Resources\Pages\ListRecords;
use VasilGerginski\FilamentLandingPages\Filament\Resources\LeadResource;

class ListLeads extends ListRecords
{
    protected static string $resource = LeadResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
