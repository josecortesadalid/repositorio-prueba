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

    public function before($user, $ability) // método que se ejecutará antes. Si devuelve true, no se ejecutarán los otros
    {
        if($user->isAdmin()){
            return true;
        }
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
