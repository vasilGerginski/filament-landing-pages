<?php

namespace VasilGerginski\FilamentLandingPages\Filament\Resources;

use Filament\Actions\Action;
use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use VasilGerginski\FilamentLandingPages\Filament\Forms\Components\LandingSectionBuilder;
use VasilGerginski\FilamentLandingPages\Filament\Resources\LandingPageResource\Pages;
use VasilGerginski\FilamentLandingPages\FilamentLandingPagesPlugin;
use VasilGerginski\FilamentLandingPages\Models\LandingPage;
use VasilGerginski\FilamentLandingPages\Templates\TemplateRegistry;

class LandingPageResource extends Resource
{
    protected static ?string $model = LandingPage::class;

    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getModel(): string
    {
        return config('filament-landing-pages.models.landing_page', LandingPage::class);
    }

    public static function getNavigationIcon(): ?string
    {
        return FilamentLandingPagesPlugin::get()->getNavigationIcon();
    }

    public static function getNavigationGroup(): ?string
    {
        return FilamentLandingPagesPlugin::get()->getNavigationGroup();
    }

    public static function getNavigationSort(): ?int
    {
        return FilamentLandingPagesPlugin::get()->getNavigationSort();
    }

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Basic Information')->schema([
                TextInput::make('title')
                    ->label(__('filament-landing-pages::landing-pages.title'))
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (string $operation, $state, \Filament\Schemas\Components\Utilities\Set $set) {
                        if ($operation === 'create') {
                            $set('slug', Str::slug($state));
                        }
                    }),
                Textarea::make('meta_description')
                    ->label(__('filament-landing-pages::landing-pages.meta_description'))
                    ->default('Expert consultation and personalized strategies. Maximize your results.')
                    ->rows(3),
                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->alphaDash()
                    ->helperText(__('filament-landing-pages::landing-pages.slug_helper')),
                Select::make('goal_type')
                    ->label(__('filament-landing-pages::landing-pages.goal_type'))
                    ->options((new TemplateRegistry)->getOptions())
                    ->required()
                    ->live()
                    ->afterStateUpdated(function ($state, $livewire) {
                        $templateRegistry = new TemplateRegistry;
                        $template = $templateRegistry->getSections($state);

                        if (is_array($template) && ! empty($template)) {
                            $currentData = $livewire->form->getState();
                            $currentData['sections'] = $template;
                            $livewire->form->fill($currentData);
                        }
                    })
                    ->helperText(__('filament-landing-pages::landing-pages.goal_type_helper')),
                \Filament\Forms\Components\Toggle::make('is_active')
                    ->label(__('filament-landing-pages::landing-pages.is_active'))
                    ->default(true)
                    ->helperText(__('filament-landing-pages::landing-pages.is_active_helper')),
            ]),
            Section::make('Landing Page Content')->schema([
                Grid::make()->schema([
                    Section::make('Editor')
                        ->columnSpan(1)
                        ->schema([
                            LandingSectionBuilder::make()->columnSpanFull(),
                        ]),
                ]),
            ]),
            Section::make('Analytics & Tracking')->schema([
                \Filament\Forms\Components\Toggle::make('enable_analytics')
                    ->label(__('filament-landing-pages::landing-pages.enable_analytics'))
                    ->default(true),
                Textarea::make('tracking_code')
                    ->label(__('filament-landing-pages::landing-pages.tracking_code'))
                    ->helperText(__('filament-landing-pages::landing-pages.tracking_code_helper'))
                    ->rows(3),
                TextInput::make('utm_source')
                    ->label(__('filament-landing-pages::landing-pages.utm_source'))
                    ->placeholder('e.g., newsletter, social, partner'),
                TextInput::make('utm_medium')
                    ->label(__('filament-landing-pages::landing-pages.utm_medium'))
                    ->placeholder('e.g., email, cpc, banner'),
                TextInput::make('utm_campaign')
                    ->label(__('filament-landing-pages::landing-pages.utm_campaign'))
                    ->placeholder('e.g., spring_sale, product_launch'),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label(__('filament-landing-pages::landing-pages.title'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\TextColumn::make('goal_type')
                    ->label(__('filament-landing-pages::landing-pages.goal'))
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'lead_generation' => 'success',
                        'sales' => 'danger',
                        'awareness' => 'info',
                        'event' => 'warning',
                        default => 'gray',
                    }),
                Tables\Columns\IconColumn::make('is_active')
                    ->label(__('filament-landing-pages::landing-pages.active'))
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('goal_type')
                    ->options((new TemplateRegistry)->getOptions()),
                Filter::make('is_active')
                    ->toggle()
                    ->label(__('filament-landing-pages::landing-pages.show_active_only')),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
                Action::make('duplicate')
                    ->label(__('filament-landing-pages::landing-pages.duplicate'))
                    ->icon('heroicon-o-document-duplicate')
                    ->action(function (LandingPage $record) {
                        $newLandingPage = $record->replicate();
                        $newLandingPage->title = $record->title.' (Copy)';
                        $newLandingPage->slug = $record->slug.'-'.Str::random(5);
                        $newLandingPage->is_active = false;
                        $newLandingPage->save();
                    }),
                Action::make('preview')
                    ->label(__('filament-landing-pages::landing-pages.preview'))
                    ->icon('heroicon-o-eye')
                    ->url(fn (LandingPage $record): string => route('filament-landing-pages.preview', [
                        'locale' => app()->getLocale(),
                        'slug' => $record->slug,
                    ]))
                    ->openUrlInNewTab(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    BulkAction::make('activate')
                        ->label(__('filament-landing-pages::landing-pages.activate_selected'))
                        ->icon('heroicon-o-check-circle')
                        ->action(fn ($records) => $records->each->update(['is_active' => true])),
                    BulkAction::make('deactivate')
                        ->label(__('filament-landing-pages::landing-pages.deactivate_selected'))
                        ->icon('heroicon-o-x-circle')
                        ->action(fn ($records) => $records->each->update(['is_active' => false])),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLandingPages::route('/'),
            'create' => Pages\CreateLandingPage::route('/create'),
            'edit' => Pages\EditLandingPage::route('/{record}/edit'),
        ];
    }
}
