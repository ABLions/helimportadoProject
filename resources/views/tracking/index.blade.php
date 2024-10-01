@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Rastreo de Envío</h2>
    <form action="{{ route('tracking.index') }}" method="GET">
        @csrf
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="numero_guia" placeholder="Ingrese el número de guía" required>
            <button class="btn btn-primary" type="submit">Rastrear</button>
        </div>
    </form>

    @if($trackingInfo)
        <h3>Estado del Envío</h3>
        <ul class="list-group">
            <li class="list-group-item">Número de guía: {{ $trackingInfo->numero_guia }}</li>
            <li class="list-group-item">Estado: {{ $trackingInfo->estado }}</li>
            <li class="list-group-item">Ubicación: {{ $trackingInfo->nombre_ubicacion }}</li>
            <li class="list-group-item">Notas: {{ $trackingInfo->notas }}</li>
            <li class="list-group-item">Marca de tiempo: {{ $trackingInfo->marca_de_tiempo }}</li>
        </ul>
    @endif
</div>
@endsection
