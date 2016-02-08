<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function update($user, $product)
    {
        return $user->id == $product->supplier_id;
    }
}
