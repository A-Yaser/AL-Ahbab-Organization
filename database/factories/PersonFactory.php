<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Person>
 */
class PersonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'name' => fake()->name,
            'username' => fake()->userName,
            'profile_picture' => 'avatar.png',
            'birth_day' => fake()->date(),
            'phone' => fake()->phoneNumber,
            'sex' => fake()->randomElement(['male', 'female']),
            'address' => fake()->address,
            'IsMarried' => fake()->boolean,
            'Status' => true,
        ];
    }
}
