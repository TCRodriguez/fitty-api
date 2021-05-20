<?php

namespace App\Policies;

use App\Models\Exercise;
use App\Models\Trainer;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ExercisePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Exercise  $exercise
     * @return mixed
     */
    public function view(Trainer $trainer, Exercise $exercise)
    {
        return $trainer->id === $exercise->trainer_id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Exercise  $exercise
     * @return mixed
     */
    public function update(User $user, Exercise $exercise)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Exercise  $exercise
     * @return mixed
     */
    public function delete(User $user, Exercise $exercise)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Exercise  $exercise
     * @return mixed
     */
    public function restore(User $user, Exercise $exercise)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Exercise  $exercise
     * @return mixed
     */
    public function forceDelete(User $user, Exercise $exercise)
    {
        //
    }
}
