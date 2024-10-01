@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Alertas</h1>
    <a href="{{ route('pre-alertas.create') }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Crear Nueva Alerta
    </a>

    <table class="table table-responsive">
        <thead class="table-light">
            <tr>
                <th>Número de Seguimiento</th>
                <th>Valor Declarado</th>
                <th>Nombre de Tienda</th>
                <th>Descripción de Paquete</th>
                <th>Autorizado</th>
                <th>Instrucciones Especiales</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alertas as $alerta)
                <tr>
                    <td>{{ $alerta->numero_seguimiento }}</td>
                    <td>{{ number_format($alerta->valor_declarado, 2) }}</td> {{-- Format the number for currency --}}
                    <td>{{ $alerta->nombre_tienda }}</td>
                    <td>{{ $alerta->descripcion_paquete }}</td>
                    <td>{{ $alerta->autorizado }}</td>
                    <td>{{ $alerta->instrucciones_especiales }}</td>
                    <td>{{ $alerta->estado->estado }}</td>
                    <td>
                        <a href="{{ route('pre-alertas.edit', $alerta->id) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('pre-alertas.destroy', $alerta->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar esta alerta?');">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
