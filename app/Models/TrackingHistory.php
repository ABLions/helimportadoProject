<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrackingHistory extends Model
{
    use HasFactory;

    protected $table = 'tracking_history';

    protected $fillable = [
        'user_id',
        'estado_id',
        'numero_seguimiento',
        'created_at',
        'updated_at'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function estado() {
        return $this->belongsTo(Estado::class);
    }
}
