<?php

namespace App\Policies;

use App\Models\Artist;
use App\Models\Product;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class ProductPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(): bool
    {
        return true;
    }
    /**
     * Determine whether the user can view the model.
     */
    public function view(): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */

    public function create(User $user): bool
    {
        return $user->role->type === 'artist';
    }

    /**
     * Determine whether the user can update the model.
     */

    public function update(User $user, Product $product): bool
    {

        return $user->id === $product->artist->user_id;

    }


    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Product $product): bool
    {
        return $user->id === $product->artist->user_id || $user->role->type === 'admin';
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Product $product): bool
    {

    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user): bool
    {
        return $user->role->type === 'admin';
    }



}
