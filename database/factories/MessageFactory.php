<?php

namespace Database\Factories;

use App\Models\Matches;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $user = User::factory()->create();
        $match = Matches::factory()->create();
        return [
            'content' => $this->faker->paragraph(),
            'user_id' => $match->game->user_id,
            'match_id' => $match->id,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
