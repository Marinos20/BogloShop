<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'excerpt',
        'content',
        'thumbnail',
        'is_published',
        'published_at',
        'meta_title',
        'meta_keyword',
        'meta_description',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    /**
     * Relation avec User (auteur du post)
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relation avec Comment (uniquement les commentaires racine)
     */
    public function comments()
    {
        return $this->hasMany(Comment::class)
                    ->whereNull('parent_id') // uniquement les commentaires principaux
                    ->where('is_approved', true) // uniquement les approuvés
                    ->latest(); // les plus récents en premier
    }
}
