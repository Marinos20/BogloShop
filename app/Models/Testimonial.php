<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    /**
     * Les champs remplissables.
     */
    protected $fillable = [
        'user_id',
        'message',
        'rating',
        'is_approved',
    ];

    /**
     * Relation : Un témoignage appartient à un utilisateur.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
