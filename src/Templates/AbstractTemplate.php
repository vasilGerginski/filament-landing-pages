<?php

namespace VasilGerginski\FilamentLandingPages\Templates;

abstract class AbstractTemplate
{
    /**
     * Get the sections data for this template
     */
    abstract public function getSections(): array;

    /**
     * Get the template name
     */
    abstract public function getName(): string;

    /**
     * Get the template description
     */
    public function getDescription(): string
    {
        return '';
    }

    /**
     * Get the primary color for this template
     */
    protected function getPrimaryColor(): string
    {
        return config('filament-landing-pages.theme.primary_color', '#1CE088');
    }
}
