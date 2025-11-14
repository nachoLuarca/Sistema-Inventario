@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-warning text-dark">
        <h5>Editar Producto</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" name="name" value="{{ old('name', $product->name) }}" 
                       class="form-control @error('name') is-invalid @enderror" required>
                @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <textarea name="description" rows="3" 
                          class="form-control @error('description') is-invalid @enderror">{{ old('description', $product->description) }}</textarea>
                @error('description')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Precio</label>
                <input type="number" name="price" value="{{ old('price', $product->price) }}"
                       class="form-control @error('price') is-invalid @enderror" required>
                @error('price')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Stock</label>
                <input type="number" name="stock" value="{{ old('stock', $product->stock) }}"
                       class="form-control @error('stock') is-invalid @enderror" required>
                @error('stock')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-warning">Actualizar</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection
