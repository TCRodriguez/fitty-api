<?php

namespace Database\Factories;

use App\Models\Trainer;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrainerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Trainer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'first_name' => 'Tonatiuh',
            'last_name' => 'Rodriguez',
            'user_name' => 'azt3k',
            'email' => 'tr@example.com',
            'password' => 'password123'

        ];
    }
}
