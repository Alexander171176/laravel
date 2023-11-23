<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPostBlogTag extends Model
{
    use HasFactory;

    protected $table = 'blog_post_blog_tags';
    protected $guarded = false;
}
