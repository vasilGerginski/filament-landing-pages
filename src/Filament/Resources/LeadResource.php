<?php

namespace VasilGerginski\FilamentLandingPages\Filament\Resources;

use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use VasilGerginski\FilamentLandingPages\Filament\Resources\LeadResource\Pages;
use VasilGerginski\FilamentLandingPages\FilamentLandingPagesPlugin;
use VasilGerginski\FilamentLandingPages\Models\Lead;

class LeadResource extends Resource
{
    protected static ?string $model = Lead::class;

    public static function getModel(): string
    {
        return config('filament-landing-pages.models.lead', Lead::class);
    }

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-users';
    }

    public static function getNavigationGroup(): ?string
    {
        return FilamentLandingPagesPlugin::get()->getNavigationGroup();
    }

    public static function getNavigationSort(): ?int
    {
        $baseSort = FilamentLandingPagesPlugin::get()->getNavigationSort() ?? 3;

        return $baseSort + 1;
    }

    public static function getNavigationLabel(): string
    {
        return __('filament-landing-pages::landing-pages.leads');
    }

    public static function getModelLabel(): string
    {
        return __('filament-landing-pages::landing-pages.lead');
    }

    public static function getPluralModelLabel(): string
    {
        return __('filament-landing-pages::landing-pages.leads');
    }

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make(__('filament-landing-pages::landing-pages.lead_information'))->schema([
                TextInput::make('name')
                    ->label(__('filament-landing-pages::landing-pages.name'))
                    ->required()
                    ->maxLength(255),
                TextInput::make('email')
                    ->label(__('filament-landing-pages::landing-pages.email'))
                    ->email()
                    ->required()
                    ->maxLength(255),
                TextInput::make('phone')
                    ->label(__('filament-landing-pages::landing-pages.phone'))
                    ->tel()
                    ->maxLength(50),
                DateTimePicker::make('email_verified_at')
                    ->label(__('filament-landing-pages::landing-pages.email_verified_at'))
                    ->disabled(),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('filament-landing-pages::landing-pages.name'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->label(__('filament-landing-pages::landing-pages.email'))
                    ->searchable()
                    ->sortable()
                    ->copyable(),
                Tables\Columns\TextColumn::make('phone')
                    ->label(__('filament-landing-pages::landing-pages.phone'))
                    ->searchable()
                    ->copyable(),
                Tables\Columns\IconColumn::make('email_verified_at')
                    ->label(__('filament-landing-pages::landing-pages.verified'))
                    ->boolean()
                    ->getStateUsing(fn ($record) => $record->email_verified_at !== null),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('filament-landing-pages::landing-pages.created_at'))
                    ->dateTime()
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Filter::make('verified')
                    ->label(__('filament-landing-pages::landing-pages.verified_only'))
                    ->query(fn (Builder $query): Builder => $query->whereNotNull('email_verified_at'))
                    ->toggle(),
                Filter::make('unverified')
                    ->label(__('filament-landing-pages::landing-pages.unverified_only'))
                    ->query(fn (Builder $query): Builder => $query->whereNull('email_verified_at'))
                    ->toggle(),
                SelectFilter::make('created_at')
                    ->label(__('filament-landing-pages::landing-pages.date_range'))
                    ->options([
                        'today' => __('filament-landing-pages::landing-pages.today'),
                        'week' => __('filament-landing-pages::landing-pages.this_week'),
                        'month' => __('filament-landing-pages::landing-pages.this_month'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return match ($data['value'] ?? null) {
                            'today' => $query->whereDate('created_at', today()),
                            'week' => $query->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]),
                            'month' => $query->whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()]),
                            default => $query,
                        };
                    }),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLeads::route('/'),
            'view' => Pages\ViewLead::route('/{record}'),
            'edit' => Pages\EditLead::route('/{record}/edit'),
        ];
    }
}
