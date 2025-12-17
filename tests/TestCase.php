<?php

namespace VasilGerginski\FilamentLandingPages\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Livewire\LivewireServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;
use VasilGerginski\FilamentLandingPages\FilamentLandingPagesServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'VasilGerginski\\FilamentLandingPages\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app): array
    {
        return [
            LivewireServiceProvider::class,
            FilamentLandingPagesServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app): void
    {
        config()->set('database.default', 'testing');

        $migration = include __DIR__.'/../database/migrations/create_landing_pages_table.php.stub';
        $migration->up();

        $migration = include __DIR__.'/../database/migrations/create_leads_table.php.stub';
        $migration->up();
    }
}
