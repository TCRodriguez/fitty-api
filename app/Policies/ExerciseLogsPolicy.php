<?php

namespace App\Policies;

use App\Models\Client;
use App\Models\ExerciseLog;
use App\Models\Trainer;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ExerciseLogsPolicy
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
     * @param  \App\Models\ExerciseLog  $exerciseLog
     * @return mixed
     */
    public function view(Trainer $trainer, Client $client)
    {
        return $trainer->id === $client->id;
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
     * @param  \App\Models\ExerciseLog  $exerciseLog
     * @return mixed
     */
    public function update(User $user, ExerciseLog $exerciseLog)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ExerciseLog  $exerciseLog
     * @return mixed
     */
    public function delete(User $user, ExerciseLog $exerciseLog)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ExerciseLog  $exerciseLog
     * @return mixed
     */
    public function restore(User $user, ExerciseLog $exerciseLog)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ExerciseLog  $exerciseLog
     * @return mixed
     */
    public function forceDelete(User $user, ExerciseLog $exerciseLog)
    {
        //
    }
}
