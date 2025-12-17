<?php

namespace VasilGerginski\FilamentLandingPages\Filament\Resources\LeadResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use VasilGerginski\FilamentLandingPages\Filament\Resources\LeadResource;

class EditLead extends EditRecord
{
    protected static string $resource = LeadResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
