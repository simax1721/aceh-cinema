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
        // $dacastLinks = [
        //     'https://iframe.dacast.com/live/12345/abcdef',
        //     'https://iframe.dacast.com/live/67890/ghijkl',
        //     'https://iframe.dacast.com/live/11121/mnopqr',
        // ];

        return [
            'title' => $this->faker->sentence(3),
            'category' => $this->faker->randomElement(['documentary', 'fiction']),
            'dacast_embed' => '<div style="position:relative;padding-bottom:56.25%;overflow:hidden;height:0;max-width:100%;"><iframe id="39e5d509-c095-4ec0-7b41-1b13e9383df6-vod-455a6b63-fa01-49e1-836b-9f94847cb265" src="https://iframe.dacast.com/vod/39e5d509-c095-4ec0-7b41-1b13e9383df6/455a6b63-fa01-49e1-836b-9f94847cb265" width="100%" height="100%" frameborder="0" scrolling="no" allow="autoplay;encrypted-media" allowfullscreen webkitallowfullscreen mozallowfullscreen oallowfullscreen msallowfullscreen style="position:absolute;top:0;left:0;"></iframe></div>',
            'trailer_dacast_embed' => '<div style="position:relative;padding-bottom:56.25%;overflow:hidden;height:0;max-width:100%;"><iframe id="39e5d509-c095-4ec0-7b41-1b13e9383df6-vod-455a6b63-fa01-49e1-836b-9f94847cb265" src="https://iframe.dacast.com/vod/39e5d509-c095-4ec0-7b41-1b13e9383df6/455a6b63-fa01-49e1-836b-9f94847cb265" width="100%" height="100%" frameborder="0" scrolling="no" allow="autoplay;encrypted-media" allowfullscreen webkitallowfullscreen mozallowfullscreen oallowfullscreen msallowfullscreen style="position:absolute;top:0;left:0;"></iframe></div>',
            'thumbnail' => 'https://picsum.photos/200/300?random=' . $this->faker->unique()->numberBetween(1, 200),
            'poster' => 'https://picsum.photos/300/450?random=' . $this->faker->unique()->numberBetween(201, 400),
            'age' => $this->faker->randomElement(['SU', '13+', '17+', '21+']),
            'duration' => $this->faker->numberBetween(60, 500),
            'description' => $this->faker->paragraph(4),
            'release_date' => $this->faker->dateTimeBetween('-2 years', 'now'),
            'actor' => $this->faker->name() . ', ' . $this->faker->name() . ', ' . $this->faker->name(),
            'writter' => $this->faker->name(),
            'producer' => $this->faker->name(),
            'production' => $this->faker->company(),
            'rating' => $this->faker->randomFloat(1, 0, 9),
            'views' => $this->faker->numberBetween(100, 5000),
        ];
    }
}
