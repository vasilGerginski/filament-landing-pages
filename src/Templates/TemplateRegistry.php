<?php

namespace VasilGerginski\FilamentLandingPages\Templates;

class TemplateRegistry
{
    protected array $templates = [];

    public function __construct()
    {
        $this->registerDefaultTemplates();
    }

    protected function registerDefaultTemplates(): void
    {
        $enabledTemplates = config('filament-landing-pages.templates.enabled', []);

        if ($enabledTemplates['lead_generation'] ?? true) {
            $this->templates['lead_generation'] = LeadGenerationTemplate::class;
        }

        if ($enabledTemplates['sales'] ?? true) {
            $this->templates['sales'] = SalesTemplate::class;
        }

        if ($enabledTemplates['awareness'] ?? true) {
            $this->templates['awareness'] = AwarenessTemplate::class;
        }

        if ($enabledTemplates['event'] ?? true) {
            $this->templates['event'] = EventTemplate::class;
        }

        if ($enabledTemplates['newsletter'] ?? true) {
            $this->templates['newsletter'] = NewsletterTemplate::class;
        }

        if ($enabledTemplates['demo'] ?? true) {
            $this->templates['demo'] = DemoTemplate::class;
        }

        if ($enabledTemplates['custom'] ?? true) {
            $this->templates['custom'] = CustomTemplate::class;
        }

        // Register custom templates from config
        $customTemplates = config('filament-landing-pages.templates.custom_templates', []);
        foreach ($customTemplates as $key => $class) {
            if (class_exists($class)) {
                $this->templates[$key] = $class;
            }
        }
    }

    public function register(string $key, string $templateClass): void
    {
        $this->templates[$key] = $templateClass;
    }

    public function get(string $key): ?string
    {
        return $this->templates[$key] ?? null;
    }

    public function getSections(string $key): array
    {
        $templateClass = $this->get($key);

        if (! $templateClass || ! class_exists($templateClass)) {
            return [];
        }

        return (new $templateClass)->getSections();
    }

    public function getOptions(): array
    {
        return [
            'lead_generation' => 'Lead Generation',
            'sales' => 'Sales/Conversion',
            'awareness' => 'Brand Awareness',
            'event' => 'Event Registration',
            'newsletter' => 'Newsletter Signup',
            'demo' => 'Product Demo Request',
            'custom' => 'Custom Goal',
        ];
    }

    public function all(): array
    {
        return $this->templates;
    }
}
