<?php

namespace Database\Seeders;

use App\Models\Workout;
use Illuminate\Database\Seeder;

class WorkoutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Workout::factory()
            ->count(50)
            ->create();
    }
}
