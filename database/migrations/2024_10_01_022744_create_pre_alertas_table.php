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
        Schema::create('pre_alertas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('numero_seguimiento');
            $table->decimal('valor_declarado', 10, 2);
            $table->string('nombre_tienda');
            $table->text('descripcion_paquete');
            $table->string('autorizado');
            $table->text('instrucciones_especiales')->nullable();
            $table->foreignId('estado_id')->constrained('estados');
            $table->string('numero_guia')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pre_alertas');
    }
};
