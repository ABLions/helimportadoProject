<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\PreAlertaRepositoryInterface;
use App\Models\NumeroGuia;

class TrackingController extends Controller
{
    private $preAlertaRepository;

    public function __construct(PreAlertaRepositoryInterface $preAlertaRepository)
    {
        $this->preAlertaRepository = $preAlertaRepository;
    }

    // Vista para el rastreo
    public function index(Request $request)
    {
        $trackingInfo = [];
        if ($request->has('numero_guia')) {
            $numeroGuia = $request->input('numero_guia');
            $trackingInfo = NumeroGuia::where('numero_guia', $numeroGuia)->first();
        }
        return view('tracking.index', compact('trackingInfo'));
    }

    // Vista para crear prealerta
    public function create()
    {
        return view('prealerta.create');
    }

    // Almacenar prealerta
    public function store(Request $request)
    {
        $data = $request->validate([
            'numero_seguimiento' => 'required',
            'valor_declarado' => 'required|numeric',
            'nombre_tienda' => 'required',
            'descripcion_paquete' => 'required',
            'autorizado' => 'required',
            'instrucciones_especiales' => 'nullable',
        ]);

        $this->preAlertaRepository->create($data);
        return redirect()->route('prealertas.index')->with('success', 'Prealerta creada exitosamente.');
    }
}
