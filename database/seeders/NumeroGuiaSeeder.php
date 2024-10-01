<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NumeroGuiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NumeroGuia::create([
            'alerta_id' => 1,
            'numero_guia' => '123-456-789',
            'marca_de_tiempo' => now(),
            'nombre_ubicacion' => 'Miami Warehouse',
            'estado' => 'ingreso a bodega Miami',
            'notas' => 'No issues',
        ]);
    }
}
