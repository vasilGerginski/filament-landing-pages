<?php

namespace VasilGerginski\FilamentLandingPages\Filament\Resources\LandingPageResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Str;
use VasilGerginski\FilamentLandingPages\Filament\Resources\LandingPageResource;

class EditLandingPage extends EditRecord
{
    protected static string $resource = LandingPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('preview')
                ->label(__('filament-landing-pages::landing-pages.preview'))
                ->icon('heroicon-o-eye')
                ->action(fn () => $this->openInPopup()),
            Actions\DeleteAction::make(),
            Actions\Action::make('viewLive')
                ->label(__('filament-landing-pages::landing-pages.view_live'))
                ->icon('heroicon-o-globe-alt')
                ->url(fn () => route('filament-landing-pages.preview', [
                    'locale' => app()->getLocale(),
                    'slug' => $this->record->slug,
                ]))
                ->openUrlInNewTab(),
            Actions\Action::make('duplicate')
                ->label(__('filament-landing-pages::landing-pages.duplicate'))
                ->icon('heroicon-o-document-duplicate')
                ->action(function () {
                    $record = $this->record;

                    $newLandingPage = $record->replicate();
                    $newLandingPage->title = $record->title.' (Copy)';
                    $newLandingPage->slug = $record->slug.'-'.Str::random(5);
                    $newLandingPage->is_active = false;
                    $newLandingPage->save();

                    return redirect()->to(LandingPageResource::getUrl('edit', ['record' => $newLandingPage->id]));
                }),
        ];
    }

    protected function afterValidate(): void
    {
        $this->dispatch('update-preview');
    }

    protected function afterFill(): void
    {
        $this->dispatch('update-preview');
    }

    public function mount($record): void
    {
        parent::mount($record);
        $this->dispatch('update-preview');
    }

    protected function afterSave(): void
    {
        Notification::make()
            ->title(__('filament-landing-pages::landing-pages.saved'))
            ->success()
            ->send();

        $this->dispatch('preview-refresh');
        $this->dispatch('update-preview');
    }

    public function getMaxContentWidth(): ?string
    {
        return 'full';
    }

    public function openInPopup(): void
    {
        $previewUrl = route('filament-landing-pages.preview', [
            'locale' => app()->getLocale(),
            'slug' => $this->record->slug,
        ]);

        $this->js("window.open('{$previewUrl}', 'preview', 'width=1200,height=800,menubar=no,toolbar=no,location=no,resizable=yes,scrollbars=yes,status=no');");
    }
}
