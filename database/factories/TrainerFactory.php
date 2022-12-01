<?php

namespace Database\Factories;

use App\Models\Trainer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

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
            // 'first_name' => 'Tonatiuh',
            // 'last_name' => 'Rodriguez',
            // 'user_name' => 'azt3k',
            // 'email' => 'tr@example.com',
            // 'password' => 'password123'
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'user_name' => $this->faker->userName(),
            'email' => $this->faker->email(),
            // 'password' => Hash::make($this->faker->password()),
            'password' => 'password123',

        ];
    }
}
