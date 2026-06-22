<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NewsFactory extends Factory
{
    public function definition(): array
    {
        $title = $this->faker->sentence;
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'excerpt' => $this->faker->paragraph,
            'content' => $this->faker->paragraphs(5, true),
            'image_url' => 'https://picsum.photos/seed/' . rand(1, 1000) . '/800/400',
            'published_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
