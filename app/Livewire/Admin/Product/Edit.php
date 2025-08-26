<?php

namespace App\Livewire\Admin\Blog;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class Edit extends Component
{
    use WithFileUploads;

    public Post $post;

    public $title;
    public $excerpt;
    public $content;
    public $is_published = false;
    public $published_at;
    public $thumbnail; // nouvelle image
    public $meta_title;
    public $meta_keyword;
    public $meta_description;

    protected $rules = [
        'title' => 'required|string|max:255',
        'excerpt' => 'nullable|string',
        'content' => 'required|string',
        'thumbnail' => 'nullable|image|max:2048',
        'meta_title' => 'nullable|string',
        'meta_keyword' => 'nullable|string',
        'meta_description' => 'nullable|string',
    ];

    public function mount(Post $post)
    {
        $this->post = $post;

        $this->title = $post->title;
        $this->excerpt = $post->excerpt;
        $this->content = $post->content;
        $this->is_published = $post->is_published;
        $this->published_at = $post->published_at ? $post->published_at->format('Y-m-d\TH:i') : null;
        $this->meta_title = $post->meta_title;
        $this->meta_keyword = $post->meta_keyword;
        $this->meta_description = $post->meta_description;
    }

    public function update()
    {
        $validatedData = $this->validate();

        $validatedData['slug'] = Str::slug($this->title);
        $validatedData['is_published'] = $this->is_published ? 1 : 0;
        $validatedData['published_at'] = $this->published_at;

        // gérer le thumbnail
        if ($this->thumbnail) {
            // supprimer l’ancienne image si elle existe
            if ($this->post->thumbnail && File::exists('storage/uploads/blog/' . $this->post->thumbnail)) {
                File::delete('storage/uploads/blog/' . $this->post->thumbnail);
            }

            $fileName = time() . '.' . $this->thumbnail->getClientOriginalExtension();
            $this->thumbnail->storeAs('uploads/blog', $fileName, 'public');
            $validatedData['thumbnail'] = $fileName;
        }

        $this->post->update($validatedData);

        session()->flash('success', 'Post Updated Successfully');
        return redirect()->route('admin.blog.index');
    }

    public function render()
    {
        return view('livewire.admin.blog.edit');
    }
}
