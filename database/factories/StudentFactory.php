<?php

namespace Database\Factories;

use App\Models\Group;
use App\Models\Institute;
use App\Models\Person;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'name' => fake()->name,
            // 'person_id' => Person::factory(),
            // 'group_id' => Group::factory(),
            // 'subject_id' => Subject::factory(),

            'person_id' => Person::factory(),
            'group_id' => Group::inRandomOrder()->first()->id,
            'subject_id' => Subject::inRandomOrder()->first()->id,
        ];
    }
}
