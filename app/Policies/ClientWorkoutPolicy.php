<?php

namespace App\Policies;

use App\Models\Client;
use App\Models\Trainer;
use App\Models\User;
use App\Models\Workout;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClientWorkoutPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(Trainer $trainer)
    {
        // return $trainer->id === 

    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Workout  $workout
     * @return mixed
     */
    public function view(User $user, Workout $workout)
    {
        // return 
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
     * @param  \App\Models\Workout  $workout
     * @return mixed
     */
    public function update(Trainer $trainer, Client $client)
    {
        //
        return $trainer->id === $client->trainer_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Workout  $workout
     * @return mixed
     */
    public function delete(Trainer $trainer, Client $client)
    {
        return $trainer->id === $client->trainer_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Workout  $workout
     * @return mixed
     */
    public function restore(User $user, Workout $workout)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Workout  $workout
     * @return mixed
     */
    public function forceDelete(User $user, Workout $workout)
    {
        //
    }
}
