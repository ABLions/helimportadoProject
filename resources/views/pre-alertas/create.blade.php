@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Crear Prealerta</h2>
    <form action="{{ route('pre-alertas.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="numero_seguimiento" class="form-label">Número de Seguimiento</label>
                <input type="text" class="form-control" id="numero_seguimiento" name="numero_seguimiento" required>
            </div>
            <div class="col-md-6">
                <label for="valor_declarado" class="form-label">Valor Declarado</label>
                <input type="number" class="form-control" id="valor_declarado" name="valor_declarado" step="0.01" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="nombre_tienda" class="form-label">Nombre de la Tienda</label>
                <input type="text" class="form-control" id="nombre_tienda" name="nombre_tienda" required>
            </div>
            <div class="col-md-6">
                <label for="autorizado" class="form-label">Persona Autorizada</label>
                <input type="text" class="form-control" id="autorizado" name="autorizado" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <label for="descripcion_paquete" class="form-label">Descripción del Paquete</label>
                <textarea class="form-control" id="descripcion_paquete" name="descripcion_paquete" required></textarea>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <label for="instrucciones_especiales" class="form-label">Instrucciones Especiales</label>
                <textarea class="form-control" id="instrucciones_especiales" name="instrucciones_especiales"></textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Crear Prealerta</button>
    </form>
</div>
@endsection
