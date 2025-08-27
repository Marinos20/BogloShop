<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;

class BlogController extends Controller
{
    // Liste des articles
    public function index()
    {
        return view('admin.blog.index'); // vue Livewire admin.blog.index
    }

    // Formulaire création
    public function create()
    {
        return view('admin.blog.create'); // vue Livewire admin.blog.create
    }

    // Formulaire édition
    public function edit(Post $post)
    {
        return view('admin.blog.edit', compact('post')); // vue Livewire admin.blog.edit
    }
}

