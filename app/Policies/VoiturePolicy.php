<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Voitures;
use Illuminate\Auth\Access\HandlesAuthorization;
use PhpParser\Node\Stmt\Return_;

class VoiturePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Voitures  $voitures
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Voitures $voitures)
    {
      return true ;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return true ;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Voitures  $voitures
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Voitures $voitures)
    {
    return $user->id===$voitures->user->CNE;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Voitures  $voitures
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Voitures $voitures)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Voitures  $voitures
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Voitures $voitures)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Voitures  $voitures
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Voitures $voitures)
    {
        //
    }
}
