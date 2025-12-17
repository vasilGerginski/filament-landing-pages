<?php

namespace VasilGerginski\FilamentLandingPages\Filament\Resources\LeadResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use VasilGerginski\FilamentLandingPages\Filament\Resources\LeadResource;

class ViewLead extends ViewRecord
{
    protected static string $resource = LeadResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
