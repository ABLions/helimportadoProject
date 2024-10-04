@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center">
    <div class="card col-9">
        <div class="card-body">
            <h1 class="card-title text-center">Rastrear Envío</h1>

            <!-- Formulario para ingresar número de seguimiento -->
            <form action="{{ route('tracking-history.index') }}" method="GET">
                <div class="mb-3">
                    <label for="numero_seguimiento" class="form-label">Número de Seguimiento</label>
                    <input type="text" class="form-control" id="numero_seguimiento" name="numero_seguimiento" value="{{ old('numero_seguimiento', $numero_seguimiento ?? '') }}" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </form>

            @if(isset($histories) && $histories->count())
                <h2 class="mt-5">Historial de Estados</h2>

                <div class="timeline">
                    @foreach ($histories as $history)
                        <div class="timeline-item">
                            <div class="card mb-3">
                                <div class="row g-0">
                                    <div class="col-md-4 d-flex align-items-center justify-content-center">
                                        <img src="{{ asset('images/helimportado-img.png') }}" alt="Brand Logo" height="60">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $history->estado->estado }}</h5>
                                            <p class="card-text">
                                                <strong>Fecha:</strong> {{ $history->created_at->format('d/m/Y H:i') }}<br>
                                                <strong>Actualizado por:</strong> {{ $history->user->name }}
                                            </p>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            @if(!$loop->last)
                                <!-- Línea de seguimiento entre tarjetas -->
                                <div class="timeline-line"></div>
                            @endif
                        </div>
                    @endforeach
                </div>

            @elseif(isset($numero_seguimiento))
                <p>No se encontraron estados para este número de seguimiento.</p>
            @endif
        </div>
    </div>
</div>
@endsection
