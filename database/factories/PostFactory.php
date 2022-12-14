<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(mt_rand(3, 8)),
            'slug' => $this->faker->slug(),
            'excerpt' => $this->faker->sentence(mt_rand(8, 15)),
            // 'body' => '<p>' . implode('</p><p>', $this->faker->paragraphs(mt_rand(10, 20))) . '</p>',
            'body' => collect($this->faker->paragraphs(mt_rand(10, 20)))->map(fn ($p) => "<p>$p</p>")->implode(''),
            'category_id' => mt_rand(1, 2),
            'user_id' => mt_rand(1, 5)
        ];
    }
}
