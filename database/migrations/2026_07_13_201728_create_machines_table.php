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
        Schema::create('machines', function (Blueprint $table) {
            $table->id();
            $table->string('numero_serie')->unique();
            $table->string('statut')->default('En service');
            $table->foreignId('modele_id')->constrained('modeles')->cascadeOnDelete();
            $table->foreignId('emplacement_id')->constrained('emplacements')->cascadeOnDelete();
            $table->foreignId('utilisateur_parc_id')->nullable()->constrained('utilisateur_parcs')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('machines');
    }
};
