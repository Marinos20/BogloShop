<?php

namespace App\Livewire\Admin\Comments;

use Livewire\Component;
use App\Models\Comment;

class Edit extends Component
{
    public Comment $comment;

    public $author_name;
    public $author_email;
    public $content;
    public $is_approved = true;
    public $confirmingCommentDeletion = false;

    protected $rules = [
        'author_name' => 'required|string|max:255',
        'author_email' => 'nullable|email|max:255',
        'content' => 'required|string',
        'is_approved' => 'boolean',
    ];

    public function mount(Comment $comment)
    {
        $this->comment = $comment;

        $this->author_name = $comment->author_name;
        $this->author_email = $comment->author_email;
        $this->content = $comment->content;
        $this->is_approved = $comment->is_approved;
    }

    /**
     * Met à jour le commentaire
     */
    public function update()
    {
        $validatedData = $this->validate();

        $this->comment->update($validatedData);

        session()->flash('success', 'Commentaire mis à jour avec succès !');

        return redirect()->route('admin.comments.index');
    }

    /**
     * Confirmer la suppression
     */
    public function confirmDelete()
    {
        $this->confirmingCommentDeletion = true;
    }

    /**
     * Supprimer le commentaire
     */
    public function deleteComment()
    {
        $this->comment->delete();

        session()->flash('success', 'Commentaire supprimé avec succès !');

        $this->dispatchBrowserEvent('close-modal');

        return redirect()->route('admin.comments.index');
    }

    public function render()
    {
        return view('livewire.admin.comments.edit');
    }
}
