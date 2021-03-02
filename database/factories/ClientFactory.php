<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Trainer;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'trainer_id' => Trainer::factory(),
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'starting_weight' => $this->faker->numberBetween(100, 400),
            'email' => $this->faker->email(),
            // 'phone_number' => $this->phoneNumber()
        ];
    }
}
