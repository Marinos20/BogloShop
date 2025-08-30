<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',      // ID de l'article lié
        'parent_id',    // ID du commentaire parent (si réponse)
        'author_name',  // Nom de l'auteur
        'author_email', // Email de l'auteur
        'content',      // Contenu du commentaire
        'is_approved',  // Statut d'approbation
    ];

    /**
     * Un commentaire appartient à un article
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    /**
     * Un commentaire peut avoir plusieurs réponses (relation récursive)
     */
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id')->with('replies');
    }

    /**
     * Un commentaire peut avoir un parent
     */
    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }
}
