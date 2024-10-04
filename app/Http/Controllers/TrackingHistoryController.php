<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrackingHistory;

class TrackingHistoryController extends Controller
{
    public function index(Request $request)
    {
        $numero_seguimiento = $request->input('numero_seguimiento');

        // Fetch tracking history related to numero_seguimiento
        $histories = TrackingHistory::where('numero_seguimiento', $numero_seguimiento)
                    ->with('estado', 'user')
                    ->orderBy('created_at', 'desc')
                    ->get();

        return view('tracking-history.index', compact('histories', 'numero_seguimiento'));
    }
}
