<?php

namespace VasilGerginski\FilamentLandingPages\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    protected $signature = 'filament-landing-pages:install
                            {--force : Overwrite existing files}
                            {--skip-migrations : Skip running migrations}';

    protected $description = 'Install the Filament Landing Pages plugin';

    public function handle(): int
    {
        $this->info('Installing Filament Landing Pages...');
        $this->newLine();

        // Publish migrations
        $this->components->task('Publishing migrations', function () {
            $params = ['--tag' => 'filament-landing-pages-migrations'];

            if ($this->option('force')) {
                $params['--force'] = true;
            }

            $this->callSilently('vendor:publish', $params);
        });

        // Publish config
        $this->components->task('Publishing config', function () {
            $params = ['--tag' => 'filament-landing-pages-config'];

            if ($this->option('force')) {
                $params['--force'] = true;
            }

            $this->callSilently('vendor:publish', $params);
        });

        // Publish translations
        $this->components->task('Publishing translations', function () {
            $params = ['--tag' => 'filament-landing-pages-translations'];

            if ($this->option('force')) {
                $params['--force'] = true;
            }

            $this->callSilently('vendor:publish', $params);
        });

        // Run migrations
        if (! $this->option('skip-migrations')) {
            $this->components->task('Running migrations', function () {
                $this->callSilently('migrate');
            });
        }

        $this->newLine();
        $this->components->info('Filament Landing Pages installed successfully!');

        $this->newLine();
        $this->components->warn('Don\'t forget to register the plugin in your AdminPanelProvider:');
        $this->newLine();
        $this->line('  use VasilGerginski\FilamentLandingPages\FilamentLandingPagesPlugin;');
        $this->newLine();
        $this->line('  ->plugins([');
        $this->line('      FilamentLandingPagesPlugin::make()');
        $this->line('          ->navigationGroup(\'Marketing\'),');
        $this->line('  ])');
        $this->newLine();

        return self::SUCCESS;
    }
}
