<?php

namespace Database\Seeders;

use App\Models\Player;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Team;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Player::factory(50)->create();

        Team::factory(10)->create();

        Team::factory()
            ->has(Player::factory(5))
            ->create([
                "name" => "Sénior",
            ]);

        Team::factory()->create([
            "name" => "Vétéran",
        ]);

    }
}
