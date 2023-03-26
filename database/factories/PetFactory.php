<?php

namespace Database\Factories;

use App\Models\Race;
use App\Models\Species;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pet>
 */
class PetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
             'name' => fake()->name,
             'parent_id' => User::factory()->create()->getKey(),
             'species_id' => Species::factory()->create()->getKey(),
             'race' => Race::factory()->create()->name,
             'color' => fake()->colorName(),
        ];
    }
}
