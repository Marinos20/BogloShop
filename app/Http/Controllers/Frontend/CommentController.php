<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Stocker un commentaire ou une réponse
     */
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'author_name'  => 'required|string|max:255',
            'author_email' => 'nullable|email',
            'content'      => 'required|string|min:3',
            'parent_id'    => 'nullable|exists:comments,id',
        ]);

        $post->comments()->create([
            'author_name'  => $request->author_name,
            'author_email' => $request->author_email,
            'content'      => $request->content,
            'parent_id'    => $request->parent_id,
        ]);

        return back()->with('success', '✅ Votre commentaire a été publié avec succès !');
    }

    /**
     * Charger plus de commentaires via AJAX
     */
    public function loadMore(Request $request, Post $post)
    {
        $perPage = 5;
        $page = $request->page ?? 1;

        $comments = $post->comments()
                         ->whereNull('parent_id')
                         ->where('is_approved', true)
                         ->latest()
                         ->skip(($page - 1) * $perPage)
                         ->take($perPage)
                         ->get();

        return view('frontend.partials.comments', compact('comments'))->render();
    }
}
