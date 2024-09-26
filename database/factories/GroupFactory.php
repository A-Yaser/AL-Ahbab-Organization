<?php

namespace Database\Factories;

use App\Models\Center;
use App\Models\Institute;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Group>
 */
class GroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word,
            'teacher_id' => Teacher::inRandomOrder()->first()->id,
            'institute_id' => Institute::inRandomOrder()->first()->id,
            'center_id' => Center::inRandomOrder()->first()->id,
        ];
    }
}
