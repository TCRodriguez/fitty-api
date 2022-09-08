<?php

namespace Database\Factories;

use App\Models\ExerciseLog;
use App\Models\Workout;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExerciseLogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ExerciseLog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'workout_id' => rand(1, 50),
            'exercise_id' => rand(1, 19),
            'sets' => rand(1, 5),
            'reps' => rand(1, 20),
            'weight' => $this->faker->numberBetween(5, 50),
        ];
    }
}
