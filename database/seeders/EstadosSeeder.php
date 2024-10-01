<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $estados = [
            'ingreso de mercancía a bodega Miami',
            'mercancía en tránsito Miami – Bogotá',
            'mercancía en aduana Bogotá',
            'mercancía liberada disponible en bodega Bogotá',
            'mercancía en distribución',
            'mercancía en tránsito redespacho nacional',
        ];

        foreach ($estados as $estado) {
            DB::table('estados')->insert([
                'estado' => $estado,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

    }
}
