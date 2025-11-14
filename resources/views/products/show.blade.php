@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Detalles del Producto</h2>

    <div class="card">
        <div class="card-body">
            <p><strong>Nombre:</strong> {{ $product->name }}</p>
            <p><strong>Descripción:</strong> {{ $product->description }}</p>
            <p><strong>Precio:</strong> ${{ number_format($product->price, 0, ',', '.') }}</p>
            <p><strong>Stock Actual:</strong> {{ $product->stock }}</p>
            <p><strong>Creado:</strong> {{ $product->created_at->format('d-m-Y H:i') }}</p>

            <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Volver</a>
            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning mt-3">Editar</a>
        </div>
    </div>
</div>
@endsection
