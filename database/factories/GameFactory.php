<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $namesGames = [
            'Call of Dutty: Black Ops',
            'Call of Dutty: Black Ops II',
            'Call of Dutty: Black Ops III',
            'Hollow Knight',
            'Hollow Knight: Silksong',
            'Portal',
            'Portal 2',
            'Overwatch',
            'Paladins',
            'Heartstone',
            'Legends of Runeterra',
            'League Of Legends',
            'League Of Legends: Wild Rift',
            'Valorant',
            'Counter Stike 1.6',
            'Counter Stike Sorce',
            'Counter Stike: Global Offensive',
            'Counter Stike 2',
            'Minecraft',
            'Roblox',
            'Fornite',
            'Wii Sports',
            'Golf It!',
            'Street Fighter',
        ];
        $genreGames = [
            'Adventure',
            'Action',
            'Platforms',
            'Fighting',
            'Sports',
            'Simulation',
            'Shooter',
            'Strategy',
            'Survival',
            'Puzzle'
        ];

        $user = User::factory()->create();

        return [
            'name' => fake()->randomElement($namesGames),
            'genre' => fake()->randomElement($genreGames),
            'ftp_support' => $this->faker->boolean(),
            'user_id' => $user->id,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
