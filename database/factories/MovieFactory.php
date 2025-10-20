<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $dacastLinks = [
            'https://iframe.dacast.com/live/12345/abcdef',
            'https://iframe.dacast.com/live/67890/ghijkl',
            'https://iframe.dacast.com/live/11121/mnopqr',
        ];

        return [
            'title' => $this->faker->sentence(3),
            'category' => $this->faker->randomElement(['documentary', 'fiction']),
            'dacast_embed' => $this->faker->randomElement($dacastLinks),
            'poster' => 'https://picsum.photos/300/450?random=' . $this->faker->unique()->numberBetween(1, 200),
            'description' => $this->faker->paragraph(3),
            'release_date' => $this->faker->dateTimeBetween('-2 years', 'now'),
            'rating' => $this->faker->randomFloat(1, 5, 9),
            'views' => $this->faker->numberBetween(100, 5000),
        ];
    }
}
