<?php

namespace Database\Seeders;

use App\Models\BlogPostBlogTag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogPostBlogTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BlogPostBlogTag::factory()->count(20)->create();
    }
}
