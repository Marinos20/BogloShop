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

    public function deletePost(Post $post)
    {
        $this->post = $post;
    }

    public function destroy()
    {
        if ($this->post->thumbnail && File::exists('storage/uploads/blog/' . $this->post->thumbnail)) {
            File::delete('storage/uploads/blog/' . $this->post->thumbnail);
        }

        $this->post->delete();

        session()->flash('message', 'Post deleted');

        $this->dispatch('close-modal');
    }

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
        ])->orderBy('id', 'DESC')->paginate(10);

        $this->none = "No Blog Post Added Yet";

        return view('livewire.admin.blog.index', compact('posts'));
    }
}
