@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h5>Detalles del Producto</h5>
    </div>
    <div class="card-body">
        <p><strong>Nombre:</strong> {{ $product->name }}</p>
        <p><strong>Descripción:</strong> {{ $product->description }}</p>
        <p><strong>Precio:</strong> ${{ number_format($product->price, 0, ',', '.') }}</p>
        <p><strong>Stock:</strong> {{ $product->stock }}</p>
        <p><strong>Categoría:</strong> {{ $product->category->name ?? 'Sin categoría' }}</p>

        <a href="{{ route('products.index') }}" class="btn btn-secondary">Volver</a>
        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Editar</a>
    </div>
</div>
@endsection
