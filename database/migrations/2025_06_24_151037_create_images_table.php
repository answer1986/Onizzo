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
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique(); // Clave única para identificar la imagen (ej: 'header_logo')
            $table->string('path'); // Ruta de la imagen
            $table->string('alt_text_es')->nullable(); // Texto alternativo en español
            $table->string('alt_text_en')->nullable(); // Texto alternativo en inglés
            $table->string('section')->default('general'); // Sección donde aparece
            $table->string('description')->nullable(); // Descripción para el admin
            $table->boolean('is_active')->default(true); // Si la imagen está activa
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
