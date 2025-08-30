<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Afficher tous les commentaires via Livewire
     */
    public function index()
    {
        // On retourne une vue parent qui contient le composant Livewire
        return view('admin.comment.comments'); // <-- corrigé ici
    }

    /**
     * Approuver ou désapprouver un commentaire
     */
    public function toggleApproval(Comment $comment)
    {
        $comment->is_approved = !$comment->is_approved;
        $comment->save();

        return back()->with('success', '✅ Statut du commentaire mis à jour !');
    }

    /**
     * Supprimer un commentaire (et ses réponses)
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back()->with('success', '✅ Commentaire supprimé avec succès !');
    }
}
