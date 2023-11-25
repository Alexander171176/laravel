<?php

namespace App\Http\Controllers\BlogPost;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Inertia\Inertia;

class Index extends Controller
{
    public function index()
    {
        $posts = BlogPost::all(); // Получаем все посты из таблицы posts

        return Inertia::render('BlogPost/Index', ['posts' => $posts]);
    }
}
