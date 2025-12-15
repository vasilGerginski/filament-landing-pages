<?php

namespace VasilGerginski\FilamentLandingPages\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Contracts\Auth\Authenticatable;
use VasilGerginski\FilamentLandingPages\Models\LandingPage;

class LandingPagePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Authenticatable $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Authenticatable $user, LandingPage $landingPage): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Authenticatable $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Authenticatable $user, LandingPage $landingPage): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Authenticatable $user, LandingPage $landingPage): bool
    {
        return true;
    }

    /**
     * Determine whether the user can bulk delete.
     */
    public function deleteAny(Authenticatable $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete.
     */
    public function forceDelete(Authenticatable $user, LandingPage $landingPage): bool
    {
        return true;
    }

    /**
     * Determine whether the user can permanently bulk delete.
     */
    public function forceDeleteAny(Authenticatable $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can restore.
     */
    public function restore(Authenticatable $user, LandingPage $landingPage): bool
    {
        return true;
    }

    /**
     * Determine whether the user can bulk restore.
     */
    public function restoreAny(Authenticatable $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can replicate.
     */
    public function replicate(Authenticatable $user, LandingPage $landingPage): bool
    {
        return true;
    }
}
