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
        if (method_exists($user, 'can')) {
            return $user->can('view_any_landing::page');
        }

        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Authenticatable $user, LandingPage $landingPage): bool
    {
        if (method_exists($user, 'can')) {
            return $user->can('view_landing::page');
        }

        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Authenticatable $user): bool
    {
        if (method_exists($user, 'can')) {
            return $user->can('create_landing::page');
        }

        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Authenticatable $user, LandingPage $landingPage): bool
    {
        if (method_exists($user, 'can')) {
            return $user->can('update_landing::page');
        }

        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Authenticatable $user, LandingPage $landingPage): bool
    {
        if (method_exists($user, 'can')) {
            return $user->can('delete_landing::page');
        }

        return true;
    }

    /**
     * Determine whether the user can bulk delete.
     */
    public function deleteAny(Authenticatable $user): bool
    {
        if (method_exists($user, 'can')) {
            return $user->can('delete_any_landing::page');
        }

        return true;
    }

    /**
     * Determine whether the user can permanently delete.
     */
    public function forceDelete(Authenticatable $user, LandingPage $landingPage): bool
    {
        if (method_exists($user, 'can')) {
            return $user->can('force_delete_landing::page');
        }

        return true;
    }

    /**
     * Determine whether the user can permanently bulk delete.
     */
    public function forceDeleteAny(Authenticatable $user): bool
    {
        if (method_exists($user, 'can')) {
            return $user->can('force_delete_any_landing::page');
        }

        return true;
    }

    /**
     * Determine whether the user can restore.
     */
    public function restore(Authenticatable $user, LandingPage $landingPage): bool
    {
        if (method_exists($user, 'can')) {
            return $user->can('restore_landing::page');
        }

        return true;
    }

    /**
     * Determine whether the user can bulk restore.
     */
    public function restoreAny(Authenticatable $user): bool
    {
        if (method_exists($user, 'can')) {
            return $user->can('restore_any_landing::page');
        }

        return true;
    }

    /**
     * Determine whether the user can replicate.
     */
    public function replicate(Authenticatable $user, LandingPage $landingPage): bool
    {
        if (method_exists($user, 'can')) {
            return $user->can('replicate_landing::page');
        }

        return true;
    }
}
