<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class ProductController extends Controller
{
    public function index(){
        return view('admin.product.index');
    }

    public function create(){


        $colors = Color::select(['id', 'name'])->get();

        return view('admin.product.create', compact( 'colors'));
    }

public function edit($id)
{
    $product = Product::with('productImages', 'productColors.color', 'category')->where('id', $id)->select([
        'id',
        'category_id',
        'name',
        'slug',
        'small_description',
        'description',
        'original_price',
        'selling_price',
        'quantity',
        'trending',
        'status',
        'type',
        'material',
        'sale_starts_at',  
        'sale_ends_at', 
        'style'
    ])->first();

    $product_color = $product->productColors->pluck('color_id')->toArray();

    $colors = Color::whereNotIn('id', $product_color)->select(['id', 'name'])->get();

    return view('admin.product.edit', compact('product', 'colors'));
}

}
