@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Alertas</h1>

    <!-- Botón para abrir el modal -->
    <a href="javascript:void(0)" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#alertaModal" onclick="openModal()">
        <i class="fas fa-plus"></i> Crear prealerta
    </a>

    <!-- Tabla de alertas -->
    <table class="table table-responsive">
        <thead class="table-light">
            <tr>
                <th>Número de Seguimiento</th>
                <th>Valor Declarado USD</th>
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
                    <td>{{ number_format($alerta->valor_declarado, 2) }}</td>
                    <td>{{ $alerta->nombre_tienda }}</td>
                    <td>{{ $alerta->descripcion_paquete }}</td>
                    <td>{{ $alerta->autorizado }}</td>
                    <td>{{ $alerta->instrucciones_especiales }}</td>
                    <td>{{ $alerta->estado->estado }}</td>
                    <td>
                        <!-- Edit button to trigger the modal -->
                        <a href="javascript:void(0)" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#alertaModal" onclick="openModal({{ $alerta->id }})">
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

<!-- Modal for Creating/Editing Alert -->
<div class="modal fade" id="alertaModal" tabindex="-1" aria-labelledby="alertaModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="alertaModalLabel">Crear/Editar Alerta</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Form -->
        <form id="alertaForm" method="POST">
            @csrf
            <div id="formMethod"></div> <!-- For adding PUT method dynamically -->

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="numero_seguimiento" class="form-label">Número de Seguimiento</label>
                    <input type="text" class="form-control" id="numero_seguimiento" name="numero_seguimiento" required>
                </div>
                <div class="col-md-6">
                    <label for="valor_declarado" class="form-label">Valor Declarado USD</label>
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

            <div class="row mb-3" id="estadoSelect" style="display:none;">
                <div class="col-md-6">
                    <label for="estado" class="form-label">Estado</label>
                    <select name="estado_id" id="estado" class="form-control">
                        @foreach ($estados as $estado)
                            <option value="{{ $estado->id }}">{{ $estado->estado }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-primary" id="submitBtn">Crear Prealerta</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
    function openModal(alertaId = null) {
        if (alertaId) {
            // Edit Mode
            $('#alertaModalLabel').text('Editar prealerta');
            $('#submitBtn').text('Actualizar Alerta');
            $('#formMethod').html('@method("PUT")');
            $('#alertaForm').attr('action', '/pre-alertas/' + alertaId);

            // Load the data into the form via AJAX
            $.ajax({
                url: '/pre-alertas/' + alertaId + '/edit',
                method: 'GET',
                success: function(response) {
                    $('#numero_seguimiento').val(response.numero_seguimiento);
                    $('#valor_declarado').val(response.valor_declarado);
                    $('#nombre_tienda').val(response.nombre_tienda);
                    $('#autorizado').val(response.autorizado);
                    $('#descripcion_paquete').val(response.descripcion_paquete);
                    $('#instrucciones_especiales').val(response.instrucciones_especiales);
                    $('#estado').val(response.estado_id);
                    $('#estadoSelect').show();
                },
                error: function() {
                    alert('Error al cargar los datos de la alerta.');
                }
            });
        } else {
            // Create Mode
            $('#alertaModalLabel').text('Crear prealerta');
            $('#submitBtn').text('Crear Prealerta');
            $('#formMethod').html('');
            $('#alertaForm').attr('action', '{{ route('pre-alertas.store') }}');
            $('#alertaForm')[0].reset();
            $('#estadoSelect').hide();
        }
    }
</script>
@endsection
