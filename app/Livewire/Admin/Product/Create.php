<?php

namespace App\Livewire\Admin\Product;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Create extends Component
{
    use WithFileUploads;

    public $colors;

    public $category_id;
    public $name;
    public $small_description;
    public $description;
    public $original_price;
    public $selling_price;
    public $quantity;
    public $trending = false;
    public $status = false;
    public $meta_title;
    public $meta_keyword;
    public $meta_description;
    public $image = null; // null au lieu []
    public $color = [];
    public $size = [];
    public $type;
    public $material;
    public $style;

    // Période de vente
    public $sale_starts_at;
    public $sale_ends_at;

    protected $rules = [
        'category_id' => ['required', 'integer'],
        'name' => ['required', 'string'],
        'small_description' => ['required', 'string'],
        'description' => ['required', 'string'],
        'original_price' => ['required', 'integer'],
        'selling_price' => ['required', 'integer'],
        'quantity' => ['required', 'integer'],
        'image' => ['required', 'array', 'min:2'],
        'image.*' => ['required', 'mimes:jpg,png,jpeg,jfif'],
        'color' => ['required', 'array', 'min:1'],
        'color.*' => ['integer'],
        'size' => ['required', 'array', 'min:1'],
        'size.*' => ['string'],
        'type' => ['required', 'string'],
        'material' => ['required', 'string'],
        'style' => ['required', 'string'],
        'sale_starts_at' => ['nullable', 'date'],
        'sale_ends_at' => ['nullable', 'date', 'after_or_equal:sale_starts_at'],
    ];

    public function store()
    {
        $validatedData = $this->validate();

        $category = Category::findOrFail($validatedData['category_id']);

        $validatedData['slug'] = Str::slug($validatedData['name']);
        $validatedData['trending'] = $this->trending ? 1 : 0;
        $validatedData['status'] = $this->status ? 1 : 0;
        $validatedData['meta_title'] = $this->name;
        $validatedData['meta_keyword'] = $this->name;
        $validatedData['meta_description'] = $this->description;
        $validatedData['sale_starts_at'] = $this->sale_starts_at;
        $validatedData['sale_ends_at'] = $this->sale_ends_at;

        $product = $category->products()->create($validatedData);

        if ($this->image) {
            $i = 1;
            foreach ($this->image as $imageFile) {
                $fileName = time() . '_' . $i++ . '.' . $imageFile->getClientOriginalExtension();
                $imageFile->storeAs('uploads/products/', $fileName, 'public');
                $product->productImages()->create(['image' => $fileName]);
            }
        }

        if ($this->color) {
            foreach ($this->color as $color_id) {
                $product->productColors()->create(['color_id' => $color_id]);
            }
        }

        if ($this->size) {
            foreach ($this->size as $sizeValue) {
                $product->productSizes()->create(['size' => $sizeValue]);
            }
        }

        session()->flash('message', 'Product Added Successfully');

        return redirect()->route('product.index');
    }

    public function render()
    {
        $categories = Category::all();
        $this->colors = \App\Models\Color::all();

        return view('livewire.admin.product.create', compact('categories'));
    }
}
