<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\PreAlertaRepositoryInterface;
use App\Models\TrackingHistory;


class PreAlertaController extends Controller
{
    private $preAlertaRepository;

    public function __construct(PreAlertaRepositoryInterface $preAlertaRepository)
    {
        $this->preAlertaRepository = $preAlertaRepository;
    }

    public function index()
    {
        $alertas = $this->preAlertaRepository->getAll();
        $estados = $this->preAlertaRepository->getEstados();
        return view('pre-alertas.index', compact('alertas', 'estados'));
    }

    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'numero_seguimiento' => 'required',
                'valor_declarado' => 'required|numeric',
                'nombre_tienda' => 'required',
                'descripcion_paquete' => 'required',
                'autorizado' => 'required',
                'instrucciones_especiales' => 'nullable',
            ]);
    
            $data['user_id'] = 1;
            $data['estado_id'] = 1;
    
            $this->preAlertaRepository->create($data);
    
            TrackingHistory::create([
                'numero_seguimiento' => $data['numero_seguimiento'],
                'user_id' => 1,// auth()->user()->id,  // Current user
                'estado_id' => $data['estado_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    
            return redirect()->route('pre-alertas.index')->with('success', 'Pre-alerta creada con éxito.');
        } catch (\Throwable $th) {
            return redirect()->route('pre-alertas.index')->with('error', 'Error al crear la pre-alerta.');
        }
    }

    public function edit($id)
    {
        $alerta = $this->preAlertaRepository->findById($id);
        return response()->json($alerta);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'numero_seguimiento' => 'required',
            'valor_declarado' => 'required|numeric',
            'nombre_tienda' => 'required',
            'descripcion_paquete' => 'required',
            'autorizado' => 'required',
            'instrucciones_especiales' => 'nullable',
            'estado_id' => 'required|exists:estados,id',
        ]);

        // dd($data);

        $this->preAlertaRepository->update($data, $id);

        TrackingHistory::create([
            'numero_seguimiento' => $data['numero_seguimiento'],
            'user_id' => 1, //auth()->user()->id,  // Current user
            'estado_id' => $data['estado_id'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('pre-alertas.index')->with('success', 'Pre-alerta actualizada con éxito.');
    }

    public function destroy($id)
    {
        try {
            $this->preAlertaRepository->delete($id);
            return redirect()->route('pre-alertas.index')->with('success', 'Pre-alerta eliminada con éxito.');
        } catch (\Throwable $th) {
            return redirect()->route('pre-alertas.index')->with('error', 'Error al eliminar la pre-alerta.');
        }
    }
}
