<?php

namespace App\Livewire\Admin\Blog;

use App\Models\Post;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $post;
    public $none = "";

    protected $paginationTheme = 'tailwind';

    // Placeholder si pas d'article
    public function placeholder()
    {
        $name = "Posts";
        return view('admin.placeholder.index-table', compact('name'));
    }

    // Préparer la suppression
    public function deletePost(Post $post)
    {
        $this->post = $post;
    }

    // Supprimer l'article et son image
    public function destroy()
    {
        if ($this->post->thumbnail && File::exists('storage/uploads/blog/' . $this->post->thumbnail)) {
            File::delete('storage/uploads/blog/' . $this->post->thumbnail);
        }

        $this->post->delete();

        session()->flash('message', 'Post supprimé avec succès.');

        $this->dispatch('close-modal');
    }

    // Mettre à jour le statut de publication
    public function updateStatus($id)
    {
        $post = Post::select(['id', 'is_published'])->find($id);

        if (!$post) return;

        $post->update([
            'is_published' => !$post->is_published,
        ]);
    }

    public function render()
    {
        $posts = Post::select([
            'id',
            'title',
            'thumbnail',
            'is_published',
            'published_at',
        ])
        ->orderBy('id', 'DESC')
        ->paginate(10);

        $this->none = "Aucun article de blog ajouté pour l’instant.";

        return view('livewire.admin.blog.index', compact('posts'));
    }
}
