<?php

namespace App\Policies;

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

    /**
     * Determine whether the user can view the model.
     */



    /**
     * Determine whether the user can create models.
     * @param User $user
     * @param $product
     * @return bool
     */
    public function view(): bool
    {
        return true;
    }
    public function viewAny(): bool
    {
        return true;
    }
    public function create(User $user, Product $product ): bool
    {
      return $user->role_id === '9b2f102b-decc-4cf2-8d89-d1445a59d75b' || $user->id === $product->artist_id;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user): bool
    {
        return $user->role_id === '9b2f102b-decc-4cf2-8d89-d1445a59d75b';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Product $product): bool
    {
        return $user->role_id === '9b2f102b-decc-4cf2-8d89-d1445a59d75b';
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Product $product): bool
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Product $product, Role $role): bool
    {
        return $role->name === 'admin';
    }



}
