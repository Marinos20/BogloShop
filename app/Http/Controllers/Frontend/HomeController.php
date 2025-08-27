<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post; // 
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::where('status', 1)
            ->select(['id', 'name', 'image', 'slug'])
            ->limit(4)
            ->get();

        $posts = Post::where('is_published', 1)
            ->latest()
            ->take(6) // tu peux changer le nombre
            ->get();

        return view('frontend.index', compact('categories', 'posts'));
    }
}

