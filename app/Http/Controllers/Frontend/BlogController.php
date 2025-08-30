<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;

class BlogController extends Controller
{
    // Liste des articles publiés
    public function index()
    {
        $posts = Post::where('is_published', true)
                     ->withCount(['comments' => function($query) {
                         $query->whereNull('parent_id')      // seulement les commentaires racines
                               ->where('is_approved', true); // seulement les approuvés
                     }])
                     ->latest()
                     ->paginate(9); // ✅ paginate pour la pagination

        return view('frontend.blog.index', compact('posts'));
    }

    // Affichage d'un article spécifique
    public function show($slug)
    {
        // Récupérer l'article
        $post = Post::where('slug', $slug)
                    ->where('is_published', true)
                    ->withCount(['comments' => function($query) {
                        $query->whereNull('parent_id')
                              ->where('is_approved', true);
                    }])
                    ->firstOrFail();

        // Récupérer les 5 derniers articles récents (hors article courant)
        $recentPosts = Post::where('is_published', true)
                           ->where('id', '<>', $post->id)
                           ->latest()
                           ->take(5)
                           ->get();

        return view('frontend.blog.show', compact('post', 'recentPosts'));
    }
}
