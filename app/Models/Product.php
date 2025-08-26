<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'category_id',
        'subcategory_id',
        'name',
        'slug',
        'small_description',
        'description',
        'original_price',
        'selling_price',
        'quantity',
        'trending',
        'status',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'type',
        'material',
        'style',
        'sale_starts_at',
        'sale_ends_at'
    ];

    protected $casts = [
        'sale_starts_at' => 'datetime',
        'sale_ends_at' => 'datetime',
    ];

    public function productImages()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id')->select(['id', 'image', 'product_id']);
    }

    public function category()
    {
        return $this->belongsTo(Category::class)->select(['id', 'name', 'slug']);
    }

    public function productColors()
    {
        return $this->hasMany(ProductColor::class, 'product_id', 'id')->select(['id', 'color_id', 'product_id']);
    }

    public function productSizes()
    {
        return $this->hasMany(ProductSize::class, 'product_id', 'id');
    }
    
}
