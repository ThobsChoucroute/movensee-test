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
        Player::factory(200)->create();

        Team::factory(10)->create();

        Team::factory()
            ->create([
                "name" => "Sénior",
            ]);

        Team::factory()->create([
            "name" => "Vétéran",
        ]);

    }
}
