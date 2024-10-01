@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Prealerta</h2>
    <form action="{{ route('pre-alertas.update', $alerta->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="numero_seguimiento" class="form-label">Número de Seguimiento</label>
                <input type="text" class="form-control" name="numero_seguimiento" value="{{ $alerta->numero_seguimiento }}" required>
            </div>
            <div class="col-md-6">
                <label for="valor_declarado" class="form-label">Valor Declarado</label>
                <input type="number" class="form-control" name="valor_declarado" value="{{ $alerta->valor_declarado }}" step="0.01" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="nombre_tienda" class="form-label">Nombre de la Tienda</label>
                <input type="text" class="form-control" name="nombre_tienda" value="{{ $alerta->nombre_tienda }}" required>
            </div>
            <div class="col-md-6">
                <label for="autorizado" class="form-label">Persona Autorizada</label>
                <input type="text" class="form-control" name="autorizado" value="{{ $alerta->autorizado }}" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="estado" class="form-label">Estado</label>
                <select name="estado_id" id="estado" class="form-control" required>
                    @foreach ($estados as $estado)
                        <option value="{{ $estado->id }}" {{ $alerta->estado_id == $estado->id ? 'selected' : '' }}>
                            {{ $estado->estado }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="descripcion_paquete" class="form-label">Descripción del Paquete</label>
                <textarea class="form-control" name="descripcion_paquete" required>{{ $alerta->descripcion_paquete }}</textarea>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <label for="instrucciones_especiales" class="form-label">Instrucciones Especiales</label>
                <textarea class="form-control" name="instrucciones_especiales">{{ $alerta->instrucciones_especiales }}</textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Prealerta</button>
    </form>
</div>
@endsection
