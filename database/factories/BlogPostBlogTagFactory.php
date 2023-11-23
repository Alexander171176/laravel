<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BlogPostBlogTag>
 */
class BlogPostBlogTagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'blog_post_id' => $this->faker->numberBetween(1, 12),
            'blog_tag_id' => $this->faker->numberBetween(1, 30),
        ];
    }
}
