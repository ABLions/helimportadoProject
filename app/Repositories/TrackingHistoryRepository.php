<?php

namespace App\Repositories;

use App\Models\TrackingHistory;

class TrackingHistoryRepository
{
    public function getHistoryByNumeroSeguimiento($numeroSeguimiento)
    {
        return TrackingHistory::where('numero_seguimiento', $numeroSeguimiento)
            ->with(['estado', 'user'])
            ->orderBy('created_at', 'desc')
            ->get();
    }
}
