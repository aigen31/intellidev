<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        /**
         * Todo: change category relationship
         */
        return [
            'title' => fake()->sentence(),
            'content' => fake()->paragraph(),
            'thumbnail' => 'https://picsum.photos/700/500',
            'user_id' => User::factory(),
            'status' => 1,
        ];
    }
}
