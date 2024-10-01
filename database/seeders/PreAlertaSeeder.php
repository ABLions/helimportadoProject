<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PreAlerta;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PreAlertaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creating multiple PreAlerta instances using the model
        PreAlerta::create([
            'user_id' => 1,
            'numero_seguimiento' => Str::random(10),
            'valor_declarado' => 150.00,
            'nombre_tienda' => 'Amazon',
            'descripcion_paquete' => 'Paquete con artículos electrónicos',
            'autorizado' => 'John Doe',
            'instrucciones_especiales' => 'Entrega solo en horas laborales',
            'estado_id' => 1,
            'numero_guia' => 'TRK123456789',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        PreAlerta::create([
            'user_id' => 1,
            'numero_seguimiento' => Str::random(10),
            'valor_declarado' => 300.00,
            'nombre_tienda' => 'eBay',
            'descripcion_paquete' => 'Paquete con ropa y accesorios',
            'autorizado' => 'Jane Smith',
            'instrucciones_especiales' => 'Dejar en la recepción',
            'estado_id' => 2,
            'numero_guia' => 'TRK987654321',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
