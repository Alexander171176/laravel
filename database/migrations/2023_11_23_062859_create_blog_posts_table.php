<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('url');
            $table->mediumText('author')->nullable();
            $table->string('image_url')->nullable();
            $table->string('seo_alt')->nullable();
            $table->string('seo_title')->nullable();
            $table->string('image_url_preview')->nullable();
            $table->string('preview_alt')->nullable();
            $table->string('preview_title')->nullable();
            $table->mediumText('description')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->mediumText('meta_desc')->nullable();
            $table->string('linked')->nullable();
            $table->integer('views')->nullable();
            $table->tinyInteger('activity')->default(0)->nullable(false);
            $table->bigInteger('sort')->default(0)->nullable(false);
            $table->unsignedBigInteger('blog_category_id')->nullable();
            $table->timestamps();

            $table->index('blog_category_id', 'blog_post_blog_category_idx');
            $table->foreign('blog_category_id', 'blog_post_blog_category_fk')
                ->on('blog_categories')
                ->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_posts');
    }
};
