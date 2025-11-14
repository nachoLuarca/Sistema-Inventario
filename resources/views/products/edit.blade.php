@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Editar Producto</h2>

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="name" value="{{ old('name', $product->name) }}" class="form-control">
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Descripción</label>
            <textarea name="description" class="form-control">{{ old('description', $product->description) }}</textarea>
            @error('description') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Precio</label>
            <input type="number" step="0.01" name="price"
                   value="{{ old('price', $product->price) }}" class="form-control">
            @error('price') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button class="btn btn-primary">Guardar Cambios</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
