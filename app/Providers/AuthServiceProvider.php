<?php

namespace App\Providers;

use App\Models\ExercisePolicy;
use App\Policies\ClientPolicy;
use App\Policies\ExerciseLogsPolicy;
use App\Policies\TrainerPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Trainer::class => TrainerPolicy::class,
        Client::class => ClientPolicy::class,
        Exercise::class => ExercisePolicy::class,
        ClientWorkout::class => ClientWorkoutPolicy::class,
        ExerciseLog::class => ExerciseLogsPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
