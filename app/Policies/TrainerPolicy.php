<?php

namespace App\Policies;

use App\Models\Trainer;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Request;

class TrainerPolicy
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
     * @param  \App\Models\Trainer  $trainer
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Trainer $trainer)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Trainer  $trainer
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Trainer $trainer)
    {
        // Check if user provided password matches the account's password in the DB
        // ? Can we use request objects in these policy files?
        // dd($trainer);
        // return true;
        return $trainer->id === 4;

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Trainer  $trainer
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Trainer $trainer)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Trainer  $trainer
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Trainer $trainer)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Trainer  $trainer
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Trainer $trainer)
    {
        //
    }
}
