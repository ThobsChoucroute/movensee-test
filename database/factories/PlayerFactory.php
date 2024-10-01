<?php

namespace Database\Factories;

use App\Enums\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "lastname" => $this->faker->name(),
            "firstname" => $this->faker->name(),
            "birth_date" => $this->faker->date(),
            "arrived_at" => $this->faker->date(),
            "role" => $this->faker->randomElement(Role::cases())->value,
        ];
    }
}
