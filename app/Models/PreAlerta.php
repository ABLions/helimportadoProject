<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreAlerta extends Model
{
    use HasFactory;

    protected $table = 'pre_alertas';

    protected $fillable = [
        'user_id', 
        'numero_seguimiento', 
        'valor_declarado', 
        'nombre_tienda', 
        'descripcion_paquete', 
        'autorizado', 
        'instrucciones_especiales', 
        'estado_id', 
        'numero_guia'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function estado() {
        return $this->belongsTo(Estado::class, 'estado_id');
    }

    public function numeroguia() {
        return $this->hasMany(NumeroGuia::class);
    }
}
