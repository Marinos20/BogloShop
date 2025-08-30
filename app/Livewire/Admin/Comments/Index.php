<?php

namespace App\Livewire\Admin\Comments;

use Livewire\Component;
use App\Models\Comment;

class Index extends Component
{
    public $comments;
    public $confirmingCommentDeletion = null;

    /**
     * Chargement initial des commentaires
     */
    public function mount()
    {
        $this->loadComments();
    }

    /**
     * Charge les commentaires racines avec leurs réponses
     */
    public function loadComments()
    {
        $this->comments = Comment::with('post', 'replies')
            ->whereNull('parent_id')
            ->latest()
            ->get();
    }

    /**
     * Changer le statut d'approbation d'un commentaire
     */
    public function toggleApproval($commentId)
    {
        $comment = Comment::findOrFail($commentId);
        $comment->is_approved = !$comment->is_approved;
        $comment->save();

        session()->flash('success', 'Statut du commentaire mis à jour !');
        $this->loadComments();
    }

    /**
     * Définir le commentaire à supprimer (confirmation)
     */
    public function confirmDelete($commentId)
    {
        $this->confirmingCommentDeletion = $commentId;
    }

    /**
     * Supprimer le commentaire sélectionné
     */
    public function deleteComment()
    {
        if (!$this->confirmingCommentDeletion) {
            return;
        }

        $comment = Comment::findOrFail($this->confirmingCommentDeletion);
        $comment->delete();

        session()->flash('success', 'Commentaire supprimé avec succès !');
        $this->confirmingCommentDeletion = null;
        $this->loadComments();

        $this->dispatchBrowserEvent('close-modal');
    }

    /**
     * Rendu de la vue Livewire
     */
    public function render()
    {
        return view('livewire.admin.comments.index');
    }
}
