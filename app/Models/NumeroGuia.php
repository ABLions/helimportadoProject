<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NumeroGuia extends Model
{
    use HasFactory;

    protected $table = 'numeroguia';

    protected $fillable = [
        'alerta_id', 'numero_guia', 'marca_de_tiempo', 
        'nombre_ubicacion', 'estado', 'notas'
    ];

    public function preAlerta() {
        return $this->belongsTo(PreAlerta::class);
    }
}
