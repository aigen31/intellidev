<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PostTranslation>
 */
class PostTranslationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $text = '';

        for ($i = 0; $i < 20; $i++) {
            $text .= '<p>' . fake()->paragraph(3) . '</p>';
        }

        return [
            'title' => fake()->sentence(),
            'content' => $text,
        ];
    }
}
