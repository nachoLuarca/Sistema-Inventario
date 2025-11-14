@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Movimientos de Stock</h2>

    <a href="{{ route('stock-movements.create') }}" class="btn btn-primary mb-3">Registrar Movimiento</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Producto</th>
                <th>Tipo</th>
                <th>Cantidad</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movements as $movement)
                <tr>
                    <td>{{ $movement->id }}</td>
                    <td>{{ $movement->product->name }}</td>
                    <td>
                        @if ($movement->type == 'in')
                            <span class="badge bg-success">Entrada</span>
                        @else
                            <span class="badge bg-danger">Salida</span>
                        @endif
                    </td>
                    <td>{{ $movement->quantity }}</td>
                    <td>{{ $movement->created_at->format('d-m-Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
