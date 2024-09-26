<?php

namespace Database\Factories;

use App\Models\Student;
use App\Models\Subject;
use App\Models\Tester;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Exam>
 */
class ExamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tester_id' => Tester::factory(),
            'student_id' => Student::factory(),
            'score' => fake()->numberBetween(0, 100),
            'result' => fake()->randomElement(['pass', 'fail']),
            'date' => fake()->date(),
            'subject_id' => Subject::factory(),
            'juz' => fake()->numberBetween(1, 30),
            'certificate' => null,
        ];
    }
}
