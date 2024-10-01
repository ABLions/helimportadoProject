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
        return view('pre-alertas.index', compact('alertas'));
    }

    public function create()
    {
        return view('pre-alertas.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'numero_seguimiento' => 'required',
            'valor_declarado' => 'required',
            'nombre_tienda' => 'required',
            'descripcion_paquete' => 'required',
            'autorizado' => 'required',
            'instrucciones_especiales' => 'nullable',
        ]);

        // Add user_id to the data
        $data['user_id'] = 1; // Assign user_id t
        $data['estado_id'] = 1; // Default estado_id = 1

        $this->preAlertaRepository->create($data);
        return redirect()->route('pre-alertas.index');
    }

    public function edit($id)
    {
        $alerta = $this->preAlertaRepository->findById($id);
        // Fetch estados to be passed to the view
        $estados = $this->preAlertaRepository->getEstados();
        return view('pre-alertas.edit', compact('alerta', 'estados'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'numero_seguimiento' => 'required',
            'valor_declarado' => 'required',
            'nombre_tienda' => 'required',
            'descripcion_paquete' => 'required',
            'autorizado' => 'required',
            'instrucciones_especiales' => 'nullable',
            'estado' => 'required|exists:estados,id',
        ]);

        $this->preAlertaRepository->update($data, $id);
        return redirect()->route('pre-alertas.index');
    }

    public function destroy($id)
    {
        $this->preAlertaRepository->delete($id);
        return redirect()->route('pre-alertas.index');
    }
}
