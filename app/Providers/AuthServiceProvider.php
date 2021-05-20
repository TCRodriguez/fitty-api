<?php

namespace App\Providers;

use App\Policies\ClientPolicy;
use App\Policies\ExerciseLogsPolicy;
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
        Client::class => ClientPolicy::class,
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
