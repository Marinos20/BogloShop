<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Testimonial;
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
            ->withCount(['comments' => function($query) {
                $query->whereNull('parent_id')      // seulement les commentaires racines
                      ->where('is_approved', true); // seulement les approuvés
            }])
            ->latest()
            ->take(6)
            ->get();

        // Récupérer les témoignages validés
        $testimonials = Testimonial::with('user')
                                   ->where('is_approved', true)
                                   ->latest()
                                   ->get();

        return view('frontend.index', compact('categories', 'posts', 'testimonials'));
    }
}
