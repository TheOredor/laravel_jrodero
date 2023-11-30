<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'password' => Hash::make('12345678'),
            'email' => fake()->unique()->safeEmail(),
            'role_id' => fake()->randomElement([1, 2, 3]),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
