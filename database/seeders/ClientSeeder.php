<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Workout;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Client::factory()
            ->count(10)
            ->create();
    }
}
