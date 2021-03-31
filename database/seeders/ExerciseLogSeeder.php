<?php

namespace Database\Seeders;

use App\Models\ExerciseLog;
use Illuminate\Database\Seeder;

class ExerciseLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ExerciseLog::factory()
            ->count(100)
            ->create();
    }
}
