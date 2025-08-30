<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Comment;
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
}
