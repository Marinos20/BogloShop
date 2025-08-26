<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product; // ou ton modèle réel

class SearchProduct extends Component
{
    public $search = '';

    public function setSearchTag($tag)
    {
        $this->search = $tag;
    }

    public function render()
    {
        $products = Product::where('name', 'like', '%' . $this->search . '%')
                           ->orWhere('description', 'like', '%' . $this->search . '%')
                           ->get();

        return view('livewire.search-product', compact('products'));
    }
}

