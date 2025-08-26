<?php

namespace App\Livewire\Admin\Blog;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Create extends Component
{
    use WithFileUploads;

    public $title;
    public $excerpt;
    public $content;
    public $is_published = false;
    public $published_at;
    public $thumbnail; // image unique
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

    public function store()
    {
        $validatedData = $this->validate();

        // Slug unique
        $slug = Str::slug($this->title);
        $count = Post::where('slug', 'like', $slug . '%')->count();
        $validatedData['slug'] = $count ? "{$slug}-{$count}" : $slug;

        $validatedData['user_id'] = auth()->id();
        $validatedData['is_published'] = $this->is_published ? 1 : 0;

        // Si publié sans date, on définit maintenant
        if ($this->is_published && !$this->published_at) {
            $validatedData['published_at'] = now();
        } else {
            $validatedData['published_at'] = $this->published_at;
        }

        // Upload image si présente
        if ($this->thumbnail) {
            $fileName = time() . '.' . $this->thumbnail->getClientOriginalExtension();
            $this->thumbnail->storeAs('uploads/blog', $fileName, 'public');
            $validatedData['thumbnail'] = $fileName;
        }

        Post::create($validatedData);

        session()->flash('success', 'Post Added Successfully');

        // Reset du formulaire
        $this->reset([
            'title', 'excerpt', 'content', 'is_published',
            'published_at', 'thumbnail', 'meta_title',
            'meta_keyword', 'meta_description'
        ]);

        return redirect()->route('admin.blog.index');
    }

    public function render()
    {
        return view('livewire.admin.blog.create');
    }
}
