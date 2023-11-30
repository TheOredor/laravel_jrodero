<?php

namespace Database\Factories;

use App\Models\Game;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Matches>
 */
class MatchesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $game = Game::factory()->create();
        return [
            'name' => $this->faker->sentence(3),
            'game_id' => $game->id,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
