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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();

            // Relation avec l'article
            $table->foreignId('post_id')->constrained()->onDelete('cascade');

            // Relation parent (pour les réponses à un commentaire)
            $table->foreignId('parent_id')->nullable()->constrained('comments')->onDelete('cascade');

            $table->string('author_name');
            $table->string('author_email')->nullable();
            $table->text('content');
            $table->boolean('is_approved')->default(true); // si tu veux modérer
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
