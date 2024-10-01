<?php

namespace Database\Factories;

use App\Models\Player;
use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Team>
 */
class TeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => "U" . $this->faker->randomDigit(),
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function (Team $team) {
            for ($i = 0; $i < 12; $i++) {
                $team->players()->attach(Player::find($this->faker->numberBetween(1, 200)));
            }
        });
    }
}
