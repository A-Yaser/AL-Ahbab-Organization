<?php

namespace Database\Factories;

use App\Models\Manager;
use App\Models\Region;
use App\Models\Tester;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Institute>
 */
class InstituteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'name' => fake()->company,
            'manager_id' => Manager::factory(),
            'tester_id' => Tester::factory(),
            'region_id' => Region::factory(),

        ];
    }
}
