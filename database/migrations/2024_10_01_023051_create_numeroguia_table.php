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
        Schema::create('numeroguia', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alerta_id')->constrained('pre-alertas', 'id');
            $table->string('numero_guia');
            $table->timestamp('marca_de_tiempo');
            $table->string('nombre_ubicacion');
            $table->enum('estado', [
                'ingreso a bodega Miami',
                'en tránsito Miami – Bogotá',
                'en aduana Bogotá',
                'liberada disponible en bodega Bogotá',
                'en distribución',
                'en tránsito redespacho nacional'
            ])->default('ingreso a bodega Miami');
            $table->text('notas')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('numeroguia');
    }
};
