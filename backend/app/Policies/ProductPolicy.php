<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProductPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Product $product): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     * @param User $user
     * @param $product
     * @return bool
     */
    public function create(User $user, $product): bool
    {
        return ($user->id === $product->artist_id);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Product $product, Role $role): bool
    {

        //dd($user->role->name);

        return ($role->name === 'admin' || $user->id === $product->artist_id);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Product $product): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Product $product): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Product $product): bool
    {
        //
    }
}
