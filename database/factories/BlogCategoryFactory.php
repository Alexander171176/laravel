<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BlogCategory>
 */
class BlogCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => ucfirst($this->faker->word),
            'url' => $this->faker->url(),
            'image_url' => $this->faker->imageUrl(300,200, null, false),
            'seo_alt' => $this->faker->words(2,true),
            'seo_title' => $this->faker->words(2,true),
            'description' => $this->faker->text(150),
            'meta_title' => $this->faker->words(2, true),
            'meta_keywords' => $this->faker->words(5, true),
            'meta_desc' => $this->faker->text(150),
            'activity' => '1',
            'sort' => $this->faker->numberBetween(1, 12),
        ];
    }
}
