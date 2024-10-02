<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\PreAlertaRepositoryInterface;

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
        return redirect()->route('pre-alertas.index')->with('success', 'Pre-alerta creada con éxito.');
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

        return redirect()->route('pre-alertas.index')->with('success', 'Pre-alerta actualizada con éxito.');
    }

    public function destroy($id)
    {
        $this->preAlertaRepository->delete($id);
        return redirect()->route('pre-alertas.index')->with('success', 'Pre-alerta eliminada con éxito.');
    }
}
