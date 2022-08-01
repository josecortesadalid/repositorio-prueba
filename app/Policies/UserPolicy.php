<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
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

    public function edit(User $authUser, User $user) // recibimos el usuario autenticado, este primer parámtro es pasado automáticamente por Laravel
    {
        return $authUser->id === $user->id;
    }

    public function update(User $authUser, User $user) // recibimos el usuario autenticado, este primer parámtro es pasado automáticamente por Laravel
    {
        return $authUser->id === $user->id;
    }
}
