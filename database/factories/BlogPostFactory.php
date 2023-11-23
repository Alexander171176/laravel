<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BlogPost>
 */
class BlogPostFactory extends Factory
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
            'author' => $this->faker->words(2, true),
            'image_url' => $this->faker->imageUrl(300,200, null, false),
            'seo_alt' => $this->faker->words(2,true),
            'seo_title' => $this->faker->words(2,true),
            'image_url_preview' => $this->faker->imageUrl(200,100, null, false),
            'preview_alt' => $this->faker->words(2,true),
            'preview_title' => $this->faker->words(2,true),
            'description' => $this->faker->text(150),
            'meta_title' => $this->faker->words(2, true),
            'meta_keywords' => $this->faker->words(5, true),
            'meta_desc' => $this->faker->text(150),
            'linked' => $this->faker->numberBetween(0, 75),
            'views' => $this->faker->numberBetween(120, 300),
            'activity' => '1',
            'sort' => $this->faker->numberBetween(1, 20),
            'blog_category_id' => $this->faker->numberBetween(1, 12),
            'created_at' => $this->faker->dateTime(),
            'updated_at' => Carbon::now(),
        ];
    }
}
