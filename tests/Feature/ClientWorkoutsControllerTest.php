<?php

namespace Tests\Feature;

use App\Models\Client;
use App\Models\Trainer;
use App\Models\Workout;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClientWorkoutsControllerTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function trainer_can_view_workouts()
    {
        $trainer = Trainer::factory()
            ->has(Client::factory()->has(Workout::factory()->count(10)))
            ->create();
        

        $response = $this->actingAs($trainer)
            ->getJson('api/clients/'. 1 . '/workouts');

        $response->dump()
            ->assertStatus(200);
    }

    /** @test */
    public function trainer_can_create_workouts()
    {
        $trainer = Trainer::factory()
            ->has(Client::factory())
            ->create();

        $response = $this->actingAs($trainer)
            ->postJson('api/clients/'. 1 . '/workouts', [
                'client_id' => 1,
                'date' => '2022-11-02',
            ]);
        
        $response->dump()
            ->assertStatus(201);
    }

    /** @test */
    public function trainer_can_get_workout()
    {
        $trainer = Trainer::factory()
            ->has(Client::factory()->has(Workout::factory()->count(10)))
            ->create();

        $response = $this->actingAs($trainer)
            ->getJson('api/clients/'. 1 . '/workouts/' . 1);

        $response->dump()
            ->assertStatus(200); 
    }

    /** @test */
    public function trainer_can_edit_workout()
    {
        $trainer = Trainer::factory()
            ->has(Client::factory()->has(Workout::factory()->count(10)))
            ->create();

        $response = $this->actingAs($trainer)
            ->putJson('api/clients/'. 1 . '/workouts/' . 1, [
                'client_id' => 1,
                'date' => '2022-11-02',
            ]);
        
        $response->dump()
            ->assertStatus(200);
    }

    /** @test */
    public function trainer_can_delete_workout()
    {
        $trainer = Trainer::factory()
            ->has(Client::factory()->has(Workout::factory()->count(2)))
            ->create();
            
        $response = $this->actingAs($trainer)
            ->deleteJson('api/clients/' . 1 . '/workouts/' . 1);
 
        $response->dump()
            ->assertStatus(200);
    }
}
