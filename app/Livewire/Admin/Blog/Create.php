<?php

namespace App\Livewire\Admin\Blog;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class Create extends Component
{
    use WithFileUploads;

    // Propriétés du formulaire
    public $postId;
    public $title;
    public $excerpt;
    public $content;
    public $thumbnail = null;
    public $meta_title;
    public $meta_keyword;
    public $meta_description;
    public $is_published = false;
    public $published_at;

    // Validation
    protected $rules = [
        'title'            => ['required', 'string', 'max:255'],
        'excerpt'          => ['nullable', 'string'],
        'content'          => ['required', 'string'],
        'thumbnail'        => ['nullable', 'image', 'max:2048'],
        'meta_title'       => ['nullable', 'string', 'max:255'],
        'meta_keyword'     => ['nullable', 'string', 'max:255'],
        'meta_description' => ['nullable', 'string'],
        'is_published'     => ['boolean'],
        'published_at'     => ['nullable', 'date'],
    ];

    // Chargement si édition
    public function mount($postId = null)
    {
        $this->postId = $postId;

        if ($postId) {
            $post = Post::findOrFail($postId);

            $this->title            = $post->title;
            $this->excerpt          = $post->excerpt;
            $this->content          = $post->content;
            $this->meta_title       = $post->meta_title;
            $this->meta_keyword     = $post->meta_keyword;
            $this->meta_description = $post->meta_description;
            $this->is_published     = $post->is_published;
            $this->published_at     = $post->published_at;
        }
    }

    // Création
    public function store()
    {
        $validatedData = $this->validate();

        $validatedData['slug']         = Str::slug($this->title);
        $validatedData['is_published'] = $this->is_published ? 1 : 0;
        $validatedData['user_id']      = Auth::id();
         

        if ($this->thumbnail) {
            $fileName = time() . '.' . $this->thumbnail->getClientOriginalExtension();
            $this->thumbnail->storeAs('uploads/blog', $fileName, 'public');
            $validatedData['thumbnail'] = $fileName;

           
        }

        Post::create($validatedData);

        session()->flash('message', 'Article ajouté avec succès ✅');
        return redirect()->route('admin.blog.index');
    }

    // Mise à jour
    public function update()
    {
        $validatedData = $this->validate();

        $post = Post::findOrFail($this->postId);

        $validatedData['slug']         = Str::slug($this->title);
        $validatedData['is_published'] = $this->is_published ? 1 : 0;

        if ($this->thumbnail) {
            $fileName = time() . '.' . $this->thumbnail->getClientOriginalExtension();
            $this->thumbnail->storeAs('uploads/blog', $fileName, 'public');
            $validatedData['thumbnail'] = $fileName;
        }

        $post->update($validatedData);

        session()->flash('message', 'Article mis à jour avec succès ✏️');
        return redirect()->route('admin.blog.index');
    }

    public function render()
    {
        return view('livewire.admin.blog.create');
    }
}
