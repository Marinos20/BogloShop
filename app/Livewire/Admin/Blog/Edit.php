<?php

namespace App\Livewire\Admin\Blog;

use App\Models\Post;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $post;
    public $title, $excerpt, $content, $is_published, $published_at;
    public $thumbnail, $meta_title, $meta_keyword, $meta_description, $slug;

    protected $rules = [
        'title' => 'required|string|max:255',
        'excerpt' => 'nullable|string',
        'content' => 'required',
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
        $this->published_at = $post->published_at;
        $this->thumbnail = $post->thumbnail;
        $this->meta_title = $post->meta_title;
        $this->meta_keyword = $post->meta_keyword;
        $this->meta_description = $post->meta_description;
        $this->slug = $post->slug;
    }

    public function update()
    {
        $data = $this->validate();
        $data['slug'] = Str::slug($this->title);
        $data['is_published'] = $this->is_published ? 1 : 0;
        $data['published_at'] = $this->published_at;

        if ($this->thumbnail instanceof \Livewire\TemporaryUploadedFile) {
            if ($this->post->thumbnail && File::exists(storage_path('app/public/' . $this->post->thumbnail))) {
                File::delete(storage_path('app/public/' . $this->post->thumbnail));
            }
            $data['thumbnail'] = $this->thumbnail->store('uploads/blog', 'public');
        }

        $this->post->update($data);

        session()->flash('success', 'Post updated successfully.');
        return redirect()->route('admin.blog.index');
    }

    public function render()
    {
        return view('livewire.admin.blog.edit');
    }
}
