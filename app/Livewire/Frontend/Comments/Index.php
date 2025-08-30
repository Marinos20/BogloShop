<?php

namespace App\Livewire\Frontend\Comments;

use Livewire\Component;
use App\Models\Comment;

class Index extends Component
{
    public $post;
    public $comments;

    public $author_name;
    public $author_email;
    public $content;

    protected $rules = [
        'author_name' => 'required|string|max:255',
        'author_email' => 'nullable|email|max:255',
        'content' => 'required|string',
    ];

    public function mount($post)
    {
        $this->post = $post;
        $this->loadComments();
    }

    public function loadComments()
    {
        $this->comments = Comment::where('post_id', $this->post->id)
            ->whereNull('parent_id')
            ->with('replies.user')
            ->latest()
            ->get();
    }

    public function addComment()
    {
        $validated = $this->validate();

        Comment::create([
            'post_id' => $this->post->id,
            'author_name' => $this->author_name,
            'author_email' => $this->author_email,
            'content' => $this->content,
        ]);

        session()->flash('success', 'Commentaire ajouté avec succès !');

        $this->reset(['author_name', 'author_email', 'content']);
        $this->loadComments();
    }

    public function render()
    {
        return view('livewire.frontend.comments.index');
    }
}
