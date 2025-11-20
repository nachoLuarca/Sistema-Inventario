@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h2 class="mb-4 text-center">Panel de Control</h2>

    {{-- Tarjetas de estadísticas --}}
    <div class="row mb-4">

        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Productos</h5>
                    <h2 class="fw-bold">{{ $totalProductos }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Movimientos Hoy</h5>
                    <h2 class="fw-bold">{{ $movimientosHoy }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Usuario Activo</h5>
                    <h2 class="fw-bold">{{ auth()->user()->name }}</h2>
                </div>
            </div>
        </div>

    </div>

    {{-- Gráfico --}}
    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <h5 class="card-title text-center">Movimientos por Día</h5>
            <canvas id="stockChart"></canvas>
        </div>
    </div>

    {{-- Últimos movimientos --}}
    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title">Últimos Movimientos</h5>

            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Tipo</th>
                        <th>Cantidad</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($ultimosMovimientos as $mov)
                        <tr>
                            <td>{{ $mov->product->name }}</td>
                            <td>
                                <span class="badge {{ $mov->type == 'entrada' ? 'bg-success' : 'bg-danger' }}">
                                    {{ ucfirst($mov->type) }}
                                </span>
                            </td>
                            <td>{{ $mov->quantity }}</td>
                            <td>{{ $mov->created_at->format('d-m-Y H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No hay movimientos recientes</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>

</div>

{{-- Chart.js CDN --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('stockChart');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: {!! json_encode($labels) !!},
            datasets: [{
                label: 'Movimientos',
                data: {!! json_encode($cantidades) !!},
                borderWidth: 2
            }]
        }
    });
</script>

@endsection
