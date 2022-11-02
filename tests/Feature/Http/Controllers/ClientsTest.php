<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Client;
use App\Models\Trainer;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClientsTest extends TestCase
{

    use RefreshDatabase;
    // use DatabaseMigrations;

    /** @test */
    public function trainer_can_get_clients()
    {
        $trainer = Trainer::factory()
                        ->has(Client::factory()->count(10))
                        ->create();

        $response = $this->actingAs($trainer)
            ->getJson('api/clients');

        $response->dump();

        $response->assertStatus(200);
        // $response->dump();
    }

    /** @test */
    public function trainer_can_create_client()
    {
        $trainer = Trainer::factory()->create();

        $response = $this->actingAs($trainer)
            ->postJson('api/clients', [
                'first_name' => 'TestClient',
                'last_name' => 'TestClientLastName',
                'starting_weight' => 220,
                'email' => 'testclient@client.com',
                'phone_number' => '111-111-1111'
            ]);

        $response->dump();

        $response->assertStatus(201);
    }

    /** @test */
    public function trainer_can_get_client()
    {
        $trainer = Trainer::factory()
            ->has(Client::factory()->count(10))
            ->create();

        $response = $this->actingAs($trainer)
            ->getJson('api/clients/' . 1);

        $response->assertStatus(200);

    }

    /** @test */
    public function trainer_can_edit_client()
    {
        $trainer = Trainer::factory()
            ->has(Client::factory()->count(10))
            ->create();
        
        $client = Client::findOrFail(1);
        dump($client);
        
        $response = $this->actingAs($trainer)
            ->putJson('api/clients/' . 1, [
                'first_name' => 'EditedName',
                'last_name' => 'EditedLastName',
                'starting_weight' => 222,
                'email' => 'editedemail@email.com',
            ]);

        $response->dump();

        $response->assertStatus(200);
    }

    /** @test */
    public function trainer_can_delete_client()
    {
        $trainer = Trainer::factory()
            ->has(Client::factory()->count(10))
            ->create();

        $response = $this->actingAs($trainer)
            ->deleteJson('api/clients/' . 1);

        // $response->dump();
        $clients = Client::where('trainer_id', 1)->get();
        dump($clients);
        
        $response->assertStatus(200);
    }

    /** @test */
    public function trainer_can_view_own_clients()
    {
        $trainer1 = Trainer::factory()
        ->has(Client::factory()->count(10))
        ->create();

        $trainer2 = Trainer::factory()
        ->has(Client::factory()->count(10))
        ->create();

        $response1 = $this->actingAs($trainer1)
            ->getJson('api/clients');

        dump($trainer1);
        dump($trainer2);

        // $this->assertDatabaseCount('clients', 20);

        // dd($trainer1);
    
    }
}
