<?php

namespace Tests\Feature\Http\Controllers\Auth;

use App\Models\Trainer;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{

    use RefreshDatabase;
    // use DatabaseMigrations;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    // public function root_gets_login_form()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    /** @test */
    public function login_displays_validation_errors()
    {
        $response = $this->post('/login', []);

        $response->assertStatus(302);
        $response->assertSessionHasErrors('email');
    }


    /** @test */
    public function login_authenticates_trainer ()
    {
        $trainer = Trainer::factory()->create();

        $response = $this->postJson('api/login', [
            'email' => $trainer->email,
            'password' => $trainer->password,
        ]);
        // $response = $this->actingAs($trainer)
        //             ->withSession(['banned' => false]);
        //                 // ->post('/login')
        //                 // ->get('/');

        $response->dump();
        // dump($trainer->password);
        // $trainer2 = Trainer::where('email', $trainer->email)->first();
        // dump($trainer2);

        // $response->dump();

        // look up different assertions
        // we're asserting that the key/token is what we get in response
        // should be a built in assertion in PHPUnit
        $this->assertArrayHasKey("token", $response);
    }
}
