<?php

namespace VasilGerginski\FilamentLandingPages\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \VasilGerginski\FilamentLandingPages\FilamentLandingPagesPlugin
 */
class FilamentLandingPages extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \VasilGerginski\FilamentLandingPages\FilamentLandingPagesPlugin::class;
    }
}
