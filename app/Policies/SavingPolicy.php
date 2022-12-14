<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SavingPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function create(User $user)
    {
       return $user->hasRole('bendahara');
    }

    public function cetak(User $user)
    {
        return $user->hasRole(['ketua|bendahara']);
    }
}
