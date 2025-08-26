<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // auteur
            $table->string('title'); // titre de l’article
            $table->string('slug')->unique(); // slug pour URL
            $table->text('excerpt')->nullable(); // résumé
            $table->longText('content'); // contenu complet
            $table->string('thumbnail')->nullable(); // image de couverture
            $table->boolean('is_published')->default(false); // publié ou brouillon
            $table->timestamp('published_at')->nullable(); // date de publication

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
